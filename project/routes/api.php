<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\JobController;



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
Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('optimize:clear');
        $exitCode = Artisan::call('clear-compiled');
        return "API's clear all cache . DONE"; //Return anything
    });

    Route::group(['namespace' => 'Api'], function () {
        Route::get('/', function () {
            return "Welcome to Mobile API's";
        });
                
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::group(['middleware' => ['auth:api']], function(){
            Route::get('logout', [AuthController::class, 'logout']);

            // Users Routes
            Route::get('users-lists', [UsersController::class, 'index'])->name('users-lists');
            Route::post('users-update', [UsersController::class, 'update'])->name('users-update');
            Route::post('users-delete', [UsersController::class, 'destroy'])->name('users-delete');
        });
        
    });

});
