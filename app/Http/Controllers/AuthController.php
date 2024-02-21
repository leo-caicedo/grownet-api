<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\LoginRequest;
use App\Http\Requests\Users\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $newUserData = $request->json()->all();
        $user = User::create($newUserData);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token_type' => 'Bearer',
            'auth_token' => $token
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->json()->all();

        $user = User::where('email', $credentials['email'])->firstOrFail();
        // Validar crendenciales
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token_type' => 'Bearer',
            'auth_token' => $token,
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        // Eliminar token de acceso de usuario
        $user->tokens()->delete();

        return response()->json(['message' => 'You have been successfully logged out']);
    }
}
