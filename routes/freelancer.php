<?php

use App\Http\Controllers\freelancer\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'Freelancer', 'middleware' => ['auth:admin'], 'as' => 'Freelancer.'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
    // Route::get('/show', [ProfileController::class, 'show'])->name('show');
});
