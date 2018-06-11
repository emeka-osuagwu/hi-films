<?php

namespace App\Http\Controllers\Api;

use App\Services\FilmService;
use Illuminate\Http\Request;

class FilmController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| employeeService
	|--------------------------------------------------------------------------
	*/
	protected $filmService;

	/*
	|--------------------------------------------------------------------------
	| employeeService
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| Service Dependency Injection 
	|--------------------------------------------------------------------------
	*/
	public function __construct
	(
		FilmService $filmService
	)
	{
		$this->filmService = $filmService;
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


    	
    }
}
