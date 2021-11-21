@extends('admin.template.master')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Tên người nhận</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Tên SP</th>
                                <th>Thành tiền</th>
                              
                            </tr>
                        </thead>
                        <?php $i=1; $total = 0;?>
                        <tbody>
                            @foreach ($donhang as $item)
                             <?php $total = $total + ($item->ctdh_soluong * $item->ctdh_gia)?>
                            <tr>
                
                                <td>{{ $item->dh_tenguoinhan }}</td>
                                <td>{{ $item->dh_sdtnguoinhan }}</td>
                                <td>{{ $item->dh_diachinguoinhan }}</td>
                                <td>{{ $item->sp_ten  }} x {{ $item->ctdh_soluong  }} x {{ $item->ctdh_gia  }}</td>
                                <td>{{ number_format($item->ctdh_soluong * $item->ctdh_gia)  }} vnđ</td>
                               
                            </tr>
                            @endforeach
                             <tr>
                                <td colspan="4">Tổng tiền</td>
                                <td >{{number_format($total)}} vnđ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
