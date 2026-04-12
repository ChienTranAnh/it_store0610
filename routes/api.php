<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class, 'login']);

Route::prefix('users')->group(function () {
    require_once __DIR__ . '/api/users.php';
});

// define routes does not defined
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Route Not Found!',
        'code' => Response::HTTP_NOT_FOUND
    ], Response::HTTP_NOT_FOUND);
});
