<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\FilmService;
use App\Validations\FilmValidation;

class FilmController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| filmService
	|--------------------------------------------------------------------------
	*/
	protected $filmService;

	/*
	|--------------------------------------------------------------------------
	| filmValidation
	|--------------------------------------------------------------------------
	*/
	protected $filmValidation;

	/*
	|--------------------------------------------------------------------------
	| Service Dependency Injection 
	|--------------------------------------------------------------------------
	*/
	public function __construct
	(
		FilmService $filmService,
		FilmValidation $filmValidation
	)
	{
		$this->filmService = $filmService;
		$this->filmValidation = $filmValidation;
	}

    /*
    |--------------------------------------------------------------------------
    | Handles: fetching all films
    | Params: Non
    |--------------------------------------------------------------------------
    */
    public function getAllFilms()
    {
        /*
        |--------------------------------------------------------------------------
        | get all films from Films service
        |--------------------------------------------------------------------------
        */
        $films = $this->filmService->getAllFilms();

        /*
        |--------------------------------------------------------------------------
        | Send Api response
        |--------------------------------------------------------------------------
        */
        return sendResponse($films, 200);
    }

	/*
	|--------------------------------------------------------------------------
	| Handles: fetching single films
	| Params: film id
	|--------------------------------------------------------------------------
	*/
    public function getFilm($slug)
    {
    	/*
    	|--------------------------------------------------------------------------
    	| get film from Films service
    	|--------------------------------------------------------------------------
    	*/
    	$film = $this->filmService->getFilmBy('slug', $slug)->get();

    	/*
    	|--------------------------------------------------------------------------
    	| Send Api response
    	|--------------------------------------------------------------------------
    	*/
    	return sendResponse($film, 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Handles: comment on a film
    | Params: Comment data
    |--------------------------------------------------------------------------
    */
    public function postFilmComment(Request $request)
    {
    	/*
    	|--------------------------------------------------------------------------
    	| comment request validation
    	|--------------------------------------------------------------------------
    	*/
    	$validator = $this->filmValidation->addFilmCommentValidation($request->all());

    	/*
    	|--------------------------------------------------------------------------
    	| check validation status
    	|--------------------------------------------------------------------------
    	*/
    	if ($validator->fails()) 
    	{   
    	    return sendResponse($validator->errors(), 400);
    	}

    	/*
    	|--------------------------------------------------------------------------
    	| create comment with filmService
    	|--------------------------------------------------------------------------
    	*/
    	$response = $this->filmService->saveComment($request->all());

    	/*
    	|--------------------------------------------------------------------------
    	| Send Api response
    	|--------------------------------------------------------------------------
    	*/
    	return sendResponse($response, 200);
    }
}
