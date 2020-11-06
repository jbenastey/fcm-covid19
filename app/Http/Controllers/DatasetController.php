<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['data'] = DB::table('data')
                    ->where('data_id',$id)
                    ->first();
        return view('data.dataset.create',$data);
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
        $data = DB::table('data')
            ->where('data_id',$id)
            ->first();
        $simpan = [];
        for($i = 1; $i <= $data->data_jumlah_kriteria;$i++) {
            $simpan['nilai_kriteria_'.$i] = $request->input('nilai_kriteria_'.$id);
        }
        DB::table('dataset')
            ->insert([
                'dataset_data_id' => $id,
                'dataset_kriteria' => json_encode($simpan)
            ]);
        return redirect('data/'.$id);
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
