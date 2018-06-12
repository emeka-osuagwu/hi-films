<?php  

namespace App\Services;

use App\Models\Genre;

class GenreService
{
	/*
	|--------------------------------------------------------------------------
	| Name: getAllGenres
	| Handles: fetch all genres to controller
	| Params: user data
	|--------------------------------------------------------------------------
	*/
	public function getAllGenres()
	{
		return Genre::all();
	}
}


?>