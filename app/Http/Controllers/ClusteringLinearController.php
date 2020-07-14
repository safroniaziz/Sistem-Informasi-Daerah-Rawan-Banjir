<?php

namespace App\Http\Controllers;

use App\HasilLinear;
use App\Linear;
use App\LinearFuzzy;
use Illuminate\Http\Request;

class ClusteringLinearController extends Controller
{
    public function index(){
        $datas = LinearFuzzy::join('kelurahans','kelurahans.id','linear_fuzzies.kelurahan_id')->select('linear_fuzzies.id','nm_kelurahan','kelurahan_id','bulan','tahun','nilai_x','clustering')->get();
        return view('admin/clustering_linear.index',compact('datas'));
    }

    public function rumusClusteringLinear(){
        $data = Linear::join('kelurahans','kelurahans.id','linears.kelurahan_id')->select('kelurahan_id','tahun','bulan')->get();

        $tahun = ['2014','2015','2016','2017','2018'];

        $array = [];
        for ($i=0; $i <count($data) ; $i++) {
            // $nilai = LinearFuzzy::where('')
            $nilai = HasilLinear::select('nilai_a','nilai_b','nilai_c')->where('bulan',$data[$i]->bulan)->where('kelurahan_id',$data[$i]->kelurahan_id)->first();
                $array[] = [
                    'tahun' =>  '2019',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  (($nilai->nilai_a)) + ((($nilai->nilai_b) * 3)) + (($nilai->nilai_c) * ((3 *3))),
                ];
                $array[] = [
                    'tahun' =>  '2020',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  (($nilai->nilai_a)) + ((($nilai->nilai_b) * 4)) + (($nilai->nilai_c) * ((4 *4))),
                ];
                $array[] = [
                    'tahun' =>  '2021',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  (($nilai->nilai_a)) + ((($nilai->nilai_b) * 5)) + (($nilai->nilai_c) * ((5 *5))),
                ];
                $array[] = [
                    'tahun' =>  '2022',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  ($nilai->nilai_a) + (($nilai->nilai_b) * 6) + (($nilai->nilai_c) * (6 *6)),
                ];
                $array[] = [
                    'tahun' =>  '2023',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  ($nilai->nilai_a) + (($nilai->nilai_b) * 7) + (($nilai->nilai_c) * (7 *7)),
                ];
                $array[] = [
                    'tahun' =>  '2024',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  ($nilai->nilai_a) + (($nilai->nilai_b) * 8) + (($nilai->nilai_c) * (8 *8)),
                ];
                $array[] = [
                    'tahun' =>  '2025',
                    'bulan' =>  $data[$i]->bulan,
                    'kelurahan_id'  =>  $data[$i]->kelurahan_id,
                    // 'nilai_a'   =>  $nilai->nilai_a,
                    // 'nilai_b'   =>  $nilai->nilai_b,
                    // 'nilai_c'   =>  $nilai->nilai_c,
                    // 'nilai_x'   =>  ($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3) + (($nilai->nilai_c) * (3 *3)) || (($data[$i]->tahun) == "2014" ? ($nilai->nilai_a) + (($nilai->nilai_b) * 3)),
                    'nilai_x'   =>  ($nilai->nilai_a) + (($nilai->nilai_b) * 9) + (($nilai->nilai_c) * (9 *9)),
                ];
        }
        // return $array;
        LinearFuzzy::truncate();
        LinearFuzzy::insert($array);
        return redirect()->route('admin.clustering_linear')->with(['success'    =>  'Nilai Berhasil DiGenerate !!']);
    }

    // public function rumusClustering(){
    //     $data = LinearFuzzy::join('kelurahans','kelurahans.id','linear_fuzzies.kelurahan_id')->select('linear_fuzzies.id','nilai_x','kelurahan_id','bulan')->get();
    //     for ($i=0; $i < count($data) ; $i++) {
    //         if ($data[$i]->nilai_x <= 0.58) {
    //             LinearFuzzy::where('id',$data[$i]->id)->update([
    //                 'clustering'  =>  "Sangat Rendah",
    //             ]);
    //         }
    //         elseif ($data[$i]->nilai_x >= 0.5801 && $data[$i]->nilai_x <=1.16 ) {
    //             LinearFuzzy::where('id',$data[$i]->id)->update([
    //                 'clustering'  =>  "Rendah",
    //             ]);
    //         }
    //         elseif ($data[$i]->nilai_x >= 1.1601 && $data[$i]->nilai_x <=1.74 ) {
    //             LinearFuzzy::where('id',$data[$i]->id)->update([
    //                 'clustering'  =>  "Sedang",
    //             ]);
    //         }
    //         elseif ($data[$i]->nilai_x >= 0.7401 && $data[$i]->nilai_x <=2.32 ) {
    //             LinearFuzzy::where('id',$data[$i]->id)->update([
    //                 'clustering'  =>  "Tinggi",
    //             ]);
    //         }
    //         elseif ($data[$i]->nilai_x >= 2.3201  ) {
    //             LinearFuzzy::where('id',$data[$i]->id)->update([
    //                 'clustering'  =>  "Sangat Tinggi",
    //             ]);
    //         }
    //     }
    //     return redirect()->route('admin.clustering_linear')->with(['success'    =>  'Clustering Berhasil DiGenerate !!']);
    // }
}
