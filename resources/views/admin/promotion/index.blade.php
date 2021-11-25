@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Khuyến mãi</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Khuyến mãi</li>
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
                        <a href="{{ route('admin.getpromotion') }}" class="btn btn-raised btn-primary waves-effect">Thêm</a>
                    </h2>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên loại khuyến mãi</th>
                                <th>KM Code</th>
                                <th>Trạng thái</th>
                                <th>Quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($KM as $item)
                            <tr>
                                <td>{{ $item->lkm_ten }}</td>
                                <td>{{ $item->km_macode }}</td>
                                <td>
                                    @if ( $item->km_trangthai ==0)
                                    <span style="color: red" >chưa áp dụng</span>
                                    @else
                                     <span style="color: green" >Đã áp dụng</span>
                                    @endif
                                </td>
                               
                                <td>
                                    <a href="{{route('admin.getupdatepromotion',$item->km_id)}}"
                                        class="btn  btn-raised btn-warning waves-effect">Sửa</a>
                                    <a href="{{route('admin.destroypromotion',$item->km_id)}}"
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
