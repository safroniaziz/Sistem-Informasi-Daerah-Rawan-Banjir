<?php

namespace App\Http\Controllers;

use App\Pemukiman;
use Illuminate\Http\Request;

class RumusController extends Controller
{
    public function index(){
        $pemukimans = Pemukiman::join('kelurahans','kelurahans.id','pemukimen.kelurahan_id')
                                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->get();
        return view('admin/pemukiman.index',compact('pemukimans'));
    }

    public function rumusPemukiman(){
        $pemukimen = Pemukiman::join('kelurahans','kelurahans.id','pemukimen.kelurahan_id')->select('kelurahans.id','nm_kelurahan','persentase')->get();
        $nilai = Pemukiman::max('persentase');
        $array = [];
        for ($i=0; $i <count($pemukimen) ; $i++) {
            $fuzzy = Pemukiman::where('kelurahan_id',$pemukimen[$i]->id)->update([
                'nilai_fuzzy'   =>  number_format(($pemukimen[$i]->persentase - 0) / ($nilai-0),6),
            ]);
        }
        return redirect()->route('admin.fuzzy.pemukiman')->with(['success'  =>  'Nilai Fuzzy Pemukiman Berhasil Di Generate Ulang !!']);
    }
}
