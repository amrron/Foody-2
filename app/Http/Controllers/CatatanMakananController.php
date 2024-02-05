<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Makanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CatatanMakanan;
use Illuminate\Http\JsonResponse;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Resources\CatatankuResource;

class CatatanMakananController extends Controller
{
    public function index() {
        $catatans = CatatanMakanan::where('user_id', auth()->id())->where('waktu', '>=', date('Y-m-d'))->get()->sortBy('waktu');

        return view('catatanku', [
            'catatans' => $catatans,
            'history' => false
        ]);
    }

    public function generateMakanan($makanan) {
        $compilation = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'kamu adalah database yang menyimpan data kandungan makanan, yaitu karbohidrat, protein, garam, gula, lemak, dan deskripsi kurang dari 20 kata. menghasilkan dalam format json'
                ],
                [
                    'role' => 'user',
                    'content' => $makanan
                ]
                ],
            'max_tokens' => 100, 
        ]);

        return $compilation;
    }

    public function input(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jumlah' => 'required|numeric',
            'waktu' => 'required'
        ]);

        $makanan = Makanan::where('nama', 'LIKE', "{$validatedData['nama']}")->first();

        if(empty($makanan)) {
            $makanan = Makanan::where('nama', 'LIKE', "{$validatedData['nama']}%")->first();
        }

        if(empty($makanan)){
            $compilation = $this->generateMakanan($validatedData['nama']);

            $result = $compilation['choices'][0]['message']['content'];
            if(!str_contains($result, "{")){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Makanan tidak ditemukan. Periksa kembali nama makanan'
                ], 400);
            }
            $generated_makanan = json_decode($result);
            $new_makanan['nama'] = Str::of($validatedData['nama'])->title();
            $new_makanan['karbohidrat'] = isset($generated_makanan->karbohidrat) ? floatval($generated_makanan->karbohidrat) : 0;
            $new_makanan['protein'] = isset($generated_makanan->protein) ? floatval($generated_makanan->protein) : 0;
            $new_makanan['garam'] = isset($generated_makanan->garam) ? floatval($generated_makanan->garam) : 0;
            $new_makanan['gula'] = isset($generated_makanan->gula) ? floatval($generated_makanan->gula) : 0;
            $new_makanan['lemak'] = isset($generated_makanan->lemak) ? floatval($generated_makanan->lemak) : 0;
            $new_makanan['deskripsi'] = isset($generated_makanan->karbohidrat) ? $generated_makanan->deskripsi : "Deskripsi tidak tersedia";
            $new_makanan['slug'] = Str::slug($new_makanan['nama']);
            $new_makanan['gambar'] = "https://source.unsplash.com/400x400?" . $validatedData['nama'];
            $makanan = Makanan::create($new_makanan);
        }

        $makanan_id = $makanan->id;
        $validatedData['makanan_id'] = $makanan_id;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['waktu'] = date('Y-m-d') . " " . $validatedData['waktu'];

        CatatanMakanan::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mencatat makanan!'
        ], 201);
    }

    public function destroy($id){
        CatatanMakanan::where('id', $id)->delete();
    }

    public function riwayat () {
        $catatanMakanan = CatatanMakanan::where('user_id', auth()->user()->id)->get()->sortByDesc('waktu');
        $catatanPerTanggal = $catatanMakanan->groupBy('tanggalWaktu');

        return view("catatanku", [
            "catatans" => $catatanPerTanggal,
            "history" => true
        ]);
    }

    public function daily() : JsonResponse {

        $catatanku = CatatanMakanan::where('user_id', auth()->user()->id)->where('waktu', '>=', date('Y-m-d'))->get()->sortBy('waktu');
        
        $catatans = [];
        foreach($catatanku as $catatan){
            array_push($catatans, new CatatankuResource($catatan));
        };
        
        return response()->json([
            'status' => "success",
            'data' => $catatans,
            'message' => $this->chart()
        ], 201);
    }

    public function history() : JsonResponse {
        
        $catatans = [];

        $catatanMakanan = CatatanMakanan::where('user_id', auth()->user()->id)->get()->sortByDesc('waktu');
        $catatanPerTanggal = $catatanMakanan->groupBy('tanggalWaktu');

        foreach($catatanPerTanggal as $tanggal => $catatan){
            $note = [];
            foreach($catatan as $catat){
                array_push($note, new CatatankuResource($catat));
            }
            array_push($catatans, [
                'hari' => Carbon::parse($tanggal)->locale('id')->dayName,
                'tanggal' => $tanggal,
                'data' => $note
            ]);
        }
        
        return response()->json([
            'status' => "success",
            'data' => $catatans
        ], 201);
    }

    public function delete($id) : JsonResponse {

        $catatan = CatatanMakanan::where('id', $id);

        $catatan->delete();

        return response()->json([
            'status' => "success",
            'message' => "Berhasil menghapus catatan"
        ], 201);
    }

    public function tanggal($tanggal) : JsonResponse {
        $catatans = CatatanMakanan::whereDate('waktu', $tanggal)->get();
        // $catatans = CatatanMakanan::all();

        $catatan = [];
        foreach($catatans as $catat){
            array_push($catatan, new CatatankuResource($catat));
        }

        return response()->json([
            'status' => "success",
            'data' => $catatan
        ], 201);
    }

    public function chart() {
        
        $data = [
            "labels" => ["Karbohidrat", "Protein", "Garam", "Gula", "Lemak"],
            "datasets" => [
                [
                    "label" => "Dataset 1",
                    "data" => [round(auth()->user()->dailyKarbo, 1), round(auth()->user()->dailyProtein, 1), round(auth()->user()->dailyGaram, 1), round(auth()->user()->dailyGula, 1), round(auth()->user()->dailyLemak, 1)],
                    "backgroundColor" => [
                        "rgb(51, 161, 77)",
                        "rgb(219, 243, 251)",
                        "rgb(253, 206, 208)",
                        "rgb(17, 17, 17)",
                        "rgb(202, 200, 230)",
                    ],
                ],
            ],
        ];

        $config = [
            "type" => "doughnut",
            "data" => $data,
            "options" => [
                "responsive" => true,
                "plugins" => [
                    "legend" => [
                        "position" => "top",
                        "display" => false
                    ],
                    "title" => ["display" => false],
                    "doughnutlabel" => [
                        "labels" => [
                            [ "text" => auth()->user()->dailyKarbo + auth()->user()->dailyProtein + auth()->user()->dailyGaram + auth()->user()->dailyGula + auth()->user()->dailyLemak, "font" => [ "size" => 20 ] ], 
                            [ "text" => 'total' ]
                        ],
                    ],
                ],
            ],
        ];

        $link = "https://quickchart.io/chart?v=4&bkg=white&width=300&height=300&f=png&c=" . json_encode($config);

        return $link;
    }

}
