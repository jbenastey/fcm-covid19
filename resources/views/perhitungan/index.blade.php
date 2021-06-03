@extends('custom-layouts.app')
@section('header','Perhitungan')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="float-right ml-2">
                                <a href="{{route('perhitungan.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Inisialisasi</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah Cluster</th>
                                    <th>Maksimum Iterasi</th>
                                    <th>Error Terkecil</th>
                                    <th><i class="mdi mdi-settings"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hasil as $key => $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->hasil_jumlah_cluster}}</td>
                                        <td>{{$value->hasil_iterasi}}</td>
                                        <td>{{number_format(abs($value->hasil_error_terkecil), 6, '.', '')}}</td>
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
