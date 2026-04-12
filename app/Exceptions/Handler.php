<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (AuthenticationException $e, $request) {
            if (!$request->is('api/*') || !$request->wantsJson()) {
                return null;
            }

            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to access this page. Please login first.',
                'errors' => $e->getMessage() ?? 'Unauthenticated!',
            ], Response::HTTP_UNAUTHORIZED);
        });
    }
}
