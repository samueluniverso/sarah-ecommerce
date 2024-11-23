<?php

namespace App\Http\Controllers;

use App\Models\CaracteristicaProduto;
use App\Models\Estoque;
use App\Models\Medida;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;

class EstoqueController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'fk_produto'                => 'required|integer',
                'fk_medida'                 => 'required|integer',
                'fk_caracteristica_produto' => 'nullable|integer',
                'maximo'                    => 'required|integer',
                'minimo'                    => 'required|integer',
                'quantidade'                => 'required|integer',
                'ponto_pedido'              => 'nullable|integer',
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $produto = Produto::where('id', $data['fk_produto'])->first();
        if (!$produto) {
            return response()->json([
                'message' => 'Produto not found!'
            ], 404);
        }

        $medida = Medida::where('id', $data['fk_medida'])->first();
        if (!$medida) {
            return response()->json([
                'message' => 'Medida not found!'
            ], 404);
        }

        // $caracteristica_produto = CaracteristicaProduto::where('id', $data['fk_caracteristica_produto'])->first();
        $estoque = new Estoque();
        $estoque->fk_produto                = $produto->id;
        $estoque->fk_medida                 = $medida->id;
        $estoque->fk_caracteristica_produto = $caracteristica_produto->id ?? null;
        $estoque->maximo                    = $data['maximo'];
        $estoque->minimo                    = $data['minimo'];
        $estoque->quantidade                = $data['quantidade'];
        $estoque->ponto_pedido              = $data['ponto_pedido'] ?? null;
        $estoque->save();

        return response()->json([
            'message' => 'Estoque created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'                        => 'required|integer',
                'fk_produto'                => 'required|integer',
                'fk_medida'                 => 'required|integer',
                'fk_caracteristica_produto' => 'nullable|integer',
                'maximo'                    => 'required|integer',
                'minimo'                    => 'required|integer',
                'quantidade'                => 'required|integer',
                'ponto_pedido'              => 'nullable|integer',
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $produto = Produto::where('id', $data['fk_produto'])->first();
        if (!$produto) {
            return response()->json([
                'message' => 'Produto not found!'
            ], 404);
        }

        $medida = Medida::where('id', $data['fk_medida'])->first();
        if (!$medida) {
            return response()->json([
                'message' => 'Medida not found!'
            ], 404);
        }

        // $caracteristica_produto = CaracteristicaProduto::where('id', $data['fk_caracteristica_produto'])->first();
        $estoque = Estoque::where('id', $data['id'])->first();
        $estoque->fk_produto                = $produto->id;
        $estoque->fk_medida                 = $medida->id;
        $estoque->fk_caracteristica_produto = $caracteristica_produto->id ?? null;
        $estoque->maximo                    = $data['maximo'];
        $estoque->minimo                    = $data['minimo'];
        $estoque->quantidade                = $data['quantidade'];
        $estoque->ponto_pedido              = $data['ponto_pedido'] ?? null;
        $estoque->update();

        return response()->json([
            'message' => 'Estoque updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        $categoria = Estoque::where('id', $param)->first();
        if (!$categoria) {
            return response()->json([
                'message' => 'Estoque not found!'
            ], 404);
        }

        return response()->json([
            'data' => $categoria
        ], 200);
    }

    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $estoque = Estoque::withTrashed()->find($param);

        if (!$estoque) {
            return response()->json([
                'message' => 'Estoque not found!'
            ], 404);
        }
        $estoque->forceDelete();
        return response()->json([
            'message' => 'Estoque deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $estoque = Estoque::where('id', $param)->first();
        if (!$estoque) {
            return response()->json([
                'message' => 'Estoque not found!'
            ], 404);
        }
        $estoque->delete();
        return response()->json([
            'message' => 'Estoque inactivated successfully!'
        ], 200);
    }

    public function getByProduto(Request $request)
    {
        return Estoque::where('fk_produto', $request->route('id'))->get();
    }

    public function getByMedida(Request $request)
    {
        return Estoque::where('fk_medida', $request->route('id'))->get();
    }

    public function getByQuantidade(Request $request)
    {
        return Estoque::where('quantidade', $request->route('id'))->get();
    }
}
