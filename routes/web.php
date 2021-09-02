<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\web\ProviderController;
use App\Http\Controllers\admin\ProviderController as AdminProviderController;

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

Route::get('/', [ProviderController::class, 'index']);
Route::get('/show/{username}', [ProviderController::class, 'show']);

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/create-location', [ProviderController::class, 'createLocations'])->middleware('provider');
    Route::get('/store-location', [ProviderController::class, 'storeLocation'])->middleware('provider');
});

Route::prefix('dashboard')->middleware(['auth', 'can-enter-dashboard'])->group(function () {
    Route::get('', [AdminController::class, 'home']);

    Route::get('providers', [AdminProviderController::class, 'index']);
    Route::get('providers/create', [AdminProviderController::class, 'create']);
    Route::post('providers/store', [AdminProviderController::class, 'store']);
    Route::get('providers/delete/{user}', [AdminProviderController::class, 'delete']);

    Route::middleware('superadmin')->group(function () {
        Route::get('admins', [AdminController::class, 'index']);
        Route::get('admins/create', [AdminController::class, 'create']);
        Route::post('admins/store', [AdminController::class, 'store']);
        Route::get('admins/promote/{id}', [AdminController::class, 'promote']);
        Route::get('admins/demote/{id}', [AdminController::class, 'demote']);
        Route::get('admins/delete/{user}', [AdminController::class, 'delete']);
    });
});
