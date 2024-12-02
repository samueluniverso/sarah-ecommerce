<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use stdClass;
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

        $marca = Marca::where('id', $data['id'])->first();
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

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

        $marca = Marca::where('id', $param)->first();
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        return response()->json([
            'data' => $marca
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

    public function getByNome(Request $request)
    {
        return Marca::whereRaw('lower(nome) ILIKE ?', ["%{$request->route('nome')}%"])->get();
    }

    public function getByDescricao(Request $request)
    {
        return Marca::whereRaw('lower(descricao) ILIKE ?', ["%{$request->route('descricao')}%"])->get();
    }

    public function listaPaginada2(Request $request)
    {
        // Vai aceitar os queryParams
        $request->limit ?? '10'; // Se nao vier um limit ele assume como 10
        $request->offset ?? '0'; // Se nao vier um offset ele assume como 0
    }

    public function listaPaginada(Request $request)
    {
        try {
            $request->validate([
                'limit'  => 'nullable|integer',
                'offset' => 'nullable|integer'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $request->limit ?? '10'; // Se nao vier um limit ele assume como 10
        $request->offset ?? '0'; // Se nao vier um offset ele assume como 0

        $marca  = new Marca();
        $marcas = $marca->take($request->limit)->skip($request->offset)->get();

        $arrayMarcas = [];
        foreach ($marcas as $marca) {

            $objMarca = new stdClass();
            $objMarca->id        = $marca['id'];
            $objMarca->nome      = $marca['nome'];
            $objMarca->descricao = $marca['preco'];
            $arrayMarcas[] = $objMarca;
        }

        return response()->json([
            'data' => $arrayMarcas
        ], 200);
    }

    public function listar(Request $request)
    {
        $marca  = new Marca();
        $marcas = $marca->get();

        $arrayMarcas = [];
        foreach ($marcas as $marca) {

            $objMarca = new stdClass();
            $objMarca->id        = $marca['id'];
            $objMarca->nome      = $marca['nome'];
            $objMarca->descricao = $marca['descricao'];
            $arrayMarcas[] = $objMarca;
        }

        return response()->json([
            'data' => $arrayMarcas
        ], 200);
    }
}
