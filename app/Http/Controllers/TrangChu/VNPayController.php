<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
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
        // dd((int) Cart::priceTotal(0,0,0));
      $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
      $vnp_Returnurl = route('client.returnvnpay');
      $vnp_TmnCode = "X8MMVM5K";//Mã website tại VNPAY
      $vnp_HashSecret = "PFMCKDQXEHTHUOEIBKILDVSLRIFIBFPA"; //Chuỗi bí mật

      $vnp_TxnRef = rand(1000,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang
      $vnp_OrderInfo = "Thanh Tooan don hang";
      $vnp_OrderType = "billpayment";
      $vnp_Amount = (int)Cart::priceTotal(0,0,0);
      $vnp_Locale ='vn';
      // dd(request()->ip());
      // $vnp_BankCode = 'NCB';
      $vnp_IpAddr =request()->ip();
      // Ngân hàng NCB
      // Số thẻ `9704198526191432198`
      // Tên chủ thẻ NGUYEN VAN A
      // Ngày phát hành 07/15
      // Mật khẩu OTP 123456
      //Add Params of 2.0.1 Version
      // $vnp_ExpireDate = $_POST['txtexpire'];
      //Billing
      // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
      // $vnp_Bill_Email = $_POST['txt_billing_email'];
      // $fullName = trim($_POST['txt_billing_fullname']);
      // if (isset($fullName) && trim($fullName) != '') {
      // $name = explode(' ', $fullName);
      // $vnp_Bill_FirstName = array_shift($name);
      // $vnp_Bill_LastName = array_pop($name);
      // }
      // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
      // $vnp_Bill_City=$_POST['txt_bill_city'];
      // $vnp_Bill_Country=$_POST['txt_bill_country'];
      // $vnp_Bill_State=$_POST['txt_bill_state'];
      // Invoice
      // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
      // $vnp_Inv_Email=$_POST['txt_inv_email'];
      // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
      // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
      // $vnp_Inv_Company=$_POST['txt_inv_company'];
      // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
      // $vnp_Inv_Type=$_POST['cbo_inv_type'];
    //   $tenKhachHang = $request->tenKhachHang;
    //   $diaChi = $request->diaChi;
      // dd($diaChi)
    //   $soDienThoai = $request->soDienThoai;
      // // dd($tenKhachHang);
      // try {
      // //code...
      // $user = Auth::guard('khachhang')->user();
      // DB::table('hoadon')->insertGetId(
      // [
      // 'hd_ma' => rand(1000,9999),
      // 'hd_tongtien' => Car
      // ]
      // );
      // } catch (\Throwable $th) {
      // //throw $th;
      // }


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
      "vnp_TxnRef" => $vnp_TxnRef,
      // "diaChi" => $diaChi,
      // "soDienThoai" => $soDienThoai,
      // "vnp_ExpireDate"=>$vnp_ExpireDate,
      // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
      // "vnp_Bill_Email"=>$vnp_Bill_Email,
      // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
      // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
      // "vnp_Bill_Address"=>$vnp_Bill_Address,
      // "vnp_Bill_City"=>$vnp_Bill_City,
      // "vnp_Bill_Country"=>$vnp_Bill_Country,
      // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
      // "vnp_Inv_Email"=>$vnp_Inv_Email,
      // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
      // "vnp_Inv_Address"=>$vnp_Inv_Address,
      // "vnp_Inv_Company"=>$vnp_Inv_Company,
      // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
      // "vnp_Inv_Type"=>$vnp_Inv_Type
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
        if ($request->vnp_ResponseCode == '00') {
         dd('Thanh Toán thành công');
        }
        else {
            dd('Thanh Toán thất bại');
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
