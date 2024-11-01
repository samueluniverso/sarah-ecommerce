<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Throwable;

class PagamentoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'fk_pedido'          => 'required|integer',
                'fk_forma_pagamento' => 'required|integer',
                'valor'              => 'required|float'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $formaPagamento = FormaPagamento::where('id', $data['fk_forma_pagamento'])->first();
        if (!$formaPagamento) {
            return response()->json([
                'message' => 'Forma pagamento not found!'
            ], 404);
        }

        $pedido = Pedido::where('id', $data['fk_pedido'])->first();
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido not found!'
            ], 404);
        }

        $pagamento =  new Pagamento();
        $pagamento->fk_pedido          = $pedido->id;
        $pagamento->fk_forma_pagamento = $formaPagamento->id;
        $pagamento->valor              = $data['valor'];
        $pagamento->save();

        return response()->json([
            'message' => 'Pagamento created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'                 => 'required|integer',
                'fk_pedido'          => 'required|integer',
                'fk_forma_pagamento' => 'required|integer',
                'valor'              => 'required|float'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $formaPagamento = FormaPagamento::where('id', $data['fk_forma_pagamento'])->first();
        if (!$formaPagamento) {
            return response()->json([
                'message' => 'Forma pagamento not found!'
            ], 404);
        }

        $pedido = Pedido::where('id', $data['fk_pedido'])->first();
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido not found!'
            ], 404);
        }

        $pagamento =  new Pagamento();
        $pagamento->fk_pedido          = $pedido->id;
        $pagamento->fk_forma_pagamento = $formaPagamento->id;
        $pagamento->valor              = $data['valor'];
        $pagamento->update();

        return response()->json([
            'message' => 'Pagamento created successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        $pagamento = Pagamento::where('id', $param)->first();
        if (!$pagamento) {
            return response()->json([
                'message' => 'Pagamento not found!'
            ], 404);
        }

        return response()->json([
            'data' => $pagamento
        ], 200);
    }

    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $pagamento = Pagamento::withTrashed()->find($param);

        if (!$pagamento) {
            return response()->json([
                'message' => 'Pagamento not found!'
            ], 404);
        }
        $pagamento->forceDelete();
        return response()->json([
            'message' => 'Pagamento deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $pagamento = Pagamento::where('id', $param)->first();
        if (!$pagamento) {
            return response()->json([
                'message' => 'Pagamento not found!'
            ], 404);
        }
        $pagamento->delete();
        return response()->json([
            'message' => 'Pagamento inactivated successfully!'
        ], 200);
    }

    public function getByPedido(Request $request)
    {
        return Pagamento::where('fk_pedido', $request->route('id'))->get();
    }
}
