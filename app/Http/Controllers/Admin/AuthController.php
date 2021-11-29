<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function handleLogin(Request $request) {
        $arrLogin = [
            'username' => $request->username,
            'password' => $request->password];
        if (Auth::guard('quantri')->attempt($arrLogin)) {
            return redirect()->route('admin.index');
        }else{
            toastr()->error('Không đúng tài khoản hoặc mật khẩu');
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::guard('quantri')->logout();
        return redirect()->route('admin.signIn');
    }

    public function handleRegister(Request $request)
    {
        $data= $request->except('_token','confirmpassword', 'password');
        $data['password'] = Hash::make($request->password);
        DB::table('khachhang')->insert($data);
       return redirect()->back();
    }
}