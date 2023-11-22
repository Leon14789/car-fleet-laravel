<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\vehiclesController;
use App\Http\Controllers\Api\payController;

use App\Http\Controllers\WebService\webServiceController;

Route::apiResources([
    'Vehicles' => vehiclesController::class
]);

Route::get('vehicles/{vehicle_type}/brand', [vehiclesController::class, 'brand']);
Route::get('vehicles/{vehicle_type}/{vehicle_brand}/model', [vehiclesController::class, 'model']);
Route::get('vehicles/{vehicle_type}/{vehicle_model}/version', [vehiclesController::class, 'version']);

Route::group(['prefix' => 'pay'], function () {
    Route::get('plans', [PayController::class, 'plans']);
});

Route::group(['prefix' => 'webservice'], function() {
    Route::post('cep', [webServiceController::class, 'cep']);
});