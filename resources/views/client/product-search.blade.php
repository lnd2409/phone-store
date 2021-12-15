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
        <div class="row">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                    <!-- List -->
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
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
                            $arrProduct = Session::get('arrProduct');
                            // dd($arrProduct);

                            if ($arrProduct != null) {
                                # code...
                                $getLastestProduct = DB::table('sanpham')->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
                                ->where('hinhanhsanpham.hasp_hinhanhdaidien', 1)->whereIn('sanpham.sp_id', $arrProduct)->get();
                            }else {
                                $getLastestProduct = [];
                            }


                        @endphp
                        @foreach ($getLastestProduct as $item)
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route('client.product-detail', ['id'=>$item->sp_id]) }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset($item->hasp_duongdan) }}" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="{{ route('client.product-detail', ['id'=>$item->sp_id]) }}">{{ $item->sp_ten }}</a></h3>
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
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Từ khóa: "{{ $keyWord }}"</h3>
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
                                        <div class="text-gray-100">{{ number_format($item->sp_gia) }}</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="../shop/single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
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
