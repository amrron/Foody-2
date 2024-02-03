<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('forgotpassword');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update-gambar', [ProfileController::class, 'changePP']);
    Route::patch('/profile/hapus-gambar', [ProfileController::class, 'removePP']);
    
    Route::get('/bmi', [BmiController::class, 'index'])->name("bmi");
    Route::post('/bmi', [BmiController::class, 'store'])->name('bmi');
    Route::get('/bmi/history', [BmiController::class, 'history']);
    Route::delete('/bmi/delete/{id}', [BmiController::class, 'destroy']);
    Route::get('/bmi/dataforchart', [BmiController::class, 'chart']);

    Route::post('/catatanku/input', [CatatanMakananController::class, 'input']);
    Route::get('/catatanku', [CatatanMakananController::class, 'index'])->name('catatanku');
    Route::delete('/catatanku/delete/{id}', [CatatanMakananController::class, 'destroy']);
    Route::get('/catatanku/history', [CatatanMakananController::class, 'history']);

    Route::get('/makanan', [MakananController::class, 'index'])->name('makanan');
    Route::get('/makanan/{makanan:slug}', [MakananController::class, 'detailMakanan']);
});

require __DIR__.'/auth.php';
