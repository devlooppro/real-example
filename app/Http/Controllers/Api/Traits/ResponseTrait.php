<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait ResponseTrait
 * @package App\Http\Controllers\Api\Traits
 */
trait ResponseTrait
{
    /**
     * @param string $message
     * @param bool $key
     * @param int $status
     * @return JsonResponse
     */
    public function invalidate(string $message, bool $key = false, int $status = Response::HTTP_UNPROCESSABLE_ENTITY): JsonResponse
    {
        $data = [
            'success' => false,
            'message' => $message,
        ];

        if ($key) {
            $data['errors'][$key] = $message;
        }

        return response()->json($data, $status);
    }

    /**
     * @param string $message
     * @param string $key
     * @return JsonResponse
     */
    public function invalidateField(string $message, string $key): JsonResponse
    {
        $data['errors'][$key] = $message;

        return response()->json($data, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param array $keysMessages
     * @return JsonResponse
     */
    public function invalidateFields(array $keysMessages): JsonResponse
    {
        $data = [];

        foreach ($keysMessages as $key => $message) {
            $data['errors'][$key] = $message;
        }

        return response()->json($data, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function success(string $message, int $status = Response::HTTP_OK): JsonResponse
    {
        $data = [
            'success' => true,
            'message' => $message,
        ];

        return response()->json($data, $status);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function notFound(string $message = ''): JsonResponse
    {
        $message = $message ?: trans('messages.not found');

        return $this->invalidate($message, false, Response::HTTP_NOT_FOUND);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function forbidden(string $message = ''): JsonResponse
    {
        $message = $message ?: trans('messages.access forbidden');

        return $this->invalidate($message, false, Response::HTTP_FORBIDDEN);
    }
}
