<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\CatatanMakananController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\CatatanMakanan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/success-verify', function(){
    return view('auth.success-verify');
})->name('succes_verify');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('forgotpassword');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update-gambar', [ProfileController::class, 'changePP']);
    Route::patch('/profile/hapus-gambar', [ProfileController::class, 'removePP']);
    Route::post('/profile/report', [CatatanMakananController::class, 'report']);
    
    Route::get('/bmi', [BmiController::class, 'index'])->name("bmi");
    Route::post('/bmi', [BmiController::class, 'store'])->name('bmi');
    Route::get('/bmi/history', [BmiController::class, 'riwayat']);
    Route::get('/bmi/chart-data', [BmiController::class, 'chart']);
    Route::delete('/bmi/delete/{id}', [BmiController::class, 'destroy']);

    Route::post('/catatanku/input', [CatatanMakananController::class, 'input']);
    Route::get('/catatanku', [CatatanMakananController::class, 'index'])->name('catatanku');
    Route::delete('/catatanku/delete/{id}', [CatatanMakananController::class, 'destroy']);
    Route::get('/catatanku/history', [CatatanMakananController::class, 'riwayat']);

    Route::get('/makanan', [MakananController::class, 'index'])->name('makanan');
    Route::get('/makanan/{makanan:slug}', [MakananController::class, 'detailMakanan']);
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/user', [AdminController::class, 'indexUser'])->name('admin.user');
    Route::get('/admin/makanan', [AdminController::class, 'indexMakanan'])->name('admin.makanan');
    Route::get('/admin/makanan/{id}', [MakananController::class, 'detailJson'])->name('detail.makanan');
    Route::post('/admin/makanan', [MakananController::class, 'store'])->name('add.makanan');
    Route::delete('/admin/makanan/hapus/{id}', [MakananController::class, 'destroy'])->name('hapus.makanan');
    Route::post('/admin/makanan/edit', [MakananController::class, 'update'])->name('update.makanan');
});

require __DIR__.'/auth.php';
