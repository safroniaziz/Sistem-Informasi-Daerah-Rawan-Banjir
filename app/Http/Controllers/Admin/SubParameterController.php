<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubParameter;

class SubParameterController extends Controller
{
    public function index(){
        $subparameters = SubParameter::join('parameters','parameters.id','sub_parameters.parameter_id')
                                        ->select('sub_parameters.id','nm_parameter','satuan','nilai_probabilitas','nm_sub_parameter')
                                        ->get();
        return view('admin/sub_parameter.index',compact('subparameters'));
    }

    public function edit($id){
        $sub_parameter = SubParameter::find($id);
        return $sub_parameter;
    }

    public function update(Request $request){
        $sub_parameter = SubParameter::find($request->id);
        $sub_parameter->nilai_probabilitas = $request->nilai_probabilitas;
        $sub_parameter->update();
        return redirect()->route('admin.sub_parameter')->with(['success'    =>  'Skor Sub Parameter Berhasil Diubah !!']);
    }
}
