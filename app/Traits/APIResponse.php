<?php

namespace App\Traits;

trait APIResponse
{
//    public function response( $data = null, $message = 'done successfully', $code = 200){
//        return response()->json(['message' => $message, 'data' => $data, 'code' => $code]);
//    }


    public function sendResponse($data, $message = null)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = null, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'data' => $errorMessages
        ];

        return response()->json($response, $code);
    }
}
