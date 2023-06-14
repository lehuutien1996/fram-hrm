<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): bool|\Illuminate\Http\JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'status_code' => Response::HTTP_BAD_REQUEST,
                'message'     => $this->getMessage(),
            ]);
        }

        return false;
    }
}
