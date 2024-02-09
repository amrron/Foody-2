<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
