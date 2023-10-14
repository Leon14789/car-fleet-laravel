<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\authController;

Route::get('/Register', [authController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
