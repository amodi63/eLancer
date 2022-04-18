<?php

use App\Http\Controllers\Client\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'client', 'as' => 'client.', 'middleware' => 'auth'], function () {
    Route::resource('projects', ProjectController::class); //name->client.projects.[..]
});
