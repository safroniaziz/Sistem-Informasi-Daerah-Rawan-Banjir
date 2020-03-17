<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parameter;

class ParameterController extends Controller
{
    public function index(){
        $parameters = Parameter::all();
        return view('admin/parameter.index',compact('parameters'));
    }

    public function edit($id){
        $parameter = Parameter::find($id);
        return $parameter;
    }

    public function update(Request $request){
        $parameter = Parameter::find($request->id);
        $parameter->bobot_parameter = $request->bobot_parameter;
        $parameter->update();
        return redirect()->route('admin.parameter')->with(['success'    =>  'Bobot Parameter Berhasil Diubah !!']);
    }
}
