<?php

namespace App\Http\Controllers;

use App\Models\Bmi;
use App\Models\User;
use App\Models\Makanan;
use Illuminate\Http\Request;
use App\Models\CatatanMakanan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function indexDashboard(){
        $catatanPerTanggal = CatatanMakanan::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->get();

        $bmiPerTanggal = Bmi::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->get();

        $tanggal = $catatanPerTanggal->pluck('tanggalWaktu')->toArray();
        $jumlah = $catatanPerTanggal->pluck('count')->toArray();

        $tanggal_bmi = $bmiPerTanggal->pluck('tanggalWaktu')->toArray();
        $jumlah_bmi = $bmiPerTanggal->pluck('count')->toArray();

        $user = User::all()->count();
        $makanan = Makanan::all()->count();
        $catatan = CatatanMakanan::all()->count();
        $bmi = Bmi::all()->count();

        return view('admin.dashboard', [
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'tanggal_bmi' => $tanggal_bmi,
            'jumlah_bmi' => $jumlah_bmi,
            'user' => $user,
            'makanan' => $makanan,
            'catatan' => $catatan,
            'bmi' => $bmi,
        ]);
    }

    public function indexUser() {
        $users = User::filter(request(['search']))->latest()->paginate(12);
        return view('admin.user', [
            'users' => $users,
        ]);
    }

    public function indexMakanan() {
        $makanan = Makanan::filter(request(['search']))->latest()->paginate(12);
        return view('admin.makanan', [
            'makanans' => $makanan,
        ]);
    }
}
