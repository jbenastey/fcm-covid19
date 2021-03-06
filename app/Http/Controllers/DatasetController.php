<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['dataset'] = DB::table('dataset')->get();
        return view('dataset.index',$data);
    }

    public function load(){
        $data = Data::all()
            ->whereNotNull('data_nama')
            ->whereNotNull('data_usia')
            ->whereNotNull('data_penghasilan')
            ->whereNotNull('data_tanggungan')
            ->whereNotNull('data_nik')
            ->whereNotNull('data_pekerjaan')
            ->whereNotNull('data_kategori')
            ->where('data_nama','!=','-')
            ->where('data_usia','!=','-')
            ->where('data_penghasilan','!=','-')
            ->where('data_tanggungan','!=','-')
            ->where('data_nik','!=','-')
            ->where('data_pekerjaan','!=','-')
            ->where('data_kategori','!=','-')
            ->where('data_penghasilan','<=','2500000')
        ;

        $dataset = [];
        foreach ($data as $key => $value) {
            var_dump($value->data_nama);
            $rowDataset = [
                'dataset_x1' => 0,
                'dataset_x2' => 0,
                'dataset_x3' => 0,
                'dataset_x4' => 0,
                'dataset_x5' => 5,
                'dataset_x6' => 0,
                'dataset_x7' => 0,
                'dataset_x8' => 0,
                'dataset_x9' => 0,
                'dataset_x10' => 0,
                'dataset_x11' => 0,
                'dataset_x12' => 0,
                'dataset_x13' => 0,
                'dataset_x14' => 0,
                'dataset_x15' => 0,
                'dataset_x16' => 0,
                'dataset_x17' => 0,
                'dataset_x18' => 0,
            ];

            //x1
            if ($value->data_usia >= 15 && $value->data_usia <= 20){
                $rowDataset['dataset_x1'] = 5;
            } elseif ($value->data_usia > 50 && $value->data_usia <= 60){
                $rowDataset['dataset_x1'] = 4;
            } elseif ($value->data_usia > 40 && $value->data_usia <= 50){
                $rowDataset['dataset_x1'] = 3;
            } elseif ($value->data_usia > 20 && $value->data_usia <= 30){
                $rowDataset['dataset_x1'] = 2;
            } elseif ($value->data_usia > 30 && $value->data_usia <= 40){
                $rowDataset['dataset_x1'] = 1;
            } else {
                $rowDataset['dataset_x1'] = 5;
            }

            //x2
            if ($value->data_penghasilan <= 500000){
                $rowDataset['dataset_x2'] = 5;
            } elseif ($value->data_penghasilan > 500 && $value->data_penghasilan <= 1000000){
                $rowDataset['dataset_x2'] = 4;
            } elseif ($value->data_penghasilan > 1000000 && $value->data_penghasilan <= 1500000){
                $rowDataset['dataset_x2'] = 3;
            } elseif ($value->data_penghasilan > 1500000 && $value->data_penghasilan <= 2000000){
                $rowDataset['dataset_x2'] = 2;
            } elseif ($value->data_penghasilan > 2000000 && $value->data_penghasilan <= 2500000){
                $rowDataset['dataset_x2'] = 1;
            }

            //x3
            if ($value->data_tanggungan <= 7){
                $rowDataset['dataset_x3'] = 5;
            } elseif ($value->data_tanggungan > 4 && $value->data_tanggungan <= 6){
                $rowDataset['dataset_x3'] = 4;
            } elseif ($value->data_tanggungan > 2 && $value->data_tanggungan <= 4){
                $rowDataset['dataset_x3'] = 3;
            } elseif ($value->data_tanggungan > 0 && $value->data_tanggungan <= 2){
                $rowDataset['dataset_x3'] = 2;
            } elseif ($value->data_tanggungan < 1){
                $rowDataset['dataset_x3'] = 1;
            }

            //x4
            if (str_contains($value->data_nik,'147109')){
                $rowDataset['dataset_x4'] = 2;
            } else {
                $rowDataset['dataset_x4'] = 1;
            }

            //x5
            if (str_contains(strtolower($value->data_pekerjaan),'ustad')
                || str_contains(strtolower($value->data_pekerjaan),'ghorim')
                || str_contains(strtolower($value->data_pekerjaan),'teknisi')
                || str_contains(strtolower($value->data_pekerjaan),'masjid')
            ){
                $rowDataset['dataset_x5'] = 4;
            } elseif (str_contains(strtolower($value->data_pekerjaan),'guru')
                || (str_contains(strtolower($value->data_pekerjaan),'mengajar'))
                || (str_contains(strtolower($value->data_pekerjaan),'dosen'))
                || (str_contains(strtolower($value->data_pekerjaan),'wartawan'))
            ){
                $rowDataset['dataset_x5'] = 3;
            } elseif (str_contains(strtolower($value->data_pekerjaan),'wiraswasta')
                || str_contains(strtolower($value->data_pekerjaan),'swasta')
                || str_contains(strtolower($value->data_pekerjaan),'karyawan')
                || str_contains(strtolower($value->data_pekerjaan),'kedai')
                || str_contains(strtolower($value->data_pekerjaan),'pedagang')
                || str_contains(strtolower($value->data_pekerjaan),'ampera')
                || str_contains(strtolower($value->data_pekerjaan),'satpam')
                || str_contains(strtolower($value->data_pekerjaan),'usaha')
                || str_contains(strtolower($value->data_pekerjaan),'ukm')
                || str_contains(strtolower($value->data_pekerjaan),'laundry')
                || str_contains(strtolower($value->data_pekerjaan),'sales')
                || str_contains(strtolower($value->data_pekerjaan),'spg')
                || str_contains(strtolower($value->data_pekerjaan),'warung')
                || str_contains(strtolower($value->data_pekerjaan),'kantin')
                || str_contains(strtolower($value->data_pekerjaan),'reklame')
                || str_contains(strtolower($value->data_pekerjaan),'online')
                || str_contains(strtolower($value->data_pekerjaan),'lapau')
                || str_contains(strtolower($value->data_pekerjaan),'pangkas')
                || str_contains(strtolower($value->data_pekerjaan),'penyewaan')
                || str_contains(strtolower($value->data_pekerjaan),'bengkel')
            ){
                $rowDataset['dataset_x5'] = 6;
            } elseif (str_contains(strtolower($value->data_pekerjaan),'buruh')
                || str_contains(strtolower($value->data_pekerjaan),'jual')
                || str_contains(strtolower($value->data_pekerjaan),'bhl')
                || str_contains(strtolower($value->data_pekerjaan),'gojek')
                || str_contains(strtolower($value->data_pekerjaan),'bangunan')
                || str_contains(strtolower($value->data_pekerjaan),'grab')
                || str_contains(strtolower($value->data_pekerjaan),'ojek')
                || str_contains(strtolower($value->data_pekerjaan),'supir')
                || str_contains(strtolower($value->data_pekerjaan),'sopir')
                || str_contains(strtolower($value->data_pekerjaan),'jahit')
                || str_contains(strtolower($value->data_pekerjaan),'industri')
                || str_contains(strtolower($value->data_pekerjaan),'ibu')
                || str_contains(strtolower($value->data_pekerjaan),'harian')
                || str_contains(strtolower($value->data_pekerjaan),'parkir')
            ){
                $rowDataset['dataset_x5'] = 10;
            } elseif (str_contains(strtolower($value->data_pekerjaan),'tukang')
            ){
                $rowDataset['dataset_x5'] = 8;
            }elseif (str_contains(strtolower($value->data_pekerjaan),'petani')
            ){
                $rowDataset['dataset_x5'] = 7;
            }elseif (str_contains(strtolower($value->data_pekerjaan),'mekanik')
            ){
                $rowDataset['dataset_x5'] = 9;
            }elseif (str_contains(strtolower($value->data_pekerjaan),'pns')
                || str_contains(strtolower($value->data_pekerjaan),'asn')
            ){
                $rowDataset['dataset_x5'] = 1;
            }

            //x6
            if ($value->data_kategori == '1'){
                $rowDataset['dataset_x6'] = 2;
            } else {
                $rowDataset['dataset_x6'] = 1;
            }

            //x7
            if ($value->data_kategori == '2'){
                $rowDataset['dataset_x7'] = 2;
            } else {
                $rowDataset['dataset_x7'] = 1;
            }

            //x8
            if ($value->data_kategori == '3'){
                $rowDataset['dataset_x8'] = 2;
            } else {
                $rowDataset['dataset_x8'] = 1;
            }

            //x9
            if ($value->data_kategori == '4'){
                $rowDataset['dataset_x9'] = 2;
            } else {
                $rowDataset['dataset_x9'] = 1;
            }

            //x10
            if ($value->data_kategori == '5'){
                $rowDataset['dataset_x10'] = 2;
            } else {
                $rowDataset['dataset_x10'] = 1;
            }

            //x11
            if ($value->data_kategori == '6'){
                $rowDataset['dataset_x11'] = 2;
            } else {
                $rowDataset['dataset_x11'] = 1;
            }

            //x12
            if ($value->data_kategori == '7'){
                $rowDataset['dataset_x12'] = 2;
            } else {
                $rowDataset['dataset_x12'] = 1;
            }

            //x13
            if ($value->data_kategori == '8'){
                $rowDataset['dataset_x13'] = 2;
            } else {
                $rowDataset['dataset_x13'] = 1;
            }

            //x14
            if ($value->data_kategori == '9'){
                $rowDataset['dataset_x14'] = 2;
            } else {
                $rowDataset['dataset_x14'] = 1;
            }

            //x15
            if ($value->data_kategori == '10'){
                $rowDataset['dataset_x15'] = 2;
            } else {
                $rowDataset['dataset_x15'] = 1;
            }

            //x16
            if ($value->data_kategori == '11'){
                $rowDataset['dataset_x16'] = 2;
            } else {
                $rowDataset['dataset_x16'] = 1;
            }

            //x17
            if ($value->data_kategori == '12'){
                $rowDataset['dataset_x17'] = 2;
            } else {
                $rowDataset['dataset_x17'] = 1;
            }

            //x18
            if ($value->data_kategori == '13'){
                $rowDataset['dataset_x18'] = 2;
            } else {
                $rowDataset['dataset_x18'] = 1;
            }

            array_push($dataset,$rowDataset);
        }

        if (count($data) != count($dataset)){
            if (count($data) > count($dataset)){
                DB::table('dataset')->truncate();
                DB::table('dataset')->insert($dataset);
            } elseif (count($data) < count($dataset)){
                DB::table('dataset')->truncate();
            } else {
                DB::table('dataset')->insert($dataset);
            }
        }

        return redirect('dataset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
