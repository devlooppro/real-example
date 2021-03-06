<?php

use Illuminate\Support\Facades\Route;

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

Route::post('registration', 'RegistrationController@store')->name('registration');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'auth.middleware'], function () {
    Route::prefix('groups/{group}/')->group(function () {
        Route::apiResource('messages', 'GroupMessageController')->only(['store', 'index', 'destroy']);
        Route::post('add-users', 'GroupController@addUsers')->name('groups-add-users');
    });
});
