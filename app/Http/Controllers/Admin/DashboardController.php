<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinearFuzzy;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = LinearFuzzy::select(DB::raw('COUNT(clustering) as jumlah'),'clustering')->groupBy('clustering')->get();
        return view('admin/dashboard', compact('data'));
    }
}
