@extends('client.template.master')
@push('css')
    <style>
        .img{
            width:80%;
            height: auto;
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Trang chủ</a></li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <h1>

            {{$tintuc->tt_tieude}}
        </h1>
       <img src="{{asset($tintuc->tt_hinhanh)}}" alt="" class="img">
       <p>

           {!!$tintuc->tt_noidung!!}
        </p>
    </div>
@endsection
