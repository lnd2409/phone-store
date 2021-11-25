@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Cập nhật </h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="">Loại khuyến mãi</a></li>
                <li class="breadcrumb-item active">cập nhật</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
   <!-- Input -->
    <form action="{{ route('admin.updatetypepromotion', ['id'=>$loaiKM->lkm_id]) }}" method="POST">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Tên KM</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lkm_ten" class="form-control" required  value="{{$loaiKM->lkm_ten}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Ngày bắt đầu</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="{{date('Y-m-d h:i:s',strtotime($loaiKM->lkm_ngaybd))}}" disabled class="form-control" />
                                        <input type="datetime-local" value="{{$loaiKM->lkm_ngaybd}}" name="lkm_ngaybd" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <h2 class="card-inside-title">Ngày kết thúc</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" value="{{date('Y-m-d h:i:s',strtotime($loaiKM->lkm_ngaykt))}}" disabled class="form-control" />
                                        <input type="datetime-local" value="{{$loaiKM->lkm_ngaykt}}" name="lkm_ngaykt" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="card-inside-title">Số lượng KM</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="{{$loaiKM->lkm_soluong}}" name="lkm_soluong" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="card-inside-title">giá trị KM</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="{{$loaiKM->lkm_giatri}}" name="lkm_giatri" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="card-inside-title">Mô tả</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                       <textarea name="lkm_mota" value="{{$loaiKM->lkm_mota}}" id="" class="form-control" style="border: 1px solid black" cols="20" rows="10">{{$loaiKM->lkm_mota}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                     

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
