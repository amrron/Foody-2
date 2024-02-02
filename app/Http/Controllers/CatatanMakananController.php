<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CatatanMakanan;
use OpenAI\Laravel\Facades\OpenAI;

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
            $new_makanan['gambar'] = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Ffd%2F80%2Fec%2Ffd80ecec48eba2a9adb76e4133905879.png";
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

    public function history () {
        $catatanMakanan = CatatanMakanan::where('user_id', auth()->user()->id)->get()->sortByDesc('waktu');
        $catatanPerTanggal = $catatanMakanan->groupBy('tanggalWaktu');

        return view("catatanku", [
            "catatans" => $catatanPerTanggal,
            "history" => true
        ]);
    }
}
