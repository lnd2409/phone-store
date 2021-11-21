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
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Danh sách sản phẩm</h3>
                </div>
                <ul class="row list-unstyled products-group no-gutters mb-6">
                    {{-- @foreach ($sanPham as $key => $item)
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
                            </div>
                        </div>
                    </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
@endsection
