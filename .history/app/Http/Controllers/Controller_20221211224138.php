<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *    title="APIs For OrdersPackPHPTest",
 *    version="1.0.0",
 * ),
 *   @OA\SecurityScheme(
 *       securityScheme="api_key_security_example",
 *       in="header",
 *       name="bearer",
 *       type="apiKey",
 *       scheme="bearer",
 *       bearerFormat="JWT",
 *    ),
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to send response without error
     * 
     * @param $data
     * @param $message
     * @param $status
     * 
     */
    public function sendResponse($data, $message, $status = 200)
    {
        $response = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response, $status);
    }

    /**
     * 
     * @author Boosuro Stephen <boosurostephen@yahoo.com>
     * 
     * Function to send error resposne
     * 
     * @param $errorData
     * @param $message
     * @param $status
     * 
     */
    public function sendError($errorData, $message, $status = 500)
    {
        $response = [];
        $response['message'] = $message;
        if (!empty($errorData)) {
            $response['error'] = $errorData;
        }

        return response()->json($response, $status);
    }
}
