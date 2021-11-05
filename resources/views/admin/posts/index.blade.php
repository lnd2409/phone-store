@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách tin</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Tin tức</li>
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
                        <a href="{{route('admin.posts.create')}}" class="btn btn-raised btn-primary waves-effect">Thêm
                            tin tức</a>
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
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th>Username</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tintuc as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset($item->tt_hinhanh) ??''}}" alt="{{ $item->tt_tieude }}"
                                        class="img" style="width: 50px;height: 50px;"></td>
                                <td>{{ $item->tt_tieude }}</td>
                                <td>{{ $item->tt_trangthai==0?'Vô hiệu':'Đang hoạt động' }}</td>
                                <td>{{ $item->quantri->qt_ten }}</td>
                                <td>
                                    <form action="{{route('admin.posts.destroy',$item)}}" method="post">
                                        @csrf
                                        <a href="{{route('admin.posts.detail',$item)}}"
                                            class="btn  btn-raised btn-info waves-effect">Chi tiết</a>
                                        <a href="{{route('admin.posts.edit',$item)}}"
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
