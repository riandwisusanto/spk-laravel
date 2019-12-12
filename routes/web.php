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
Route::get("/", "HomeController@view");
Route::post("/", "HomeController@masuk")->name('login.home');
Route::get("/datart/{id}","DataRtController@view")->name('data.rt');
Route::post("/datart/{id}","DataRtController@kirimdata")->name('data.rt.kirim');
Route::get("/tambah/{id}","InputDataController@view")->name('tambah.index');
Route::post("/tambah/{id}","InputDataController@tambah")->name('tambah.data');
Route::get("/detil/{idd}","InputDataController@Detil")->name('detil.data');
Route::post("/ubah/{idd}","InputDataController@Ubah")->name('ubah.data');
Route::delete("/hapus/{id}","InputDataController@hapus")->name('hapus.data');
Route::get("/tentang/{id}","TentangController@index")->name('tentang.rt');


Route::get("/datads", "DataDsController@view")->name('ds.data');
Route::get("/datads/cetak", "DataDsController@cetak")->name('cetak.data');
Route::get("/datads/{id}", "DataController@view")->name('index.dt');
Route::get("/inputrt","InputRtController@index");
Route::post("/inputrt","InputRtController@tambah")->name('tambah.rt');
Route::get("/detailrt/{id}","InputRtController@Detil")->name('detil.rt');
Route::post("/ubahrt/{id}","InputRtController@Ubah")->name('ubah.rt');
Route::post("/hapusrt/{id}","InputRtController@hapus")->name('hapus.rt');
Route::get("/tentang1","TentangController@index1");
Route::post("/datads/{id}","DataController@viewdetail")->name('detail.data');
