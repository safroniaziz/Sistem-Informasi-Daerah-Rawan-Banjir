<?php

namespace App\Http\Controllers\Admin;

use App\Bulan;
use App\DataNilaiSubParameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelurahan;
use App\SubParameter;
use App\Tahun;

class NilaiSubParameterController extends Controller
{
    public function index(){
        $nilais = DataNilaiSubParameter::join('kelurahans','kelurahans.id','data_nilai_sub_parameters.kelurahan_id')
                                    ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                    ->join('sub_parameters','sub_parameters.id','data_nilai_sub_parameters.sub_parameter_id')
                                    ->join('tahuns','tahuns.id','data_nilai_sub_parameters.tahun_id')
                                    ->join('bulans','bulans.id','data_nilai_sub_parameters.bulan_id')
                                    ->select('data_nilai_sub_parameters.id','nm_kelurahan','nm_kecamatan','nm_sub_parameter','tahun','nm_bulan','nilai')
                                    ->get();
        $sub_parameters = SubParameter::all();
        $kelurahans = Kelurahan::all();
        $tahuns = Tahun::all();
        $bulans = Bulan::all();
        return view('admin/nilai_sub_parameter.index', compact('nilais','sub_parameters','kelurahans','tahuns','bulans'));
    }

    public function post(Request $request){
        $bulan = new DataNilaiSubParameter();
        $bulan->kelurahan_id = $request->kelurahan_id;
        $bulan->sub_parameter_id = $request->sub_parameter_id;
        $bulan->tahun_id = $request->tahun_id;
        $bulan->bulan_id = $request->bulan_id;
        $bulan->nilai = $request->nilai;
        $bulan->save();

        return redirect()->route('admin.nilai_sub_parameter')->with(['success'    =>  'Data Nilai Parameter Berhasil Ditambah !!']);
    }

    public function edit($id){
        $nilai = DataNilaiSubParameter::find($id);
        return $nilai;
    }

    public function update(Request $request){
        $bulan = DataNilaiSubParameter::find($request->id);
        $bulan->kelurahan_id = $request->kelurahan_id;
        $bulan->sub_parameter_id = $request->sub_parameter_id;
        $bulan->tahun_id = $request->tahun_id;
        $bulan->bulan_id = $request->bulan_id;
        $bulan->nilai = $request->nilai;
        $bulan->update();
        return redirect()->route('admin.nilai_sub_parameter')->with(['success'    =>  'Data  Nilai Parameter Berhasil Diubah !!']);
    }

    public function delete(Request $request){
        $bulan = DataNilaiSubParameter::find($request->nilai_id);
        $bulan->delete();

        return redirect()->route('admin.nilai_sub_parameter')->with(['success'    =>  'Data  Nilai Parameter Berhasil Dihapus !!']);
    }
}
