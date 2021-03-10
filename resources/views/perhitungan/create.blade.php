@extends('custom-layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Inisialisasi Perhitungan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('perhitungan.store')}}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <fieldset class="form-group">
                                <label for="basicInput">Jumlah Cluster</label><br>
                                <input type="number" name="jumlah_cluster" required class="form-control">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="basicInput">Maksimum Iterasi</label><br>
                                <input type="number" name="maks_iter" required class="form-control">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="basicInput">Error Terkecil</label><br>
                                <input type="number" name="error_terkecil" required class="form-control">
                            </fieldset>
                            <button type="button" class="btn bg-light-secondary" onclick="window.history.back()">Kembali</button>
                            <button type="submit" class="btn btn-primary">Hitung</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
