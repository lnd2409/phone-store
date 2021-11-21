@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Quản lí bình luận</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Bình luận</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    {{-- <h2>
                        <a href="{{route('admin.staffs.create')}}" class="btn btn-raised btn-primary waves-effect">Thêm
                            nhân viên</a>
                    </h2> --}}
                    {{-- <ul class="header-dropdown">
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phầm</th>
                                <th>Nội dung</th>
                                <th>Báo cáo vi phạm</th>
                                <th style="width:250px !important">Quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($binhluan as $item)
                            <tr>
                                <td>{{ $item->kh_ten }}</td>
                                <td>{{ $item->sp_ten }}</td>
                                <td>{{ $item->ctbl_noidung }}</td> 
                                <td>
                                    @if ($item->bl_baocao ==0)
                                        -
                                    @else
                                        <span style="color: red">Đã bị báo cáo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('client.product-detail',['id'=>$item->sp_id]) }}"
                                        class="btn  btn-raised btn-success waves-effect">xem trang chủ</a>
                                    <a href="{{ route('admin.getdetailreview',['id'=>$item->ctbl_id]) }}"
                                        class="btn  btn-raised btn-warning waves-effect">xem chi tiết</a>
                                    <a  href="{{ route('admin.destroycomment', ['id'=>$item->bl_id]) }}"
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
