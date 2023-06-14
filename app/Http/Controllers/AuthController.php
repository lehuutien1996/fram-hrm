<?php

namespace App\Http\Controllers;

use App\Exceptions\ApplicationException;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @throws ApplicationException
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if ($token = Auth::attempt($credentials)) {
            return response()->json([
                'token' => $token,
            ]);
        }

        throw new ApplicationException('Invalid Credentials');
    }

    public function register(
        RegisterRequest $request,
        UserRepositoryInterface $userRepository
    ): JsonResponse
    {
        $credentials = $request->validated();

        $user = $userRepository->create($credentials);

        return response()->json([
            'data' => UserResource::make($user),
        ]);
    }
}
