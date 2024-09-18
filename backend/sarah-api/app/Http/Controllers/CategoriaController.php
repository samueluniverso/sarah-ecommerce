<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class CategoriaController extends Controller
{
    public function listByNome (Request $request) {} // Exemplo
    public function update (Request $request) {}
    public function store (Request $request) {}
    public function delete (Request $request) {}
    public function softDelete (Request $request) {}
    public function get (Request $request) {}

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
