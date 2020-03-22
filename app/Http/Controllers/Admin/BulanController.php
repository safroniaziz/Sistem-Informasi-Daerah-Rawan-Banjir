<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bulan;
use App\Tahun;

class BulanController extends Controller
{
    public function index(){
        $bulans = Bulan::all();
        return view('admin/bulan.index',compact('bulans'));
    }

    public function post(Request $request){
        $bulan = new Bulan;
        $bulan->nm_bulan = $request->nm_bulan;
        $bulan->save();

        return redirect()->route('admin.bulan')->with(['success'    =>  'Data Bulan Berhasil Ditambah !!']);
    }

    public function edit($id){
        $bulan = Bulan::find($id);
        return $bulan;
    }

    public function update(Request $request){
        $bulan = Bulan::find($request->id);
        $bulan->nm_bulan = $request->nm_bulan;
        $bulan->update();
        return redirect()->route('admin.bulan')->with(['success'    =>  'Data Bulan Berhasil Dihapus !!']);
    }

    public function delete(Request $request){
        $bulan = Bulan::find($request->bulan_id);
        $bulan->delete();

        return redirect()->route('admin.bulan')->with(['success'    =>  'Data Tahun Berhasil Diubah !!']);
    }
}
