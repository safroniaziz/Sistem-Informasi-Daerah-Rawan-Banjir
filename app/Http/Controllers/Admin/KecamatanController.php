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
}
