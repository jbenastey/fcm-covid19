<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Phpml\Math\Distance\Euclidean;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['hasil'] = DB::table('hasil')->get();
        return view('perhitungan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('perhitungan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $jumlahCluster = $request->input('jumlah_cluster');
        $maksIter = $request->input('maks_iter');
        $errorTerkecil = $request->input('error_terkecil');

        $dataset = DB::table('dataset')->get();


        $matriksPartAwal = $this->matriksPartisiAwal($jumlahCluster,count($dataset));

//        var_dump($matriksPartAwal);

        $matriksPartU = [];
        $p[0] = 0;
        $fungsiObjektif = [];
        $error = [];

        for ($j = 0;$j < $maksIter; $j++){
            $p[$j+1] = 0;
            if ($j == 0){
                $c = [];
                $sumC = [];
                $pusatC = [];

                $L = [];
                $sumL = [];

                $ML = [];
                $sumML = [];

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $mu2 = pow(str_replace(',','.',$matriksPartAwal[$key][$i]),2);
                        $c[$i][$key] = [
                            '𝝁i^2' => $mu2,
                            '𝝁i^2*x1' => $mu2 * $value->dataset_x1,
                            '𝝁i^2*x2' => $mu2 * $value->dataset_x2,
                            '𝝁i^2*x3' => $mu2 * $value->dataset_x3,
                            '𝝁i^2*x4' => $mu2 * $value->dataset_x4,
                            '𝝁i^2*x5' => $mu2 * $value->dataset_x5,
                            '𝝁i^2*x6' => $mu2 * $value->dataset_x6,
                            '𝝁i^2*x7' => $mu2 * $value->dataset_x7,
                            '𝝁i^2*x8' => $mu2 * $value->dataset_x8,
                            '𝝁i^2*x9' => $mu2 * $value->dataset_x9,
                            '𝝁i^2*x10' => $mu2 * $value->dataset_x10,
                            '𝝁i^2*x11' => $mu2 * $value->dataset_x11,
                            '𝝁i^2*x12' => $mu2 * $value->dataset_x12,
                            '𝝁i^2*x13' => $mu2 * $value->dataset_x13,
                            '𝝁i^2*x14' => $mu2 * $value->dataset_x14,
                            '𝝁i^2*x15' => $mu2 * $value->dataset_x15,
                            '𝝁i^2*x16' => $mu2 * $value->dataset_x16,
                            '𝝁i^2*x17' => $mu2 * $value->dataset_x17,
                            '𝝁i^2*x18' => $mu2 * $value->dataset_x18,
                        ];
                        $sumC[$i] = [
                            '∑𝝁i^2' => 0,
                            '∑𝝁i^2*x1' => 0,
                            '∑𝝁i^2*x2' => 0,
                            '∑𝝁i^2*x3' => 0,
                            '∑𝝁i^2*x4' => 0,
                            '∑𝝁i^2*x5' => 0,
                            '∑𝝁i^2*x6' => 0,
                            '∑𝝁i^2*x7' => 0,
                            '∑𝝁i^2*x8' => 0,
                            '∑𝝁i^2*x9' => 0,
                            '∑𝝁i^2*x10' => 0,
                            '∑𝝁i^2*x11' => 0,
                            '∑𝝁i^2*x12' => 0,
                            '∑𝝁i^2*x13' => 0,
                            '∑𝝁i^2*x14' => 0,
                            '∑𝝁i^2*x15' => 0,
                            '∑𝝁i^2*x16' => 0,
                            '∑𝝁i^2*x17' => 0,
                            '∑𝝁i^2*x18' => 0,
                        ];
                    }
                }

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $sumC[$i]['∑𝝁i^2'] += $c[$i][$key]['𝝁i^2'];
                        $sumC[$i]['∑𝝁i^2*x1'] += $c[$i][$key]['𝝁i^2*x1'];
                        $sumC[$i]['∑𝝁i^2*x2'] += $c[$i][$key]['𝝁i^2*x2'];
                        $sumC[$i]['∑𝝁i^2*x3'] += $c[$i][$key]['𝝁i^2*x3'];
                        $sumC[$i]['∑𝝁i^2*x4'] += $c[$i][$key]['𝝁i^2*x4'];
                        $sumC[$i]['∑𝝁i^2*x5'] += $c[$i][$key]['𝝁i^2*x5'];
                        $sumC[$i]['∑𝝁i^2*x6'] += $c[$i][$key]['𝝁i^2*x6'];
                        $sumC[$i]['∑𝝁i^2*x7'] += $c[$i][$key]['𝝁i^2*x7'];
                        $sumC[$i]['∑𝝁i^2*x8'] += $c[$i][$key]['𝝁i^2*x8'];
                        $sumC[$i]['∑𝝁i^2*x9'] += $c[$i][$key]['𝝁i^2*x9'];
                        $sumC[$i]['∑𝝁i^2*x10'] += $c[$i][$key]['𝝁i^2*x10'];
                        $sumC[$i]['∑𝝁i^2*x11'] += $c[$i][$key]['𝝁i^2*x11'];
                        $sumC[$i]['∑𝝁i^2*x12'] += $c[$i][$key]['𝝁i^2*x12'];
                        $sumC[$i]['∑𝝁i^2*x13'] += $c[$i][$key]['𝝁i^2*x13'];
                        $sumC[$i]['∑𝝁i^2*x14'] += $c[$i][$key]['𝝁i^2*x14'];
                        $sumC[$i]['∑𝝁i^2*x15'] += $c[$i][$key]['𝝁i^2*x15'];
                        $sumC[$i]['∑𝝁i^2*x16'] += $c[$i][$key]['𝝁i^2*x16'];
                        $sumC[$i]['∑𝝁i^2*x17'] += $c[$i][$key]['𝝁i^2*x17'];
                        $sumC[$i]['∑𝝁i^2*x18'] += $c[$i][$key]['𝝁i^2*x18'];
                    }

                    $pusatC[$i]['∑𝝁i^2*x1'] = $sumC[$i]['∑𝝁i^2*x1']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x2'] = $sumC[$i]['∑𝝁i^2*x2']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x3'] = $sumC[$i]['∑𝝁i^2*x3']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x4'] = $sumC[$i]['∑𝝁i^2*x4']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x5'] = $sumC[$i]['∑𝝁i^2*x5']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x6'] = $sumC[$i]['∑𝝁i^2*x6']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x7'] = $sumC[$i]['∑𝝁i^2*x7']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x8'] = $sumC[$i]['∑𝝁i^2*x8']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x9'] = $sumC[$i]['∑𝝁i^2*x9']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x10'] = $sumC[$i]['∑𝝁i^2*x10']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x11'] = $sumC[$i]['∑𝝁i^2*x11']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x12'] = $sumC[$i]['∑𝝁i^2*x12']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x13'] = $sumC[$i]['∑𝝁i^2*x13']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x14'] = $sumC[$i]['∑𝝁i^2*x14']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x15'] = $sumC[$i]['∑𝝁i^2*x15']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x16'] = $sumC[$i]['∑𝝁i^2*x16']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x17'] = $sumC[$i]['∑𝝁i^2*x17']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x18'] = $sumC[$i]['∑𝝁i^2*x18']/$sumC[$i]['∑𝝁i^2'];

                }

                foreach ($dataset as $key => $value) {
                    $sumL[$key] = 0;
                    $sumML[$key] = 0;
                }

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $L[$i][$key] = (
                            (pow($value->dataset_x1 - $pusatC[$i]['∑𝝁i^2*x1'],2)) +
                            (pow($value->dataset_x2 - $pusatC[$i]['∑𝝁i^2*x2'],2)) +
                            (pow($value->dataset_x3 - $pusatC[$i]['∑𝝁i^2*x3'],2)) +
                            (pow($value->dataset_x4 - $pusatC[$i]['∑𝝁i^2*x4'],2)) +
                            (pow($value->dataset_x5 - $pusatC[$i]['∑𝝁i^2*x5'],2)) +
                            (pow($value->dataset_x6 - $pusatC[$i]['∑𝝁i^2*x6'],2)) +
                            (pow($value->dataset_x7 - $pusatC[$i]['∑𝝁i^2*x7'],2)) +
                            (pow($value->dataset_x8 - $pusatC[$i]['∑𝝁i^2*x8'],2)) +
                            (pow($value->dataset_x9 - $pusatC[$i]['∑𝝁i^2*x9'],2)) +
                            (pow($value->dataset_x10 - $pusatC[$i]['∑𝝁i^2*x10'],2)) +
                            (pow($value->dataset_x11 - $pusatC[$i]['∑𝝁i^2*x11'],2)) +
                            (pow($value->dataset_x12 - $pusatC[$i]['∑𝝁i^2*x12'],2)) +
                            (pow($value->dataset_x13 - $pusatC[$i]['∑𝝁i^2*x13'],2)) +
                            (pow($value->dataset_x14 - $pusatC[$i]['∑𝝁i^2*x14'],2)) +
                            (pow($value->dataset_x15 - $pusatC[$i]['∑𝝁i^2*x15'],2)) +
                            (pow($value->dataset_x16 - $pusatC[$i]['∑𝝁i^2*x16'],2)) +
                            (pow($value->dataset_x17 - $pusatC[$i]['∑𝝁i^2*x17'],2)) +
                            (pow($value->dataset_x18 - $pusatC[$i]['∑𝝁i^2*x18'],2)) *
                            $c[$i][$key]['𝝁i^2']
                        );

                        $sumL[$key] += $L[$i][$key];
                        $ML[$i][$key] = (pow((
                            (pow($value->dataset_x1 - $pusatC[$i]['∑𝝁i^2*x1'],2)) +
                            (pow($value->dataset_x2 - $pusatC[$i]['∑𝝁i^2*x2'],2)) +
                            (pow($value->dataset_x3 - $pusatC[$i]['∑𝝁i^2*x3'],2)) +
                            (pow($value->dataset_x4 - $pusatC[$i]['∑𝝁i^2*x4'],2)) +
                            (pow($value->dataset_x5 - $pusatC[$i]['∑𝝁i^2*x5'],2)) +
                            (pow($value->dataset_x6 - $pusatC[$i]['∑𝝁i^2*x6'],2)) +
                            (pow($value->dataset_x7 - $pusatC[$i]['∑𝝁i^2*x7'],2)) +
                            (pow($value->dataset_x8 - $pusatC[$i]['∑𝝁i^2*x8'],2)) +
                            (pow($value->dataset_x9 - $pusatC[$i]['∑𝝁i^2*x9'],2)) +
                            (pow($value->dataset_x10 - $pusatC[$i]['∑𝝁i^2*x10'],2)) +
                            (pow($value->dataset_x11 - $pusatC[$i]['∑𝝁i^2*x11'],2)) +
                            (pow($value->dataset_x12 - $pusatC[$i]['∑𝝁i^2*x12'],2)) +
                            (pow($value->dataset_x13 - $pusatC[$i]['∑𝝁i^2*x13'],2)) +
                            (pow($value->dataset_x14 - $pusatC[$i]['∑𝝁i^2*x14'],2)) +
                            (pow($value->dataset_x15 - $pusatC[$i]['∑𝝁i^2*x15'],2)) +
                            (pow($value->dataset_x16 - $pusatC[$i]['∑𝝁i^2*x16'],2)) +
                            (pow($value->dataset_x17 - $pusatC[$i]['∑𝝁i^2*x17'],2)) +
                            (pow($value->dataset_x18 - $pusatC[$i]['∑𝝁i^2*x18'],2))),-1)
                        );

                        $sumML[$key] += $ML[$i][$key];
                    }

                }

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $matriksPartU[$i][$key] = $ML[$i][$key] / $sumML[$key];
                    }

                }

                foreach ($dataset as $key => $value) {
                    $p[$j+1] += $sumL[$key];
                }
            } else {
                $c = [];
                $sumC = [];
                $pusatC = [];

                $L = [];
                $sumL = [];

                $ML = [];
                $sumML = [];

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $mu2 = pow($matriksPartU[$i][$key],2);
                        $c[$i][$key] = [
                            '𝝁i^2' => $mu2,
                            '𝝁i^2*x1' => $mu2 * $value->dataset_x1,
                            '𝝁i^2*x2' => $mu2 * $value->dataset_x2,
                            '𝝁i^2*x3' => $mu2 * $value->dataset_x3,
                            '𝝁i^2*x4' => $mu2 * $value->dataset_x4,
                            '𝝁i^2*x5' => $mu2 * $value->dataset_x5,
                            '𝝁i^2*x6' => $mu2 * $value->dataset_x6,
                            '𝝁i^2*x7' => $mu2 * $value->dataset_x7,
                            '𝝁i^2*x8' => $mu2 * $value->dataset_x8,
                            '𝝁i^2*x9' => $mu2 * $value->dataset_x9,
                            '𝝁i^2*x10' => $mu2 * $value->dataset_x10,
                            '𝝁i^2*x11' => $mu2 * $value->dataset_x11,
                            '𝝁i^2*x12' => $mu2 * $value->dataset_x12,
                            '𝝁i^2*x13' => $mu2 * $value->dataset_x13,
                            '𝝁i^2*x14' => $mu2 * $value->dataset_x14,
                            '𝝁i^2*x15' => $mu2 * $value->dataset_x15,
                            '𝝁i^2*x16' => $mu2 * $value->dataset_x16,
                            '𝝁i^2*x17' => $mu2 * $value->dataset_x17,
                            '𝝁i^2*x18' => $mu2 * $value->dataset_x18,
                        ];
                        $sumC[$i] = [
                            '∑𝝁i^2' => 0,
                            '∑𝝁i^2*x1' => 0,
                            '∑𝝁i^2*x2' => 0,
                            '∑𝝁i^2*x3' => 0,
                            '∑𝝁i^2*x4' => 0,
                            '∑𝝁i^2*x5' => 0,
                            '∑𝝁i^2*x6' => 0,
                            '∑𝝁i^2*x7' => 0,
                            '∑𝝁i^2*x8' => 0,
                            '∑𝝁i^2*x9' => 0,
                            '∑𝝁i^2*x10' => 0,
                            '∑𝝁i^2*x11' => 0,
                            '∑𝝁i^2*x12' => 0,
                            '∑𝝁i^2*x13' => 0,
                            '∑𝝁i^2*x14' => 0,
                            '∑𝝁i^2*x15' => 0,
                            '∑𝝁i^2*x16' => 0,
                            '∑𝝁i^2*x17' => 0,
                            '∑𝝁i^2*x18' => 0,
                        ];
                    }
                }

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $sumC[$i]['∑𝝁i^2'] += $c[$i][$key]['𝝁i^2'];
                        $sumC[$i]['∑𝝁i^2*x1'] += $c[$i][$key]['𝝁i^2*x1'];
                        $sumC[$i]['∑𝝁i^2*x2'] += $c[$i][$key]['𝝁i^2*x2'];
                        $sumC[$i]['∑𝝁i^2*x3'] += $c[$i][$key]['𝝁i^2*x3'];
                        $sumC[$i]['∑𝝁i^2*x4'] += $c[$i][$key]['𝝁i^2*x4'];
                        $sumC[$i]['∑𝝁i^2*x5'] += $c[$i][$key]['𝝁i^2*x5'];
                        $sumC[$i]['∑𝝁i^2*x6'] += $c[$i][$key]['𝝁i^2*x6'];
                        $sumC[$i]['∑𝝁i^2*x7'] += $c[$i][$key]['𝝁i^2*x7'];
                        $sumC[$i]['∑𝝁i^2*x8'] += $c[$i][$key]['𝝁i^2*x8'];
                        $sumC[$i]['∑𝝁i^2*x9'] += $c[$i][$key]['𝝁i^2*x9'];
                        $sumC[$i]['∑𝝁i^2*x10'] += $c[$i][$key]['𝝁i^2*x10'];
                        $sumC[$i]['∑𝝁i^2*x11'] += $c[$i][$key]['𝝁i^2*x11'];
                        $sumC[$i]['∑𝝁i^2*x12'] += $c[$i][$key]['𝝁i^2*x12'];
                        $sumC[$i]['∑𝝁i^2*x13'] += $c[$i][$key]['𝝁i^2*x13'];
                        $sumC[$i]['∑𝝁i^2*x14'] += $c[$i][$key]['𝝁i^2*x14'];
                        $sumC[$i]['∑𝝁i^2*x15'] += $c[$i][$key]['𝝁i^2*x15'];
                        $sumC[$i]['∑𝝁i^2*x16'] += $c[$i][$key]['𝝁i^2*x16'];
                        $sumC[$i]['∑𝝁i^2*x17'] += $c[$i][$key]['𝝁i^2*x17'];
                        $sumC[$i]['∑𝝁i^2*x18'] += $c[$i][$key]['𝝁i^2*x18'];
                    }

                    $pusatC[$i]['∑𝝁i^2*x1'] = $sumC[$i]['∑𝝁i^2*x1']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x2'] = $sumC[$i]['∑𝝁i^2*x2']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x3'] = $sumC[$i]['∑𝝁i^2*x3']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x4'] = $sumC[$i]['∑𝝁i^2*x4']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x5'] = $sumC[$i]['∑𝝁i^2*x5']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x6'] = $sumC[$i]['∑𝝁i^2*x6']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x7'] = $sumC[$i]['∑𝝁i^2*x7']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x8'] = $sumC[$i]['∑𝝁i^2*x8']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x9'] = $sumC[$i]['∑𝝁i^2*x9']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x10'] = $sumC[$i]['∑𝝁i^2*x10']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x11'] = $sumC[$i]['∑𝝁i^2*x11']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x12'] = $sumC[$i]['∑𝝁i^2*x12']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x13'] = $sumC[$i]['∑𝝁i^2*x13']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x14'] = $sumC[$i]['∑𝝁i^2*x14']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x15'] = $sumC[$i]['∑𝝁i^2*x15']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x16'] = $sumC[$i]['∑𝝁i^2*x16']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x17'] = $sumC[$i]['∑𝝁i^2*x17']/$sumC[$i]['∑𝝁i^2'];
                    $pusatC[$i]['∑𝝁i^2*x18'] = $sumC[$i]['∑𝝁i^2*x18']/$sumC[$i]['∑𝝁i^2'];

                }

                foreach ($dataset as $key => $value) {
                    $sumL[$key] = 0;
                    $sumML[$key] = 0;
                }

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $L[$i][$key] = (
                            (pow($value->dataset_x1 - $pusatC[$i]['∑𝝁i^2*x1'],2)) +
                            (pow($value->dataset_x2 - $pusatC[$i]['∑𝝁i^2*x2'],2)) +
                            (pow($value->dataset_x3 - $pusatC[$i]['∑𝝁i^2*x3'],2)) +
                            (pow($value->dataset_x4 - $pusatC[$i]['∑𝝁i^2*x4'],2)) +
                            (pow($value->dataset_x5 - $pusatC[$i]['∑𝝁i^2*x5'],2)) +
                            (pow($value->dataset_x6 - $pusatC[$i]['∑𝝁i^2*x6'],2)) +
                            (pow($value->dataset_x7 - $pusatC[$i]['∑𝝁i^2*x7'],2)) +
                            (pow($value->dataset_x8 - $pusatC[$i]['∑𝝁i^2*x8'],2)) +
                            (pow($value->dataset_x9 - $pusatC[$i]['∑𝝁i^2*x9'],2)) +
                            (pow($value->dataset_x10 - $pusatC[$i]['∑𝝁i^2*x10'],2)) +
                            (pow($value->dataset_x11 - $pusatC[$i]['∑𝝁i^2*x11'],2)) +
                            (pow($value->dataset_x12 - $pusatC[$i]['∑𝝁i^2*x12'],2)) +
                            (pow($value->dataset_x13 - $pusatC[$i]['∑𝝁i^2*x13'],2)) +
                            (pow($value->dataset_x14 - $pusatC[$i]['∑𝝁i^2*x14'],2)) +
                            (pow($value->dataset_x15 - $pusatC[$i]['∑𝝁i^2*x15'],2)) +
                            (pow($value->dataset_x16 - $pusatC[$i]['∑𝝁i^2*x16'],2)) +
                            (pow($value->dataset_x17 - $pusatC[$i]['∑𝝁i^2*x17'],2)) +
                            (pow($value->dataset_x18 - $pusatC[$i]['∑𝝁i^2*x18'],2)) *
                            $c[$i][$key]['𝝁i^2']
                        );

                        $sumL[$key] += $L[$i][$key];
                        $ML[$i][$key] = (pow((
                            (pow($value->dataset_x1 - $pusatC[$i]['∑𝝁i^2*x1'],2)) +
                            (pow($value->dataset_x2 - $pusatC[$i]['∑𝝁i^2*x2'],2)) +
                            (pow($value->dataset_x3 - $pusatC[$i]['∑𝝁i^2*x3'],2)) +
                            (pow($value->dataset_x4 - $pusatC[$i]['∑𝝁i^2*x4'],2)) +
                            (pow($value->dataset_x5 - $pusatC[$i]['∑𝝁i^2*x5'],2)) +
                            (pow($value->dataset_x6 - $pusatC[$i]['∑𝝁i^2*x6'],2)) +
                            (pow($value->dataset_x7 - $pusatC[$i]['∑𝝁i^2*x7'],2)) +
                            (pow($value->dataset_x8 - $pusatC[$i]['∑𝝁i^2*x8'],2)) +
                            (pow($value->dataset_x9 - $pusatC[$i]['∑𝝁i^2*x9'],2)) +
                            (pow($value->dataset_x10 - $pusatC[$i]['∑𝝁i^2*x10'],2)) +
                            (pow($value->dataset_x11 - $pusatC[$i]['∑𝝁i^2*x11'],2)) +
                            (pow($value->dataset_x12 - $pusatC[$i]['∑𝝁i^2*x12'],2)) +
                            (pow($value->dataset_x13 - $pusatC[$i]['∑𝝁i^2*x13'],2)) +
                            (pow($value->dataset_x14 - $pusatC[$i]['∑𝝁i^2*x14'],2)) +
                            (pow($value->dataset_x15 - $pusatC[$i]['∑𝝁i^2*x15'],2)) +
                            (pow($value->dataset_x16 - $pusatC[$i]['∑𝝁i^2*x16'],2)) +
                            (pow($value->dataset_x17 - $pusatC[$i]['∑𝝁i^2*x17'],2)) +
                            (pow($value->dataset_x18 - $pusatC[$i]['∑𝝁i^2*x18'],2))),-1)
                        );

                        $sumML[$key] += $ML[$i][$key];
                    }

                }

                for ($i = 0;$i < $jumlahCluster; $i++){
                    foreach ($dataset as $key => $value) {
                        $matriksPartU[$i][$key] = $ML[$i][$key] / $sumML[$key];
                    }

                }

                foreach ($dataset as $key => $value) {
                    $p[$j+1] += $sumL[$key];
                }

            }
