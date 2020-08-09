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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix'=>'auth'],function(){
    Route::any('login', 'MainController@login')->name('login');
    Route::post('register', 'MainController@register');

    Route::group(['middleware'=>'auth:api'], function (){
        Route::get('logout', 'MainController@logout');
        Route::get('profile', 'MainController@profile');
        Route::get('carsForSale', 'MainController@getCarsForSale');
        Route::post('tradeIn', 'MainController@tradeIn');
        Route::post('purchaseCar', 'MainController@purchase');
        Route::post('removeClient','MainController@removeClient');
    });



});
