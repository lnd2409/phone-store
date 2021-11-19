@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Cập nhật Kho hàng</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="">Kho hàng</a></li>
                <li class="breadcrumb-item active">cập nhật</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Input -->
  
    <form action="{{ route('admin.luuwarehouses') }}" method="POST">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Tên sản phẩm</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="kh_tensp" value=" {{ $khohang->khohang_tensanpham }} " class="form-control" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Số lượng nhập</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="{{$khohang->khohang_soluongnhap}}" name="kh_sln" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <h2 class="card-inside-title">Số lượng xuất</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="{{$khohang->khohang_soluongxuat}}" name="kh_slx" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Nhà cung cấp</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="ncc_id" id="" class="form-control">
                                           @foreach ($ncc as $item)
                                           @if ($khohang->ncc_id == $item->ncc_id)
                                                <option value=" {{$item->ncc_id}}" selected>{{$item->ncc_ten}}</option>
                                           @endif
                                               <option value=" {{$item->ncc_id}} ">{{$item->ncc_ten}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$khohang->khohang_id}}" name="kh_id">

                        <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Thêm</button>
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
