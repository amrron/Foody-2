<?php

namespace App\Http\Controllers;

use App\Models\Bmi;
use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function index() {
        $bmi = Bmi::where('user_id', auth()->id())->get()->sortByDesc('created_at')->take(3);

        return view('bmi', [
            'bmis' => $bmi,
            'history' => false
        ]);
    }

    public function store(Request $request) {
        $validated =  $request->validate([
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric'
        ]);

        $validated['user_id'] = auth()->id();
        
        $bmi = Bmi::create($validated);

        $request->session()->flash('success', [
            'nilai' => $bmi->nilai,
            'kategori' => $bmi->kategori['status'],
            'warna' => $bmi->kategori['color'],
            'warna_tebal' => $bmi->kategori['strongColor'],
            ]);

        return redirect('/bmi');
    }

    public function destroy($id){
        if(Bmi::where('user_id', auth()->user()->id)->count() < 2) {
            return response()->json([
                "status" => 'error',
                "message" => 'Tidak dapat menghapus satu-satunya catatan!'
            ], 400);
        }
        else {
            Bmi::where('id', $id)->delete();
        }
    }

    public function history() {
        $bmis = Bmi::where('user_id', auth()->user()->id)->get()->sortByDesc('created_at')->groupBy('tanggalWaktu');

        return view('bmi', [
            'bmis' => $bmis,
            'history' => true
        ]);
    }

    public function chart() {
        $labels = Bmi::where('user_id', auth()->user()->id)->orderBy('created_at')->pluck('created_at')->toArray();
        if(count($labels) < 2) {
            array_push($labels, date('Y-m-d'));
        }
        $bmi = Bmi::where('user_id', auth()->user()->id)->get()->sortBy('created_at');

        
        $nilai = [];
        foreach($bmi as $bm) {
            array_push($nilai, $bm->nilai);
        }
        $value = $nilai;


        $data = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Nilai BMI',
                    'borderColor' => '#17184f',
                    'backgroundColor' => 'rgba(255, 255, 255)',
                    'data' => $value,
                    'type' => 'line',
                    'tension' => 0,
                    'fill' => false
                ],
                [
                    'label' => 'Berat Badan Kurang',
                    'type' => 'line',
                    'data' => array_fill(0, count(Bmi::where('user_id', auth()->user()->id)->pluck('berat_badan')) + 1, 18.5),
                    'backgroundColor' => 'rgba(28, 195, 232)',
                    'borderColor' => 'rgb(28, 195, 232)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => true,
                ],
                [
                    'label' => 'Berat Badan Normal',
                    'type' => 'line',
                    'data' => array_fill(0, count(Bmi::where('user_id', auth()->user()->id)->pluck('berat_badan')) + 1, 24.9),
                    'backgroundColor' => 'rgba(43, 194, 70)',
                    'borderColor' => 'rgb(43, 194, 70)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => true,
                ],
                [
                    'label' => 'Kelebihan Berat Badan',
                    'type' => 'line',
                    'data' => array_fill(0, count(Bmi::where('user_id', auth()->user()->id)->pluck('berat_badan')) + 1, 29.9),
                    'backgroundColor' => 'rgba(219, 190, 22)',
                    'borderColor' => 'rgb(219, 190, 22)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => true,
                ],
                [
                    'label' => 'Obesitas I',
                    'type' => 'line',
                    'data' => array_fill(0, count(Bmi::where('user_id', auth()->user()->id)->pluck('berat_badan')) + 1, 34.9),
                    'backgroundColor' => 'rgba(219, 104, 22)',
                    'borderColor' => 'rgb(219, 104, 22)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => true,
                ],
                [
                    'label' => 'Obesitas II',
                    'type' => 'line',
                    'data' => array_fill(0, count(Bmi::where('user_id', auth()->user()->id)->pluck('berat_badan')) + 1, 39.9),
                    'backgroundColor' => 'rgba(214, 45, 26)',
                    'borderColor' => 'rgb(214, 45, 26)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => true,
                ],
                [
                    'label' => 'Obesitas III',
                    'type' => 'line',
                    'data' => array_fill(0, count(Bmi::where('user_id', auth()->user()->id)->pluck('berat_badan')) + 1, 45),
                    'backgroundColor' => 'rgb(214, 26, 26)',
                    'borderColor' => 'rgb(214, 26, 26)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => true,
                ],
                
            ],
        ];

        return response()->json($data);
    }
}
