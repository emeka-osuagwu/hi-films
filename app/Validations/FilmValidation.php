<?php

namespace App\Validations;

use Validator;

class FilmValidation
{
	/*
	|--------------------------------------------------------------------------
	| createFilmValidation
	|--------------------------------------------------------------------------
	*/
	public function createFilmValidation($data)
	{	
		$validator = Validator::make($data, [
			'film_id' => 'required|integer|exists:films,id',
			'comment' => 'required|string',
			'name' => 'required|string',
		]);

		return $validator;
	}
	
	/*
	|--------------------------------------------------------------------------
	| addFilmCommentValidation
	|--------------------------------------------------------------------------
	*/
	public function addFilmCommentValidation($data)
	{	
		$validator = Validator::make($data, [
			'film_id' => 'required|integer|exists:films,id',
			'comment' => 'required|string',
			'name' => 'required|string',
		]);

		return $validator;
	}
}
