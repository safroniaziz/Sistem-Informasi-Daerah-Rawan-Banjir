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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
});

Route::group(['prefix' => 'admin/parameter'], function(){
    Route::get('/', 'Admin\ParameterController@index')->name('admin.parameter');
    Route::get('/{id}/edit', 'Admin\ParameterController@edit')->name('admin.parameter.edit');
    Route::patch('/', 'Admin\ParameterController@update')->name('admin.parameter.update');
});

Route::group(['prefix' => 'admin/bulan'], function(){
    Route::get('/', 'Admin\BulanController@index')->name('admin.bulan');
    Route::post('/', 'Admin\BulanController@post')->name('admin.bulan.post');
    Route::get('/{id}/edit', 'Admin\BulanController@edit')->name('admin.bulan.edit');
    Route::patch('/', 'Admin\BulanController@update')->name('admin.bulan.update');
    Route::delete('/', 'Admin\BulanController@delete')->name('admin.bulan.delete');
});

Route::group(['prefix' => 'admin/tahun'], function(){
    Route::get('/', 'Admin\TahunController@index')->name('admin.tahun');
    Route::post('/', 'Admin\TahunController@post')->name('admin.tahun.post');
    Route::get('/{id}/edit', 'Admin\TahunController@edit')->name('admin.tahun.edit');
    Route::patch('/', 'Admin\TahunController@update')->name('admin.tahun.update');
    Route::delete('/', 'Admin\TahunController@delete')->name('admin.tahun.delete');
});

Route::group(['prefix' => 'admin/nilai_parameter'], function(){
    Route::get('/', 'Admin\NilaiParameterController@index')->name('admin.nilai_parameter');
    Route::post('/', 'Admin\NilaiParameterController@post')->name('admin.nilai_parameter.post');
    Route::get('/{id}/edit', 'Admin\NilaiParameterController@edit')->name('admin.nilai_parameter.edit');
    Route::patch('/', 'Admin\NilaiParameterController@update')->name('admin.nilai_parameter.update');
    Route::delete('/', 'Admin\NilaiParameterController@delete')->name('admin.nilai_parameter.delete');
    Route::get('/cari_kelurahan', 'Admin\NilaiParameterController@cariKelurahan')->name('admin.nilai_parameter.cari_kelurahan');
});

Route::group(['prefix' => 'admin/nilai_sub_parameter'], function(){
    Route::get('/', 'Admin\NilaiSubParameterController@index')->name('admin.nilai_sub_parameter');
    Route::post('/', 'Admin\NilaiSubParameterController@post')->name('admin.nilai_sub_parameter.post');
    Route::get('/{id}/edit', 'Admin\NilaiSubParameterController@edit')->name('admin.nilai_sub_parameter.edit');
    Route::patch('/', 'Admin\NilaiSubParameterController@update')->name('admin.nilai_sub_parameter.update');
    Route::delete('/', 'Admin\NilaiSubParameterController@delete')->name('admin.nilai_sub_parameter.delete');
    Route::get('/cari_kelurahan', 'Admin\NilaiSubParameterController@cariKelurahan')->name('admin.nilai_sub_parameter.cari_kelurahan');
    Route::get('/cari_sub_parameter', 'Admin\NilaiSubParameterController@cariSubParameter')->name('admin.nilai_sub_parameter.cari_sub_parameter');
});

Route::group(['prefix' => 'admin/sub_parameter'], function(){
    Route::get('/', 'Admin\SubParameterController@index')->name('admin.sub_parameter');
    Route::get('/{id}/edit', 'Admin\SubParameterController@edit')->name('admin.sub_parameter.edit');
    Route::patch('/', 'Admin\SubParameterController@update')->name('admin.sub_parameter.update');
});

Route::group(['prefix' => 'admin/kecamatan'], function(){
    Route::get('/', 'Admin\KecamatanController@index')->name('admin.kecamatan');
});

Route::group(['prefix' => 'admin/kelurahan'], function(){
    Route::get('/', 'Admin\KelurahanController@index')->name('admin.kelurahan');
});

Route::group(['prefix' => 'admin/koordinat_kelurahan'], function(){
    Route::get('/', 'Admin\KoordinatKelurahanController@index')->name('admin.koordinat');
    Route::post('/', 'Admin\KoordinatKelurahanController@post')->name('admin.koordinat.add');
    Route::get('/{id}/edit', 'Admin\KoordinatKelurahanController@edit')->name('admin.koordinat.edit');
    Route::patch('/', 'Admin\KoordinatKelurahanController@update')->name('admin.koordinat.update');
    Route::delete('/', 'Admin\KoordinatKelurahanController@delete')->name('admin.koordinat.delete');
});
