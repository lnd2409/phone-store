@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Loại khuyến mãi</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Loại khuyến mãi</li>
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
                        <a href="{{ route('admin.gettypepromotion') }}" class="btn btn-raised btn-primary waves-effect">Thêm</a>
                    </h2>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Số lượng</th>
                                <th>Giá trị</th>
                                <th>Quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loaiKM as $item)
                            <tr>
                                <td>{{ $item->lkm_ten }}</td>
                                <td>{{ date('Y-m-d h:i:s',strtotime($item->lkm_ngaybd)) }}</td>
                                <td>{{date('Y-m-d h:i:s',strtotime($item->lkm_ngaykt)) }}</td>
                                <td>{{ $item->lkm_soluong }}</td>
                                <td>{{ number_format($item->lkm_giatri) }}</td>
                               
                                <td>
                                    <a href="{{route('admin.getupdatetypepromotion',$item->lkm_id)}}"
                                        class="btn  btn-raised btn-warning waves-effect">Sửa</a>
                                    <a href="{{route('admin.destroypromotion',$item->lkm_id)}}"
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
