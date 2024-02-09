<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bmi;
use Illuminate\Http\Request;
use App\Http\Requests\BmiRequest;

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

    public function riwayat() {
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

        $labels2 = [];
        foreach($labels as $lab) {
            array_push($labels2, date('Y-m-d', strtotime($lab)));
        }

        $data = [
            'labels' => $labels2,
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

    public function input(BmiRequest $request){

        $validatedBmi = $request->validated();
        $validatedBmi['user_id'] = auth()->user()->id;
        $validatedBmi['waktu'] = date('Y-m-d');

        $bmi = Bmi::create($validatedBmi);

        return response()->json([
            "status" => "success",
            "message" => "Berhasil menambahkan BMI",
            "data" => [
                'nilai_bmi' => $bmi->nilai,
                'kategori' => $bmi->kategori['status'],
                'warna' => $bmi->kategori['color'],
                'warna_tebal' => $bmi->kategori['strongColor'],
            ]
        ], 201);
    }

    public function recent(){

        $bmi = Bmi::where('user_id', auth()->id())->get()->sortByDesc('created_at')->take(3);
        $bmis = [];
        foreach($bmi as $bm){
            array_push($bmis, [
                'id' => $bm->id,
                'nilai_bmi' => $bm->nilai,
                'waktu' => $bm->waktu,
                'kategori' => $bm->kategori
            ]);
        }

        return response()->json([
            'status' => "success",
            'data' => $bmis,
            'message' => $this->apichart()
        ], 201);
    }

    public function history(){

        $groupedBmi = Bmi::where('user_id', auth()->user()->id)->get()->sortByDesc('created_at')->groupBy('tanggalWaktu');
        $bmis = [];

        foreach($groupedBmi as $tanggal => $bmi){
            $array = [];
            foreach($bmi as $bm){
                array_push($array, [
                    'id' => $bm->id,
                    'nilai_bmi' => $bm->nilai,
                    'waktu' => $bm->waktu,
                    'kategori' => $bm->kategori
                ]);
            }
            array_push($bmis, [
                'hari' => Carbon::parse($tanggal)->locale('id')->dayName,
                'tanggal' => $tanggal,
                'data' => $array
            ]);
        }

        return response()->json([
            'status' => "success",
            'data' => $bmis
        ], 201);
    }

    public function delete(Bmi $bmi) {
        
        if(Bmi::where('user_id', auth()->user()->id)->count() < 2) {
            return response()->json([
                "status" => 'error',
                "message" => 'Tidak dapat menghapus satu-satunya catatan!'
            ], 400);
        }
        else {
            $bmi->delete();

            return response()->json([
                'status' => "success",
                'message' => "Berhasil menghapus catatan BMI"
            ], 201);
        }
    }

    public function apichart() {

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

        $labels2 = [];
        foreach($labels as $lab) {
            array_push($labels2, date('Y-m-d', strtotime($lab)));
        }

        $data = [
            'labels' => $labels2,
            'datasets' => [
                [
                    'label' => 'Nilai BMI',
                    'borderColor' => 'rgba(23, 24, 79)',
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
        
        $setup = [
            "type" => "line",
            "data" => $data,
            "options" => [
                "responsive" => true,
                "maintainAspectRatio" => false,
                "plugins" => ["legend" => ["position" => "top"]],
                "scales" => ["x" => ["display" => false]],
            ]
        ];

        $link = "https://quickchart.io/chart?v=4&bkg=rgb(217, 244, 255)&f=svg&c=" . json_encode($setup);
        return $link;
    }

}
