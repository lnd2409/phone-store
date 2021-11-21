@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách danh mục</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh mục</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a type="button" href="{{ route('admin.cat.create', ['id'=> 0, 'action' => 'add']) }}" class="btn btn-raised btn-primary waves-effect">Thêm danh mục</a>
                    </h2>
                </div>
                @include('admin.alert')
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Danh mục</th>
                                <th>Tên không dấu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->tl_ten }}</td>
                                <td>{{ $item->tl_tenkhongdau }}</td>
                                <td>
                                    <a href="{{ route('admin.cat.create', ['id'=> $item->tl_id, 'action' => 'edit']) }}" class="btn  btn-raised btn-warning waves-effect">Sửa</a>
                                    <a href="{{ route('admin.cat.create', ['id'=> $item->tl_id, 'action' => 'del']) }}" class="btn  btn-raised btn-danger waves-effect">Xóa</a>
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
@endsection
