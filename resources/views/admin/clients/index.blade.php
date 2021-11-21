@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách khách hàng</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">khách hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kh as $item)
                            <tr>
                                <td>{{ $item->kh_ten }}</td>
                                <td>{{ $item->kh_sdt }}</td>
                                <td>{{ $item->kh_email }}</td>
                                <td>{{ $item->kh_diachi }}</td>
                                <td>{{ $item->kh_gioitinh }}</td>
                                <td>{{ $item->kh_trangthai==0?'Vô hiệu':'Đang hoạt động' }}</td>
                                
                                <td>
                                    <form action="{{route('admin.clients.restore',$item)}}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn  btn-raised btn-warning waves-effect">Khôi phục</button>
                                    </form>
                                    <form action="{{route('admin.clients.destroy',$item)}}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn  btn-raised btn-danger waves-effect">Vô hiệu</button>
                                    </form>
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
