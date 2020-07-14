<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Koordinat;
use App\Kecamatan;
use App\Clustering;
use App\LinearFuzzy;
use App\Kelurahan;
use DB;

class FrontController extends Controller
{
    public function index(){
        $rawa = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','1')
                            ->get();
        $bentiring = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','2')
                            ->get();
        $bentiringpermai = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','3')
                            ->get();
        $beringin = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','4')
                            ->get();
        $limun = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','5')
                            ->get();
        $pematang = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','6')
                            ->get();
        $pasar = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','7')
                            ->get();
        $kampung = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','8')
                            ->get();
        $sukamerindu = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','9')
                            ->get();
        $tanjungagung = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','10')
                            ->get();
        $tanjungjaya = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','11')
                            ->get();
        $semarang = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','12')
                            ->get();
        $surabaya = Koordinat::join('kelurahans','kelurahans.id','koordinats.kelurahan_id')
                            ->select('kelurahan_id','lat','long')
                            ->where('kelurahans.id','13')
                            ->get();
        $kecamatans = Kecamatan::all();
        $grafik_saw = Clustering::select('tahun','clustering',DB::raw("COUNT(clustering) as jumlah"))
                        ->where('clustering','Tinggi')
                        ->groupBy('clustering')->groupBy('tahun')
                        ->get();
                        // return $grafik_saw;
        $grafik_linear = LinearFuzzy::select('tahun',DB::raw("MAX(nilai_x) as max"))
                        ->groupBy('clustering')->groupBy('tahun')
                        ->get();
        return view('frontend.index', compact('rawa','bentiring','bentiringpermai','beringin','limun',
                                    'pematang','pasar','kampung','sukamerindu','tanjungagung',
                                    'tanjungjaya','semarang','surabaya','kecamatans','grafik_saw','grafik_linear'
                                ));
    }

    public function petaSaw(Request $request){
        $data = Clustering::join('kelurahans','kelurahans.id','clusterings.kelurahan_id')
                            ->select('kelurahan_id','nm_kelurahan','clustering','nm_kelurahan')
                            ->where('tahun',$request->tahun)
                            ->where('bulan',$request->bulan)
                            ->get();
        $kecamatans = Kecamatan::all();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) { 
            $array[] = [
                'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                'nm_kelurahan'  =>  $data[$i]->nm_kelurahan,
                'clustering'  =>  $data[$i]->clustering,
                'koordinat'     =>  Koordinat::where('kelurahan_id',$data[$i]->kelurahan_id)->select('lat','long')->get(),
            ];
        }
        return view('/frontend.peta',compact('array','kecamatans'));
    }

    public function grafikSaw(Request $request){
        $data = Clustering::join('kelurahans','kelurahans.id','clusterings.kelurahan_id')
                            ->select('kelurahan_id','nm_kelurahan','tahun','bulan','jumlah')
                            ->where('kelurahan_id',$request->kelurahan_id)
                            ->where('bulan',$request->bulan)
                            ->groupBy('tahun')
                            ->get();
        $kelurahans = Kelurahan::all();
        return view('/frontend.grafik_saw',compact('data','kelurahans'));
    }

    public function grafikLinear(Request $request){
        $data = LinearFuzzy::join('kelurahans','kelurahans.id','linear_fuzzies.kelurahan_id')
                            ->select('kelurahan_id','nm_kelurahan','tahun','bulan','nilai_x')
                            ->where('kelurahan_id',$request->kelurahan_id)
                            ->where('bulan',$request->bulan)
                            ->groupBy('tahun')
                            ->get();
        $kelurahans = Kelurahan::all();
        return view('/frontend.grafik_linear',compact('data','kelurahans'));
    }
}
