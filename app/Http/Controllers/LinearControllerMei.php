<?php

namespace App\Http\Controllers;

use App\Linear;
use Illuminate\Http\Request;

class LinearControllerMei extends Controller
{
    public function mei(){
        $meis = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->where('bulan','mei')->get();
        return view('admin/linier.mei', compact('meis'));
    }

    public function rumusMeiX(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','mei')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xy'    =>  $data[$i]->x * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.mei')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusMeiKuadrat(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','mei')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2'    =>  $data[$i]->x * $data[$i]->x,
            ]);

        }
        return redirect()->route('admin.linear.mei')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusMeiKuadratY(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y','xpangkat2')
                        ->where('bulan','mei')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2y'    =>  $data[$i]->xpangkat2 * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.mei')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
    public function rumusMeiXPangkat4(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','mei')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat4'    =>  pow($data[$i]->x, 4),
            ]);

        }
        return redirect()->route('admin.linear.mei')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
}
