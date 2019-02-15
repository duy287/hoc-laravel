<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){ //kiểm tra đăng nhập hay chưa
            $user=Auth::user();
            if($user->quyen==1) //nếu là admin
                return $next($request);
            else //người dùng thường
                return redirect('admin/dangnhap');
        }
        else //chưa đăng nhập
            return redirect('admin/dangnhap');
    }
}
