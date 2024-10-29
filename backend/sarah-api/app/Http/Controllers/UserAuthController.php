<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Throwable;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json([
                'message' => 'Username or password is incorrect',
            ], 401);
        }

        $user->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged-in successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
            'pessoa_id' => $user->id
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged-out successfully'
        ], 200);
    }

    public function register(Request $request)
    {
        $data = [];
        try
        {
            $data = $request->validate([
                'username' => 'required|string|unique:users',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|min:8',
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
        ], 201);
    }

    public function get(Request $request)
    {
        return response()->json([
            'data' => User::where('id', $request->route('id'))->first()
        ], 500);
    }
}
