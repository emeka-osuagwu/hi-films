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
| User Routes
|--------------------------------------------------------------------------
| {url}/user/*
*/
Route::group(['prefix' => 'user'], function () {
	Route::post('register', 'Api\Auth\AuthController@postRegister');
});

/*
|--------------------------------------------------------------------------
| Films Routes
|--------------------------------------------------------------------------
| {url}/films/*
*/
Route::group(['prefix' => 'films'], function () {
	Route::get('/', 'Api\FilmController@getAllFilms');
});

