<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    public function success($data, string $message = 'Success!')
    {
        $response = [
            'success' => true,
            'message' => $message,
            'code' => JsonResponse::HTTP_OK,
        ];

        if ($data) {
            $response['total'] = is_array($data) ? count($data) : count([$data]);
            $response['data'] = $data;
        }

        return response()->json($response, JsonResponse::HTTP_OK);
    }

    public function createdSuccess($data, $message = 'Created success!')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'code' => JsonResponse::HTTP_OK,
            'data' => $data
        ], JsonResponse::HTTP_CREATED);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function failed(string $message = 'Failed!', int $statusCode = JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'code' => $statusCode,
        ], $statusCode);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function notFound(string $message = 'Not Found!')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'code' => JsonResponse::HTTP_NOT_FOUND
        ], JsonResponse::HTTP_NOT_FOUND);
    }
}
