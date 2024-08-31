<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Repository\RepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Throwable;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();
        if (!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json([
                'success' => false,
                'message' => 'Username or password is incorrect',
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged-in successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged-out successfully'
        ]);
    }

    public function register(Request $request)
    {
        $data = [];
        try
        {
            $data = $request->validate([
                'name' => 'required|string|unique:users',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|min:8',
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
        ]);
    }
}
