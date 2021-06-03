<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FirmsController;
use App\Http\Controllers\Api\HomesController;
use App\Http\Controllers\Api\RegionsController;
use App\Http\Controllers\Api\StreetsController;
use App\Http\Controllers\Api\QuartersController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\DistrictsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\StoredProductsController;
use App\Http\Controllers\Api\PlantedProductsController;
use App\Http\Controllers\Api\ExpectedProductsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group( function () {
    Route::resource('regions', RegionsController::class);
    Route::resource('districts', DistrictsController::class);
    Route::resource('quarters', QuartersController::class);
    Route::resource('streets', StreetsController::class);
    Route::resource('homes', HomesController::class);
    Route::resource('firms', FirmsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('stored-products', StoredProductsController::class);
    Route::resource('planted-products', PlantedProductsController::class);
    Route::resource('expected-products', ExpectedProductsController::class);
});

Route::post('register', [RegisterController::class, 'register']);