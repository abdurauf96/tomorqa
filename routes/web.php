<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomesController;
use App\Http\Controllers\Admin\FirmsController;
use App\Http\Controllers\Admin\StreetsController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\QuartersController;
use App\Http\Controllers\Admin\DistrictsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\StoredProductsController;
use App\Http\Controllers\Admin\PlantedProductsController;
use App\Http\Controllers\Admin\ExpectedProductsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return redirect('/login');
});


Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index');
        Route::resource('admin/roles', 'App\Http\Controllers\Admin\RolesController');
        Route::resource('admin/permissions', 'App\Http\Controllers\Admin\PermissionsController');
        Route::resource('admin/users', 'App\Http\Controllers\Admin\UsersController');
        Route::resource('admin/activitylogs', 'App\Http\Controllers\Admin\ActivityLogsController')->only([
            'index', 'show', 'destroy'
        ]);
        Route::resource('admin/settings', 'App\Http\Controllers\Admin\SettingsController');
        Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
        Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    });
    

    Route::resource('admin/regions', RegionsController::class);
    Route::resource('admin/districts', DistrictsController::class);
    Route::resource('admin/quarters', QuartersController::class);
    Route::resource('admin/streets', StreetsController::class);
    Route::resource('admin/homes', HomesController::class);

    Route::resource('admin/categories', CategoriesController::class);
    Route::resource('admin/products', ProductsController::class);
    Route::resource('admin/firms', FirmsController::class);
    Route::resource('admin/stored-products', StoredProductsController::class)->except('create');
    Route::get('admin/stored-products/{category_id}/create', [StoredProductsController::class, 'create']);
    Route::resource('admin/planted-products', PlantedProductsController::class)->except('create');
    Route::get('admin/planted-products/{category_id}/create', [PlantedProductsController::class, 'create']);
    Route::resource('admin/expected-products', ExpectedProductsController::class)->except('create');
    Route::get('admin/expected-products/{category_id}/create', [ExpectedProductsController::class, 'create']);
});

require __DIR__.'/auth.php';





