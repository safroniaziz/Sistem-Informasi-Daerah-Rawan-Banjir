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

Route::get('/', 'FrontController@index')->name('front');
Route::get('/peta_saw','FrontController@petaSaw')->name('peta_saw');
Route::get('/grafik_saw','FrontController@grafikSaw')->name('grafik_saw');
Route::get('/grafik_linear','FrontController@grafikLinear')->name('grafik_linear');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function(){
    Auth::routes();
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
    Route::get('/{id}/edit', 'Admin\KecamatanController@edit')->name('admin.kecamatan.edit');
    Route::patch('/', 'Admin\KecamatanController@update')->name('admin.kecamatan.update');

});

Route::group(['prefix' => 'admin/kelurahan'], function(){
    Route::get('/', 'Admin\KelurahanController@index')->name('admin.kelurahan');
    Route::get('/{id}/edit', 'Admin\KelurahanController@edit')->name('admin.kelurahan.edit');
    Route::patch('/', 'Admin\KelurahanController@update')->name('admin.kelurahan.update');
});

Route::group(['prefix' => 'admin/koordinat_kelurahan'], function(){
    Route::get('/', 'Admin\KoordinatKelurahanController@index')->name('admin.koordinat');
    Route::post('/', 'Admin\KoordinatKelurahanController@post')->name('admin.koordinat.add');
    Route::get('/{id}/edit', 'Admin\KoordinatKelurahanController@edit')->name('admin.koordinat.edit');
    Route::patch('/', 'Admin\KoordinatKelurahanController@update')->name('admin.koordinat.update');
    Route::delete('/', 'Admin\KoordinatKelurahanController@delete')->name('admin.koordinat.delete');
});

// Route::group(['prefix' => 'admin/fuzzy_pemukiman'], function(){
//     Route::get('/', 'RumusController@index')->name('admin.fuzzy.pemukiman');
//     Route::get('/rumus_pemukiman', 'RumusController@rumusPemukiman')->name('admin.fuzzy.rumus_pemukiman');
// });

// Route::group(['prefix' => 'admin/fuzzy_curah_hujan'], function(){
//     Route::get('/', 'CurahHujanController@index')->name('admin.fuzzy.curah_hujan');
//     Route::get('/rumus_curah_hujan', 'CurahHujanController@rumusCurahHujan')->name('admin.fuzzy.rumus_curah_hujan');
//     Route::get('/rumus_fuzzy_curah_hujan', 'CurahHujanController@rumusFuzzyCurahHujan')->name('admin.fuzzy.rumus_fuzzy_curah_hujan');
// });

// Route::group(['prefix' => 'admin/fuzzy_topografi'], function(){
//     Route::get('/', 'TopografiController@index')->name('admin.fuzzy.topografi');
//     Route::get('/rumus_topografi', 'TopografiController@rumusTopografi')->name('admin.fuzzy.rumus_topografi');
// });

// Route::group(['prefix' => 'admin/fuzzy_bantaran'], function(){
//     Route::get('/', 'BantaranController@index')->name('admin.fuzzy.bantaran');
//     Route::get('/rumus_bantaran', 'BantaranController@rumusBantaran')->name('admin.fuzzy.rumus_bantaran');
//     Route::get('/rumus_fuzzy_bantaran', 'BantaranController@rumusFuzzyBantaran')->name('admin.fuzzy.rumus_fuzzy_bantaran');
// });

Route::group(['prefix' => 'admin/saw'], function(){
    Route::get('/kandidat', 'SawController@kandidat')->name('admin.saw.kandidat');
    Route::get('/normalisasi', 'SawController@normalisasi')->name('admin.saw.normalisasi');
    Route::get('/normalisasi/rumus_benefit', 'SawController@rumusBenefit')->name('admin.saw.rumus_benefit');
    Route::get('/rumus_cost', 'SawController@rumusCost')->name('admin.saw.rumus_cost');
    Route::get('/pembobotan', 'SawController@pembobotan')->name('admin.saw.pembobotan');
    Route::get('/rumus_pembobotan', 'SawController@rumusPembobotan')->name('admin.saw.rumus_pembobotan');
    Route::get('/clustering', 'SawController@clustering')->name('admin.saw.clustering');
    Route::get('/rumus_clustering', 'SawController@rumusClustering')->name('admin.saw.rumus_clustering');
});

