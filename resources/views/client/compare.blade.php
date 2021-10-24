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
                    <th>Nhà cung cấp</th>
                    <td>
                        <span>{{$sanpham1->nhacungcap->ncc_ten}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->nhacungcap->ncc_ten}}</span>
                    </td>
                </tr>
                <!-- dt -->
                @if($sanpham1->tl_id==1)
                <tr>
                    <th>Màn hình</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(1)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(2)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Hệ điều hành</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(2)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(2)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Camera sau</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(3)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(3)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Camera trước</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(4)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(4)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Chip</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(5)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(5)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>RAM</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(6)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(6)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Bộ nhớ trong</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(7)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(7)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>SIM</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(8)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(8)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Pin, Sạc</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(9)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(9)}}</span>
                    </td>
                </tr>
                <!-- laptop -->
                @else if($sanpham1->tl_id==2)
                <tr>
                    <th>CPU</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(10)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(10)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>RAM</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(6)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(6)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Ổ cứng</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(12)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(12)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Màn hình</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(1)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(1)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Card màn hình</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(13)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(13)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Cổng kết nối</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(14)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(14)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Hệ điều hành</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(15)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(15)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Thiết kế</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(16)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(16)}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Kích thước, trọng lượng</th>
                    <td>
                        <span>{{$sanpham1->chitietthuoctinh(17)}}</span>
                    </td>
                    <td>
                        <span>{{$sanpham2->chitietthuoctinh(17)}}</span>
                    </td>
                </tr>
                @endif
                <tr>
                    <th>Thêm vào giỏ</th>
                    <td>
                        <div class="">
                            <form method="post" action="{{route('client.addtocart',$sanpham1->sp_id)}}">
                                @csrf
                                <input type="hidden" name="sp_soluong" value="1">
                                <a href="#" onclick="$(this).closest('form').submit()"
                                    class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add
                                    to cart</a>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <form method="post" action="{{route('client.addtocart',$sanpham2->sp_id)}}">
                                @csrf
                                <input type="hidden" name="sp_soluong" value="1">
                                <a href="#" onclick="$(this).closest('form').submit()"
                                    class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add
                                    to cart</a>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
