@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách nhân viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Nhân viên</li>
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
                        <a href="{{route('admin.staffs.create')}}" class="btn btn-raised btn-primary waves-effect">Thêm
                            nhân viên</a>
                    </h2>
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
                                <th>Tên nhân viên</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Trạng thái</th>
                                <th>Username</th>
                                <th>Quyền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nv as $item)
                            <tr>
                                <td>{{ $item->qt_ten }}</td>
                                <td>{{ $item->qt_sdt }}</td>
                                <td>{{ $item->qt_email }}</td>
                                <td>{{ $item->qt_diachi }}</td>
                                <td>{{ $item->qt_gioitinh }}</td>
                                <td>{{ $item->qt_active==0?'Vô hiệu':'Đang hoạt động' }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->quyen->q_ten }}</td>
                                <td>
                                    <form action="{{route('admin.staffs.destroy',$item)}}" method="post">
                                        @csrf
                                        <a href="{{route('admin.staffs.edit',$item)}}"
                                            class="btn  btn-raised btn-warning waves-effect">Sửa</a>
                                        <button type="submit"
                                            class="btn  btn-raised btn-danger waves-effect">Xóa</button>
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
