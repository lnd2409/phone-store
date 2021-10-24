<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use Session;
class CheckAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //đăng xuất
    public function checkLogout()
    {
         Auth::guard('khachhang')->logout();
         return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Xử lý đăng nhập khách hàng
    public function checkLogin(Request $request)
    {
        $tenDangNhap = $request->lusername;
        $matKhau = $request->lpassword;

        $arrLogin = [
            'username' => $tenDangNhap,
            'password' => $matKhau
        ];

       if (Auth::guard('khachhang')->attempt($arrLogin)) {
            
            return redirect()->route('client.index');
       }
       else
       {
        dd("đăng nhập thất bại");
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
