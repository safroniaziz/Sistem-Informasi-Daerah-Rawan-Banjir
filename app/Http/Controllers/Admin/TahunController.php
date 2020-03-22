<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tahun;

class TahunController extends Controller
{
    public function index(){
        $tahuns = Tahun::all();
        return view('admin/tahun.index',compact('tahuns'));
    }

    public function post(Request $request){
        $tahun = new Tahun;
        $tahun->tahun = $request->tahun;
        $tahun->save();

        return redirect()->route('admin.tahun')->with(['success'    =>  'Data Tahun Berhasil Ditambah !!']);
    }

    public function edit($id){
        $tahun = Tahun::find($id);
        return $tahun;
    }

    public function update(Request $request){
        $tahun = Tahun::find($request->id);
        $tahun->tahun = $request->tahun;
        $tahun->update();
        return redirect()->route('admin.tahun')->with(['success'    =>  'Data Tahun Berhasil Dihapus !!']);
    }

    public function delete(Request $request){
        $tahun = Tahun::find($request->tahun_id);
        $tahun->delete();

        return redirect()->route('admin.tahun')->with(['success'    =>  'Data Tahun Berhasil Diubah !!']);
    }
}
