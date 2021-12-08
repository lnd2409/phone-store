@extends('client.template.master')
@push('css')
    <style>
        .stickcompare.stickcompare_new {
            max-width: 1178px;
            top: unset;
            bottom: 0;
            border-radius: 0;
            border-top: 1px solid #e5e5e5;
        }

        .stickcompare {
            display: none;
            width: 100%;
            height: 20%;
            max-width: 400px;
            margin: auto;
            position: fixed;
            left: 0;
            right: 0;
            border-radius: 10px;
            top: 10%;
            z-index: 100;
            background: #fff;
            box-shadow: 0 -2px 10px rgb(0 0 0 / 12%);
        }

        stickcompare.stickcompare_new label.error {
            top: 0;
            z-index: 9;
            background: #000000e3;
            color: #fff !important;
            padding: 10px;
            width: 90%;
            height: max-content;
            margin: 0 5%;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            max-width: 400px;
            display: none;
            margin: auto;
        }

        label.error {
            color: #d0021c;
            font-size: 13px;
            line-height: 21px;
            display: block;
            margin: 10px 12px 0;
            opacity: .1;
            text-align: center;
        }

        .error {
            color: #dd4b39 !important;
        }

        .stickcompare.stickcompare_new a.clearall {
            position: absolute;
            right: 0;
            top: -39px;
            padding: 10px 30px 10px 10px;
            border-radius: 8px 8px 0 0;
            color: #000;
            background: #fff;
            box-shadow: 0 -2px 10px #0000001f;
        }

        .stickcompare.stickcompare_new a.clearall i {
            background: unset;
            left: unset;
            right: 25px;
            top: 19px;
            bottom: 0;
            margin: auto;
            width: unset !important;
            height: unset !important;
            position: absolute;
        }

        .stickcompare .iconcate-closess {
            background-position: -40px -75px;
            height: 12px !important;
            width: 12px !important;
        }

        .stickcompare.stickcompare_new ul.listcompare {
            display: inline-flex;
            width: calc(100% - 25%);
            border: unset;
        }

        ul.listcompare {
            display: grid;
            grid-auto-rows: minmax(min-content, max-content);
            grid-template-columns: repeat(1, minmax(0, 1fr));
            overflow: hidden;
            width: 100%;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
        }

        .stickcompare.stickcompare_new .listcompare li {
            width: 100%;
            border-right: 1px solid #e0e0e0;
            padding-top: 0;
        }

        .listcompare li {
            overflow: visible;
            position: relative;
            padding-top: 7px;
            width: 80%;
            display: block;
            margin: 0 auto;
        }

        .stickcompare.stickcompare_new .listcompare a {
            justify-content: center;
            flex-flow: column;
            align-items: center;
            width: unset;
            cursor: pointer;
        }

        .listcompare a {
            display: flex;
            overflow: hidden;
            padding: 10px 0 5px;
            align-content: center;
        }

        .stickcompare.stickcompare_new .listcompare li img {
            width: 60px;
        }

        .listcompare li img {
            width: 70px;
            height: auto;
            max-height: 80px;
            margin: 5px;
            object-fit: contain;
        }

        .stickcompare.stickcompare_new .listcompare h3 {
            margin: 5px;
            text-align: center;
        }

        .listcompare h3 {
            overflow: hidden;
            line-height: 1.6em;
            color: #333;
            font-weight: normal;
            font-size: 13px;
            height: 33px;
            margin: 5px 0 5px 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            line-height: 1.3em;
            text-align: center;
        }

        .stickcompare.stickcompare_new .closecompare a.doss {
            border-radius: 0;
            margin: 0 auto 10px;
        }

        .closecompare a.doss {
            background: #2f80ed;
            color: #fff;
            font-size: 14px;
        }

        .closecompare a {
            display: block;
            text-align: center;
            margin: 10px auto;
            width: 50%;
            padding: 12px 0;
            border-radius: 10px;
            font-size: 14px;
            color: #2f80ed;
        }

        .stickcompare.stickcompare_new .closecompare a.txtremoveall {
            margin: auto;
            width: unset;
            padding: 0;
        }

        .closecompare a {
            display: block;
            text-align: center;
            margin: 10px auto;
            width: 50%;
            padding: 12px 0;
            border-radius: 10px;
            font-size: 14px;
            color: #2f80ed;
        }

        .stickcompare.stickcompare_new .closecompare {
            display: inline-block;
            vertical-align: middle;
            width: 25%;
            margin-top: 21px;
        }

        .closecompare {
            overflow: hidden;
            position: absolute;
        }

        .stickcompare.stickcompare_new ul.listcompare {
            display: inline-flex;
            width: calc(100% - 25%);
            border: unset;
        }

        ul.listcompare {
            display: grid;
            grid-auto-rows: minmax(min-content, max-content);
            grid-template-columns: repeat(1, minmax(0, 1fr));
            overflow: hidden;
            width: 100%;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
        }

        .stickcompare.stickcompare_new .listcompare span {
            right: 10 px;
            top: 10 px;
        }

        .listcompare span {
            position: absolute;
            top: 20 px;
            right: -20 px;
            width: 14 px;
            height: 20 px;
            cursor: pointer;
        }

        .stickcompare .iconcate-closess {
            background-position: -40 px -75 px;
            height: 12 px !important;
            width: 12 px !important;
        }

        .hide {
            display: none !important;
        }

    </style>