//            var_dump((number_format(abs($p[$j+1] - $p[$j]),15)));
            $fungsiObjektif[$j] = $p[$j+1];
            $error[$j] = $p[$j+1] - $p[$j];
            if (($p[$j+1] - $p[$j] == $errorTerkecil)){
                break;
            }
        }


//        var_dump($p);
//        var_dump($sumC);
//        var_dump($pusatC);
//        var_dump($L);
//        var_dump($sumL);
//        var_dump($ML);
//        var_dump($sumML);
//        var_dump($matriksPartU);
        $hasilCluster = [];
        $hasilL = [];
        $hasilLT = [];
        for ($i=0;$i<$jumlahCluster;$i++){
            foreach ($dataset as $key=>$value) {
                $hasilCluster[$key][$i] = $matriksPartU[$i][$key];
                $hasilL[$key][$i] = $L[$i][$key];
            }
        }
        $mHasilCluster = [];
        foreach ($dataset as $key=>$value) {
            $mHasilCluster[$key] = (array_search(max($hasilCluster[$key]),$hasilCluster[$key]))+1;
            $hasilLT[$key] = $sumL[$key];
        }

        $simpan = [
            'hasil_jumlah_cluster' => $jumlahCluster,
            'hasil_iterasi' => $maksIter,
            'hasil_error_terkecil' => $errorTerkecil,
            'hasil_cluster_hitung' => json_encode($hasilCluster),
            'hasil_L' => json_encode($hasilL),
            'hasil_LT' => json_encode($hasilLT),
            'hasil_cluster' => json_encode($mHasilCluster),
            'hasil_fungsi_objektif' => json_encode($fungsiObjektif),
            'hasil_error' => json_encode($error)
        ];

