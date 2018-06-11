<?php

namespace App\Validations;

use Validator;

class FilmValidation
{
	/*
	|--------------------------------------------------------------------------
	| createUserValidation
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
