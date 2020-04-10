<?php

namespace App\Http\Controllers\Admin;

use App\Bulan;
use App\DataNilaiSubParameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelurahan;
use App\Kecamatan;
use App\Parameter;
use App\SubParameter;
use App\Tahun;

class NilaiSubParameterController extends Controller
{
    public function index(){
        $nilais = DataNilaiSubParameter::join('kelurahans','kelurahans.id','data_nilai_sub_parameters.kelurahan_id')
                                    ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                    ->join('sub_parameters','sub_parameters.id','data_nilai_sub_parameters.sub_parameter_id')
                                    ->join('parameters','parameters.id','sub_parameters.parameter_id')
                                    ->join('tahuns','tahuns.id','data_nilai_sub_parameters.tahun_id')
                                    ->join('bulans','bulans.id','data_nilai_sub_parameters.bulan_id')
                                    ->select('data_nilai_sub_parameters.id','nm_kelurahan','nm_kecamatan','nm_parameter','nm_sub_parameter','tahun','nm_bulan','nilai')
                                    ->get();
        $parameters = Parameter::where('nm_parameter','!=','pemukiman')->get();
        $kelurahans = Kelurahan::all();
        $kecamatans = Kecamatan::all();
        $tahuns = Tahun::all();
        $bulans = Bulan::all();
        return view('admin/nilai_sub_parameter.index', compact('nilais','parameters','kelurahans','kecamatans','tahuns','bulans'));
    }

    public function post(Request $request){
        $sudah = DataNilaiSubParameter::select('id')
                ->where('kelurahan_id',$request->kelurahan_id)
                ->where('sub_parameter_id',$request->sub_parameter_id)
                ->where('tahun_id',$request->tahun_id)
                ->where('bulan_id',$request->bulan_id)
                ->get();
        if(count($sudah) < 1){
            $bulan = new DataNilaiSubParameter();
            $bulan->kelurahan_id = $request->kelurahan_id;
            $bulan->sub_parameter_id = $request->sub_parameter_id;
            $bulan->tahun_id = $request->tahun_id;
            $bulan->bulan_id = $request->bulan_id;
            $bulan->nilai = $request->nilai;
            $bulan->save();

            return redirect()->route('admin.nilai_sub_parameter')->with(['success'    =>  'Data Nilai Parameter Berhasil Ditambah !!']);
        }
        else{
            return redirect()->route('admin.nilai_sub_parameter')->with(['error'    =>  'Kecamatan, Kelurahan dan Sub Parameter Tahun, dan Bulan yang anda pilih sudah ditambahkan !!']);
        }
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

    public function cariKelurahan(Request $request){
        $kelurahans = Kelurahan::where('kecamatan_id',$request->kecamatan_id)->get();
        return $kelurahans;
    }

    public function cariSubParameter(Request $request){
        $kelurahans = SubParameter::where('parameter_id',$request->parameter_id)->get();
        return $kelurahans;
    }
}
