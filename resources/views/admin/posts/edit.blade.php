@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Cập nhật tin tức</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index',$tintuc) }}">Tin tức</a></li>
                <li class="breadcrumb-item active">Cập nhật tin tức</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Input -->
    <form action="{{ route('admin.posts.update',$tintuc) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="tt_tieude" placeholder="Tiêu đề"
                                    value="{{$tintuc->tt_tieude}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <img src="{{ asset($tintuc->tt_hinhanh) ??''}}" alt="{{ $tintuc->tt_tieude }}"
                                    class="img" width="100" height="100">
                                <span>-></span>

                                <img id="output" src="" width="100" height="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" accept="image/*" name="tt_hinhanh"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" />
                            </div>
                        </div>

                        <textarea id="ckeditor" name="tt_noidung">{{$tintuc->tt_noidung}}</textarea>
                        <button type="submit" class="btn btn-raised btn-primary waves-effect m-t-20">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@push('script')

@endpush
@endsection