@endpush
@section('content')
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="{{ route('client.get-product-by-cat', ['idCate' => $sanPham->theloai->tl_tenkhongdau]) }}">{{ $sanPham->theloai->tl_ten }}</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            {{ $sanPham->sp_ten }}</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-xl-14 mb-6">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                        data-nav-for="#sliderSyncingThumb">
                        @foreach ($sanPham->hinhanhsanphams as $item)
                            <div class="js-slide">
                                <img class="img-fluid" src="{{ asset($item->hasp_duongdan) }}"
                                    alt="Image Description">
                            </div>
                        @endforeach
                    </div>

                    <div id="sliderSyncingThumb"
                        class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                        data-infinite="true" data-slides-show="5" data-is-thumbs="true" data-nav-for="#sliderSyncingNav">
                        @foreach ($sanPham->hinhanhsanphams as $item)
                            <div class="js-slide" style="cursor: pointer;">
                                <img class="img-fluid" src="{{ asset($item->hasp_duongdan) }}"
                                    alt="Image Description">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7 mb-md-6 mb-lg-0">

                    <div class="mb-2">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <a href="#"
                                class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $sanPham->theloai->tl_ten }}</a>
                            <h2 class="font-size-25 text-lh-1dot2">{{ $sanPham->sp_ten }}</h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="text-warning mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>
                                    <span class="text-secondary font-size-13">(3 khách hàng đã đánh giá)</span>
                                </a>
                            </div>
                        </div>
                        <div class="flex-horizontal-center flex-wrap mb-4">
                            <a href="#" class="text-gray-6 font-size-13 ml-2 btn-compare" data-id="{{ $sanPham->sp_id }}"
                                data-img="{{asset($sanPham->hinhdaidien->hasp_duongdan??'')}}"
                                data-name="{{ $sanPham->sp_ten }}" data-tl="{{ $sanPham->tl_id }}"><i
                                    class="ec ec-compare mr-1 font-size-15"></i>
                                <span id="span-compare">
                                    So sánh
                                </span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <ul class="font-size-14 pl-3 ml-1 text-gray-110">

                            </ul>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                        </p>
                        <p><strong>Mã sản phẩm</strong>: {{ $sanPham->sp_id }}</p>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline">
                                <ins class="font-size-36 text-decoration-none"> {{ number_format($sanPham->sp_gia) }}
                                    VNĐ</ins>
                                {{-- <del class="font-size-20 ml-2 text-gray-6">$2,299.00</del> --}}
                            </div>
                        </div>
                        <form action="{{ route('client.addtocart', ['id' => $sanPham->sp_id]) }}" method="post">
                            @csrf
                            <div class="d-md-flex align-items-end mb-3">
                                <div class="max-width-150 mb-4 mb-md-0">
                                    <h6 class="font-size-14">Số lượng</h6>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col">
                                                <input id="js-result-{{ $sanPham->sp_id }}"
                                                    class="js-result  form-control h-auto border-0 rounded p-0 shadow-none"
                                                    name="sp_soluong" type="text" value="1">
                                            </div>
                                            <div class="col-auto pr-1">
                                                <a data-id={{ $sanPham->sp_id }}
                                                    class="js-minus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                    href="javascript:;">
                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                </a>
                                                <a data-id={{ $sanPham->sp_id }}
                                                    class="js-plus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                    href="javascript:;">
                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Quantity -->
                                </div>
                                <div class="ml-md-3">
                                    <button type="submit" class="btn px-5 btn-primary-dark transition-3d-hover"><i
                                            class="ec ec-add-to-cart mr-2 font-size-20"></i>Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- <h1>{{ dd(Session::get('arrProduct')) }}</h1> --}}
        <!-- End Single Product Body -->
        <!-- Single Product Tab -->
        <div class="mb-8">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                    id="pills-tab-8" role="tablist">
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link active" id="Jpills-two-example1-tab" data-toggle="pill"
                            href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1"
                            aria-selected="true">Mô tả</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill"
                            href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1"
                            aria-selected="false">Thông số chi tiết</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill"
                            href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1"
                            aria-selected="false">Bình luận</a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="Jpills-two-example1" role="tabpanel"
                        aria-labelledby="Jpills-two-example1-tab">
                        <div class="row">
                            {!! $sanPham->sp_mota !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                        aria-labelledby="Jpills-three-example1-tab">
                        <div class="mx-md-5 pt-1">
                            <div class="table-responsive mb-4">
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach ($sanPham->sanphamThuoctinhs as $item)
                                        <tr>
                                            <th class="px-4 px-xl-5 border-top-0">{{ $sanPham->getNameAttr($item->tt_id) }}</th>
                                            <td class="border-top-0">{{ $sanPham->chitietthuoctinh($item->tt_id) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel"
                        aria-labelledby="Jpills-four-example1-tab">
                        <div class="row mb-8">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h3 class="font-size-18 mb-6">Đã có 3 đánh giá</h3>
                                    <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                                    <div class="text-lh-1">overall</div>
                                </div>

                                <!-- Ratings -->
                                <ul class="list-unstyled">
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">205</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 53%;"
                                                        aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">55</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%;"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">23</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-muted">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 1%;"
                                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">4</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Ratings -->
                            </div>
                            <div class="col-md-6">
                                <!-- Form -->
                                <form class="js-validate" novalidate="novalidate" action="{{ route('client.submitreview') }}" method="POST">
                                    @csrf
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            {{-- <label for="descriptionTextarea" class="form-label">Your Review</label> --}}
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea class="form-control" rows="3" id="descriptionTextarea" name="bl_noidung"
                                                data-msg="Please enter your message." data-error-class="u-has-error"
                                                data-success-class="u-has-success"></textarea>
                                        </div>
                                        <input type="hidden" name="kh_id" value=" {{Auth::guard('khachhang')->id()}}">
                                        <input type="hidden" name="sp_id" value=" {{$sanPham->sp_id}} ">
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-4 offset-lg-3 col-auto">
                                           @if (Auth::guard('khachhang')->check())
                                                <button type="submit"
                                                class="btn btn-primary-dark btn-wide transition-3d-hover">Gửi</button>
                                           @else
                                              <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link target-of-invoker-has-unfolds" aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                        <i class="ec ec-user mr-1"></i> Đăng nhập <span class="text-primary-darken-5">or&nbsp;</span> Đăng ký
                                    </a>
                                           @endif
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                        <!-- Review -->
                        @foreach ($binhluan as $item)
                            @if ($item->ctbl_idrep ==NULL)
                                <div class="border-bottom border-color-1 pb-4 mb-4">
                            <!-- Review Rating -->
                            {{-- <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                            </div> --}}
                            <!-- End Review Rating -->


                            <!-- Reviewer -->
                            <div class="">
                                <strong> <span @if ($item->bl_baocao==1)
                                    style="color:red" title="Bình luận này đã bị báo cáo!"
                                @endif  >{{$item->kh_ten}} </span></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                @if ($item->kh_id != Auth::guard('khachhang')->id())
                                     {{-- <a href="{{ route('client.reportcomment', ['id'=>$item->bl_id]) }}" title="Báo cáo vi phạm" class="font-size-13 text-gray-23"><i class="fa fa-flag" aria-hidden="true"></i></a> --}}
                                     <a href="#" data-id=" {{$item->bl_id}} " class="showReport" data-toggle="modal" data-target="#exampleModalLong" title="Báo cáo vi phạm" class="font-size-13 text-gray-23"><i class="fa fa-flag" aria-hidden="true"></i></a>
                                @else
                                    <a href="{{ route('client.destroycomment', ['id'=>$item->bl_id]) }}" title="Xóa bình luận" class="font-size-13 text-gray-23"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                @endif
                            </div>
                              <p class="text-gray-90">
                                {{$item->ctbl_noidung}}
                                @foreach ($binhluan as $item1)
                               @if ($item->ctbl_id == $item1->ctbl_idrep)
                                    <div style="margin-left: 50px">
                                       <span> <strong>Cửa hàng:</strong></span> {{$item1->ctbl_noidung}}
                                    </div>
                               @endif
                           @endforeach
                            </p>
                            <!-- End Reviewer -->

                        </div>
                        <!-- End Review -->
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
        <!-- End Single Product Tab -->
        <!-- Related products -->
        <div class="mb-6">
            <div
                class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                <h3 class="section-title mb-0 pb-2 font-size-22">Sản phẩm liên quan</h3>
            </div>
            <ul class="row list-unstyled products-group no-gutters">
                @foreach ($sanPhamLienQuan as $item)
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">{{ $item->theloai->tl_ten }}</a></div>
                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">{{ $item->sp_ten }}</a></h5>
                                <div class="mb-2">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid"
                                            src="{{ asset($item->hasp_duongdan) }}"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">{{ number_format($item->sp_gia) }}</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> So sánh</a>
                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <!-- End Related products -->
        <!-- compare-->
        <div class="stickcompare stickcompare_new cp-desktop spaceInDown" style="display: block;" id="stickcompare">
            <label class="error" style="display: none; opacity: 1;">Bạn đã chọn sản phẩm này rồi, vui lòng chọn
                sản phẩm
                khác!</label>
            <a href="#" onclick="clearCompare();" class="clearall">
                <i class="iconcate-closess"></i>Thu gọn </a>
            <ul class="listcompare" data-catename="điện thoại">
                <li>
                    <a href="javascript:void(0)">
                        <img src="" alt="" id="compare_img1">
                        <h3 id="compare_name1"></h3>
                    </a>
                    <span class="remove-ic-compare" onclick="removeCompare(1);">
                        <i class="iconcate-closess"></i>
                    </span>
                </li>
                <li class="formsg">
                    <a href="javascript:void(0)">
                        <img src="" alt="" id="compare_img2">
                        <h3 id="compare_name2"></h3>
                    </a>
                    <span class="remove-ic-compare" onclick="removeCompare(2);">
                        <i class="iconcate-closess"></i>
                    </span>
                </li>
            </ul>
            <div class="closecompare">
                <a href="#" class="gotoview-compare doss prevent">So sánh ngay</a>
                <a href="javascript:;" onclick="RemoveAllIdCompare()" class="txtremoveall">Xóa tất cả sản phẩm</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Báo Cáo bình luận</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('client.reportcomment') }}" method="post">
                @csrf
                   <div class="row">
                <div class="col-md-6">
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="report[]" id="" value="Ngôn từ đã kích" class="">
                        <span class="custom-control-indicator">Ngôn từ đã kích</span>
                    </label>
                </div>
                <div class="col-md-6">
                     <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="report[]" id="" value="Quảng cáo trá hình" class="">
                        <span class="custom-control-indicator">Quảng cáo trá hình</span>
                    </label>
                </div>
                <div class="col-md-6">
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="report[]" id="" value="Nội dung 18+" class="">
                        <span class="custom-control-indicator">Nội dung 18+</span>
                    </label>
                </div>
                <div class="col-md-6">
                     <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="report[]" id="" value="Tài khoản giả mạo" class="">
                        <span class="custom-control-indicator">Tài khoản giả mạo</span>
                    </label>
                </div>
                <div class="col-md-12">
                       <textarea class="form-control" name="report_des" id="" cols="10" rows="5">Khác:</textarea>
                    </label>
                </div>
                <input type="hidden" name="bl_id" id="blID">
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Báo cáo</button>
            </div>
            </form>
        </div>
      
    </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            reloadCompare();

            function reloadCompare() {
                let id = $(".btn-compare").attr('data-id');
                document.getElementById("span-compare").textContent = "So sánh";
                checkCompare();
                for (let index = 1; index < 3; index++) {
                    $("#compare_img" + index).attr("src", sessionStorage.getItem('compare_img' + index));
                    $("#compare_name" + index).text(sessionStorage.getItem('compare_name' + index));
                    if (id === sessionStorage.getItem("compare_id" + index)) {
                        $(".btn-compare").addClass("btn-remove-compare");
                        $(".btn-compare").removeClass("btn-compare");
                        document.getElementById("span-compare").textContent = "Xoá";
                    }
                }
            }
            $('.btn-compare').click(function(e) {
                let id = $(this).attr('data-id');
                let img = $(this).attr('data-img');
                let name = $(this).attr('data-name');
                let tl = $(this).attr('data-tl');
                let num = 1;
                let exist = 0; //kiểm tra tồn tại id trong session chưa
                // không có thì lưu số 1
                console.log(id);
                console.log(img);
                console.log(name);
                console.log(tl);
                for (let index = 1; index < 3; index++) {
                    // kiểm tra đã có chưa
                    if (sessionStorage.getItem("compare_tl" + index) !== null && sessionStorage.getItem(
                            "compare_tl" +
                            index) != tl) {
                        alert("Không thể so sánh hai sản phẩm khác loại");
                        return;
                    }
                    //cùng id thì xoá ra
                    if (sessionStorage.getItem("compare_id" + index) == id) {
                        sessionStorage.removeItem("compare_id" + index);
                        sessionStorage.removeItem("compare_img" + index);
                        sessionStorage.removeItem("compare_name" + index);
                        sessionStorage.removeItem("compare_tl" + index);
                        exist = 1;
                    }
                }
                //reload lại form compare sau khi xoá
                if (exist == 1) {
                    reloadCompare();
                    return;
                }
                for (let index = 1; index < 3; index++) {
                    if (sessionStorage.getItem("compare_id" + index) === null) {
                        sessionStorage.setItem("compare_id" + index, id);
                        sessionStorage.setItem("compare_img" + index, img);
                        sessionStorage.setItem("compare_name" + index, name);
                        sessionStorage.setItem("compare_tl" + index, tl);
                        reloadCompare();
                        break;
                    }
                }
            });

            $(".btn-remove-compare").click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                for (let index = 1; index < 3; index++) {
                    if (id === sessionStorage.getItem("compare_id" + index)) {
                        $(".btn-remove-compare").addClass("btn-compare");
                        $(".btn-remove-compare").removeClass("btn-remove-compare");
                        removeItem(index);
                    }
                }
                reloadCompare();

            });


            function removeItem(index) {
                sessionStorage.removeItem("compare_id" + index);
                sessionStorage.removeItem("compare_img" + index);
                sessionStorage.removeItem("compare_name" + index);
            }

            $(".txtremoveall").click(function(e) {
                e.preventDefault();
                sessionStorage.removeItem("compare_id1");
                sessionStorage.removeItem("compare_img1");
                sessionStorage.removeItem("compare_name1");
                sessionStorage.removeItem("compare_tl1");
                sessionStorage.removeItem("compare_id2");
                sessionStorage.removeItem("compare_img2");
                sessionStorage.removeItem("compare_name2");
                sessionStorage.removeItem("compare_tl2");
                reloadCompare();

            });

            $(".gotoview-compare").click(function(e) {
                e.preventDefault();
                if (sessionStorage.getItem("compare_id1") !== null && sessionStorage.getItem(
                        "compare_id2") !== null) {
                    var url = '{{ route('client.compare', [':id1', ':id2']) }}';
                    url = url.replace(':id1', sessionStorage.getItem("compare_id1"));
                    url = url.replace(':id2', sessionStorage.getItem("compare_id2"));
                    console.log(url);
                    window.location.href = url;
                }
            });

        });

        function checkCompare() {
            if (sessionStorage.getItem("compare_id1") !== null || sessionStorage.getItem("compare_id2") !== null) {
                $(".stickcompare").height('20%');
            } else {
                $(".stickcompare").height(0);

            }
        }

        function clearCompare() {
            $(".stickcompare").height() == 0 ? $(".stickcompare").height('20%') : $(".stickcompare").height(0);
        }
    </script>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".js-plus").on('click', function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                var resultVal = $('#js-result-' + id).val();
                parseInt(resultVal, 10);
                resultVal = parseInt(resultVal) + 1;
                $('#js-result-' + id).val(resultVal);
            });
            $(".js-minus").on('click', function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                var resultVal = $('#js-result-' + id).val();
                resultVal = parseInt(resultVal, 10);
                console.log(resultVal > 0);
                if (resultVal > 0) {
                    resultVal = parseInt(resultVal) - 1;
                    $('#js-result-' + id).val(resultVal);
                } else {
                    $('#js-result-' + id).val(0);
                }

            });
        });

        $(".showReport").click(function (e) { 
            e.preventDefault();
            var id = $(this).attr('data-id');
            $("#blID").val(id);
        });
    </script>
@endpush
