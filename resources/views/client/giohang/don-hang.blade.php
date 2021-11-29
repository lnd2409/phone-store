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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Đơn hàng</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Đơn hàng</h1>
            </div>
            <div class="mb-10 cart-table">
                {{-- <form class="mb-4" action="#" method="post"> --}}
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name">Tên người nhận</th>
                                <th class="product-price">Tổng tiền đơn hàng</th>
                                <th>Thanh toán</th>
                                <th>Tình trạng</th>
                                <th class="product-subtotal"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($donHang as $item)
                              <tr>
                                  <td>{{$item->dh_tenguoinhan}}</td>                        
                                  <td><strong>{{number_format($item->dh_tongtien)}}</strong> vnđ</td>
                                 <td>@if ($item->dh_trangthai == 0)
                                     <span style="color: green"> Đã thanh toán </span>
                                 @else
                                      <span style="color: red"> Chưa thanh toán </span>
                                @endif
                                </td>
                                <td>
                                    @if ($item->dh_tinhtrang ==0)
                                      Đã xác nhận
                                    @elseif($item->dh_tinhtrang == 1)
                                       Đã nhận đơn
                                    @elseif($item->dh_tinhtrang == 2)
                                        Đang giao hàng
                                    @elseif($item->dh_tinhtrang == 3)
                                       Giao hàng thành công
                                    @elseif($item->dh_tinhtrang == 4)
                                        Hủy đơn
                                    @endif
                                </td>
                                <td> <a href="{{ route('client.getdetailbill', ['id'=>$item->dh_id]) }}" class="btn btn-warning"> Xem chi tiết</a> </td>
                              </tr>
                          @endforeach 
                        </tbody>
                    </table>
                {{-- </form> --}}
            </div>
        </div>
    </main>
   
<!-- ========== END MAIN CONTENT ========== -->
@endsection
@push('scripts')
   
@endpush
