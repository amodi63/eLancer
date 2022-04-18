<?php

use App\Http\Controllers\dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin,web'], function () {
    Route::resource('/categories', Categorycontroller::class);
});
// Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
//     Route::get('/create', [CategoryController::class, 'create'])->name('create');
//     Route::post('/store', [CategoryController::class, 'store'])->name('store');
//     Route::get('/index', [CategoryController::class, 'index'])->name('index');
//     Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
//     Route::put('/{id}/update', [CategoryController::class, 'update'])->name('update');
//     Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('destroy');
// });
