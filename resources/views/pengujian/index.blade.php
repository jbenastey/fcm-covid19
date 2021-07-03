@extends('custom-layouts.app')
@section('header','Hasil Pengujian')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                    <canvas id="fcm-chart" width="1000" height="300"></canvas>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah Cluster</th>
                                    <th>Maksimum Iterasi</th>
                                    <th>Error Terkecil</th>
                                    <th>SI Global</th>
                                    <th><i class="mdi mdi-settings"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($uji as $key => $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->hasil_jumlah_cluster}}</td>
                                        <td>{{$value->hasil_iterasi}}</td>
                                        <td>{{number_format(abs($value->hasil_error_terkecil), 6, '.', '')}}</td>
                                        <td>{{number_format(abs($value->uji_si_global), 6, '.', '')}}</td>
                                        <td>
                                            <a href="{{route('perhitungan.show',$value->hasil_id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
