<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class MakananController extends Controller
{
    public function index(Request $request) {
        if(empty(Makanan::where('nama', 'LIKE', '%' . $request->search . '%')->first())){
            $compilation = $this->generateMakanan($request->search);

            $result = $compilation['choices'][0]['message']['content'];
            if(!str_contains($result, "{")){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Makanan tidak ditemukan. Periksa kembali nama makanan'
                ], 400);
            }
            $generated_makanan = json_decode($result);
            $new_makanan['nama'] = Str::of($request->search)->title();
            $new_makanan['karbohidrat'] = isset($generated_makanan->karbohidrat) ? floatval($generated_makanan->karbohidrat) : 0;
            $new_makanan['protein'] = isset($generated_makanan->protein) ? floatval($generated_makanan->protein) : 0;
            $new_makanan['garam'] = isset($generated_makanan->garam) ? floatval($generated_makanan->garam) : 0;
            $new_makanan['gula'] = isset($generated_makanan->gula) ? floatval($generated_makanan->gula) : 0;
            $new_makanan['lemak'] = isset($generated_makanan->lemak) ? floatval($generated_makanan->lemak) : 0;
            $new_makanan['deskripsi'] = isset($generated_makanan->karbohidrat) ? $generated_makanan->deskripsi : "Deskripsi tidak tersedia";
            $new_makanan['slug'] = Str::slug($new_makanan['nama']);
            $new_makanan['gambar'] = "https://source.unsplash.com/400x400?" . $request->search;
            $makanan = Makanan::create($new_makanan);
        }

        $makanans = Makanan::latest()->filter(request(['search', 'protein', 'karbohidrat', 'garam', 'gula', 'lemak', 'kategori']))->get();

        return view('makanan', [
            'makanans' => $makanans
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

    public function detailMakanan(Makanan $makanan) {
        return view('detailmakanan', [
            "title" => $makanan->nama,
            "makanan" => $makanan
        ]);
    }
}
