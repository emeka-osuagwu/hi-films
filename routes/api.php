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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/*
|--------------------------------------------------------------------------
| Films Routes
|--------------------------------------------------------------------------
| {url}/films/*
*/
Route::group(['prefix' => 'films'], function () {
	Route::get('/', 'Api\FilmController@FunctionName');
	Route::post('login', 'Api\Auth\LoginController@posUsertLogin');
	Route::post('create', 'Api\UserController@postCreateUser');
	Route::post('update', 'Api\UserController@postUpdateUser');
});

