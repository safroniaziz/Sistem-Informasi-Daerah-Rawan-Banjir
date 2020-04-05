<?php

namespace App\Http\Controllers\Admin;

use App\Bulan;
use App\DataNilaiParameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Parameter;
use App\Tahun;

class NilaiParameterController extends Controller
{
    public function index(){
        $nilais = DataNilaiParameter::join('kelurahans','kelurahans.id','data_nilai_parameters.kelurahan_id')
                                    ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                    ->join('parameters','parameters.id','data_nilai_parameters.parameter_id')
                                    ->join('tahuns','tahuns.id','data_nilai_parameters.tahun_id')
                                    ->join('bulans','bulans.id','data_nilai_parameters.bulan_id')
                                    ->select('data_nilai_parameters.id','nm_kelurahan','nm_kecamatan','nm_parameter','tahun','nm_bulan','nilai')
                                    ->get();
        $parameters = Parameter::where('nm_parameter','like','%'.'pemukiman'.'%')->get();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $tahuns = Tahun::all();
        $bulans = Bulan::all();
        return view('admin/nilai_parameter.index', compact('nilais','parameters','kelurahans','kecamatans','tahuns','bulans'));
    }

    public function post(Request $request){
        $bulan = new DataNilaiParameter();
        $bulan->kelurahan_id = $request->kelurahan_id;
        $bulan->parameter_id = $request->parameter_id;
        $bulan->tahun_id = $request->tahun_id;
        $bulan->bulan_id = $request->bulan_id;
        $bulan->nilai = $request->nilai;
        $bulan->save();

        return redirect()->route('admin.nilai_parameter')->with(['success'    =>  'Data Nilai Parameter Berhasil Ditambah !!']);
    }

    public function edit($id){
        $nilai = DataNilaiParameter::find($id);
        return $nilai;
    }

    public function update(Request $request){
        $bulan = DataNilaiParameter::find($request->id);
        $bulan->kelurahan_id = $request->kelurahan_id;
        $bulan->parameter_id = $request->parameter_id;
        $bulan->tahun_id = $request->tahun_id;
        $bulan->bulan_id = $request->bulan_id;
        $bulan->nilai = $request->nilai;
        $bulan->update();
        return redirect()->route('admin.nilai_parameter')->with(['success'    =>  'Data  Nilai Parameter Berhasil Diubah !!']);
    }

    public function delete(Request $request){
        $bulan = DataNilaiParameter::find($request->nilai_id);
        $bulan->delete();

        return redirect()->route('admin.nilai_parameter')->with(['success'    =>  'Data  Nilai Parameter Berhasil Dihapus !!']);
    }

    public function cariKelurahan(Request $request){
        $kelurahans = Kelurahan::where('kecamatan_id',$request->kecamatan_id)->get();
        return $kelurahans;
    }
}
