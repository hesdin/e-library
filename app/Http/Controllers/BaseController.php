<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result, $message, $code = 200){
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $result
        ];

        return response()->json($response,$code);
    }

     public function sendError($error, $errorMessage = [], $code = 400){
        $response = [
            'success' => false,
            'message' => $error,
            'data' => $errorMessage
        ];
        return response()->json($response, $code);
    }
}
