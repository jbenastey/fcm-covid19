@extends('custom-layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Data
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <div class="btn-group dropdown mr-1 mb-1">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#import"><i class="fa fa-file-excel-o"></i> Import Excel</button>
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn-sm" href="javascript:;">Tambah Data</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item btn-sm" href="javascript:;">Hapus Semua Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-responsive table-striped table-bordered zero-configuration">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Penghasilan</th>
                                <th>Tanggungan</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>No Kategori</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->data_nama}}</td>
                                    <td>{{$value->data_usia}}</td>
                                    <td>{{$value->data_penghasilan}}</td>
                                    <td>{{$value->data_tanggungan}}</td>
                                    <td>{{$value->data_nik}}</td>
                                    <td>{{$value->data_pekerjaan}}</td>
                                    <td>{{$value->data_kategori}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Import Excel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <form action="{{route('importExcel')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <fieldset class="form-group">
                            <a href="{{url('/excel/format/data.xlsx')}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh Format Excel</a>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="basicInput">Import</label><br>
                            <input type="file" name="import_file" required>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

