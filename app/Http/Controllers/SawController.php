<?php

namespace App\Http\Controllers;

use App\Clustering;
use App\Kandidat;
use App\Normalisasi;
use App\Pembobotan;
use App\Parameter;
use Illuminate\Http\Request;

class SawController extends Controller
{
    public function kandidat(){
        $kandidats = Kandidat::join('kelurahans','kelurahans.id','kandidats.kelurahan_id')
                                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->select('nm_kecamatan','nm_kelurahan','tahun','bulan','c1','c2','c3','c4')
                                ->get();
        return view('admin/saw/kandidat.index', compact('kandidats'));
    }

    public function normalisasi(){
        $normalisasis = Normalisasi::join('kelurahans','kelurahans.id','normalisasis.kelurahan_id')
                                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->select('nm_kecamatan','nm_kelurahan','tahun','bulan','c1','c2','c3','c4')
                                ->get();
        return view('admin/saw/normalisasi.index', compact('normalisasis'));
    }

    public function rumusBenefit(){
        $data = Kandidat::join('kelurahans','kelurahans.id','kandidats.kelurahan_id')
                            ->select('kelurahan_id','tahun','bulan','c1','c3','c2','c4')
                            ->get();
        $max14['c1'] = Kandidat::where('tahun','2014')->max('c1');
        $max14['c3'] = Kandidat::where('tahun','2014')->max('c3');
        $min14['c2'] = Kandidat::where('tahun','2014')->min('c2');
        $min14['c4'] = Kandidat::where('tahun','2014')->min('c4');

        $max15['c1'] = Kandidat::where('tahun','2015')->max('c1');
        $max15['c3'] = Kandidat::where('tahun','2015')->max('c3');
        $min15['c2'] = Kandidat::where('tahun','2015')->min('c2');
        $min15['c4'] = Kandidat::where('tahun','2015')->min('c4');

        $max16['c1'] = Kandidat::where('tahun','2016')->max('c1');
        $max16['c3'] = Kandidat::where('tahun','2016')->max('c3');
        $min16['c2'] = Kandidat::where('tahun','2016')->min('c2');
        $min16['c4'] = Kandidat::where('tahun','2016')->min('c4');

        $max17['c1'] = Kandidat::where('tahun','2017')->max('c1');
        $max17['c3'] = Kandidat::where('tahun','2017')->max('c3');
        $min17['c2'] = Kandidat::where('tahun','2017')->min('c2');
        $min17['c4'] = Kandidat::where('tahun','2017')->min('c4');

        $max18['c1'] = Kandidat::where('tahun','2018')->max('c1');
        $max18['c3'] = Kandidat::where('tahun','2018')->max('c3');
        $min18['c2'] = Kandidat::where('tahun','2018')->min('c2');
        $min18['c4'] = Kandidat::where('tahun','2018')->min('c4');
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            if ($data[$i]->tahun == "2014") {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  number_format(($data[$i]->c1)/($max14['c1']), 9),
                    'c3'  =>  number_format(($data[$i]->c3)/($max14['c3']), 9),
                    'c2'  =>  number_format(($min14['c2'])/($data[$i]->c2), 9),
                    'c4'  =>  number_format(($min14['c4'])/($data[$i]->c4), 9),
                ];
            }
            if ($data[$i]->tahun == "2015") {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  number_format(($data[$i]->c1)/($max15['c1']), 9),
                    'c3'  =>  number_format(($data[$i]->c3)/($max15['c3']), 9),
                    'c2'  =>  number_format(($min15['c2']/$data[$i]->c2), 9),
                    'c4'  =>  number_format(($min15['c4']/$data[$i]->c4), 9),
                ];
            }
            if ($data[$i]->tahun == "2016") {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  number_format(($data[$i]->c1)/($max16['c1']), 9),
                    'c3'  =>  number_format(($data[$i]->c3)/($max16['c3']), 9),
                    'c2'  =>  number_format(($min16['c2'])/($data[$i]->c2), 9),
                    'c4'  =>  number_format(($min16['c4'])/($data[$i]->c4), 9),
                ];
            }
            if ($data[$i]->tahun == "2017") {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  number_format(($data[$i]->c1)/($max17['c1']), 9),
                    'c3'  =>  number_format(($data[$i]->c3)/($max17['c3']), 9),
                    'c2'  =>  number_format(($min17['c2'])/($data[$i]->c2), 9),
                    'c4'  =>  number_format(($min17['c4'])/($data[$i]->c4), 9),
                ];
            }
            if ($data[$i]->tahun == "2018") {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  number_format(($data[$i]->c1)/($max18['c1']), 9),
                    'c3'  =>  number_format(($data[$i]->c3)/($max18['c3']), 9),
                    'c2'  =>  number_format(($min18['c2'])/($data[$i]->c2), 9),
                    'c4'  =>  number_format(($min18['c4'])/($data[$i]->c4), 9),
                ];
            }
        }
        Normalisasi::truncate();
        Normalisasi::insert($array);
        return redirect()->route('admin.saw.normalisasi')->with(['success'  =>  'Data Matriks Normalisasi Benefit (Pemukiman & Topografi) Berhasil Di Generate !!']);
    }

    public function pembobotan(){
        $pembobotans = Pembobotan::join('kelurahans','kelurahans.id','pembobotans.kelurahan_id')
                                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->select('nm_kecamatan','nm_kelurahan','tahun','bulan','c1','c2','c3','c4','jumlah')
                                ->get();
        return view('admin/saw/pembobotan.index', compact('pembobotans'));
    }

    public function rumusPembobotan(){
        $data = Normalisasi::join('kelurahans','kelurahans.id','normalisasis.kelurahan_id')
                            ->select('kelurahan_id','tahun','bulan','c1','c2','c3','c4')
                            ->get();
        $c1 = Parameter::select('bobot_parameter')->where('id',1)->first();
        $c2 = Parameter::select('bobot_parameter')->where('id',4)->first();
        $c3 = Parameter::select('bobot_parameter')->where('id',2)->first();
        $c4 = Parameter::select('bobot_parameter')->where('id',3)->first();
        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            $array[] = [
                'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                'tahun'  =>  $data[$i]->tahun,
                'bulan'  =>  $data[$i]->bulan,
                'c1'  =>  number_format(($data[$i]->c1 * $c1->bobot_parameter), 9),
                'c2'  =>  number_format(($data[$i]->c2 * $c2->bobot_parameter), 9),
                'c3'  =>  number_format(($data[$i]->c3 * $c3->bobot_parameter), 9),
                'c4'  =>  number_format(($data[$i]->c4 * $c4->bobot_parameter), 9),
            ];
        }

        Pembobotan::truncate();
        Pembobotan::insert($array);
        $baru = Pembobotan::join('kelurahans','kelurahans.id','pembobotans.kelurahan_id')
                            ->select('pembobotans.id','tahun','bulan','c1','c2','c3','c4')
                            ->get();
        foreach ($baru as $data) {
            Pembobotan::where('id',$data->id)->update([
                'jumlah'    => number_format($data->c1 + $data->c2 + $data->c3 + $data->c4,9)
            ]);
        }
        return redirect()->route('admin.saw.pembobotan')->with(['success'  =>  'Data Matriks Pembobotan Berhasil Di Generate !!']);
    }

    public function clustering(){
        $clusterings = Clustering::join('kelurahans','kelurahans.id','clusterings.kelurahan_id')
                                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                                ->select('nm_kecamatan','nm_kelurahan','tahun','bulan','c1','c2','c3','c4','jumlah','clustering')
                                ->get();
        return view('admin/saw/clustering.index', compact('clusterings'));
    }

    public function rumusClustering(){
        $data = Pembobotan::select('pembobotans.id','kelurahan_id','jumlah','tahun','kelurahan_id','bulan','c1','c2','c3','c4')->get();
        $array = [];
        for ($i=0; $i < count($data) ; $i++) {
            if ($data[$i]->jumlah >0.0001 && $data[$i]->jumlah <= 0.23) {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  $data[$i]->c1,
                    'c2'  =>  $data[$i]->c2,
                    'c3'  =>  $data[$i]->c3,
                    'c4'  =>  $data[$i]->c4,
                    'jumlah'  =>  $data[$i]->jumlah,
                    'clustering'  =>  "Sangat Rendah",
                ];
            }
            elseif ($data[$i]->jumlah >= 0.2301 && $data[$i]->jumlah <=0.46 ) {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  $data[$i]->c1,
                    'c2'  =>  $data[$i]->c2,
                    'c3'  =>  $data[$i]->c3,
                    'c4'  =>  $data[$i]->c4,
                    'jumlah'  =>  $data[$i]->jumlah,
                    'clustering'  =>  "Rendah",
                ];
            }
            elseif ($data[$i]->jumlah >= 0.4601 && $data[$i]->jumlah <=0.69 ) {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  $data[$i]->c1,
                    'c2'  =>  $data[$i]->c2,
                    'c3'  =>  $data[$i]->c3,
                    'c4'  =>  $data[$i]->c4,
                    'jumlah'  =>  $data[$i]->jumlah,
                    'clustering'  =>  "Sedang",
                ];
            }
            elseif ($data[$i]->jumlah >= 0.6901 && $data[$i]->jumlah <=0.92 ) {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  $data[$i]->c1,
                    'c2'  =>  $data[$i]->c2,
                    'c3'  =>  $data[$i]->c3,
                    'c4'  =>  $data[$i]->c4,
                    'jumlah'  =>  $data[$i]->jumlah,
                    'clustering'  =>  "Tinggi",
                ];
            }
            elseif ($data[$i]->jumlah >= 0.9201 && $data[$i]->jumlah <=1 ) {
                $array[] = [
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    'tahun'  =>  $data[$i]->tahun,
                    'bulan'  =>  $data[$i]->bulan,
                    'c1'  =>  $data[$i]->c1,
                    'c2'  =>  $data[$i]->c2,
                    'c3'  =>  $data[$i]->c3,
                    'c4'  =>  $data[$i]->c4,
                    'jumlah'  =>  $data[$i]->jumlah,
                    'clustering'  =>  "Sangat Tinggi",
                ];
            }
        }

        Clustering::truncate();
        Clustering::insert($array);
        return redirect()->route('admin.saw.clustering')->with(['success'  =>  'Data Matriks Clustering Benefit (Pemukiman & Topografi) Berhasil Di Generate !!']);
    }
}
