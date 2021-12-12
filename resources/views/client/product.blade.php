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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                    <!-- List -->
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                        <li>
                            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="{{ route('product.index') }}">
                                Tất cả
                            </a>
                        </li>
                        @foreach ($theLoaiView as $item)
                        <li>
                            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="{{ route('client.get-product-by-cat', ['idCate'=>$item->tl_tenkhongdau]) }}">
                                {{ $item->tl_ten }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- End List -->
                </div>
                <div class="mb-8">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Sản phẩm vừa xem</h3>
                    </div>
                    <ul class="list-unstyled">
                        @php
                            $getLastestProduct = [];
                            if(Session::has('arrProduct')) {
                                $arrProduct = Session::get('arrProduct');
                                // dd($arrProduct)
                                $getLastestProduct = DB::table('sanpham')->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
                                ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->whereIn('sanpham.sp_id', $arrProduct)->get();
                            }
                        @endphp
                        @foreach ($getLastestProduct as $item)
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset($item->hasp_duongdan) }}" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="../shop/single-product-fullwidth.html">{{ $item->sp_ten }}</a></h3>
                                        {{-- <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div> --}}
                                        <div class="font-weight-bold">
                                            {{-- <del class="font-size-11 text-gray-9 d-block">{{ $item->sp_gia }}</del> --}}
                                            <ins class="font-size-15 text-red text-decoration-none d-block">{{ number_format($item->sp_gia) }} VND</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-8">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Lọc theo giá</h3>
                    </div>
                    <div class="range-slider">
                        <form action="{{ route('product.index') }}" method="get">
                            <select name="fromPrice" class="form-control" id="">
                                <option value="null">Từ</option>
                                <option value="0">0VND</option>
                                @php
                                    $temp = 100000;
                                @endphp
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ $temp+=100000}}">{{ number_format($temp+=100000)}}VND</option>
                                @endfor
                            </select>
                            <select name="toPrice" class="form-control" id="">
                                <option value="null">Đến</option>
                                <option value="0">100.000VND</option>
                                @php
                                    $temp = 100000;
                                @endphp
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ $temp+=100000}}">{{ number_format($temp+=100000)}}VND</option>
                                @endfor
                            </select>
                            <br>
                            <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Sắp xếp</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Danh sách sản phẩm</h3>
                </div>
                <ul class="row list-unstyled products-group no-gutters mb-6">
                    @foreach ($sanPham as $key => $item)
                    <li class="col-6 col-md-3 product-item @if (($key+1) % 4 == 0)
                    remove-divider
                    @endif">
                        <div class="product-item__outer h-100 w-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2">
                                        <a href="{{ route('client.product-detail', ['id'=>$item->sp_id]) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset($item->hasp_duongdan) }}" alt="Image Description"></a>
                                    </div>
                                    <h5 class="text-center mb-1 product-item__title"><a href="{{ route('client.product-detail', ['id'=>$item->sp_id]) }}" class="font-size-15 text-gray-90">{{ $item->sp_ten }}</a></h5>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">{{ number_format($item->sp_gia) }} VND</div>
                                    </div>
                                    {{-- <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html" class="btn-add-cart btn-primary transition-3d-hover" tabindex="0"><i class="ec ec-add-to-cart"></i></a>
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
