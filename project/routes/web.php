<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
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
Auth::routes();

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('clear-compiled');
    return 'Clear all cache . DONE'; //Return anything
});



Route::get('logout', [LoginController::class, 'logout']);


Route::group(['middleware' => ['guest']], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/', 'showLoginForm');
        // Authentication Routes...
        Route::get('login', 'showLoginForm');
        Route::post('login', 'login')->name('login');
    });
});

Route::group(['middleware' => 'auth',], function() {
    /********************* Users *************************/
    Route::resource('users', UsersController::class);
    Route::controller(UsersController::class)->group(function () {
        Route::get('Alldata-users', 'index')->name('users.allData');
        Route::post('delete-users', 'destroy')->name('users.delete');
        Route::post('Status-users', 'status_update')->name('users.status');
    });
    
});

