@extends('custom-layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Perhitungan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{route('perhitungan.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Inisialisasi</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah Cluster</th>
                                    <th>Maksimum Iterasi</th>
                                    <th>Error Terkecil</th>
                                    <th><i class="fa fa-gear"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
