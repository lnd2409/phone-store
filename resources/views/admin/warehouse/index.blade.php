@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách Kho hàng</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Kho hàng</li>
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
                        <a href="{{ route('admin.getwarehouses') }}" class="btn btn-raised btn-primary waves-effect">Thêm</a>
                    </h2>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng nhập</th>
                                <th>Số lượng xuất</th>
                                <th>Nhà cung cấp</th>
                                <th>Quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khohang as $item)
                            <tr>
                                <td>{{ $item->khohang_tensanpham }}</td>
                                <td>{{ $item->khohang_soluongnhap }}</td>
                                <td>{{ $item->khohang_soluongxuat }}</td>
                                <td>{{ $item->ncc_ten }}</td>
                               
                                <td>
                                    <a href="{{route('admin.updatewarehouses',$item->khohang_id)}}"
                                        class="btn  btn-raised btn-warning waves-effect">Sửa</a>
                                    <a href="{{route('admin.destroywarehouses',$item->khohang_id)}}"
                                        class="btn  btn-raised btn-danger waves-effect">Xóa</a>
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
