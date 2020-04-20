<?php

namespace App\Http\Controllers;

use App\Linear;
use Illuminate\Http\Request;

class LinearControllerApril extends Controller
{
    public function april(){
        $aprils = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->where('bulan','april')->get();
        return view('admin/linier.april', compact('aprils'));
    }

    public function rumusAprilX(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','april')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xy'    =>  $data[$i]->x * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.april')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusAprilKuadrat(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','april')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2'    =>  $data[$i]->x * $data[$i]->x,
            ]);

        }
        return redirect()->route('admin.linear.april')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusAprilKuadratY(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y','xpangkat2')
                        ->where('bulan','april')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2y'    =>  $data[$i]->xpangkat2 * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.april')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
    public function rumusAprilXPangkat4(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','april')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat4'    =>  pow($data[$i]->x, 4),
            ]);

        }
        return redirect()->route('admin.linear.april')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
}
