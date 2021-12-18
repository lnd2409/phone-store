<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Auth;
class VNPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        return view('client.giohang.thanh-toan',compact('cart'));
    }


    public function payCart(Request $request)
    {

      $methodpay = $request->methodpay;
      $tinh = $request->thanhPho;
      $quan = $request->quanHuyen;
      $xa = $request->phuongXa;
      $sonha = $request->kh_diachinhan;
      $diaChi= $sonha.'-'.$xa.'-'.$quan.'-'.$tinh;
      $tongTien = $request->billtotal;
      //Lấy thông tin người nhận
      $khachhang=[
      'dh_tenguoinhan'=>$request->kh_ten,
      'dh_sdtnguoinhan'=>$request->kh_sdt,
      // 'dh_email'=>$request->kh_email, //nếu cần hãy add thêm col vào data
      'dh_diachinguoinhan'=>$diaChi,
      // 'dh_ghichu'=>$request->kh_ghichu //nếu cần hãy add thêm col vào data
      'dh_tongtien'=>$tongTien
      ];

      if($methodpay == 0)
      {
         // Thêm dữ liệu vào đơn hàng
            $khachhang['kh_id']=Auth::guard('khachhang')->user()->kh_id;
            $khachhang['dh_trangthai'] = 1;
            $donhang_id = DB::table('donhang')->insertGetId($khachhang);

            // Thêm dữ liệu vào chi tiết đơn hàng
            foreach (Cart::content() as $key => $value) {
               DB::table('chitietdonhang')->insert([
                   'ctdh_soluong'=>$value->qty,
                   'ctdh_giamgia'=>0,
                   'ctdh_gia'=>$value->price,
                   'sp_id'=>$value->id,
                   'dh_id'=>$donhang_id,
               ]);

              //Cập nhật lại số lượng sản phẩm
               $soluongsp = DB::table('sanpham')->where('sp_id',$value->id)->first();
               $soluong = $soluongsp->sp_soluong;
               DB::table('sanpham')->where('sp_id',$value->id)
                ->update([
                  'sp_soluong'=>$soluong-$value->qty
                ]);
          }
            DB::table('donhang')->where('dh_id',$donhang_id)->update(['dh_trangthai',1]);
            Cart::destroy();
            Session::flash("payMess","Đặt hàng thành công!");
            return redirect()->route('client.index');
      }

      $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
      $vnp_Returnurl = route('client.returnvnpay');
      $vnp_TmnCode = "X8MMVM5K";//Mã website tại VNPAY
      $vnp_HashSecret = "PFMCKDQXEHTHUOEIBKILDVSLRIFIBFPA"; //Chuỗi bí mật

      $vnp_TxnRef = rand(1000,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang
      $vnp_OrderInfo = "Thanh Tooan don hang";
      $vnp_OrderType = "billpayment";
      $vnp_Amount = $tongTien * 100;
      $vnp_Locale ='vn';
      // dd(request()->ip());
      // $vnp_BankCode = 'NCB';
      $vnp_IpAddr =request()->ip();
      // Ngân hàng NCB
      // Số thẻ `9704198526191432198`
      // Tên chủ thẻ NGUYEN VAN A
      // Ngày phát hành 07/15
      // Mật khẩu OTP 123456


       Session::flash("billInfo", $khachhang);


      $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef
      );

      if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
      }
      if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
      }

      ksort($inputData);
      $query = "";
      $i = 0;
      $hashdata = "";
      foreach ($inputData as $key => $value) {
        if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
      }

      $vnp_Url = $vnp_Url . "?" . $query;
      if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
      }
     return redirect($vnp_Url);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePayCart(Request $request)
    {
        $nguoinhan = Session::get('billInfo');

        if ($request->vnp_ResponseCode == '00') {

            // Thêm dữ liệu vào đơn hàng
            $nguoinhan['kh_id']=Auth::guard('khachhang')->user()->kh_id;
            $donhang_id = DB::table('donhang')->insertGetId($nguoinhan);

            // Thêm dữ liệu vào chi tiết đơn hàng
            foreach (Cart::content() as $key => $value) {
               DB::table('chitietdonhang')->insert([
                   'ctdh_soluong'=>$value->qty,
                   'ctdh_giamgia'=>0,
                   'ctdh_gia'=>$value->price,
                   'sp_id'=>$value->id,
                   'dh_id'=>$donhang_id,
               ]);

              //Cập nhật lại số lượng sản phẩm
               $soluongsp = DB::table('sanpham')->where('sp_id',$value->id)->first();
               $soluong = $soluongsp->sp_soluong;
               DB::table('sanpham')->where('sp_id',$value->id)
                ->update([
                  'sp_soluong'=>$soluong-$value->qty
                ])
                ;
            }

            Session::forget('billInfo');
            Cart::destroy();
            Session::flash("payMess","Thanh toán thành công!");
            return redirect()->route('client.index');
        }
        else {
            Session::flash("payMessErr","Lỗi thanh toán!");
            return redirect()->route('client.index');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
