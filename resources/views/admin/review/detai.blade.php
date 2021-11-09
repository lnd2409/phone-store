@extends('admin.template.master')
@section('content')
  <div class="container-fluid">
 <!-- Textarea -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h1>Chi tiết bình luận</h1>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <h3 class="card-inside-title">{{$binhluan->kh_ten}}</h3>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" value="">{{$binhluan->ctbl_noidung}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Trả lời khách hàng</h2>
                        <div class="form-group">
                           <form action="{{ route('admin.getrepreview') }}" method="post" id="reReview">
                               @csrf
                               <input type="hidden" name="ctbl_id" value=" {{$binhluan->ctbl_id}}">
                               <input type="hidden" name="bl_id" value=" {{$binhluan->bl_id}}">
                               {{-- <input type="hidden" name="sp_id" value=" {{$binhluan->sp_id}}"> --}}
                               <input type="hidden" name="nv_id" value=" {{Auth::guard('quantri')->id()}}">
                                <div class="form-line">
                                <textarea rows="1" name="bl_noidung" class="form-control no-resize auto-growth" id="messageRep" placeholder="Cảm ơn quí khách..."></textarea>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- #END# Textarea --> 
  </div>
@endsection
@push('scripts')
    <script>
        $('#messageRep').keypress(function (e) {
            if (e.which == 13) {
                $('form#reReview').submit();
                return false; 
            }
        });
    </script>
@endpush 
