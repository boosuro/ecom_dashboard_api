<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *   title="APIs For OrdersPackPHPTest",
 *   version="1.0.0",
 * @OA\Contact(
 *   email="boosurostephen@yahoo.com"
 * ),
 * ),
 * @OA\Server(
 *   url=L5_SWAGGER_CONST_HOST,
 *   description="PHP TEST API Server"
 * )
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
