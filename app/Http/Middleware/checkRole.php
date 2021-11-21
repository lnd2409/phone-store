<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
            if(Auth::guard('quantri')->user()->q_id==$role){
                return $next($request);
            }else{
                toastr()->error('Tài khoản của bạn không được phép truy cập');
                return back();
            }
    }
}