<?php  

namespace App\Services;

use App\Models\Film;

class FilmService
{
	/*
	|--------------------------------------------------------------------------
	| Name: getAllFilms
	| Handles: fetching all films from database to controller
	| Params: Non
	|--------------------------------------------------------------------------
	*/
	public function getAllFilms()
	{
		return Film::get();
	}
}


?>