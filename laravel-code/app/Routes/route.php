<?php

/*
|--------------------------------------------------------------------------
| Common Routes
|--------------------------------------------------------------------------
|
| Here is the common routes for all domain application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('common/get', 'Common\CommonController@getIndex');
Route::post('common/post', 'Common\CommonController@postIndex');


