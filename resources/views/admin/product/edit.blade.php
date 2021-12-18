@extends('admin.template.master')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Sửa sản phẩm</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.list') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Sửa sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <form action="{{ route('admin.handle.edit.product', ['id'=>$sanPham->sp_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <input type="text" name="sp_id" value="{{ $sanPham->sp_id }}" id=""> --}}
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">Tên sản phẩm</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $sanPham->sp_ten }}" name="tenSanPham" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Giá bán</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" value="{{ $sanPham->sp_gia }}" name="giaBan" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Số lượng</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" value="{{ $sanPham->sp_soluong }}" name="soLuong" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Select -->
                            <h2 class="card-inside-title">Loại sản phẩm</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="theLoai form-control show-tick" disabled name="theLoai">
                                        <option value="">-- Chọn loại --</option>
                                        @foreach ($theLoai as $item)
                                            <option value="{{ $item->tl_id }}" @if ($sanPham->tl_id == $item->tl_id)
                                                selected
                                            @endif>{{ $item->tl_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Thuộc tính</h2>
                            <div class="row clearfix thuocTinh">
                                @foreach ($thuocTinh as $item)
                                <div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label item'>
                                    <label>{{ $item->tt_ten }}</label>
                                </div>
                                <div class='col-lg-10 col-md-10 col-sm-8 col-xs-7 item'>
                                    <div class='form-group'>
                                        <div class='form-line'>
                                        <input type='text' name='idThuocTinh[]' value="{{ $item->tt_id }}" hidden>
                                        <input type='text' name='thuocTinh[]' value="{{ $item->sptt_giatri }}" class='form-control'>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <h2 class="card-inside-title">Nhà cung cấp</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <select class="form-control show-tick" name="nhaCungCap">
                                        <option value="">-- Chọn nhà cung cấp --</option>
                                        @foreach ($nhaCungCap as $item)
                                            <option value="{{ $item->ncc_id }}"
                                                @if ($sanPham->ncc_id == $item->ncc_id)
                                                selected
                                            @endif
                                                >{{ $item->ncc_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Mô tả</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="ckeditor" name="moTa">{{ $sanPham->sp_mota }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Hình ảnh đại diện</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <img id="avatar" alt="Ảnh đại diện sản phẩm" src="{{ asset($anhDaiDien->hasp_duongdan) }}" width="250px" height="250px"/>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Thay đổi ảnh đại diện</b></label>
                                        <br>
                                        <input type="file" name="productImage" value="" id="filePhoto" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                        <br/><br/>
                                        <img id="previewHolder" alt="Ảnh đại diện sản phẩm" width="250px" height="250px"/>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Hình ảnh slider</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        @foreach ($hinhAnhSanPham as $item)
                                            <img id="listImageProduct" alt="Ảnh đại diện sản phẩm" src="{{ asset($item->hasp_duongdan) }}" width="250px" height="250px"/>
                                            <a href="{{ route('admin.remove.image.product', ['idImg'=>$item->hasp_id]) }}" class="btn btn-sm btn-danger">X</a>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="upload_file" name="productSlider[]" onchange="preview_image();" multiple/>
                                        {{-- <input type="file" name="anhdaidien" value="" id="filePhoto" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                        <br/><br/> --}}
                                        <br/><br/>
                                        <div id="image_preview" alt="Ảnh đại diện sản phẩm"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Sửa sản phẩm</button>
                            <!-- #END# Select -->
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
                const base_url = window.location.origin;
                console.log("abc");
                $('select.theLoai').change(function(e) {
                    e.preventDefault();
                    var getIDCat = $(this).children("option:selected").val();
                    console.log(getIDCat);
                    $('.item').remove();
                    // jqajax - phím tắt
                    $.ajax({
                        type: "get",
                        url: base_url + "/admin/" +getIDCat+"/thuoc-tinh",
                        // data: "data",
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            for (let i = 0; i < response.length; i++) {
                                var attr = "<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label item'>";
                                attr += "<label>"+response[i].tt_ten+"</label>";
                                attr += "</div>";
                                attr += "<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7 item'>";
                                attr += "<div class='form-group'>";
                                attr += "<div class='form-line'>";
                                attr += "<input type='text' name='idThuocTinh[]' value='"+response[i].tt_id+"' hidden>";
                                attr += "<input type='text' name='thuocTinh[]' class='form-control'>";
                                attr += "</div>";
                                attr += "</div>";
                                attr += "</div>";
                                console.log(attr);
                                $('.thuocTinh').append(attr);
                            }
                        }
                    });
                });



            });

            function preview_image()
            {
                var total_file=document.getElementById("upload_file").files.length;
                for(var i=0;i<total_file;i++)
                {
                    $('#image_preview').append("<img width='250px' height='250px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
                }
            }
            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#previewHolder').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                alert('select a file to see preview');
                $('#previewHolder').attr('src', '');
            }
            }

            $("#filePhoto").change(function() {
                readURL(this);
            });
        </script>
    @endpush
@endsection
