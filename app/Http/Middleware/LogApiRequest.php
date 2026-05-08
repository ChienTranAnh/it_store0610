<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogApiRequest
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
        $response = $next($request);
        $message = 'request: ' . $request->ip() . ' - ' . $request->method() . ' - ' . $request->fullUrl() . ' - ' . json_encode($request->input());
        Log::channel('api')->debug($message);
        Log::channel('api')->debug('response: ' . json_encode($response));

        return $response;
    }
}
