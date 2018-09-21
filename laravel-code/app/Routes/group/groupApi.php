<?php


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
Route::group(['prefix'=>'/','namespace'=>'Api','domain'=>$domain],function() {

    //Route::middleware('auth:api')->get('/user', 'IndexController@index');
    Route::middleware('web')->get('/user', 'IndexController@index');

});