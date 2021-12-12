@extends('admin.template.master')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Thêm danh mục</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cat.index') }}">Danh mục</a></li>
                    <li class="breadcrumb-item active">Thêm danh mục</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <form action="{{ route('admin.cat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @include('admin.alert')
                    <div class="card">
                        <div class="body">
                            @if ($data != null)
                                <input type="text" value="{{ $data->tl_id }}" hidden name="tl_id"
                                    class="form-control" />
                            @endif
                            <h2 class="card-inside-title">Tên danh mục</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" @if ($data != null)
                                            value="{{ $data->tl_ten }}"
                                            @endif
                                            name="tl_ten" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Thuộc tính</h2>
                            <h2 class="card-inside-title">
                                <ul>
                                    @if ($thuocTinhSelected != null)
                                        @foreach ($thuocTinhSelected as $item)
                                        <li>{{ $item->tt_ten }} <a href="{{ route('admin.cat.xoaThuocTinh', ['idTT'=>$item->tt_id, 'idTL' => $data->tl_id]) }}" class="btn btn-danger">X</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </h2>
                            <h2 class="card-inside-title">
                                @if ($data != null)
                                    <a href="#" class="addAttr" data-id-cat="{{ $data->tl_id }}">+ thêm thuộc tính</a>
                                @else
                                    <a href="#" class="addAttr" data-id-cat="add-new">+ thêm thuộc tính</a>
                                @endif
                            </h2>
                            <div class="row clearfix thuocTinh">

                            </div>
                            @if ($data != null)
                                <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Sửa</button>
                            @else
                                <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Thêm</button>
                            @endif
                            <a href="{{ route('admin.cat.index') }}"
                                class="btn btn-raised btn-default m-t-15 waves-effect">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('ajax.product')
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
        <script>
            $(document).ready(function () {
                var stt = 0;
                const base_url = window.location.origin;
                var attr = '';

                $('.addAttr').click(function (e) {
                    e.preventDefault();
                    stt++;
                    console.log("clicked");
                    var idCat = $(this).data('id-cat');
                    console.log($(this).data('id-cat'));
                    $.ajax({
                        type: "get",
                        url: base_url + "/admin/danh-muc/show-thuoc-tinh/"+idCat,
                        // data: "data",
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            var attr = '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label item">';
                            attr += '<label>Thuộc tính '+ parseInt(stt)+'</label>';
                            attr += '</div>';
                            attr += '<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 item">';
                            attr += '<div class="form-group">';
                            attr += '<div class="form-line">';
                            attr += '<select class="theLoai form-control show-tick " name="thuocTinh[]">';
                            attr += '<option value="">-- Chọn thuộc tính --</option>';
                            for (let i = 0; i < response.length; i++) {
                                attr += '<option value="'+ response[i].tt_id +'">'+ response[i].tt_ten +'</option>';
                            }
                            attr += '</select>';
                            // attr += '<input type="text" name="thuocTinh[]" class="form-control">';
                            attr += '</div></div></div>';
                            $('.thuocTinh').append(attr);
                        },
                        error: function (respnse) {
                            console.log(response);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
