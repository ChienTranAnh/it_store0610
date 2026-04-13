<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('usersIndex');
    Route::get('/detail', [UserController::class, 'getUser'])->name('currentUser');
    Route::get('/{id}', [UserController::class, 'showUserDetail'])->name('userDetail');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
//    Route::post('/logout-all', [UserController::class, 'logoutAll']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('deleteUser');
    Route::delete('/deletePer/{id}', [UserController::class, 'destroyPermanently'])->name('deleteUserPermanently');
});
