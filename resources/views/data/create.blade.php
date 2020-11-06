@extends('custom-layouts.app')

@section('content')
    <div class="dt-content">


        <!-- Grid -->
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-12">

                <!-- Card -->
                <div class="card">

                    <!-- Entry Heading -->
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- /entry heading -->

                    <!-- Card Body -->
                    <div class="card-title">
                        <div class="card-body">

                            <form method="post" action="{{route('data.store')}}">
                            @csrf
                            <!-- Form Group -->
                                <div class="form-group form-row">
                                    <label class="col-xl-2 col-form-label text-sm-right" for="email-2">Jumlah Kriteria</label>

                                    <div class="col-xl-8">
                                        <input type="number" class="form-control" id="email-2"
                                               aria-describedby="emailHelp2"
                                               placeholder="Jumlah Kriteria" name="jumlah_kriteria" required>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-xl-2 col-form-label text-sm-right" for="email-2"></label>

                                    <div class="col-xl-8">
                                        <button type="button" onclick="window.history.back()" class="btn btn-sm btn-outline-primary text-uppercase">Kembali</button>
                                        <button type="submit" class="btn btn-sm btn-primary text-uppercase">Simpan</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
