<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    /**
     * 
     * Function to register user via api
     * 
     * @param Request $request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        return $this->sendResponse(new UserCollection($user), 'User Created Successfully', 201);
    }
}
