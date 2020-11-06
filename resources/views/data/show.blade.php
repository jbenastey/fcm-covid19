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
                        <h3 class="card-title">Dataset</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Tables -->
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered table-hover zero-configuration">
                                    <a href="{{route('dataset.create',$data->data_id)}}" class="btn btn-sm btn-primary ml-1 float-right"><i class="icon icon-plus"></i> Tambah Data</a>
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        @for($i = 1; $i <= $data->data_jumlah_kriteria;$i++)
                                            <th>Kriteria {{$i}}</th>
                                        @endfor
                                        <th class="text-center"><i class="icon icon-settings"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataset as $value)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            @php
                                            $kriteria = json_decode($value->dataset_kriteria);
                                            @endphp
                                            @foreach($kriteria as $value2)
                                                <td>{{$value2}}</td>
                                            @endforeach
                                            <td>
                                                <a href="{{route('dataset.edit',[$value->dataset_id])}}" class="btn btn-sm btn-outline-success"><i class="ft-edit"></i></a>
                                                <a href="" class="btn btn-sm btn-outline-danger"><i class="ft-trash"></i></a>
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
