<?php

namespace App\Http\Controllers;

use App\Linear;
use Illuminate\Http\Request;
use App\Clustering;


class LinearControllerSeptember extends Controller
{
    public function september(){
        $septembers = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->where('bulan','september')->get();
        return view('admin/linier.september', compact('septembers'));
    }

    public function rumusSeptemberX(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','september')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            $jumlah = Clustering::select('jumlah')->where('tahun',$data[$i]->tahun)->where('bulan',$data[$i]->bulan)->where('kelurahan_id',$data[$i]->kelurahan_id)->first();
            Linear::where('id',$data[$i]->id)->update([
                'y'     =>  $jumlah['jumlah'],
                'xy'    =>  $data[$i]->x * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.september')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusSeptemberKuadrat(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','september')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2'    =>  $data[$i]->x * $data[$i]->x,
            ]);

        }
        return redirect()->route('admin.linear.september')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    public function rumusSeptemberKuadratY(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y','xpangkat2')
                        ->where('bulan','september')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat2y'    =>  $data[$i]->xpangkat2 * $data[$i]->y,
            ]);

        }
        return redirect()->route('admin.linear.september')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
    public function rumusSeptemberXPangkat4(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('linears.id','bulan','tahun','kelurahan_id','x','y')
                        ->where('bulan','september')->get();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            Linear::where('id',$data[$i]->id)->update([
                'xpangkat4'    =>  pow($data[$i]->x, 4),
            ]);

        }
        return redirect()->route('admin.linear.september')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }
}
