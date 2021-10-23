@extends('client.template.master')
@push('css')
<style>
    .table-compare-list th {
        width: 20%;
    }

</style>
@endpush
@section('content')
<!-- breadcrumb -->
<div class="bg-gray-13 bg-md-transparent">
    <div class="container">
        <!-- breadcrumb -->
        <div class="my-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Compare</li>
                </ol>
            </nav>
        </div>
        <!-- End breadcrumb -->
    </div>
</div>
<!-- End breadcrumb -->

<div class="container">
    <div class="table-responsive table-bordered table-compare-list mb-10 border-0">
        <table class="table">
            <tbody>
                <tr>
                    <th class="min-width-200">Sản phẩm</th>
                    <td>
                        <a href="#" class="product d-block">
                            <div class="product-compare-image">
                                <div class="d-flex mb-3">
                                    <img class="img-fluid mx-auto" src="{{$sanpham1->hinhdaidien->hasp_duongdan??''}}"
                                        alt="Image Description">
                                </div>
                            </div>
                            <h3 class="product-item__title text-blue font-weight-bold mb-3">{{$sanpham1->sp_ten}}</h3>
                        </a>
                        <div class="text-warning mb-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="product">
                            <div class="product-compare-image">
                                <div class="d-flex mb-3">
                                    <img class="img-fluid mx-auto" src="{{$sanpham2->hinhdaidien->hasp_duongdan??''}}"
                                        alt="Image Description">
                                </div>
                            </div>
                            <h3 class="product-item__title text-blue font-weight-bold mb-3">{{$sanpham1->sp_ten}}</h3>
                        </a>
                        <div class="text-warning mb-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th>Giá</th>
                    <td>
                        <div class="product-price">{{$sanpham1->sp_gia}}</div>
                    </td>
                    <td>
                        <div class="product-price">{{$sanpham2->sp_gia}}</div>
                    </td>
                </tr>

                <tr>
                    <th>Tình trạng</th>
                    <td><span>{{$sanpham1->sp_tinhtrang}}</span>
                    </td>
                    <td><span>{{$sanpham2->sp_tinhtrang}}</span>
                    </td>
                </tr>

                <tr>
                    <th>Mô tả</th>
                    <td>
                        <span>{{$sanpham1->sp_mota}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->sp_mota}}</span>
                    </td>
                </tr>

                <tr>
                    <th>Add to cart</th>
                    <td>
                        <div class=""><a href="#"
                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add
                                to cart</a></div>
                    </td>
                    <td>
                        <div class=""><a href="#"
                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add
                                to cart</a></div>
                    </td>
                </tr>



                <tr>
                    <th>Remove</th>
                    <td class="text-center">
                        <a href="#" class="text-gray-90"><i class="fa fa-times"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="text-gray-90"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
