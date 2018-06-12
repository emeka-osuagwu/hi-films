<?php  

namespace App\Services;

use App\Models\Film;
use App\Models\Comment;

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
		return Film::with('comments', 'genres_list')->get();
	}

	/*
	|--------------------------------------------------------------------------
	| Name: getFilm
	| Handles: fetching film from database to controller
	| Params: Film Id or etc
	|--------------------------------------------------------------------------
	*/
	public function getFilmBy($field, $value)
	{
		return Film::with('comments')->where($field, $value);
	}

	/*
	|--------------------------------------------------------------------------
	| Name: saveComment
	| Handles: save user comment into database
	| Params: Comment data
	|--------------------------------------------------------------------------
	*/
	public function saveComment($data)
	{
		return Comment::create($data);
	}
}


?>