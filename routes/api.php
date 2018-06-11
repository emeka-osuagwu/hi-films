<?php

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

