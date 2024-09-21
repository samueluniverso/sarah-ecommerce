<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Throwable;

class CategoriaController extends Controller
{
    public function listByNome (Request $request) {} // Exemplo
    public function update (Request $request) {
        return response()->json([
            'success' => true,
            'message' => $request['id'],
        ]);
    }

    public function store (Request $request)
    {
        $data = [];
        try
        {
            $data = $request->validate([
                'nome'      => 'required|string',
                'descricao' => 'string'
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }

        Categoria::create([
            'nome'      => $data['nome'],
            'descricao' => $data['descricao']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Categoria registrada com sucesso',
        ]);
    }

    public function delete (Request $request) {}
    public function softDelete (Request $request) {}
    public function get (Request $request) {}

    // public function register(Request $request)
    // {
    //     $data = [];
    //     try
    //     {
    //         $data = $request->validate([
    //             'name' => 'required|string|unique:users',
    //             'email' => 'required|string|email|unique:users',
    //             'password' => 'required|min:8',
    //         ]);
    //     }
    //     catch(Throwable $th)
    //     {
    //         return response()->json([
    //             'message' => $th->getMessage()
    //         ]);
    //     }

    //     User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'User registered successfully',
    //     ]);
    // }
}
