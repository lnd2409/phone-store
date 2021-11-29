@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Quản lí Hóa đơn</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Hóa đơn</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    {{-- <h2>
                        <a href="{{route('admin.staffs.create')}}" class="btn btn-raised btn-primary waves-effect">Thêm
                            nhân viên</a>
                    </h2> --}}
                    {{-- <ul class="header-dropdown">
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tình trạng</th>
                                <th>Trạng thái</th>
                                <th style="width:130px !important">Quyền</th>
                            </tr>
                        </thead>
                        <?php $i=1;?>
                        <tbody>
                            @foreach ($donhang as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $item->kh_ten }}</td>
                                <td>
                                    @if ($item->kh_ten == 1)
                                        <span style="color: green">Đã thanh toán</span>
                                    @else
                                        <span style="color: red" >Chưa thanh toán</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.updatestatusbill') }}" method="post" class="submitUpdteStatus" >
                                        @csrf
                                        <input type="hidden" name="dh_id" value=" {{$item->dh_id}} ">
                                        <div class="form-group">
                                          <select class="form-control" name="dh_tinhtrang" id="">
                                              @if ($item->dh_tinhtrang == 1)
                                                <option value="1" selected>Đã nhận đơn</option>
                                              @elseif($item->dh_tinhtrang == 2)
                                                <option value="2" selected>Đang giao hàng</option>
                                              @elseif($item->dh_tinhtrang == 3)
                                                <option value="3" selected>Giao hàng thành công</option>
                                              @elseif($item->dh_tinhtrang == 4)
                                               <option value="4" selected>Hủy đơn</option>
                                              @endif
                                                <option value="0" disabled  @if ($item->dh_tinhtrang == 0)selected  @endif>--cập nhật trạng thái--</option>
                                                <option value="1">Đã nhận đơn</option>
                                                <option value="2">Đang giao hàng</option>
                                                <option value="3">Giao hàng thành công</option>
                                                <option value="4">Hủy đơn</option>
                                          </select>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.billdetail', ['id'=>$item->dh_id]) }}"
                                        class="btn  btn-raised btn-warning waves-effect">xem chi tiết</a>
                                    <a  href="{{ route('admin.deletedetail', ['id'=>$item->dh_id]) }}"
                                        class="btn  btn-raised btn-danger waves-effect">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
   <script>
       $(document).ready(function () {
           $(".submitUpdteStatus").change(function (e) { 
               e.preventDefault();
               $(this).submit();
           });
       });
   </script>
@endpush

