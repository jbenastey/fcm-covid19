<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['uji'] = DB::table('uji')
            ->join('hasil','hasil.hasil_id','=','uji.uji_hasil_id')
            ->get();
        return view('pengujian.index',$data);
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

    public function grafik(){
        $data = DB::table('uji')
            ->select('hasil_jumlah_cluster','uji_si_global')
            ->join('hasil','hasil.hasil_id','=','uji.uji_hasil_id')
            ->orderBy('uji_id','DESC')
            ->get();

        $nama = [];
        $nilai = [];

        foreach ($data as $value) {
            array_push($nama,$value->hasil_jumlah_cluster);
            array_push($nilai,$value->uji_si_global);
        }

        $return = [
            'nama' => $nama,
            'nilai' => $nilai
        ];

        return json_encode($return);
    }
}