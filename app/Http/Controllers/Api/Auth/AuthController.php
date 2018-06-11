<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Validations\UserValidation;
use App\Http\Controllers\Api\Controller;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | userValidation
    |--------------------------------------------------------------------------
    */
    protected $userValidation;

    /*
    |--------------------------------------------------------------------------
    | userService
    |--------------------------------------------------------------------------
    */
    protected $userService;

    /*
    |--------------------------------------------------------------------------
    | Service Dependency Injection 
    |--------------------------------------------------------------------------
    */
    public function __construct
    (
        UserService $userService,
        UserValidation $userValidation
    )
    {
        $this->userService = $userService;
        $this->userValidation = $userValidation;
    }

    /*
    |--------------------------------------------------------------------------
    | Name: register
    | Handles: create user
    | Params: Non
    |--------------------------------------------------------------------------
    */
    public function postRegister(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | create user request validation
        |--------------------------------------------------------------------------
        */
        $validator = $this->userValidation->createUserValidation($request->all());

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
        | create user with userService
        |--------------------------------------------------------------------------
        */
        $response = $this->userService->createUser($request->all());
        
        /*
        |--------------------------------------------------------------------------
        | Send Api response
        |--------------------------------------------------------------------------
        */
        return sendResponse($response, 200);
    }
}
