<?php  

namespace App\Services;

use App\Models\User;

class UserService
{
	/*
	|--------------------------------------------------------------------------
	| Name: createUser
	| Handles: inset new user into the database
	| Params: user data
	|--------------------------------------------------------------------------
	*/
	public function createUser($data)
	{
		return User::create($data);
	}
}


?>