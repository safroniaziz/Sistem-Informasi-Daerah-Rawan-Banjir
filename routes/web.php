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
