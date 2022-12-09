<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserApiController extends Controller
{
    /**
     * Constructor
     * 
     */
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login', 'register', 'refresh']]);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to register user via api
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->only('name', 'email', 'password', 'password_confirmation'), [
            'name' => 'required|min:3|string',
            'email' => 'required|string|email||max:120|unique:users,email',
            'password' => 'required|string|min:4|confirmed'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Invalid Data Provided', 422);
        }

        // Create user
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->get('password'))]
        ));

        // Logic Used: JWT Token is only created when you login

        return $this->sendResponse(new UserResource($user), 'User Created Successfully', 201);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to login user via api
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->only('email', 'password'), [
            'email' => 'required',
            'password' => 'required'
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Incomplete Data Provided', 422);
        }

        // Authenticate user
        try {
            if (!$token = JWTAuth::attempt($validator->validated())) {
                return  $this->sendError([], 'Invalid Credentials', 422);
            }
        } catch (JWTException $e) {
            return $this->sendError([], $e->getMessage(), 500);
        }

        // Data to be sent alongside jwt token
        $data = [
            'user' => new UserResource(auth()->user()),  // hide some user fields
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer'
            ]
        ];

        return $this->sendResponse($data, 'Login Successful', 201);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to logout user via api
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->invalidate(true);

        auth('api')->logout();

        return $this->sendResponse([], 'Logout Successful', 201);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to refresh user token via api
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {

        try {
            $token = auth('api')->refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return $this->sendError([], $e->getMessage(), 401);
        }

        // Data to be sent alongside jwt token
        $data = [
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ];

        return $this->sendResponse($data, 'Token Refresh Successful', 201);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to refresh user token via api
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return $this->sendError([], "User not found", 403);
            }
        } catch (JWTException $e) {
            return $this->sendError([], $e->getMessage(), 500);
        }

        return $this->sendResponse(new UserResource($user), "User data retrieved", 200);
    }
}
