<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Throwable;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
        try
        {
            $data = $request->validate([
                'nome'      => 'required|string',
                'descricao' => 'nullable|string'
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $categoria = Categoria::factory()->create([
            'nome'      => $data['nome'],
            'descricao' => $data['descricao'] ?? null
        ]);

        return response()->json([
            'message' => 'Categoria created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try
        {
            $data = $request->validate([
                'id'        => 'required|integer',
                'nome'      => 'required|string|min:1',
                'descricao' => 'nullable|string'
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        if (!Categoria::where('id', $data['id'])->exists()) {
            return response()->json([
                'message' => 'Categoria not found!'
            ], 404);
        }

        $categoria = Categoria::where('id', $data['id'])->first();
        $categoria->nome      = $data['nome'];
        $categoria->descricao = $data['descricao'] ?? null;
        $categoria->update();

        return response()->json([
            'message' => 'Categoria updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        if (!Categoria::where('id', $param)->exists()) {
            return response()->json([
                'message' => 'Categoria not found!'
            ], 404);
        }

        $categoria = Categoria::where('id', $param)->first();

        return response()->json([
            'categoria' => $categoria
        ], 200);
    }

    public function delete(Request $request)
    {
        $param = $request->route('id');

        if (!Categoria::where('id', $param)->exists()) {
            return response()->json([
                'message' => 'Categoria not found!'
            ], 404);
        }

        $categoria = Categoria::where('id', $param)->first();
        $categoria->delete();

        return response()->json([
            'message' => 'Categoria deleted successfully!'
        ], 200);
    }
}

