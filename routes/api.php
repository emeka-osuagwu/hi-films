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
Route::get('films', 'Api\FilmController@getAllFilms');
Route::group(['prefix' => 'film'], function () {
	Route::get('{id}', 'Api\FilmController@getAllFilms');
	Route::post('{id}/comment', 'Api\FilmController@postFilmComment');
});