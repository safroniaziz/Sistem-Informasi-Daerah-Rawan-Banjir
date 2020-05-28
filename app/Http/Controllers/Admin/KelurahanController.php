<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelurahan;
use App\Kecamatan;

class KelurahanController extends Controller
{
    public function index(){
        $kelurahans = Kelurahan::join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->select('kelurahans.id','nm_kecamatan','nm_kelurahan')->get();
        $kecamatans = Kecamatan::all();
        return view('admin/kelurahan.index',compact('kelurahans','kecamatans'));
    }

    public function edit($id){
        $kelurahan = Kelurahan::where('id',$id)->first();
        return $kelurahan;
    }

    public function update(Request $request){
        Kelurahan::where('id',$request->id)->update([
            'nm_kelurahan'  =>  $request->nm_kelurahan,
            'kecamatan_id'  =>  $request->kecamatan_id,
        ]);

        return \redirect()->route('admin.kelurahan')->with(['success'   =>  'Data Kelurahan Berhasil Diubah !!']);
    }
}
