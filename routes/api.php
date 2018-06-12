<?php

Route::get('snap-shot', 'Api\FilmController@getSnapShotData');

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
Route::group(['prefix' => 'films'], function () {
	Route::get('/', 'Api\FilmController@getAllFilms');
	Route::get('{slug}', 'Api\FilmController@getFilm');
	Route::post('{id}/comment', 'Api\FilmController@postFilmComment');
	Route::post('create', 'Api\FilmController@postFilmComment');
});