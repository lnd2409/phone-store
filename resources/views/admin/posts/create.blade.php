@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thêm nhân viên</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="zmdi zmdi-home"></i> Trang
                        chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Tin tức</a></li>
                <li class="breadcrumb-item active">Thêm tin tức</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Input -->
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="tt_tieude" placeholder="Tiêu đề" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" accept="image/*" name="tt_hinhanh" />
                            </div>
                        </div>

                        <textarea id="ckeditor" name="tt_noidung"></textarea>
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
