@extends('client.template.master')
@section('content')
 <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">giỏ hàng</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Giỏ Hàng</h1>
            </div>
            <div class="mb-10 cart-table">
                <form class="mb-4" action="#" method="post">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity w-lg-15">Số lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum = 0 ?>
                           @foreach ($cart as $item)
                            <tr class="">
                                <td class="text-center">
                                    <a href="#" class="text-gray-32 font-size-26" title="Xóa">×</a>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1" src="../../assets/img/300X300/img6.jpg" alt="Image Description"></a>
                                </td>

                                <td data-title="Product">
                                    <a href="#" class="text-gray-90"> {{$item->name}} </a>
                                </td>

                                <td data-title="Price">
                                    <span class="">{{ number_format($item->price)}}</span>
                                </td>

                                <td data-title="Quantity">
                                    <span class="sr-only">Quantity</span>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col">
                                                <input id="js-result-{{$item->id}}" class="js-result  form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="{{$item->qty}}">
                                            </div>
                                            <div class="col-auto pr-1">
                                                <a data-id={{$item->id}} class="js-minus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                </a>
                                                <a data-id={{$item->id}} class="js-plus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Quantity -->
                                </td>

                                <td data-title="Total">
                                    <span class="">{{ number_format($item->price * $item->qty)}} vnđ</span>
                                    <?php $sum+=$item->price * $item->qty ?>
                                </td>
                            </tr>
                           @endforeach
                            <tr>
                                <td colspan="6" class="border-top space-top-2 justify-content-center">
                                    <div class="pt-md-3">
                                        <div class="d-block d-md-flex flex-center-between">
                                            <div class="mb-3 mb-md-0 w-xl-40">
                                                <!-- Apply coupon Form -->
                                                <form class="js-focus-state">
                                                    <label class="sr-only" for="subscribeSrEmailExample1">Mã khuyến mãi</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="text" id="subscribeSrEmailExample1" placeholder="Nhập mã khuyến mãi" aria-label="Coupon code" aria-describedby="subscribeButtonExample2" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-block btn-dark px-4" type="button" id="subscribeButtonExample2"><i class="fas fa-tags d-md-none"></i><span class="d-none d-md-inline">Áp dụng</span></button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- End Apply coupon Form -->
                                            </div>
                                            <div class="d-md-flex">
                                                <button type="button" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Xóa Giỏ Hàng</button>
                                               @if (Auth::guard('khachhang')->check())
                                                    <a href="{{ route('client.checkoutcart') }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Thanh Toán</a>
                                                @else
                                                <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link btn btn-primary"
                                                    aria-controls="sidebarContent"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    data-unfold-event="click"
                                                    data-unfold-hide-on-scroll="false"
                                                    data-unfold-target="#sidebarContent"
                                                    data-unfold-type="css-animation"
                                                    data-unfold-animation-in="fadeInRight"
                                                    data-unfold-animation-out="fadeOutRight"
                                                    data-unfold-duration="500">
                                                    <i class="ec ec-user mr-1"></i> Đăng nhập <span class="text-primary-darken-5">or&nbsp;</span> Đăng ký
                                                </a>
                                               @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="mb-8 cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                        <div class="border-bottom border-color-1 mb-3">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Tổng đơn hàng</h3>
                        </div>
                        <table class="table mb-3 mb-md-0">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Tổng tiền</th>
                                    <td data-title="Subtotal"><span class="amount">{{cart::subtotal(0,0)}} vnđ</span></td>
                                </tr>
                                {{-- <tr class="shipping">
                                    <th>Phí ship dự kiến</th>
                                    <td data-title="Shipping">
                                         <span class="amount">25,000 vnđ</span>
                                        <div class="mt-1">
                                        
                                        </div>
                                    </td>
                                </tr> --}}
                                <tr class="order-total">
                                    <th>Tạm tính</th>
                                    <td data-title="Total"><strong><span class="amount">{{number_format($sum)}} vnđ</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Proceed to checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $(".js-plus").on('click', function (e) {
              e.preventDefault();
               var id = $(this).attr("data-id");
               var resultVal = $('#js-result-'+id).val();
               parseInt(resultVal,10);
                resultVal = parseInt(resultVal) + 1;
               $('#js-result-'+id).val(resultVal);
            });
            $(".js-minus").on('click', function (e) {
              e.preventDefault();
               var id = $(this).attr("data-id");
               var resultVal = $('#js-result-'+id).val();
               resultVal = parseInt(resultVal,10);
               console.log(resultVal > 0);
               if(resultVal > 0)
               {
                 resultVal = parseInt(resultVal) - 1;
                 $('#js-result-'+id).val(resultVal);
               }
               else
               {
                   $('#js-result-'+id).val(0);
               }
               
            });
        });
    </script>
@endpush 