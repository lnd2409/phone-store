@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thêm nhân viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.staffs.index') }}">Nhân viên</a></li>
                <li class="breadcrumb-item active">Thêm nhân viên</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Input -->
    <form action="{{ route('admin.staffs.store') }}" method="POST">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Tên nhân viên</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="qt_ten" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Số điện thoại</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="qt_sdt" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Email</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="qt_email" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Địa chỉ</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="qt_diachi" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Giới tính</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="qt_gioitinh" id="" class="form-control">
                                            <option value="nam">Nam</option>
                                            <option value="nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Trạng thái</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="radio" name="qt_active" value="1" id="active" checked><label
                                            for="active">Active</label>
                                        <input type="radio" name="qt_active" value="0" id="inactive"><label
                                            for="inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Username</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="username" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Password</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="password" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Quyền</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        @foreach($q as $key=>$item)
                                        <input type="radio" name="q_id" value="{{$item->q_id}}" checked
                                            id="{{$key}}quyen"><label for="{{$key}}quyen">{{$item->q_ten}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Thêm nhân
                            viên</button>
                        <!-- #END# Select -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@push('script')

@endpush
@endsection
