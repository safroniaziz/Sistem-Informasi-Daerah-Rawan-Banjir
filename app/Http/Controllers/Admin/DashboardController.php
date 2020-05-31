<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinearFuzzy;
use App\Clustering;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sedang =  LinearFuzzy::select(DB::raw('COUNT(clustering) as jumlah'))->where('clustering','Sedang')->first();
        $rendah =  LinearFuzzy::select(DB::raw('COUNT(clustering) as jumlah'))->where('clustering','Rendah')->first();
        $sangat_rendah =  LinearFuzzy::select(DB::raw('COUNT(clustering) as jumlah'))->where('clustering','Sangat Rendah')->first();
        $tinggi =  LinearFuzzy::select(DB::raw('COUNT(clustering) as jumlah'))->where('clustering','Tinggi')->first();
        $sangat_tinggi =  LinearFuzzy::select(DB::raw('COUNT(clustering) as jumlah'))->where('clustering','Sangat Tinggi')->first();
        $data = Clustering::select(DB::raw('COUNT(clustering) as jumlah'),'clustering')->groupBy('clustering')->get();
        return view('admin/dashboard', compact('data','sedang','rendah','sangat_rendah','tinggi','sangat_tinggi'));
    }
}
