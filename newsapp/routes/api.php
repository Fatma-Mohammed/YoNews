<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'],function () {
    Route::post('login', 'Api\AuthController@login')->name('api.auth.login');
    Route::post('register','Api\AuthController@register')->name('api.auth.login');
    Route::post('logout','Api\AuthController@logout')->name('api.auth.logout');
    Route::get('news','Api\ArticlesController@list');
    Route::get('favorites','Api\FavoriteController@index'); 

    // Route::get('test', function() {
    //     return 1;
    
    // })->middleware('auth:sanctum');

    // Route::get('test2', function() {
    //     return 2;
    
    // });
});

