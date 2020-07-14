<?php

namespace App\Http\Controllers;

use App\Bantaran;
use Illuminate\Http\Request;

class BantaranController extends Controller
{
    // public function index(){
    //     $bantarans = Bantaran::join('kelurahans','kelurahans.id','bantarans.kelurahan_id')
    //                             ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
    //                             ->get();
    //     return view('admin/bantaran.index',compact('bantarans'));
    // }

    // public function rumusbantaran(){
    //     $bantaran = Bantaran::join('kelurahans','kelurahans.id','bantarans.kelurahan_id')->select('bantarans.id','nm_kelurahan','m10')->get();
    //     $bantaran2 = Bantaran::join('kelurahans','kelurahans.id','bantarans.kelurahan_id')->select('bantarans.id','nm_kelurahan','m20')->get();
    //     $bantaran3 = Bantaran::join('kelurahans','kelurahans.id','bantarans.kelurahan_id')->select('bantarans.id','nm_kelurahan','m30')->get();
    //     $bantaran4 = Bantaran::join('kelurahans','kelurahans.id','bantarans.kelurahan_id')->select('bantarans.id','nm_kelurahan','m40')->get();
    //     for ($i=0; $i <count($bantaran) ; $i++) {
    //         $fuzzy = Bantaran::where('id',$bantaran[$i]->id)->update([
    //             'm10_skor'   =>  number_format(($bantaran[$i]->m10 * 4),6),
    //         ]);
    //     }
    //     for ($i=0; $i <count($bantaran2) ; $i++) {
    //         $fuzzy = Bantaran::where('id',$bantaran2[$i]->id)->update([
    //             'm20_skor'   =>  number_format(($bantaran2[$i]->m20 * 3),6),
    //         ]);
    //     }
    //     for ($i=0; $i <count($bantaran3) ; $i++) {
    //         $fuzzy = Bantaran::where('id',$bantaran3[$i]->id)->update([
    //             'm30_skor'   =>  number_format(($bantaran3[$i]->m30 * 2),6),
    //         ]);
    //     }
    //     for ($i=0; $i <count($bantaran4) ; $i++) {
    //         $fuzzy = Bantaran::where('id',$bantaran4[$i]->id)->update([
    //             'm40_skor'   =>  number_format(($bantaran4[$i]->m40 * 1),6),
    //         ]);
    //     }

    //     return redirect()->route('admin.fuzzy.bantaran')->with(['success'  =>  'Nilai Parameter Bantaran Sungai Berhasil Di Generate !!']);
    // }

    // public function rumusFuzzyBantaran(){
    //     $jumlah = Bantaran::select('id','m10_skor','m20_skor','m30_skor','m40_skor')->get();
    //     $array = [];
    //     foreach ($jumlah as $jumlah) {
    //         $jumlah = Bantaran::where('id',$jumlah->id)->update([
    //             'jumlah'    =>  $jumlah->m10_skor + $jumlah->m20_skor + $jumlah->m30_skor + $jumlah->m40_skor,
    //         ]);
    //     }

    //     $data = Bantaran::select('id','tahun','bulan','jumlah')->get();
    //     for ($i=0; $i <count($data) ; $i++) {
    //         $nilai = Bantaran::where('tahun',$data[$i]->tahun)->where('bulan',$data[$i]->bulan)->max('jumlah');
    //         Bantaran::where('id',$data[$i]->id)->update([
    //             'nilai_fuzzy'   => number_format(($data[$i]->jumlah - 0) / ($nilai-0),9),
    //         ]);
    //     }

    //     return redirect()->route('admin.fuzzy.bantaran')->with(['success'  =>  'Nilai Fuzzy Bantaran Sungai Berhasil Di Generate !!']);
    // }
}
