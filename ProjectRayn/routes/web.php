<?php

use App\Http\Controllers\Controllerrayn;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/', function () {
    return view('home');
});


Route::get('/produk', function () {
    return view('produk');
});

Route::get('/home',[Controllerrayn::class, 'TampilRayn']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);
Route::post('/produk/add', [ProdukController::class, 'CreateProduk']);
Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);
Route::get('/produk/edit/{kode_produk}', [ProdukController::class, 'ViewEditProduk']);
Route::put('/produk/edit/{kode_produk}', [ProdukController::class, 'UpdateProduk']);
