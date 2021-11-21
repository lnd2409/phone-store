@extends('client.template.master')
@section('content')
<!-- Slider Section -->
<div class="mb-4">
    {{-- style="background-image: url({{ asset('template/client') }}/assets/img/1920X422/img2.jpg);" --}}
    <br>
    <div class="bg-img-hero" style="background-color: white;">
        <div class="container overflow-hidden">
            <div class="js-slick-carousel u-slick"
                data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-center mb-3 mb-md-4">
                @foreach ($tinTuc as $item)
                <div class="js-slide">
                    <div class="row pt-7 py-md-0">
                        <div class="d-none d-wd-block offset-1"></div>
                        <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                            <div class="ml-xl-4">
                                <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                    data-scs-animation-in="fadeInUp">

                                </h6>
                                <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                    data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="200">
                                    {{ $item->tt_tieude }}
                                </h1>
                                <a href="{{ route('client.post-detail', $item) }}" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                    data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="300">
                                    Chi tiết
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0"
                            data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500">
                            <img class="img-fluid ml-auto mr-10 mr-wd-auto" src="{{ asset($item->tt_hinhanh) ??''}}" alt="Image Description">
                        </div>
                    </div>
                </div>
                @endforeach
{{--
                <div class="js-slide">
                    <div class="row pt-7 py-md-0">
                        <div class="d-none d-wd-block offset-1"></div>
                        <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                            <div class="ml-xl-4">
                                <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                    data-scs-animation-in="fadeInUp">
                                    SHOP TO GET WHAT YOU LOVE
                                </h6>
                                <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                    data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="200">
                                    TIMEPIECES THAT MAKE A STATEMENT UP TO <stong class="font-weight-bold">40% OFF</stong>
                                </h1>
                                <a href="../shop/single-product-fullwidth.html" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                    data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="300">
                                    Start Buying
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-6 flex-horizontal-center ml-auto ml-md-0"
                            data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500">
                            <img class="img-fluid ml-auto mr-10 mr-wd-auto h-100" src="{{ asset('template/client') }}/assets/img/416X420/img1.png" alt="Image Description">
                        </div>
                    </div>
                </div>
                <div class="js-slide">
                    <div class="row pt-7 py-md-0">
                        <div class="d-none d-wd-block offset-1"></div>
                        <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                            <div class="ml-xl-4">
                                <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                    data-scs-animation-in="fadeInUp">
                                    SHOP TO GET WHAT YOU LOVE
                                </h6>
                                <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                    data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="200">
                                    TIMEPIECES THAT MAKE A STATEMENT UP TO <stong class="font-weight-bold">40% OFF</stong>
                                </h1>
                                <a href="../shop/single-product-fullwidth.html" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                    data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="300">
                                    Start Buying
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-6 flex-horizontal-center ml-auto ml-md-0"
                            data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500">
                            <img class="img-fluid ml-auto mr-10 mr-wd-auto h-100" src="{{ asset('template/client') }}/assets/img/416X420/img3.png" alt="Image Description">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Slider Section -->
<div class="container">
    <!-- Feature List -->
    <div class="mb-6 row border rounded-lg mx-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
        <!-- Feature List -->
        <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all py-3">
            <div class="u-avatar mr-2">
                <i class="text-primary ec ec-transport font-size-46"></i>
            </div>
            <div class="media-body text-center">
                <span class="d-block font-weight-bold text-dark">Miễn phí vận chuyển</span>
                <div class=" text-secondary">đơn từ 50.000 VNĐ</div>
            </div>
        </div>
        <!-- End Feature List -->

        <!-- Feature List -->
        <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all border-left py-3">
            <div class="u-avatar mr-2">
                <i class="text-primary ec ec-customers font-size-56"></i>
            </div>
            <div class="media-body text-center">
                <span class="d-block font-weight-bold text-dark">99 % Khách hàng</span>
                <div class=" text-secondary">Feedbacks</div>
            </div>
        </div>
        <!-- End Feature List -->

        <!-- Feature List -->
        <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all border-left py-3">
            <div class="u-avatar mr-2">
                <i class="text-primary ec ec-returning font-size-46"></i>
            </div>
            <div class="media-body text-center">
                <span class="d-block font-weight-bold text-dark">30 ngày</span>
                <div class=" text-secondary">đổi trả</div>
            </div>
        </div>
        <!-- End Feature List -->

        <!-- Feature List -->
        <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all border-left py-3">
            <div class="u-avatar mr-2">
                <i class="text-primary ec ec-payment font-size-46"></i>
            </div>
            <div class="media-body text-center">
                <span class="d-block font-weight-bold text-dark">Thanh toán</span>
                <div class=" text-secondary">Hệ thống thanh toán trực tuyến</div>
            </div>
        </div>
        <!-- End Feature List -->
    </div>
    <!-- End Feature List -->
</div>
<!-- Television Entertainment -->
<!-- End Television Entertainment -->
@foreach ($theLoai as $item)
<div class="container">
    <!-- Laptops & Computers -->
    <div class="mb-6 position-relative">
        <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ $item->tl_ten }}</h3>
        </dv>
        <div class=" pt-3 pb-3"
            data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
            data-arrow-left-classes="fa fa-angle-left right-1"
            data-arrow-right-classes="fa fa-angle-right right-0"
            data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
            <div>
                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                    @foreach ($sanPham as $proItem)
                    @if ($proItem->tl_id == $item->tl_id)
                        <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                            <div class="product-item__outer h-100 w-100">
                                <div class="product-item__inner p-md-3 row no-gutters">
                                    <div class="col col-lg-auto col-xl-5 col-wd-auto product-media-left">
                                        <a href="{{ route('client.product-detail', ['id'=>$proItem->sp_id]) }}" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset($proItem->hasp_duongdan) }}" alt="Image Description"></a>
                                    </div>
                                    <div class="col col-xl-7 col-wd product-item__body pl-2 pl-lg-3 pl-xl-0 pl-wd-3 mr-wd-1">
                                        <div class="mb-4 mb-xl-2 mb-wd-6">
                                            <div class="mb-2"><a href="{{ route('client.get-product-by-cat', ['idCate'=>$item->tl_tenkhongdau]) }}" class="font-size-12 text-gray-5">{{ $item->tl_ten }}</a></div>
                                            <h5 class="product-item__title"><a href="{{ route('client.product-detail', ['id'=>$proItem->sp_id]) }}" class="text-blue font-weight-bold">{{ $proItem->sp_ten }}</a></h5>
                                        </div>
                                        <div class="flex-center-between mb-3">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">{{ number_format($proItem->sp_gia) }}</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="{{ route('client.product-detail', ['id'=>$proItem->sp_id]) }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- End Laptops & Computers -->
</div>
@endforeach
@endsection
@push('scripts')
@if(Session::has('payMess'))
    <script>
        alert('Thanh toán thành công');
    </script>
@endif
@if(Session::has('payMessErr'))
    <script>
        alert('Lỗi thanh toán! Vui lòng thanh toán lại.');
    </script>
@endif

@endpush
