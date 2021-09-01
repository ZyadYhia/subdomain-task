<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;

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
    return view('welcome');
});
$providersId = Role::where('name', 'providers')->first()->id;
$providers = User::where('user_id', $providersId)->get();
foreach ($providers as $provider) {
    // Route::domain("{$provider->user_name}." . config()->get('url'))->group(function () {
    //     Route::get('/', [ProviderController::class, 'index']);
    // });
    Route::domain("{subdomain}." . config()->get('url'))->group(function () {
        Route::get('/', [ProviderController::class, 'index']);
    });
}
