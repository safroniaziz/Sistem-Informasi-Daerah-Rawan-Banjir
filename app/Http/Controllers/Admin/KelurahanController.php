<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelurahan;

class KelurahanController extends Controller
{
    public function index(){
        $kelurahans = Kelurahan::join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->select('kelurahans.id','nm_kecamatan','nm_kelurahan')->get();
        return view('admin/kelurahan.index',compact('kelurahans'));
    }
}