//        dd($simpan);
        DB::table('hasil')->insert($simpan);

        return redirect('perhitungan');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['hasil'] = DB::table('hasil')
            ->where('hasil_id','=',$id)
            ->first();
        return view('perhitungan.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pengujian($id){
        $hasil = DB::table('hasil')
            ->where('hasil_id',$id)
            ->first();
        $clusterHitung = json_decode($hasil->hasil_cluster_hitung);
        $cluster = json_decode($hasil->hasil_cluster);
        $dataUji = [];
        foreach ($clusterHitung as $key=>$value) {
            array_push($dataUji,[
                'data' => $value,
                'cluster' => $cluster[$key]
            ]);
//            array_push($dataUji,$value);
        }

        $jumlahCluster = [];
        $jumlahClusterLuar = [];
        $dataCluster = [];
        $dataClusterLuar = [];
        $clusterLuar = [];

        echo "<pre>";
        foreach ($dataUji as $key=>$value) {
            for ($i = 1;$i <= $hasil->hasil_jumlah_cluster;$i++){
                if ($value['cluster'] == $i){
                    $jumlahCluster[$i] = 0;
                    $dataCluster[$i] = [];
                } else {
                    $clusterLuar[$key] = [];
                    $jumlahClusterLuar[$i] = 0;
                    $dataClusterLuar[$i] = [];
                }
            }
        }
        foreach ($dataUji as $key=>$value) {
            for ($i = 1;$i <= $hasil->hasil_jumlah_cluster;$i++){
                if ($value['cluster'] == $i){
                    $jumlahCluster[$i]++;
                    array_push($dataCluster[$i],$value);
                } else {
                    $jumlahClusterLuar[$i]++;
                    array_push($dataClusterLuar[$i],$value);
                    array_push($clusterLuar[$key],$i);
                }
            }
        }

        $a = [];
        $d = [];
        $b = [];
        $si = [];
        $euclidean = new Euclidean();
//        if ($hasil->hasil_jumlah_cluster == 2){
//            foreach ($dataCluster as $key => $value) {
//                foreach ($value as $key2 => $value2) {
//                    $_a = 0;
//                    foreach ($value2['data'] as $key3 => $value3){
//                        $_a += pow($value3,2);
//                    }
//                    $a[$key][$key2] = 1/count($dataUji) * sqrt($_a);
//                }
//            }
            foreach ($dataUji as $key=>$value) {

//                if ($key == 0){
                $_a = 0;
                $v2 = [];
                foreach ($dataCluster[$value['cluster']] as $key2 => $value2) {
//                    if ($value['data'] != $value2['data']){
                        $v2[$key] = $value2;
                        $_a += $euclidean->distance($value['data'],$value2['data']);
                        $a[$key] = 1/count($dataUji) * ($_a);
//                    }
                }

                $__d[$key] = 0;
                $avg[$key] = [];
//                $test = 0;
//                    var_dump($dataClusterLuar[$value['cluster']]);
                foreach ($dataClusterLuar[$value['cluster']] as $key3 => $value3) {

                    if ($value3['cluster'] != $value['cluster']){
//                        $test++;
//                        var_dump($clusterLuar[$key]);
                        foreach ($clusterLuar[$key] as $key4 => $value4){
//                            var_dump($value3['cluster']);
//                            var_dump($value4);
                            if ($value3['cluster'] == $value4){
                                $__d[$key] += $euclidean->distance($v2[$key]['data'],$value3['data']);

                                $_d[$key4][$key3] = $__d[$key];
                                $d[$key][$key4][$key3] = 1/($jumlahCluster[$value3['cluster']]) * ($_d[$key4][$key3]);

                            }

                        }
                    }
                }
                    foreach ($d[$key] as $key5 => $value5) {
                        $average = array_sum($value5) / count($value5);
                        array_push($avg[$key],$average);
                }
                $b[$key] = min($avg[$key]);
                $si[$key] = $b[$key] - $a[$key] / max($a[$key],$b[$key]);

                }
//            }
//        }
//        var_dump($a);
//        var_dump($b);
//        var_dump($d);
        var_dump($si);
        echo "</pre>";

//        dd($d);
//        dd($d);
//        dd($si);

    }

    private function _enculide($i1,$i2){

        $r = 0;
        foreach ($i2 as $a => $v){
            $temp = $v[$a] - $i1;
            $r +=$temp * $temp;
        }
        return pow($r,2);
    }

    function matriksPartisiAwal($jumlahCluster,$jumlahData){
        $matriks = [];
        if ($jumlahCluster == 2) {
            $data = DB::table('matriks_2')->get();
            for ($i = 0;$i < $jumlahData;$i++){
                $matriks[$i] = [
                    $data[$i]->matriks_2_1,
                    $data[$i]->matriks_2_2,
                ];
            }
        } elseif ($jumlahCluster == 3) {
            $data = DB::table('matriks_3')->get();
            for ($i = 0;$i < $jumlahData;$i++){
                $matriks[$i] = [
                    $data[$i]->matriks_3_1,
                    $data[$i]->matriks_3_2,
                    $data[$i]->matriks_3_3,
                ];
            }
        } elseif ($jumlahCluster == 4) {
            $data = DB::table('matriks_4')->get();
            for ($i = 0;$i < $jumlahData;$i++){
                $matriks[$i] = [
                    $data[$i]->matriks_4_1,
                    $data[$i]->matriks_4_2,
                    $data[$i]->matriks_4_3,
                    $data[$i]->matriks_4_4,
                ];
            }
        } elseif ($jumlahCluster == 5) {
            $data = DB::table('matriks_5')->get();
            for ($i = 0;$i < $jumlahData;$i++){
                $matriks[$i] = [
                    $data[$i]->matriks_5_1,
                    $data[$i]->matriks_5_2,
                    $data[$i]->matriks_5_3,
                    $data[$i]->matriks_5_4,
                    $data[$i]->matriks_5_5,
                ];
            }
        }
        return $matriks;
    }
}
