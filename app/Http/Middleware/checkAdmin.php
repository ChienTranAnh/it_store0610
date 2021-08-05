<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdmin
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
        if ($request->session()->get('user')->VaiTroId == "ADMIN") {
            return $next($request);
        }
        
        return redirect('/error')->with('message', "Chức năng chỉ dành cho Quản trị viên!");
    }
}
