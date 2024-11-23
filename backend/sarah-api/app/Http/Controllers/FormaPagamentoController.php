<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;
use Throwable;

class FormaPagamentoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'tipo'      => 'nullable|string',
                'descricao' => 'nullable|string'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $formaPagamento = new FormaPagamento();
        $formaPagamento->tipo      = $data['tipo'];
        $formaPagamento->descricao = $data['descricao'];
        $formaPagamento->save();

        return response()->json([
            'message' => 'Forma pagamento created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'        => 'required|integer',
                'tipo'      => 'required|string',
                'descricao' => 'required|string'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $formaPagamento = FormaPagamento::where('id', $data['id'])->first();
        if (!$formaPagamento) {
            return response()->json([
                'message' => 'Forma pagamento not found!'
            ], 404);
        }

        $formaPagamento->tipo      = $data['tipo'];
        $formaPagamento->descricao = $data['descricao'];
        $formaPagamento->update();

        return response()->json([
            'message' => 'Forma pagamento updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        $formaPagamento = FormaPagamento::where('id', $param)->first();
        if (!$formaPagamento) {
            return response()->json([
                'message' => 'Forma pagamento not found!'
            ], 404);
        }

        return response()->json([
            'data' => $formaPagamento
        ], 200);
    }

    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $formaPagamento = FormaPagamento::withTrashed()->find($param);

        if (!$formaPagamento) {
            return response()->json([
                'message' => 'Forma pagamento not found!'
            ], 404);
        }
        $formaPagamento->forceDelete();
        return response()->json([
            'message' => 'Forma pagamento deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $formaPagamento = FormaPagamento::where('id', $param)->first();
        if (!$formaPagamento) {
            return response()->json([
                'message' => 'Forma pagamento not found!'
            ], 404);
        }

        $formaPagamento->delete();
        return response()->json([
            'message' => 'Forma pagamento inactivated successfully!'
        ], 200);
    }

    public function getByTipo(Request $request)
    {
        return FormaPagamento::whereRaw('lower(tipo) ILIKE ?', ["%{$request->route('tipo')}%"])->get();
    }

    public function getByDescricao(Request $request)
    {
        return FormaPagamento::whereRaw('lower(descricao) ILIKE ?', ["%{$request->route('descricao')}%"])->get();
    }

    public function listaPaginada(Request $request) {}
}
