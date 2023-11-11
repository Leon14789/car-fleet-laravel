<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\vehiclesController;

Route::apiResources([
    'Vehicles' => vehiclesController::class
]);