<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Throwable;

class MarcaController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nome'      => 'required|string|min:1',
                'descricao' => 'nullable|string'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $marca = new Marca();
        $marca->nome      = $data['nome'];
        $marca->descricao = $data['descricao'] ?? null;
        $marca->save();

        return response()->json([
            'message' => 'Marca created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'        => 'required|integer',
                'nome'      => 'required|string|min:1',
                'descricao' => 'nullable|string'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        if (!Marca::where('id', $data['id'])->exists()) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $marca = Marca::where('id', $data['id'])->first();
        $marca->nome      = $data['nome'];
        $marca->descricao = $data['descricao'] ?? null;
        $marca->update();

        return response()->json([
            'message' => 'Marca updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        if (!Marca::where('id', $param)->exists()) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $marca = Marca::where('id', $param)->first();

        return response()->json([
            'Marca' => $marca
        ], 200);
    }


    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $marca = Marca::withTrashed()->find($param);
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }
        $marca->forceDelete();
        return response()->json([
            'message' => 'Marca deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $marca = Marca::where('id', $param)->first();
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $marca->delete();
        return response()->json([
            'message' => 'Marca inactivated successfully!'
        ], 200);
    }

    public function list(Request $request) {}
}
