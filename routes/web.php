<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function (){
    Route::resources([
        'pelanggan' => 'PelangganController',
        'penerima_santunan' => 'PenerimaSantunanController',
        'agen' => 'AgenController',
        'asuransi' => 'AsuransiController',
        'pembayaran' => 'PembayaranController'
    ]);
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/pembayaran/{id}/cetak', 'PembayaranController@cetak');
Route::get('/pembayaran/{id}/cetak-klaim', 'PembayaranController@cetakKlaim');
Route::get('/asuransi/{id}/cetak', 'AsuransiController@cetak');