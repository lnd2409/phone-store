@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thêm khuyễn mãi</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="">Khuyến mãi</a></li>
                <li class="breadcrumb-item active">Thêm</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Input -->
    <form action="{{ route('admin.submitpromotion') }}" method="POST">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Tên Loại KM</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                         <select class="form-control" name="lkm_id" id="">
                                          @foreach ($loaiKM as $item)
                                              <option value=" {{$item->lkm_id}} ">{{$item->lkm_ten}}</option>
                                          @endforeach
                                         </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Mã code</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="km_macode" class="form-control" />
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
