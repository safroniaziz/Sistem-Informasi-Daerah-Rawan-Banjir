<?php

namespace App\Http\Controllers;

use App\Linear;
use Illuminate\Http\Request;

class LinearControllerJuli extends Controller
{
    public function juli(){
        $julis = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->where('bulan','juli')->get();
        return view('admin/linier.juli', compact('julis'));
    }

    public function rumusJuliX(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','juli')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xy'    =>  $data[$i]->x * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.juli')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusJuliKuadrat(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','juli')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2'    =>  $data[$i]->x * $data[$i]->x,
            ]);

        }
        return redirect()->route('admin.linear.juli')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusJuliKuadratY(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y','xpangkat2')
                        ->where('bulan','juli')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2y'    =>  $data[$i]->xpangkat2 * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.juli')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
    public function rumusJuliXPangkat4(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','juli')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat4'    =>  pow($data[$i]->x, 4),
            ]);

        }
        return redirect()->route('admin.linear.juli')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
}
