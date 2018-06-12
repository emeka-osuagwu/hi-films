<?php  

namespace App\Services;

use Carbon\Carbon;
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
		return Film::with('comments')->get();
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
	| Name: saveFilm
	| Handles: fetching film from database to controller
	| Params: Film Id or etc
	|--------------------------------------------------------------------------
	*/
	public function saveFilm($data)
	{
		$data['slug'] = $data['name'] . Rand(1, 500);
		$data['realease_date'] = Carbon::now();
		return Film::create($data);
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