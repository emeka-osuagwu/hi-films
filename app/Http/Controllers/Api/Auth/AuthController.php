<?php

namespace App\Http\Controllers\Api\Auth;

use Auth;
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
    | Name: postRegister
    | Handles: create user
    | Params: User Data
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

    /*
    |--------------------------------------------------------------------------
    | Name: postLogin
    | Handles: login user
    | Params: User data
    |--------------------------------------------------------------------------
    */
    public function postLogin(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | login user request validation
        |--------------------------------------------------------------------------
        */
        $validator = $this->userValidation->loginUserValidation($request->all());

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
        | authenticate user
        |--------------------------------------------------------------------------
        */
        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {    

            $response = "invalid email or password";

            /*
            |--------------------------------------------------------------------------
            | Send Api response
            |--------------------------------------------------------------------------
            */
            return sendResponse($response, 400);            
        }
        
        /*
        |--------------------------------------------------------------------------
        | Send Api response
        |--------------------------------------------------------------------------
        */
        return sendResponse(Auth::user(), 200);
    }
}
