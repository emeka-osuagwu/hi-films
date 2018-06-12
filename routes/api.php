<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
| {url}/user/*
*/
Route::group(['prefix' => 'user'], function () {
	Route::post('register', 'Api\Auth\AuthController@postRegister');
	Route::post('login', 'Api\Auth\AuthController@postLogin');
});

/*
|--------------------------------------------------------------------------
| Films Routes
|--------------------------------------------------------------------------
| {url}/films/*
*/
Route::get('films', 'Api\FilmController@getAllFilms');
Route::group(['prefix' => 'film'], function () {
	Route::get('{slug}', 'Api\FilmController@getFilm');
	Route::post('{id}/comment', 'Api\FilmController@postFilmComment');
});