Route::group(['prefix' => 'admin/tren_non_linier'], function(){
    Route::get('/januari', 'LinierController@januari')->name('admin.linear.januari');
    Route::get('/rumus_januari_x', 'LinierController@rumusJanuariX')->name('admin.linear.rumus_januari_x');
    Route::get('/rumus_januari_x_kuadrat', 'LinierController@rumusJanuariKuadrat')->name('admin.linear.rumus_januari_x_kuadrat');
    Route::get('/rumus_januari_x_kuadrat_y', 'LinierController@rumusJanuariKuadratY')->name('admin.linear.rumus_januari_x_kuadrat_y');
    Route::get('/rumus_januari_x_pangkat_4', 'LinierController@rumusJanuariXPangkat4')->name('admin.linear.rumus_januari_x_pangkat_4');

    Route::get('/februari', 'LinearControllerFebruari@februari')->name('admin.linear.februari');
    Route::get('/rumus_februari_x', 'LinearControllerFebruari@rumusFebruariX')->name('admin.linear.rumus_februari_x');
    Route::get('/rumus_februari_x_kuadrat', 'LinearControllerFebruari@rumusFebruariKuadrat')->name('admin.linear.rumus_februari_x_kuadrat');
    Route::get('/rumus_februari_x_kuadrat_y', 'LinearControllerFebruari@rumusFebruariKuadratY')->name('admin.linear.rumus_februari_x_kuadrat_y');
    Route::get('/rumus_februari_x_pangkat_4', 'LinearControllerFebruari@rumusFebruariXPangkat4')->name('admin.linear.rumus_februari_x_pangkat_4');

    Route::get('/maret', 'LinearControllerMaret@maret')->name('admin.linear.maret');
    Route::get('/rumus_maret_x', 'LinearControllerMaret@rumusMaretX')->name('admin.linear.rumus_maret_x');
    Route::get('/rumus_maret_x_kuadrat', 'LinearControllerMaret@rumusMaretKuadrat')->name('admin.linear.rumus_maret_x_kuadrat');
    Route::get('/rumus_maret_x_kuadrat_y', 'LinearControllerMaret@rumusMaretKuadratY')->name('admin.linear.rumus_maret_x_kuadrat_y');
    Route::get('/rumus_maret_x_pangkat_4', 'LinearControllerMaret@rumusMaretXPangkat4')->name('admin.linear.rumus_maret_x_pangkat_4');

    Route::get('/april', 'LinearControllerApril@april')->name('admin.linear.april');
    Route::get('/rumus_april_x', 'LinearControllerApril@rumusAprilX')->name('admin.linear.rumus_april_x');
    Route::get('/rumus_april_x_kuadrat', 'LinearControllerApril@rumusAprilKuadrat')->name('admin.linear.rumus_april_x_kuadrat');
    Route::get('/rumus_april_x_kuadrat_y', 'LinearControllerApril@rumusAprilKuadratY')->name('admin.linear.rumus_april_x_kuadrat_y');
    Route::get('/rumus_april_x_pangkat_4', 'LinearControllerApril@rumusAprilXPangkat4')->name('admin.linear.rumus_april_x_pangkat_4');

    Route::get('/mei', 'LinearControllerMei@mei')->name('admin.linear.mei');
    Route::get('/rumus_mei_x', 'LinearControllerMei@rumusMeiX')->name('admin.linear.rumus_mei_x');
    Route::get('/rumus_mei_x_kuadrat', 'LinearControllerMei@rumusMeiKuadrat')->name('admin.linear.rumus_mei_x_kuadrat');
    Route::get('/rumus_mei_x_kuadrat_y', 'LinearControllerMei@rumusMeiKuadratY')->name('admin.linear.rumus_mei_x_kuadrat_y');
    Route::get('/rumus_mei_x_pangkat_4', 'LinearControllerMei@rumusMeiXPangkat4')->name('admin.linear.rumus_mei_x_pangkat_4');

    Route::get('/juni', 'LinearControllerJuni@juni')->name('admin.linear.juni');
    Route::get('/rumus_juni_x', 'LinearControllerJuni@rumusJuniX')->name('admin.linear.rumus_juni_x');
    Route::get('/rumus_juni_x_kuadrat', 'LinearControllerJuni@rumusJuniKuadrat')->name('admin.linear.rumus_juni_x_kuadrat');
    Route::get('/rumus_juni_x_kuadrat_y', 'LinearControllerJuni@rumusJuniKuadratY')->name('admin.linear.rumus_juni_x_kuadrat_y');
    Route::get('/rumus_juni_x_pangkat_4', 'LinearControllerJuni@rumusJuniXPangkat4')->name('admin.linear.rumus_juni_x_pangkat_4');

    Route::get('/juli', 'LinearControllerJuli@juli')->name('admin.linear.juli');
    Route::get('/rumus_juli_x', 'LinearControllerJuli@rumusJuliX')->name('admin.linear.rumus_juli_x');
    Route::get('/rumus_juli_x_kuadrat', 'LinearControllerJuli@rumusJuliKuadrat')->name('admin.linear.rumus_juli_x_kuadrat');
    Route::get('/rumus_juli_x_kuadrat_y', 'LinearControllerJuli@rumusJuliKuadratY')->name('admin.linear.rumus_juli_x_kuadrat_y');
    Route::get('/rumus_juli_x_pangkat_4', 'LinearControllerJuli@rumusJuliXPangkat4')->name('admin.linear.rumus_juli_x_pangkat_4');

    Route::get('/agustus', 'LinearControllerAgustus@agustus')->name('admin.linear.agustus');
    Route::get('/rumus_agustus_x', 'LinearControllerAgustus@rumusAgustusX')->name('admin.linear.rumus_agustus_x');
    Route::get('/rumus_agustus_x_kuadrat', 'LinearControllerAgustus@rumusAgustusKuadrat')->name('admin.linear.rumus_agustus_x_kuadrat');
    Route::get('/rumus_agustus_x_kuadrat_y', 'LinearControllerAgustus@rumusAgustusKuadratY')->name('admin.linear.rumus_agustus_x_kuadrat_y');
    Route::get('/rumus_agustus_x_pangkat_4', 'LinearControllerAgustus@rumusAgustusXPangkat4')->name('admin.linear.rumus_agustus_x_pangkat_4');

    Route::get('/september', 'LinearControllerSeptember@september')->name('admin.linear.september');
    Route::get('/rumus_september_x', 'LinearControllerSeptember@rumusSeptemberX')->name('admin.linear.rumus_september_x');
    Route::get('/rumus_september_x_kuadrat', 'LinearControllerSeptember@rumusSeptemberKuadrat')->name('admin.linear.rumus_september_x_kuadrat');
    Route::get('/rumus_september_x_kuadrat_y', 'LinearControllerSeptember@rumusSeptemberKuadratY')->name('admin.linear.rumus_september_x_kuadrat_y');
    Route::get('/rumus_september_x_pangkat_4', 'LinearControllerSeptember@rumusSeptemberXPangkat4')->name('admin.linear.rumus_september_x_pangkat_4');

    Route::get('/oktober', 'LinearControllerOktober@oktober')->name('admin.linear.oktober');
    Route::get('/rumus_oktober_x', 'LinearControllerOktober@rumusOktoberX')->name('admin.linear.rumus_oktober_x');
    Route::get('/rumus_oktober_x_kuadrat', 'LinearControllerOktober@rumusOktoberKuadrat')->name('admin.linear.rumus_oktober_x_kuadrat');
    Route::get('/rumus_oktober_x_kuadrat_y', 'LinearControllerOktober@rumusOktoberKuadratY')->name('admin.linear.rumus_oktober_x_kuadrat_y');
    Route::get('/rumus_oktober_x_pangkat_4', 'LinearControllerOktober@rumusOktoberXPangkat4')->name('admin.linear.rumus_oktober_x_pangkat_4');

    Route::get('/november', 'LinearControllerNovember@november')->name('admin.linear.november');
    Route::get('/rumus_november_x', 'LinearControllerNovember@rumusNovemberX')->name('admin.linear.rumus_november_x');
    Route::get('/rumus_november_x_kuadrat', 'LinearControllerNovember@rumusNovemberKuadrat')->name('admin.linear.rumus_november_x_kuadrat');
    Route::get('/rumus_november_x_kuadrat_y', 'LinearControllerNovember@rumusNovemberKuadratY')->name('admin.linear.rumus_november_x_kuadrat_y');
    Route::get('/rumus_november_x_pangkat_4', 'LinearControllerNovember@rumusNovemberXPangkat4')->name('admin.linear.rumus_november_x_pangkat_4');

    Route::get('/desember', 'LinearControllerDesember@desember')->name('admin.linear.desember');
    Route::get('/rumus_desember_x', 'LinearControllerDesember@rumusDesemberX')->name('admin.linear.rumus_desember_x');
    Route::get('/rumus_desember_x_kuadrat', 'LinearControllerDesember@rumusDesemberKuadrat')->name('admin.linear.rumus_desember_x_kuadrat');
    Route::get('/rumus_desember_x_kuadrat_y', 'LinearControllerDesember@rumusDesemberKuadratY')->name('admin.linear.rumus_desember_x_kuadrat_y');
    Route::get('/rumus_desember_x_pangkat_4', 'LinearControllerDesember@rumusDesemberXPangkat4')->name('admin.linear.rumus_desember_x_pangkat_4');
});

Route::group(['prefix' => 'admin/hasil_linear'], function(){
    Route::get('/', 'HasilLinearController@index')->name('admin.hasil_linear');
    Route::get('/rumus_hasil_linear', 'HasilLinearController@rumusHasilLinear')->name('admin.linear.rumus_hasil_linear');
});

Route::group(['prefix' => 'admin/clustering_linear'], function(){
    Route::get('/', 'ClusteringLinearController@index')->name('admin.clustering_linear');
    Route::get('/rumus_clustering_linear', 'ClusteringLinearController@rumusClusteringLinear')->name('admin.clustering_linear.rumus_clustering_linear');
    Route::get('/rumus_clustering', 'ClusteringLinearController@rumusClustering')->name('admin.clustering_linear.rumus_clustering');
});
