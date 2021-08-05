<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUser
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
        $mang = array("USER", "CHECKER", "SUPER", "ADMIN");
        for($i=0; $i < count($mang); $i++)
        {
            if ($request->session()->get('user')->VaiTroId == $mang[$i])
            {
                return $next($request);
            }
        }

        return redirect('/error')->with('message', 'Chức năng dành cho người dùng trở lên!');
    }
}