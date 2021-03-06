@extends('custom-layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Dataset
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{route('load_dataset')}}" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> Load Dataset</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>x1</th>
                                    <th>x2</th>
                                    <th>x3</th>
                                    <th>x4</th>
                                    <th>x5</th>
                                    <th>x6</th>
                                    <th>x7</th>
                                    <th>x8</th>
                                    <th>x9</th>
                                    <th>x10</th>
                                    <th>x11</th>
                                    <th>x12</th>
                                    <th>x13</th>
                                    <th>x14</th>
                                    <th>x15</th>
                                    <th>x16</th>
                                    <th>x17</th>
                                    <th>x18</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataset as $key => $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->dataset_x1}}</td>
                                        <td>{{$value->dataset_x2}}</td>
                                        <td>{{$value->dataset_x3}}</td>
                                        <td>{{$value->dataset_x4}}</td>
                                        <td>{{$value->dataset_x5}}</td>
                                        <td>{{$value->dataset_x6}}</td>
                                        <td>{{$value->dataset_x7}}</td>
                                        <td>{{$value->dataset_x8}}</td>
                                        <td>{{$value->dataset_x9}}</td>
                                        <td>{{$value->dataset_x10}}</td>
                                        <td>{{$value->dataset_x11}}</td>
                                        <td>{{$value->dataset_x12}}</td>
                                        <td>{{$value->dataset_x13}}</td>
                                        <td>{{$value->dataset_x14}}</td>
                                        <td>{{$value->dataset_x15}}</td>
                                        <td>{{$value->dataset_x16}}</td>
                                        <td>{{$value->dataset_x17}}</td>
                                        <td>{{$value->dataset_x18}}</td>
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
