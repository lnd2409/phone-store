@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Chi tiết</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Tin tức</a></li>
                <li class="breadcrumb-item active">Chi tiết</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h1>
        {{$tintuc->tt_tieude}}
    </h1>
    <img src="{!!$tintuc->tt_hinhanh!!}" alt="" width="100" height="100">
    <p>{!!$tintuc->tt_noidung!!}</p>
</div>
@push('script')

@endpush
@endsection
