<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('v1')->group(function(){
	Route::get('agents','Api\v1\AgentController@index');
	Route::get('agent','Api\v1\AgentController@show');
	Route::post('photo/store','Api\v1\PhotoController@store');
	Route::post('store','Api\v1\AgentController@store');
	Route::get('photos','Api\v1\PhotoController@index');
	Route::get('photo','Api\v1\PhotoController@show');
	Route::put('update/{id}','Api\v1\AgentController@update');
	Route::delete('delete/{id}','Api\v1\AgentController@destroy');
	Route::put('photo/update/{id}','Api\v1\PhotoController@update');
	Route::delete('photo/delete/{id}','Api\v1\PhotoController@destroy');
});

