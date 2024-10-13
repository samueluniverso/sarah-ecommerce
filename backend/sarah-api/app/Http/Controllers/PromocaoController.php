<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Promocao;
use Illuminate\Http\Request;
use Throwable;

class PromocaoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'dt_inicio'     => 'required|date',
                'dt_fim'        => 'required|date',
                'vl_percentual' => 'required|numeric',
                'vl_absoluto'   => 'required|numeric',
                'fk_produto'    => 'required|integer'
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

        $promocao = new Promocao();
        $promocao->dt_inicio     = $data['dt_inicio'];
        $promocao->dt_fim        = $data['dt_fim'];
        $promocao->vl_percentual = $data['vl_percentual'];
        $promocao->vl_absoluto   = $data['vl_absoluto'];
        $promocao->fk_produto    = $produto->id;

        // $promocao = Promocao::factory()->create([
        //     'dt_inicio'     => $data['dt_inicio'],
        //     'dt_fim'        => $data['dt_fim'],
        //     'vl_percentual' => $data['vl_percentual'],
        //     'vl_absoluto'   => $data['vl_absoluto'],
        //     'fk_produto'    => $produto->id
        // ]);

        return response()->json([
            'message' => 'Promocao created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'            => 'required|integer',
                'dt_inicio'     => 'required|date',
                'dt_fim'        => 'required|date',
                'vl_percentual' => 'required|numeric',
                'vl_absoluto'   => 'required|numeric',
                'fk_produto'    => 'required|integer'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $promocao = Promocao::where('id', $data['id'])->first();
        if (!$promocao) {
            return response()->json([
                'message' => 'Promocao not found!'
            ], 404);
        }

        $produto = Produto::where('id', $data['fk_produto'])->first();
        if (!$produto) {
            return response()->json([
                'message' => 'Produto not found!'
            ], 404);
        }

        $promocao = new Promocao();
        $promocao->dt_inicio     = $data['dt_inicio'];
        $promocao->dt_fim        = $data['dt_fim'];
        $promocao->vl_percentual = $data['vl_percentual'];
        $promocao->vl_absoluto   = $data['vl_absoluto'];
        $promocao->fk_produto    = $produto->id;

        return response()->json([
            'message' => 'Promocao updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        $promocao = Promocao::where('id', $param)->first();
        if (!$promocao) {
            return response()->json([
                'message' => 'Promocao not found!'
            ], 404);
        }

        return response()->json([
            'promocao' => $promocao->produto
        ], 200);
    }

    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $promocao = Promocao::withTrashed()->find($param);
        if (!$promocao) {
            return response()->json([
                'message' => 'Promocao not found!'
            ], 404);
        }
        $promocao->forceDelete();
        return response()->json([
            'message' => 'Promocao deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $promocao = Promocao::where('id', $param)->first();
        if (!$promocao) {
            return response()->json([
                'message' => 'Promocao not found!'
            ], 404);
        }
        $promocao->delete();
        return response()->json([
            'message' => 'Promocao inactivated successfully!'
        ], 200);
    }

    public function listaPaginada(Request $request) {}
}
