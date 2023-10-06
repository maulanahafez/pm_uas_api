<?php

use App\Http\Controllers\DaftarBelanjaController;
use App\Http\Controllers\ProdukController;
use App\Models\DaftarBelanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ProdukController::class)->group(function () {
    Route::get("produks", "index");
    Route::post("produks", "store");
    Route::get("produk/{id}", "show");
    Route::put("produk/{id}", "update");
    Route::delete("produk/{id}", "destroy");
});

Route::controller(DaftarBelanjaController::class)->group(function () {
    Route::get("daftar_belanjas", "index");
    Route::post("daftar_belanjas", "store");
    Route::get("daftar_belanja/{id}", "show");
    Route::put("daftar_belanja/{id}", "update");
    Route::delete("daftar_belanja/{id}", "destroy");
});
