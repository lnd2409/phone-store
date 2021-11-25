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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Chi tiết</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Chi tiết đơn hàng</h1>
            </div>
            <div class="mb-10 cart-table">
                {{-- <form class="mb-4" action="#" method="post"> --}}
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Số lượng</th>
                                <th>Giá</th>
                                <th class="product-subtotal"> Thành tiền </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($ctdonHang as $item)
                              <tr>
                                  <td>{{$item->sp_ten}}</td>
                                  <td>{{$item->ctdh_soluong}}</td>                        
                                  <td><strong>{{number_format($item->ctdh_gia)}}</strong> vnđ</td>
                                 
                                <td> {{number_format($item->ctdh_gia * $item->ctdh_soluong)}} vnđ</td>
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
