<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function sendJson($status, $message, $data = [])
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }


    public function successResponse($data = [], $message = "OK")
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function failedResponse($message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ]);
    }
    public function okResponse($message)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }
}
