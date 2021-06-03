@extends('custom-layouts.app')
@section('header','Lihat Perhitungan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h6 class="mt-0">Keterangan</h6>
                        <hr>
                        <table>
                            <tr>
                                <td>Jumlah Cluster</td>
                                <td>: </td>
                                <td>{{$hasil->hasil_jumlah_cluster}}</td>
                            </tr>
                            <tr>
                                <td>Maksimum Iterasi</td>
                                <td>: </td>
                                <td>{{$hasil->hasil_iterasi}}</td>
                            </tr>
                            <tr>
                                <td>Error Terkecil</td>
                                <td>: </td>
                                <td>{{number_format(abs($hasil->hasil_error_terkecil), 6, '.', '')}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h6 class="mt-0">Hasil Cluster</h6>
                        <hr>
                        <table class="table table-striped table-bordered one-configuration">
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Hasil Cluster</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $hasilCluster = json_decode($hasil->hasil_cluster)
                            @endphp
                            @foreach($hasilCluster as $key=>$value)
                                <tr>
                                    <td>C{{str_pad($loop->iteration, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$value}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Kode</th>
                                <th>Hasil Cluster</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h6 class="mt-0">Fungsi Objektif dan Nilai Error</h6>
                        <hr>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                            <tr>
                                <th>Iterasi</th>
                                <th>Fungsi Objektif</th>
                                <th>Error</th>
                            </tr>
                            </thead>
                            @php
                                $hasilFungsiObjektif = json_decode($hasil->hasil_fungsi_objektif);
                                $hasilError = json_decode($hasil->hasil_error);
                            @endphp
                            @foreach($hasilFungsiObjektif as $key=>$value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value}}</td>
                                    <td>{{number_format(abs($hasilError[$key]), 6, '.', '')}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h6 class="mt-0">Pengujian Silhouette Coefficient</h6>
                        <hr>
                        @if($uji == null)
                            <a href="{{route('pengujian',$hasil->hasil_id)}}" class="btn btn-sm btn-primary">Hitung Pengujian</a>
                        @else
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>SI</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $si = json_decode($uji->uji_si);
                                @endphp
                                @foreach($si as $key=>$value)
                                    <tr>
                                        <td>C{{str_pad($loop->iteration, 4, '0', STR_PAD_LEFT)}}</td>
                                        <td>{{$value}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SI Global</th>
                                    <th>{{$uji->uji_si_global}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
