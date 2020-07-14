<?php

namespace App\Http\Controllers;

use App\CurahHujan;
use Illuminate\Http\Request;

class CurahHujanController extends Controller
{
    // public function index(){
    //     $curahs = CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')
    //                             ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
    //                             ->get();
    //     return view('admin/curah_hujan.index',compact('curahs'));
    // }

    // public function rumusCurahHujan(){
    //     $curah_hujans = CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->select('curah_hujans.id','tahun','bulan','nm_kelurahan','nilai','sub_parameter_id')->get();
    //     $array = [];
    //     for ($i=0; $i <count($curah_hujans) ; $i++) {
    //         $skor = CurahHujan::join('sub_parameters','sub_parameters.id','curah_hujans.sub_parameter_id')->select('nilai_probabilitas')->where('sub_parameters.id',$curah_hujans[$i]->sub_parameter_id)->first();
    //         $fuzzy = CurahHujan::where('id',$curah_hujans[$i]->id)->update([
    //             'nilai_skor'   =>  $curah_hujans[$i]->nilai * $skor->nilai_probabilitas,
    //         ]);
    //     }
    //     return redirect()->route('admin.fuzzy.curah_hujan')->with(['success'  =>  'Nilai Skor Curah Hujan Berhasil Di Generate Ulang !!']);
    // }

    // public function rumusFuzzyCurahHujan(){
    //     $curah_hujans_fuzzy = CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->select('curah_hujans.id','tahun','bulan','nm_kelurahan','nm_kecamatan','nilai_skor','sub_parameter_id')->get();
    //     $maxmb['2014'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Muara Bangkahulu')->where('tahun','2014')->max('nilai_skor');
    //     $maxmb['2015'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Muara Bangkahulu')->where('tahun','2015')->max('nilai_skor');
    //     $maxmb['2016'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Muara Bangkahulu')->where('tahun','2016')->max('nilai_skor');
    //     $maxmb['2017'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Muara Bangkahulu')->where('tahun','2017')->max('nilai_skor');
    //     $maxmb['2018'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Muara Bangkahulu')->where('tahun','2018')->max('nilai_skor');

    //     $maxss['2014'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Sungai Serut')->where('tahun','2014')->max('nilai_skor');
    //     $maxss['2015'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Sungai Serut')->where('tahun','2015')->max('nilai_skor');
    //     $maxss['2016'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Sungai Serut')->where('tahun','2016')->max('nilai_skor');
    //     $maxss['2017'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Sungai Serut')->where('tahun','2017')->max('nilai_skor');
    //     $maxss['2018'] =  CurahHujan::join('kelurahans','kelurahans.id','curah_hujans.kelurahan_id')->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')->where('nm_kecamatan','Sungai Serut')->where('tahun','2018')->max('nilai_skor');
    //     for ($i=0; $i <count($curah_hujans_fuzzy) ; $i++) {
    //         if ($curah_hujans_fuzzy[$i]->tahun == "2014" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Muara Bangkahulu") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxmb['2014']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2015" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Muara Bangkahulu") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxmb['2015']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2016" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Muara Bangkahulu") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxmb['2016']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2017" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Muara Bangkahulu") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxmb['2017']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2018" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Muara Bangkahulu") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxmb['2018']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2014" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Sungai Serut") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxss['2014']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2015" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Sungai Serut") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxss['2015']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2016" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Sungai Serut") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxss['2016']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2017" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Sungai Serut") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxss['2017']-0),6),
    //             ]);
    //         }
    //         elseif ($curah_hujans_fuzzy[$i]->tahun == "2018" && $curah_hujans_fuzzy[$i]->nm_kecamatan == "Sungai Serut") {
    //             $fuzzy = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //                 'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($maxss['2018']-0),6),
    //             ]);
    //         }
    //         // $array[] = CurahHujan::where('id',$curah_hujans_fuzzy[$i]->id)->update([
    //         //     'nilai_fuzzy'   =>  number_format(($curah_hujans_fuzzy[$i]->nilai_skor - 0) / ($nilai-0),6),
    //         // ]);
    //     }
    //     return redirect()->route('admin.fuzzy.curah_hujan')->with(['success'  =>  'Nilai Fuzzy Curah Hujan Berhasil Di Generate Ulang !!']);
    // }
}
