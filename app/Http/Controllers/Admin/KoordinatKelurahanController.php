<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelurahan;
use App\Koordinat;

class KoordinatKelurahanController extends Controller
{
    public function index(){
        $kelurahans = Kelurahan::all();
        $kelurahan2s = Kelurahan::all();
        $koordinats = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')->select('koordinats.id','nm_kelurahan','lat','long')->get();
        return view('admin/koordinat.index',compact('koordinats','kelurahans','kelurahan2s'));
    }

    public function post(Request $request){
        $bulan = new Koordinat();
        $bulan->kelurahan_id = $request->kelurahan_id;
        $bulan->lat = $request->latitude;
        $bulan->long = $request->longitude;
        $bulan->save();

        return redirect()->route('admin.koordinat')->with(['success'    =>  'Data Koordinat Kelurahan Berhasil Ditambah !!']);
    }

    public function edit($id){
        $nilai = Koordinat::find($id);
        return $nilai;
    }

    public function update(Request $request){
        $bulan = Koordinat::find($request->id);
        $bulan->kelurahan_id = $request->kelurahan_id;
        $bulan->lat = $request->latitude;
        $bulan->long = $request->longitude;
        $bulan->update();
        return redirect()->route('admin.koordinat')->with(['success'    =>  'Data  Koordinat Kelurahan Berhasil Diubah !!']);
    }

    public function delete(Request $request){
        $bulan = Koordinat::find($request->id);
        $bulan->delete();

        return redirect()->route('admin.koordinat')->with(['success'    =>  'Data Koordinat Kelurahan Berhasil Dihapus !!']);
    }
}
