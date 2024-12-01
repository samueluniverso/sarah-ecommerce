<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use stdClass;
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
        catch (Throwable $th)
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
        catch (Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $categoria = Categoria::where('id', $data['id'])->first();
        if (!$categoria)
        {
            return response()->json([
                'message' => 'Categoria not found!'
            ], 404);
        }

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

        $categoria = Categoria::where('id', $param)->first();
        if (!$categoria)
        {
            return response()->json([
                'message' => 'Categoria not found!'
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
        $categoria = Categoria::withTrashed()->find($param);

        if (!$categoria)
        {
            return response()->json([
                'message' => 'Categoria not found!'
            ], 404);
        }
        $categoria->forceDelete();
        return response()->json([
            'message' => 'Categoria deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $categoria = Categoria::where('id', $param)->first();
        if (!$categoria)
        {
            return response()->json([
                'message' => 'Categoria not found!'
            ], 404);
        }
        $categoria->delete();
        return response()->json([
            'message' => 'Categoria inactivated successfully!'
        ], 200);
    }

    public function getByNome(Request $request)
    {
        return Categoria::whereRaw('lower(nome) ILIKE ?', ["%{$request->route('nome')}%"])->get();
    }

    public function getByDescricao(Request $request)
    {
        return Categoria::whereRaw('lower(descricao) ILIKE ?', ["%{$request->route('descricao')}%"])->get();
    }

    public function listaPaginada(Request $request)
    {
        try
        {
            $request->validate([
                'limit'  => 'nullable|integer',
                'offset' => 'nullable|integer'
            ]);
        }
        catch (Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $request->limit ?? '10'; // Se nao vier um limit ele assume como 10
        $request->offset ?? '0'; // Se nao vier um offset ele assume como 0

        $categoria  = new Categoria();
        $categorias = $categoria->take($request->limit)->skip($request->offset)->get();

        $arrayCategorias = [];
        foreach ($categorias as $categoria)
        {

            $objCategoria = new stdClass();
            $objCategoria->id        = $categoria['id'];
            $objCategoria->nome      = $categoria['nome'];
            $objCategoria->descricao = $categoria['preco'];
            $arrayCategorias[] = $objCategoria;
        }

        return response()->json([
            'data' => $arrayCategorias
        ], 200);
    }

    public function listar(Request $request)
    {
        $categoria  = new Categoria();
        $categorias = $categoria->get();

        $arrayCategorias = [];
        foreach ($categorias as $categoria)
        {

            $objCategoria = new stdClass();
            $objCategoria->id        = $categoria['id'];
            $objCategoria->nome      = $categoria['nome'];
            $objCategoria->descricao = $categoria['descricao'];
            $arrayCategorias[] = $objCategoria;
        }

        return response()->json([
            'data' => $arrayCategorias
        ], 200);
    }
}
