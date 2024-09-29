<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;

class ProdutoController extends Controller
{
    public function store(Request $request)
    {
        try
        {
            $data = $request->validate([
                'nome'        => 'required|string',
                'is_destaque' => 'required|boolean',
                'preco'       => 'required|numeric',
                'fk_marca'    => 'required|integer'
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $marca = Marca::where('id', $data['fk_marca'])->first();
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $produto = Produto::factory()->create()([
            'nome'        => $data['nome'],
            'is_destaque' => $data['is_destaque'],
            'preco'       => $data['preco'],
            'fk_marca'    => $marca->id
        ]);

        // $produto->nome        = $data['nome'];
        // $produto->is_destaque = $data['is_destaque'];
        // $produto->preco       = $data['preco'];
        // $produto->fk_marca =    $marca->id;
        // $produto->save();

        return response()->json([
            'message' => 'Produto created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try
        {
            $data = $request->validate([
                'id'          => 'required|integer',
                'is_destaque' => 'required|boolean',
                'preco'       => 'required|numeric',
                'fk_marca'    => 'required|integer'
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $marca = Marca::where('id', $data['fk_marca'])->first();
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $produto = new Produto();
        $produto->nome        = $data['nome'];
        $produto->is_destaque = $data['is_destaque'];
        $produto->preco       = $data['preco'];
        $produto->fk_marca =    $marca->id;
        $produto->update();

        return response()->json([
            'message' => 'Produto updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        $produto = Produto::where('id', $param)->first();
        if (!$produto) {
            return response()->json([
                'message' => 'Produto not found!'
            ], 404);
        }

        return response()->json([
            'produto' => $produto->marca
        ], 200);
    }

    public function delete(Request $request)
    {
        $param = $request->route('id');

        $produto = Produto::where('id', $param)->first();
        if (!$produto) {
            return response()->json([
                'message' => 'Produto not found!'
            ], 404);
        }
        $produto->delete();
        return response()->json([
            'message' => 'Produto deleted successfully!'
        ], 200);
    }
}
