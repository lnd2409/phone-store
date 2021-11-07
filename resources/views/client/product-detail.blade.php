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
                            href="{{ route('client.get-product-by-cat', ['idCate'=>$sanPham->theloai->tl_tenkhongdau]) }}">{{ $sanPham->theloai->tl_ten }}</a>
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
                <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2 slick-initialized slick-slider" data-infinite="true" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4" data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4" data-nav-for="#sliderSyncingThumb"><div class="js-prev d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4 slick-arrow" style=""></div>
                    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 6226px; transform: translate3d(-566px, 0px, 0px);"><div class="js-slide slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 566px;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img5.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 566px; height: auto;" tabindex="0">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img1.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide" data-slick-index="1" aria-hidden="true" style="width: 566px; height: auto;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img2.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide" data-slick-index="2" aria-hidden="true" style="width: 566px; height: auto;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img3.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide" data-slick-index="3" aria-hidden="true" style="width: 566px; height: auto;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img4.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide" data-slick-index="4" aria-hidden="true" style="width: 566px; height: auto;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img5.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 566px;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img1.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 566px;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img2.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 566px;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img3.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 566px;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img4.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 566px;" tabindex="-1">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img5.jpg" alt="Image Description">
                    </div></div></div>




                <div class="js-next d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4 slick-arrow" style=""></div></div>

                <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off slick-initialized slick-slider slick-transform-off" data-infinite="true" data-slides-show="5" data-is-thumbs="true" data-nav-for="#sliderSyncingNav">
                    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 575px; transform: translate3d(0px, 0px, 0px);"><div class="js-slide slick-slide slick-current slick-active" style="cursor: pointer; width: 107px; height: auto;" data-slick-index="0" aria-hidden="false" tabindex="0">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img1.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-active" style="cursor: pointer; width: 107px; height: auto;" data-slick-index="1" aria-hidden="false" tabindex="0">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img2.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-active" style="cursor: pointer; width: 107px; height: auto;" data-slick-index="2" aria-hidden="false" tabindex="0">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img3.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-active" style="cursor: pointer; width: 107px; height: auto;" data-slick-index="3" aria-hidden="false" tabindex="0">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img4.jpg" alt="Image Description">
                    </div><div class="js-slide slick-slide slick-active" style="cursor: pointer; width: 107px; height: auto;" data-slick-index="4" aria-hidden="false" tabindex="0">
                        <img class="img-fluid" src="{{ asset('template/client') }}/assets/img/720X660/img5.jpg" alt="Image Description">
                    </div></div></div>




                </div>
            </div>
            <div class="col-md-7 mb-md-6 mb-lg-0">
                <form action="{{ route('client.addtocart', ['id'=>$sanPham->sp_id]) }}" method="post">
                    @csrf
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
                            <div class="d-md-flex align-items-center">
                                <a href="#" class="max-width-150 ml-n2 mb-2 mb-md-0 d-block"><img class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/200X60/img1.png"
                                        alt="Image Description"></a>
                                <div class="ml-md-3 text-gray-9 font-size-14">Availability: <span
                                        class="text-green font-weight-bold">26 in stock</span></div>
                            </div>
                        </div>
                        <div class="flex-horizontal-center flex-wrap mb-4">
                            <a href="#" class="text-gray-6 font-size-13 mr-2"><i
                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            <a href="#" class="text-gray-6 font-size-13 ml-2 btn-compare"
                                data-id="{{ $sanPham->sp_id }}"
                                data-img="{{ asset('template/client') }}/assets/img/212X200/img1.jpg"
                                data-name="{{ $sanPham->sp_ten }}" data-tl="{{ $sanPham->tl_id }}"><i
                                    class="ec ec-compare mr-1 font-size-15"></i>
                                <span id="span-compare">
                                    Compare
                                </span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                <li>4.5 inch HD Touch Screen (1280 x 720)</li>
                                <li>Android 4.4 KitKat OS</li>
                                <li>1.4 GHz Quad Core™ Processor</li>
                                <li>20 MP Electro and 28 megapixel CMOS rear camera</li>
                            </ul>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                        </p>
                        <p><strong>SKU</strong>: FW511948218</p>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline">
                                <ins class="font-size-36 text-decoration-none"> {{ number_format($sanPham->sp_gia)}}
                                    VNĐ</ins>
                                {{-- <del class="font-size-20 ml-2 text-gray-6">$2,299.00</del> --}}
                            </div>
                        </div>
                        <div class="border-top border-bottom py-3 mb-4">
                            <div class="d-flex align-items-center">
                                <h6 class="font-size-14 mb-0">Color</h6>
                                <!-- Select -->
                                <div class="dropdown bootstrap-select js-select dropdown-select ml-3"><select
                                        class="js-select selectpicker dropdown-select ml-3"
                                        data-style="btn-sm bg-white font-weight-normal py-2 border" tabindex="-98">
                                        <option value="one" selected="">White with Gold</option>
                                        <option value="two">Red</option>
                                        <option value="three">Green</option>
                                        <option value="four">Blue</option>
                                    </select><button type="button"
                                        class="btn dropdown-toggle btn-sm bg-white font-weight-normal py-2 border"
                                        data-toggle="dropdown" role="button" title="White with Gold">
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                                <div class="filter-option-inner-inner">White with Gold</div>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu " role="combobox">
                                        <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                            <ul class="dropdown-menu inner show"></ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Select -->
                            </div>
                        </div>
                        <div class="d-md-flex align-items-end mb-3">
                            <div class="max-width-150 mb-4 mb-md-0">
                                <h6 class="font-size-14">Số lượng</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input id="js-result-{{$sanPham->sp_id}}"
                                                class="js-result  form-control h-auto border-0 rounded p-0 shadow-none"
                                                name="sp_soluong" type="text" value="1">
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a data-id={{$sanPham->sp_id}}
                                                class="js-minus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a data-id={{$sanPham->sp_id}}
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Single Product Body -->
    <!-- Single Product Tab -->
    <div class="mb-8">
        <div class="position-relative position-md-static px-md-6">
            <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                id="pills-tab-8" role="tablist">
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link active" id="Jpills-one-example1-tab" data-toggle="pill"
                        href="#Jpills-one-example1" role="tab" aria-controls="Jpills-one-example1"
                        aria-selected="true">Accessories</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill" href="#Jpills-two-example1"
                        role="tab" aria-controls="Jpills-two-example1" aria-selected="false">Description</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill" href="#Jpills-three-example1"
                        role="tab" aria-controls="Jpills-three-example1" aria-selected="false">Specification</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                    <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill" href="#Jpills-four-example1"
                        role="tab" aria-controls="Jpills-four-example1" aria-selected="false">Reviews</a>
                </li>
            </ul>
        </div>
        <!-- Tab Content -->
        <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
            <div class="tab-content" id="Jpills-tabContent">
                <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel"
                    aria-labelledby="Jpills-one-example1-tab">
                    <div class="row no-gutters">
                        <div class="col mb-6 mb-md-0">
                            <ul class="row list-unstyled products-group no-gutters border-bottom border-md-bottom-0">
                                <li class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down border-0">
                                    <div class="product-item__outer h-100">
                                        <div class="remove-prodcut-hover product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2 d-none d-md-block"><a
                                                        href="../shop/product-categories-7-column-full-width.html"
                                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                                <h5 class="mb-1 product-item__title d-none d-md-block"><a href="#"
                                                        class="text-blue font-weight-bold">Wireless Audio System
                                                        Multiroom 360 degree Full base audio</a></h5>
                                                <div class="mb-2">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="d-block text-center"><img class="img-fluid"
                                                            src="{{ asset('template/client') }}/assets/img/212X200/img1.jpg"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1 d-none d-md-block">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$685,00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down">
                                    <div class="product-item__outer h-100">
                                        <div
                                            class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2 d-none d-md-block"><a
                                                        href="../shop/product-categories-7-column-full-width.html"
                                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                                <h5 class="mb-1 product-item__title d-none d-md-block"><a href="#"
                                                        class="text-blue font-weight-bold">Tablet White EliteBook
                                                        Revolve 810 G2</a></h5>
                                                <div class="mb-2">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="d-block text-center"><img class="img-fluid"
                                                            src="{{ asset('template/client') }}/assets/img/212X200/img2.jpg"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1 d-none d-md-block">
                                                    <div
                                                        class="prodcut-price d-flex align-items-center position-relative">
                                                        <ins
                                                            class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                                        <del
                                                            class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                                            299,00</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down remove-divider">
                                    <div class="product-item__outer h-100">
                                        <div
                                            class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2 d-none d-md-block"><a
                                                        href="../shop/product-categories-7-column-full-width.html"
                                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                                <h5 class="mb-1 product-item__title d-none d-md-block"><a href="#"
                                                        class="text-blue font-weight-bold">Purple Solo 2 Wireless</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="d-block text-center"><img class="img-fluid"
                                                            src="{{ asset('template/client') }}/assets/img/212X200/img3.jpg"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1 d-none d-md-block">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$685,00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div
                                class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <input class="form-check-input" type="checkbox" value="" id="inlineCheckbox1" checked=""
                                    disabled="">
                                <label class="form-check-label mb-1" for="inlineCheckbox1">
                                    <strong>This product: </strong> Ultra Wireless S50 Headphones S50 with Bluetooth -
                                    <span class="text-red font-size-16">$35.00</span>
                                </label>
                            </div>
                            <div
                                class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1"
                                    checked="">
                                <label class="form-check-label mb-1 text-blue" for="inlineCheckbox2">
                                    <span class="text-decoration-on cursor-pointer-on">Universal Headphones Case in
                                        Black</span> - <span class="text-red font-size-16">$159.00</span>
                                </label>
                            </div>
                            <div
                                class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2"
                                    checked="">
                                <label class="form-check-label mb-1 text-blue" for="inlineCheckbox3">
                                    <span class="text-decoration-on cursor-pointer-on">Headphones USB Wires</span> -
                                    <span class="text-red font-size-16">$50.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="mr-xl-15">
                                <div class="mb-3">
                                    <div class="text-red font-size-26 text-lh-1dot2">$244.00</div>
                                    <div class="text-gray-6">for 3 item(s)</div>
                                </div>
                                <a href="#"
                                    class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add all
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel"
                    aria-labelledby="Jpills-two-example1-tab">
                    <h3 class="font-size-24 mb-3">Perfectly Done</h3>
                    <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim
                        ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa
                        nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis,
                        feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id
                        cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pt-lg-8 pt-xl-10">
                                <h3 class="font-size-24 mb-3">Wireless</h3>
                                <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis,
                                    enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est
                                    ut mollis. Donec luctus condimentum ante et euismod.</p>
                                <h3 class="font-size-24 mb-3">Fresh Design</h3>
                                <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut
                                    urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue,
                                    pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit
                                    quis, ullamcorper massa.</p>
                                <h3 class="font-size-24 mb-3">Fabolous Sound</h3>
                                <p class="mb-6">Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget
                                    semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non
                                    dolor. In hac habitasse platea dictumst.</p>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <img class="img-fluid mr-n4 mr-lg-n10"
                                src="{{ asset('template/client') }}/assets/img/580X580/img1.jpg"
                                alt="Image Description">
                        </div>
                        <div class="col-md-6 text-left">
                            <img class="img-fluid ml-n4 ml-lg-n10"
                                src="{{ asset('template/client') }}/assets/img/580X580/img2.jpg"
                                alt="Image Description">
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="pt-lg-8 pt-xl-10 text-right">
                                <h3 class="font-size-24 mb-3">Inteligent Bass</h3>
                                <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis,
                                    enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est
                                    ut mollis. Donec luctus condimentum ante et euismod.</p>
                                <h3 class="font-size-24 mb-3">Battery Life</h3>
                                <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut
                                    urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue,
                                    pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit
                                    quis, ullamcorper massa.</p>
                            </div>
                        </div>
                    </div>
                    <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong> <span
                                class="sku">FW511948218</span></li>
                        <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Category:</strong> <a
                                href="#" class="text-blue">Headphones</a></li>
                        <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Tags:</strong> <a
                                href="#" class="text-blue">Fast</a>, <a href="#" class="text-blue">Gaming</a>, <a
                                href="#" class="text-blue">Strong</a></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                    aria-labelledby="Jpills-three-example1-tab">
                    <div class="mx-md-5 pt-1">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th class="px-4 px-xl-5 border-top-0">Weight</th>
                                        <td class="border-top-0">7.25kg</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Dimensions</th>
                                        <td>90 x 60 x 90 cm</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Size</th>
                                        <td>One Size Fits all</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">color</th>
                                        <td>Black with Red, White with Gold</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Guarantee</th>
                                        <td>5 years</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h3 class="font-size-18 mb-4">Technical Specifications</h3>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th class="px-4 px-xl-5 border-top-0">Brand</th>
                                        <td class="border-top-0">Apple</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Item Height</th>
                                        <td>18 Millimeters</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Item Width</th>
                                        <td>31.4 Centimeters</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Screen Size</th>
                                        <td>13 Inches</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Item Weight</th>
                                        <td>1.6 Kg</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Product Dimensions</th>
                                        <td>21.9 x 31.4 x 1.8 cm</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Item model number</th>
                                        <td>MF841HN/A</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Processor Brand</th>
                                        <td>Intel</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Processor Type</th>
                                        <td>Core i5</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Processor Speed</th>
                                        <td>2.9 GHz</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">RAM Size</th>
                                        <td>8 GB</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Hard Drive Size</th>
                                        <td>512 GB</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Hard Disk Technology</th>
                                        <td>Solid State Drive</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Graphics Coprocessor</th>
                                        <td>Intel Integrated Graphics</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Graphics Card Description</th>
                                        <td>Integrated Graphics Card</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Hardware Platform</th>
                                        <td>Mac</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Operating System</th>
                                        <td>Mac OS</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Average Battery Life (in hours)</th>
                                        <td>9</td>
                                    </tr>
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
                                <h3 class="font-size-18 mb-6">Based on 3 reviews</h3>
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
                            <h3 class="font-size-18 mb-5">Add a review</h3>
                            <!-- Form -->
                            <form class="js-validate" novalidate="novalidate">
                                <div class="row align-items-center mb-4">
                                    <div class="col-md-4 col-lg-3">
                                        <label for="rating" class="form-label mb-0">Your Review</label>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <a href="#" class="d-block">
                                            <div class="text-warning text-ls-n2 font-size-16">
                                                <small class="far fa-star text-muted"></small>
                                                <small class="far fa-star text-muted"></small>
                                                <small class="far fa-star text-muted"></small>
                                                <small class="far fa-star text-muted"></small>
                                                <small class="far fa-star text-muted"></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="js-form-message form-group mb-3 row">
                                    <div class="col-md-4 col-lg-3">
                                        <label for="descriptionTextarea" class="form-label">Your Review</label>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea class="form-control" rows="3" id="descriptionTextarea"
                                            data-msg="Please enter your message." data-error-class="u-has-error"
                                            data-success-class="u-has-success"></textarea>
                                    </div>
                                </div>
                                <div class="js-form-message form-group mb-3 row">
                                    <div class="col-md-4 col-lg-3">
                                        <label for="inputName" class="form-label">Name <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control" name="name" id="inputName"
                                            aria-label="Alex Hecker" required="" data-msg="Please enter your name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                                <div class="js-form-message form-group mb-3 row">
                                    <div class="col-md-4 col-lg-3">
                                        <label for="emailAddress" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="email" class="form-control" name="emailAddress" id="emailAddress"
                                            aria-label="alexhecker@pixeel.com" required=""
                                            data-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-md-4 offset-lg-3 col-auto">
                                        <button type="submit"
                                            class="btn btn-primary-dark btn-wide transition-3d-hover">Add
                                            Review</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- Review -->
                    <div class="border-bottom border-color-1 pb-4 mb-4">
                        <!-- Review Rating -->
                        <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                        </div>
                        <!-- End Review Rating -->

                        <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis,
                            enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut
                            mollis. Donec luctus condimentum ante et euismod.</p>

                        <!-- Reviewer -->
                        <div class="mb-2">
                            <strong>John Doe</strong>
                            <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                        </div>
                        <!-- End Reviewer -->
                    </div>
                    <!-- End Review -->
                    <!-- Review -->
                    <div class="border-bottom border-color-1 pb-4 mb-4">
                        <!-- Review Rating -->
                        <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                            </div>
                        </div>
                        <!-- End Review Rating -->

                        <p class="text-gray-90">Pellentesque habitant morbi tristique senectus et netus et malesuada
                            fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt
                            faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.</p>

                        <!-- Reviewer -->
                        <div class="mb-2">
                            <strong>Anna Kowalsky</strong>
                            <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                        </div>
                        <!-- End Reviewer -->
                    </div>
                    <!-- End Review -->
                    <!-- Review -->
                    <div class="pb-4">
                        <!-- Review Rating -->
                        <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                        </div>
                        <!-- End Review Rating -->

                        <p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus accumsan tellus, nec
                            ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum porttitor sagittis.</p>

                        <!-- Reviewer -->
                        <div class="mb-2">
                            <strong>Peter Wargner</strong>
                            <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                        </div>
                        <!-- End Reviewer -->
                    </div>
                    <!-- End Review -->
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
            <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
        </div>
        <ul class="row list-unstyled products-group no-gutters">
            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full
                                    base audio</a></h5>
                            <div class="mb-2">
                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                        class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/212X200/img1.jpg"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price">
                                    <div class="text-gray-100">$685,00</div>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="../shop/single-product-fullwidth.html"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                            <div class="mb-2">
                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                        class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/212X200/img2.jpg"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price d-flex align-items-center position-relative">
                                    <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="../shop/single-product-fullwidth.html"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                            <div class="mb-2">
                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                        class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/212X200/img3.jpg"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price">
                                    <div class="text-gray-100">$685,00</div>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="../shop/single-product-fullwidth.html"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-md-lg">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                            <div class="mb-2">
                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                        class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/212X200/img4.jpg"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price">
                                    <div class="text-gray-100">$685,00</div>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="../shop/single-product-fullwidth.html"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-xl">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                            <div class="mb-2">
                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                        class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/212X200/img5.jpg"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price">
                                    <div class="text-gray-100">$685,00</div>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="../shop/single-product-fullwidth.html"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-wd d-xl-none d-wd-block">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                    class="font-size-12 text-gray-5">Speakers</a></div>
                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                    class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                            <div class="mb-2">
                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                        class="img-fluid"
                                        src="{{ asset('template/client') }}/assets/img/212X200/img2.jpg"
                                        alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                <div class="prodcut-price d-flex align-items-center position-relative">
                                    <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="../shop/single-product-fullwidth.html"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__footer">
                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- End Related products -->
    <!-- Brand Carousel -->
    <div class="mb-8">
        <div class="py-2 border-top border-bottom">
            <div class="js-slick-carousel u-slick my-1 slick-initialized slick-slider" data-slides-show="5"
                data-slides-scroll="1"
                data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right" data-responsive="[{
                    &quot;breakpoint&quot;: 992,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 2
                    }
                }, {
                    &quot;breakpoint&quot;: 768,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 1
                    }
                }, {
                    &quot;breakpoint&quot;: 554,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 1
                    }
                }]">
                <div class="js-prev d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9 slick-arrow slick-disabled"
                    aria-disabled="true" style=""></div>
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 1680px; transform: translate3d(0px, 0px, 0px);">
                        <div class="js-slide slick-slide slick-current slick-active" data-slick-index="0"
                            aria-hidden="false" style="width: 280px; height: auto;" tabindex="0">
                            <a href="#" class="link-hover__brand" tabindex="0">
                                <img class="img-fluid m-auto max-height-50"
                                    src="{{ asset('template/client') }}/assets/img/200X60/img1.png"
                                    alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                            style="width: 280px; height: auto;" tabindex="0">
                            <a href="#" class="link-hover__brand" tabindex="0">
                                <img class="img-fluid m-auto max-height-50"
                                    src="{{ asset('template/client') }}/assets/img/200X60/img2.png"
                                    alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="2" aria-hidden="false"
                            style="width: 280px; height: auto;" tabindex="0">
                            <a href="#" class="link-hover__brand" tabindex="0">
                                <img class="img-fluid m-auto max-height-50"
                                    src="{{ asset('template/client') }}/assets/img/200X60/img3.png"
                                    alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="3" aria-hidden="false"
                            style="width: 280px; height: auto;" tabindex="0">
                            <a href="#" class="link-hover__brand" tabindex="0">
                                <img class="img-fluid m-auto max-height-50"
                                    src="{{ asset('template/client') }}/assets/img/200X60/img4.png"
                                    alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide slick-slide slick-active" data-slick-index="4" aria-hidden="false"
                            style="width: 280px; height: auto;" tabindex="0">
                            <a href="#" class="link-hover__brand" tabindex="0">
                                <img class="img-fluid m-auto max-height-50"
                                    src="{{ asset('template/client') }}/assets/img/200X60/img5.png"
                                    alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide slick-slide" data-slick-index="5" aria-hidden="true"
                            style="width: 280px; height: auto;" tabindex="-1">
                            <a href="#" class="link-hover__brand" tabindex="-1">
                                <img class="img-fluid m-auto max-height-50"
                                    src="{{ asset('template/client') }}/assets/img/200X60/img6.png"
                                    alt="Image Description">
                            </a>
                        </div>
                    </div>
                </div>





                <div class="js-next d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y fa fa-angle-right u-slick__arrow-classic-inner--right slick-arrow"
                    style="" aria-disabled="false"></div>
            </div>
        </div>
    </div>
    <!-- End Brand Carousel -->

    <!-- compare-->
    <div class="stickcompare stickcompare_new cp-desktop spaceInDown" style="display: block;" id="stickcompare">
        <label class="error" style="display: none; opacity: 1;">Bạn đã chọn sản phẩm này rồi, vui lòng chọn sản phẩm
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
@endsection
@push('script')
<script>
    $(document).ready(function () {
        reloadCompare();

        function reloadCompare() {
            let id = $(".btn-compare").attr('data-id');
            document.getElementById("span-compare").textContent = "Compare";
            checkCompare();
            for (let index = 1; index < 3; index++) {
                $("#compare_img" + index).attr("src", sessionStorage.getItem('compare_img' + index));
                $("#compare_name" + index).text(sessionStorage.getItem('compare_name' + index));
                if (id === sessionStorage.getItem("compare_id" + index)) {
                    $(".btn-compare").addClass("btn-remove-compare");
                    $(".btn-compare").removeClass("btn-compare");
                    document.getElementById("span-compare").textContent = "Remove";
                }
            }
        }
        $('.btn-compare').click(function (e) {
            let id = $(this).attr('data-id');
            let img = $(this).attr('data-img');
            let name = $(this).attr('data-name');
            let tl = $(this).attr('data-tl');
            let num = 1;
            let exist = 0; //kiểm tra tồn tại id trong session chưa
            // không có thì lưu số 1

            for (let index = 1; index < 3; index++) {
                // kiểm tra đã có chưa
                if (sessionStorage.getItem("compare_tl" + index) !== null && sessionStorage.getItem(
                        "tl" +
                        index) != tl) {
                    alert("Không thể so sánh hai sản phẩm khác loại");
                    return;
                }
                if (sessionStorage.getItem("compare_id" + index) == id) {
                    sessionStorage.removeItem("compare_id" + index);
                    sessionStorage.removeItem("compare_img" + index);
                    sessionStorage.removeItem("compare_name" + index);
                    sessionStorage.removeItem("compare_tl" + index);
                    exist = 1;
                }
            }
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

        $(".btn-remove-compare").click(function (e) {
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

        $(".txtremoveall").click(function (e) {
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

        $(".gotoview-compare").click(function (e) {
            e.preventDefault();
            if (sessionStorage.getItem("compare_id1") !== null && sessionStorage.getItem(
                    "compare_id2") !== null) {
                var url = '{{ route("client.compare",[":id1",":id2"]) }}';
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
    $(document).ready(function () {
        $(".js-plus").on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            var resultVal = $('#js-result-' + id).val();
            parseInt(resultVal, 10);
            resultVal = parseInt(resultVal) + 1;
            $('#js-result-' + id).val(resultVal);
        });
        $(".js-minus").on('click', function (e) {
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

</script>
@endpush
