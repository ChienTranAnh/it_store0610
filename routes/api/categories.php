<?php

use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CategoriesController::class, 'index'])->name('categories');
Route::get('/{slug}', [CategoriesController::class, 'show'])->name('categoriesDetail');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/', [CategoriesController::class, 'store'])->name('categoriesCreate');
    Route::patch('/{id}', [CategoriesController::class, 'update'])->name('categoriesUpdate');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('categoriesDelete');
});
