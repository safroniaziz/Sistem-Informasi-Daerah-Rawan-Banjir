<?php

namespace App\Http\Controllers;

use App\HasilLinear;
use Illuminate\Http\Request;
use App\Linear;
use DB;

class HasilLinearController extends Controller
{
    public function index(){
        $hasils = HasilLinear::join('kelurahans','kelurahans.id','hasil_linears.kelurahan_id')->get();
        return view('admin/linier.hasil_linear', compact('hasils'));
    }

    public function rumusHasilLinear(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')
                        ->select('linears.id','nm_kelurahan','kelurahan_id','bulan',DB::raw('SUM(y) as totaly'),DB::raw('SUM(x) as totalx'),DB::raw('SUM(xy) as totalxy'),DB::raw('SUM(xpangkat2) as totalxpangkat2'),
                                DB::raw('SUM(xpangkat2y) as totalxpangkat2y'),DB::raw('SUM(xpangkat4) as totalxpangkat4')
                        )
                        ->groupBy('bulan')
                        ->groupBy('kelurahan_id')
                        ->orderBy('id')
                        ->get();
        $array = [];
        HasilLinear::truncate();
        for ($i=0; $i <count($data) ; $i++) {

                // 'bulan' =>  $data[$i]->bulan,
                // 'kelurahan' =>  $data[$i]->nm_kelurahan,
                // 'kelurahan_id' =>  $data[$i]->kelurahan_id,
                // 'n' => 5,
                // 'y' => $data[$i]->totaly,
                // 'xy' => $data[$i]->totalxy,
                // 'xpangkat2' => $data[$i]->totalxpangkat2,
                // 'xpangkat2y' => $data[$i]->totalxpangkat2y,
                // 'xpangkat4' => $data[$i]->totalxpangkat4,

                // 'c1' => $data[$i]->totalxpangkat2 * 2,
                // 'c2' => $data[$i]->totalxpangkat4 * 1,
                // 'nilai_c1'  =>  $data[$i]->totaly * 2,
                // 'nilai_c2'  =>  $data[$i]->totalxpangkat2y * 1,

                // 'hasil_nilai'     =>  ($data[$i]->totaly * 2) - ($data[$i]->totalxpangkat2y * 1),
                // 'hasil_c'         =>    (($data[$i]->totalxpangkat2 * 2) - ($data[$i]->totalxpangkat4 * 1)) * -1,
                // $a = (($data[$i]->totaly * 2) - ($data[$i]->totalxpangkat2y * 1)) / ((($data[$i]->totalxpangkat2 * 2) - ($data[$i]->totalxpangkat4 * 1)) * -1);
                // return $a;
                $c = new HasilLinear;
                $c->kelurahan_id    =  $data[$i]->kelurahan_id;
                $c->bulan = $data[$i]->bulan;
                $c->nilai_c =((($data[$i]->totaly * 2) - ($data[$i]->totalxpangkat2y * 1)) / ((($data[$i]->totalxpangkat2 * 2) - ($data[$i]->totalxpangkat4 * 1))) * 1);
                // return $c->nilai_c;
                $c->save();

                // $c =>  ($data[$i]->totaly * 2) - ($data[$i]->totalxpangkat2y * 1) / ((($data[$i]->totalxpangkat2 * 2) - ($data[$i]->totalxpangkat4 * 1)) * -1),
        }
        $data2 = HasilLinear::select('id','nilai_c','kelurahan_id')->get();
        $array = [];
        for ($i=0; $i <count($data2) ; $i++) {
            // $a = $data[$i]->totaly * 2;
            // return $a;
            // $nilai_a = $data[$i]->totaly;
            // return $nilai_a;
            HasilLinear::where('id',$data2[$i]->id)->update([
                'nilai_a'   =>  (($data[$i]->totaly *2) - ( 20 * $data2[$i]->nilai_c)) /10,
            ]);
        }

        for ($i=0; $i <count($data2) ; $i++) {
            HasilLinear::where('id',$data2[$i]->id)->update([
                'nilai_b'   =>  ($data[$i]->totalxy)/10,
            ]);
            // $nilai_b    =   $data[$i]->totalxy - $data2[$i]->nilai_c;
        }
        return redirect()->route('admin.hasil_linear')->with(['success' =>  'Nilai berhasil digenerate !!']);
    }
}
