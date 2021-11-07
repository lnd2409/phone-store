<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAuthQuanTri
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('quantri')->check()){
            if(Auth::guard('quantri')->user()->qt_active==1){
                return $next($request);
            }else{
                toastr()->error('Tài khoản của bạn đã bị vô hiệu hoá');
                return redirect()->route('admin.logout');
            }
        }else{
            return redirect()->route('admin.signIn');
        }
    }
}