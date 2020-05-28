<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kecamatan;

class KecamatanController extends Controller
{
    public function index(){
        $kecamatans = Kecamatan::all();
        return view('admin/kecamatan.index',compact('kecamatans'));
    }

    public function edit($id){
        $kecamatan = Kecamatan::where('id',$id)->first();
        return $kecamatan;
    }

    public function update(Request $request){
        Kecamatan::where('id',$request->id)->update([
            'nm_kecamatan'  =>  $request->nm_kecamatan,
        ]);

        return \redirect()->route('admin.kecamatan')->with(['success'   =>  'Nama Kecamatan Berhasil Diubah !!']);
    }
}
