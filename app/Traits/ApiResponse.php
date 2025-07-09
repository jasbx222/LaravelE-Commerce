<?php



namespace App\Traits;

 trait ApiResponse{


    public function error(string $message, int $statusCode = 400)
{
    return response()->json([
        'message' => $message,
        'status' => 'error',
    ], $statusCode);
}
    public function success(string $message, $data = null)
{


    if ($data !== null) {
        $response['data'] = $data;
    }

    return response()->json($response);
}
}
