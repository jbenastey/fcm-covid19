@extends('custom-layouts.app')

@section('content')
    <div class="dt-content">


        <!-- Grid -->
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-12">


                <!-- Card -->
                <div class="card">

                    <!-- Entry Header -->
                    <div class="card-header">
                        <h3 class="card-title">Data </h3>
                    </div>

                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Tables -->
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered table-hover zero-configuration">
                                    <a href="{{url('data/create')}}" class="btn btn-sm btn-primary ml-1 float-right"><i class="icon icon-plus"></i> Tambah Data</a>
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jumlah Kriteria</th>
                                        <th class="text-center"><i class="icon icon-settings"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$value->data_jumlah_kriteria}}</td>
                                            <td>
                                                <a href="{{route('data.show',[$value->data_id])}}" class="btn btn-sm btn-outline-primary"><i class="ft-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /tables -->

                        </div>
                    </div>

                    <!-- /card body -->

                </div>
                <!-- /card -->

            </div>
            <!-- /grid item -->

        </div>
        <!-- /grid -->

    </div>
@endsection
