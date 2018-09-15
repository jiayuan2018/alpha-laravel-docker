<?php

/*
|--------------------------------------------------------------------------
| Wap Routes
|--------------------------------------------------------------------------
|
| Here is where you can register wap routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('subDomain', '(wap|wx)');

Route::group(['prefix'=>'/','namespace'=>'Wap','domain'=>'{subDomain}.'.$domain],function(){

    Route::get('/', 'WebController@index');

});


