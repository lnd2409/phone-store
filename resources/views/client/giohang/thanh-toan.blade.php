@extends('client.template.master')
@section('content')
 <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main" class="checkout-page">
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Thanh toán</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
                <div class="mb-5">
                    <h1 class="text-center">Thanh Toán Đơn Hàng</h1>
                </div>
                
                <div class="mb-12 mb-md-0 w-xl-40">
                    <!-- Apply coupon Form -->
                    <form class="js-focus-state" action="{{ route('client.checkpromotion') }}" method="post" >
                        @csrf
                        <label class="sr-only" for="subscribeSrEmailExample1">Mã khuyến mãi</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="km_macode" id="subscribeSrEmailExample1" placeholder="Nhập mã khuyến mãi" aria-label="Coupon code" aria-describedby="subscribeButtonExample2" required>
                            <div class="input-group-append">
                                <button class="btn btn-block btn-dark px-4" type="submit" id="subscribeButtonExample2"><i class="fas fa-tags d-md-none"></i><span class="d-none d-md-inline">Áp dụng</span></button>
                            </div>
                        </div>
                    </form>
                    <!-- End Apply coupon Form -->
                </div>
                <form class="js-validate" novalidate="novalidate" action="{{ route('client.paymentcart') }}" method="POST" style="margin-top: 20px">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="pl-lg-3 ">
                                <div class="bg-gray-1 rounded-lg">
                                    <!-- Order Summary -->
                                    <div class="p-4 mb-4 checkout-table">
                                        <!-- Title -->
                                        <div class="border-bottom border-color-1 mb-5">
                                            <h3 class="section-title mb-0 pb-2 font-size-25">Giỏ hàng của bạn!</h3>
                                        </div>
                                        <!-- End Title -->

                                        <!-- Product Content -->
                                        <table class="table">
                                            <thead>
                                               
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($cart as $item)
                                                    <tr class="cart_item">
                                                    <td> {{$item->name}} &nbsp;<strong class="product-quantity">× {{$item->qty}}</strong></td>
                                                    <td>{{number_format($item->qty * $item->price)}} vnđ</td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tổng tiền</th>
                                                    <td>{{Cart::subtotal(0,0)}} vnđ</td>
                                                </tr>
                                                <tr>
                                                    <th>Khuyến mãi</th>
                                                    <?php  $data = Session::get('KM'); ?>
                                                    @if(Session::has('KM'))
                                                    <td>{{number_format($data->lkm_giatri)}} vnđ <span><input type="hidden" name="promotion" value=" {{$data->lkm_giatri}} "></span></td>
                                                    @else
                                                    <td>0 vnđ</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Phí vận chuyển</th>
                                                    <td><span id="shipCode">30,000 vnđ </span></td>
                                                </tr>
                                                <tr>
                                                    <th>Tạm tính</th>
                                                    <td>
                                                        <strong id="pdTotal">
                                                            {{number_format(Cart::subtotal('2',".","") + 30000) }} 
                                                            <input type="hidden" name="billtotal" value=" {{Cart::subtotal('2',".","") + 30000}} ">
                                                        </strong> vnđ
                                                        
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!-- End Product Content -->
                                        <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                            <!-- Basics Accordion -->
                                            <div id="basicsAccordion1">
                                                <!-- Card -->
                                                <div class="border-bottom border-color-1 border-dotted-bottom">
                                                    <div class="p-3" id="basicsHeadingOne">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="stylishRadio1" value="0" name="methodpay" checked>
                                                            <label class="custom-control-label form-label" for="stylishRadio1"
                                                                data-toggle="collapse"
                                                                data-target="#basicsCollapseOnee"
                                                                aria-expanded="true"
                                                                aria-controls="basicsCollapseOnee">
                                                                Thanh toán khi nhận hàng
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="basicsCollapseOnee" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                        aria-labelledby="basicsHeadingOne"
                                                        data-parent="#basicsAccordion1">
                                                        <div class="p-4">
                                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Card -->

                                                <!-- Card -->
                                                <div class="border-bottom border-color-1 border-dotted-bottom">
                                                    <div class="p-3" id="basicsHeadingTwo">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="secondStylishRadio1" name="methodpay" value="1">
                                                            <label class="custom-control-label form-label" for="secondStylishRadio1"
                                                                data-toggle="collapse"
                                                                data-target="#basicsCollapseTwo"
                                                                aria-expanded="false"
                                                                aria-controls="basicsCollapseTwo">
                                                                VNPay
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="basicsCollapseTwo" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                        aria-labelledby="basicsHeadingTwo"
                                                        data-parent="#basicsAccordion1">
                                                        <div class="p-4">
                                                            Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Card -->

                                            

                                            </div>
                                            <!-- End Basics Accordion -->
                                        </div>
                                        <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Thanh Toán</button>
                                    </div>
                                    <!-- End Order Summary -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 order-lg-1">
                            <div class="pb-7 mb-7">
                                <!-- Title -->
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title mb-0 pb-2 font-size-25">Thông tin người nhận</h3>
                                </div>
                                <!-- End Title -->

                                <!-- Billing Form -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                               Họ tên
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="kh_ten" type="text" value=" {{Auth::guard('khachhang')->user()->kh_ten}} " class="form-control" name="kh_ten" placeholder="Trần" aria-label="Jack" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="kh_email"  value=" {{Auth::guard('khachhang')->user()->kh_email}}" class="form-control" name="emailAddress" placeholder="ttphung@gmail.com" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Số điện thoại
                                            </label>
                                            <input type="text" name="kh_sdt" value=" {{Auth::guard('khachhang')->user()->kh_sdt}}" class="form-control" placeholder="+1 (062) 109-9222" aria-label="+1 (062) 109-9222" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="js-form-message mb-6">
                                            {{-- <input name="diaChi" type="text" class="form-control" placeholder="Địa chỉ"> --}}
                                            <label for="" class="form-label">Tỉnh - thành phố</label>
                                            <select name="thanhPho" id="" class="thanhPho form-control">
                                                <option value="null" lang="123">Chọn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Quận - Huyện</label>
                                            <select name="quanHuyen" id="" class="quanHuyen form-control">
                                                <option value="null" class="delQH">Chọn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Phường xã</label>
                                            <select name="phuongXa" id="" class="phuongXa form-control">
                                                <option value="null" class="delPX" lang="123">Chọn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                               Số nhà
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="kh_diachinhan" type="text" value="215 khu phố 5" class="form-control" name="kh_ten" placeholder="Trần" aria-label="Jack" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" required>
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                    <div class="w-100"></div>
                                </div>
                                <!-- End Billing Form -->
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Ghi chú
                                    </label>

                                    <div class="input-group">
                                        <textarea class="form-control p-5"  rows="4" name="kh_ghichu" placeholder="ghi chú"></textarea>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
         <?php 
            $t = Session::has('checkKM');
            $f = Session::has('checkKMFalse');
            (Session::has('KM')) ? $data=Session::get('KM') : "";
        ?>
        <!-- ========== END MAIN CONTENT ========== -->
        @push('location')
        <script>
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            $(document).ready(function() {
                var jsonFile = "{{ asset('template') }}/"+"local.json";
                $.getJSON(jsonFile, function(js) {
                    console.log(js.length);
                    for (let i = 0; i < js.length; i++) {
                        $('.thanhPho').append('<option class="value-tp" value="' + js[i].name + '" lang="' + js[i].id + '" >' + js[i].name + '</option>');
                    }

                    //lấy Quận huyện
                    $('select.thanhPho').change(function (e) {
                        e.preventDefault();
                        $('.value-qh').remove();
                        $('.delQH').remove();
                        $('.delPX').remove();
                        $('.value-px').remove();
                        var getIDThanhPho = $(this).children("option:selected").attr("lang");
                        console.log(getIDThanhPho);

                        if(getIDThanhPho == 12)
                        {
                            $("#shipCode").html('0 vnđ <input type="hidden" name="shipcode" value="0">');
                            if({!!  json_encode(Session::has('KM')) !!})
                            {
                                var khuyenmai = {!!  (!empty($data->lkm_giatri)) ? $data->lkm_giatri : 0  !!};
                                var total = {!!  Cart::subtotal(2,'.','') !!}  - khuyenmai; 
                                var result = numberWithCommas(total);    
                                $("#pdTotal").html(result + '<input type="hidden" name="billtotal" value="'+total+'"}} ">'); 
                            }
                        }
                        else
                        {
                            if({!!  json_encode(Session::has('KM')) !!})
                            {
                                var khuyenmai = {!!  (!empty($data->lkm_giatri)) ? $data->lkm_giatri : 0  !!};
                                var total = {!!  Cart::subtotal(2,'.','') !!}  - khuyenmai + 30000; 
                                var result = numberWithCommas(total);    
                                 $("#pdTotal").html(result+ '<input type="hidden" name="billtotal" value="'+total+'"}} ">');
                            }
                        }
                        


                        $.getJSON(jsonFile,
                            function (data) {
                                for (let i = 0; i < data.length; i++) {
                                    // $('.thanhPho').append('<option class="value-tp" value="' + js[i].id + '" >' + js[i].name + '</option>');
                                    if(data[i].id == getIDThanhPho){
                                        console.log(data[i].districts.length);
                                        for (let j = 0; j < data[i].districts.length; j++) {
                                            $('.quanHuyen').append('<option class="value-qh" value="' + data[i].districts[j].name + '" lang="' + data[i].districts[j].id + '" >' + data[i].districts[j].name + '</option>');
                                        }
                                        //Lấy phường xã
                                        $('select.quanHuyen').change(function (e) {
                                            e.preventDefault();
                                            $('.value-px').remove();
                                            $('.delPX').remove();
                                            var getIDQuanHuyen = $(this).children("option:selected").attr("lang");
                                            // console.log(data[i].districts);
                                            for (let k = 0; k < data[i].districts.length; k++) {
                                                // console.log('')
                                                if(data[i].districts[k].id == getIDQuanHuyen){
                                                    console.log(data[i].districts[k].wards);
                                                    for (let l = 0; l < data[i].districts[k].wards.length; l++) {
                                                        $('.phuongXa').append('<option class="value-px" value="' + data[i].districts[k].wards[l].name + '" lang="' + data[i].districts[k].wards[l].id + '" >' + data[i].districts[k].wards[l].name + '</option>');
                                                    }
                                                }
                                            }
                                            console.log(getIDQuanHuyen);
                                        });
                                    }
                                }
                            }
                        );
                    });
                });
            });



             if({!! json_encode($t) !!})
            {
                alert('Mã đã được áp dụng'); 
                  var khuyenmai = {!!  (!empty($data->lkm_giatri)) ? $data->lkm_giatri : 0  !!};
                    var total = {!!  Cart::subtotal(2,'.','') !!}  - khuyenmai + 30000; 
                    var result =  numberWithCommas(total); 
                    $("#pdTotal").html(result+ '<input type="hidden" name="billtotal" value="'+total+'"}} ">');  
            }
            if({!! json_encode($f) !!})
            {
                alert('Mã không hợp lệ');
            }
        </script>
        @endpush

@endsection
