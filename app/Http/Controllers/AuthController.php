<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(RegistrationRequest $request) : JsonResponse
    {
        $user = User::query()->create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => "Пользователь успешно зарегистрирован",
            'data' => [
                "login" => $user->login,
            ]
        ], 201);
    }

    public function signin(AuthRequest $request) : JsonResponse
    {
        if (auth()->attempt($request->validated())) {
            $user = auth()->user();
            return response()->json([
                'status' => 'success',
                'message' => "Пользователь успешно авторизован",
                'data' => [
                    "login" => $user->login,
                    "lastName" => $user->lastName,
                    "birthDate" => $user->birthDate
                ],
                'token' => $user->createToken('api')->plainTextToken
            ]);
        }
        else {
            return response()->json([
                'error' => 400
            ]);
        }
    }
}
