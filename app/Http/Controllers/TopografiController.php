<?php

namespace App\Http\Controllers;

use App\Topografi;
use Illuminate\Http\Request;

class TopografiController extends Controller
{
    // public function index(){
    //     $topografis = Topografi::join('kelurahans','kelurahans.id','topografis.kelurahan_id')
    //                             ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
    //                             ->get();
    //     return view('admin/topografi.index',compact('topografis'));
    // }

    // public function rumusTopografi(){
    //     $topografi = Topografi::join('kelurahans','kelurahans.id','topografis.kelurahan_id')->select('topografis.id','nm_kelurahan','m10')->get();
    //     $topografi2 = Topografi::join('kelurahans','kelurahans.id','topografis.kelurahan_id')->select('topografis.id','nm_kelurahan','m20')->get();
    //     $topografi3 = Topografi::join('kelurahans','kelurahans.id','topografis.kelurahan_id')->select('topografis.id','nm_kelurahan','m30')->get();
    //     $topografi4 = Topografi::join('kelurahans','kelurahans.id','topografis.kelurahan_id')->select('topografis.id','nm_kelurahan','m40')->get();
    //     for ($i=0; $i <count($topografi) ; $i++) {
    //         $fuzzy = Topografi::where('id',$topografi[$i]->id)->update([
    //             'm10_skor'   =>  number_format(($topografi[$i]->m10 * 4),6),
    //         ]);
    //     }
    //     for ($i=0; $i <count($topografi2) ; $i++) {
    //         $fuzzy = Topografi::where('id',$topografi2[$i]->id)->update([
    //             'm20_skor'   =>  number_format(($topografi2[$i]->m20 * 3),6),
    //         ]);
    //     }
    //     for ($i=0; $i <count($topografi3) ; $i++) {
    //         $fuzzy = Topografi::where('id',$topografi3[$i]->id)->update([
    //             'm30_skor'   =>  number_format(($topografi3[$i]->m30 * 2),6),
    //         ]);
    //     }
    //     for ($i=0; $i <count($topografi4) ; $i++) {
    //         $fuzzy = Topografi::where('id',$topografi4[$i]->id)->update([
    //             'm40_skor'   =>  number_format(($topografi4[$i]->m40 * 1),6),
    //         ]);
    //     }

    //     $jumlah = Topografi::select('id','m10_skor','m20_skor','m30_skor','m40_skor')->get();
    //     $array = [];
    //     foreach ($jumlah as $jumlah) {
    //         $jumlah = Topografi::where('id',$jumlah->id)->update([
    //             'jumlah'    =>  $jumlah->m10_skor + $jumlah->m20_skor + $jumlah->m30_skor + $jumlah->m40_skor,
    //         ]);
    //     }

    //     $max = Topografi::max('jumlah');
    //     $data = Topografi::select('id','jumlah')->get();
    //     for ($i=0; $i <count($data) ; $i++) {
    //         Topografi::where('id',$data[$i]->id)->update([
    //             'nilai_fuzzy'   => number_format(($data[$i]->jumlah - 0) / ($max-0),9),
    //         ]);
    //     }

    //     return redirect()->route('admin.fuzzy.topografi')->with(['success'  =>  'Nilai Parameter & Nilai Fuzzy Topografi Berhasil Di Generate !!']);
    // }
}
