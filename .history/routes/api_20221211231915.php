<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserApiController;
use App\Http\Controllers\Api\V1\ProductApiController;
use App\Http\Controllers\Api\V1\ProductVariantApiController;
use App\Http\Controllers\Api\V1\VariantGroupApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'v1'], function () {

    Route::post('register', [UserApiController::class, 'register']);
    Route::post('login', [UserApiController::class, 'login']);
    Route::get('refresh', [UserApiController::class, 'refresh']);

    Route::group(['middleware' => 'jwt.auth', 'jwt.verify'], function () {
        Route::get('user', [UserApiController::class, 'getUser']);
        Route::post('logout', [UserApiController::class, 'logout']);
        Route::resource('products', ProductApiController::class);
        Route::resource('productvariants', ProductVariantApiController::class);
        Route::resource('variantgroups', VariantGroupApiController::class);
    });
});
