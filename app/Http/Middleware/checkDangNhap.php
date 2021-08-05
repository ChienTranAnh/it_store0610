<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkDangNhap
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
        if ($request->session()->get('user') != null) {
            return $next($request);
        }

        return redirect('/dangnhap')->with('message', 'Bạn phải đăng nhập mới được truy cập trang này!');
    }
}
