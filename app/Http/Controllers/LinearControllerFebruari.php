<?php

namespace App\Http\Controllers;

use App\Linear;
use Illuminate\Http\Request;

class LinearControllerFebruari extends Controller
{
    public function februari(){
        $februaris = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->where('bulan','februari')->get();
        return view('admin/linier.februari', compact('februaris'));
    }

    public function rumusFebruariX(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','februari')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xy'    =>  $data[$i]->x * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.februari')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusFebruariKuadrat(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','februari')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2'    =>  $data[$i]->x * $data[$i]->x,
            ]);

        }
        return redirect()->route('admin.linear.februari')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusFebruariKuadratY(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y','xpangkat2')
                        ->where('bulan','februari')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2y'    =>  $data[$i]->xpangkat2 * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.februari')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
    public function rumusFebruariXPangkat4(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','februari')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat4'    =>  pow($data[$i]->x, 4),
            ]);

        }
        return redirect()->route('admin.linear.februari')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
}
