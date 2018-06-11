<?php

namespace App\Validations;

use Validator;

class UserValidation
{
	/*
	|--------------------------------------------------------------------------
	| createUserValidation
	|--------------------------------------------------------------------------
	*/
	public function createUserValidation($data)
	{	
		$validator = Validator::make($data, [
			'email' => 'required|email|unique:users',
			'password' => 'required|string',
			'name' => 'required|string'
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| loginUserValidation
	|--------------------------------------------------------------------------
	*/
	public function loginUserValidation($data)
	{	
		$validator = Validator::make($data, [
			'email' => 'required|email|exists:users',
			'password' => 'required|string',
		]);

		return $validator;
	}
}
