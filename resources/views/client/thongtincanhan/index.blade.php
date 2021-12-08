@extends('client.template.master')
@section('content')

    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Tìm kiếm</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
 <div class="container">
          

                <!-- End Accordion -->
                <form class="js-validate" novalidate="novalidate" method="POST" action="{{ route('client.updateinfor') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 order-lg-1">
                            <div class="pb-7 mb-7">
                                <!-- Title -->
                                <div class="border-bottom border-color-1 mb-5">
                                   @if(Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                    @endif
                                </div>
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title mb-0 pb-2 font-size-25">Thông tin cá nhân</h3>
                                </div>
                                <!-- End Title -->

                                <!-- Billing Form -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Họ tên
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" value="{{$khachhang->kh_ten}}" class="form-control" name="kh_ten"  placeholder="Jack" aria-label="Jack" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                      <div class="col-md-4">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Email
                                            </label>
                                            <input type="email" name="kh_email" value="{{$khachhang->kh_email}}" class="form-control" placeholder="YC7B 3UT" aria-label="YC7B 3UT" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>
                               
                                    <div class="w-100"></div>

                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                               Số điện thoại
                                            </label>
                                            <input type="text" value="{{$khachhang->kh_sdt}}" class="form-control" name="kh_sdt" placeholder="Company Name" aria-label="Company Name" data-msg="Please enter a company name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                     <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Giới tính
                                            </label>
                                            <select class="form-control" name="kh_gioitinh" id="">
                                             @if ($khachhang->kh_gioitinh == "Nam")
                                                 <option value=" {{$khachhang->kh_gioitinh}} " selected>{{$khachhang->kh_gioitinh}}</option>
                                             @elseif($khachhang->kh_gioitinh == "Nữ")
                                                 <option value=" {{$khachhang->kh_gioitinh}} " selected>{{$khachhang->kh_gioitinh}}</option>
                                             @endif
                                             <option value="" disabled>--giới tính--</option>
                                             <option value="Nam" >Nam</option>
                                             <option value="Nữ" >Nữ</option>
                                            </select>
                                          </div>
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Địa chỉ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="kh_diachi" value="{{$khachhang->kh_diachi}}" class="form-control" name="streetAddress" placeholder="470 Lucy Forks" aria-label="470 Lucy Forks" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                    <input type="hidden" name="kh_id" value=" {{$khachhang->kh_id}} ">

                                  
                                    <div class="col-md-4">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                           <button type="submit" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Cập nhật thông tin</button>
                                        </div>
                                        <!-- End Input -->
                                    </div>

                            

                                    <div class="w-100"></div>

                                  
                                   

                                    <div class="w-100"></div>
                                </div>
                                <!-- End Billing Form -->

                              
                              
                            </div>
                        </div>
                    </div>
                </form>
            </div>
  
@endsection
