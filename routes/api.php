<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\CatatanMakananController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get("/users/profile", [UserController::class, 'profile']);
//     Route::get("/users/summary", [UserController::class, 'summary']);
    Route::post("/users/logout", [UserController::class, 'logout']);
    Route::put("/users/update", [UserController::class, 'update']);
//     Route::post("/users/report", [UserController::class, 'report']);

    Route::post("/catatanku", [CatatanMakananController::class, 'input']);
//     Route::post("catatanku/store", [CatatankuController::class, 'input']);
    Route::get("/catatanku/daily", [CatatanMakananController::class, 'daily']);
    Route::get("/catatanku/history", [CatatanMakananController::class, 'history']);
    Route::get("/catatanku/tanggal/{tanggal}", [CatatanMakananController::class, 'tanggal']);
    Route::delete("/catatanku/delete/{id}", [CatatanMakananController::class, 'delete']);

    Route::post(("/bmi"), [BmiController::class, 'input']);
    Route::get(("/bmi/recent"), [BmiController::class, 'recent']);
    Route::get(("/bmi/history"), [BmiController::class, 'history']);
    Route::delete(("/bmi/delete/{bmi}"), [BmiController::class, 'delete']);
    Route::get("/bmi/chart/", [BmiController::class, 'apichart']);
});

Route::post("/users", [UserController::class, 'store']);
Route::post("/users/login", [UserController::class, 'login']);
Route::get("/makanan", [MakananController::class, 'getall']);
Route::get("/makanan/{makanan}", [MakananController::class, 'detail']);
// Route::get("/produk", [ProdukApiController::class, 'getall']);
