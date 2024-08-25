<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserAuthController extends Controller
{
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
            'message' => 'User registered successfully.'
        ]);
    }
}
