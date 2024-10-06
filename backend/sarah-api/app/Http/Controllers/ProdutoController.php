<?php

namespace App\Http\Controllers;

use App\Models\CaracteristicaProduto;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;

class ProdutoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nome'            => 'required|string',
                'is_destaque'     => 'required|boolean',
                'preco'           => 'required|numeric',
                'fk_marca'        => 'required|integer',
                'cor'             => 'required|string',
                'caracteristicas' => 'required|json' // Vai vir um JSON com todas as medioas possiveis daquele produto (M, G, GG etc ...)
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $caracteristicas = json_decode($data['caracteristicas']);
        foreach ($caracteristicas as $caracteristica) {

            $objCaracteristica = Medida::where('id', $caracteristica)->first();
            if (!$objCaracteristica) {
                return response()->json([
                    'message' => "Medida $caracteristica not found!"
                ], 404);
            }
        }

        $marca = Marca::where('id', $data['fk_marca'])->first(); // Se nao existir ele vai retornar null
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $produto = new Produto();
        $produto->nome        = $data['nome'];
        $produto->is_destaque = $data['is_destaque'];
        $produto->preco       = $data['preco'];
        $produto->fk_marca    = $marca->id;
        $produto->save();

        foreach ($caracteristicas as $caracteristica) {

            $objCaracteristica = new CaracteristicaProduto();
            $objCaracteristica->fk_medida  = $caracteristica;
            $objCaracteristica->fk_produto = $produto->id;
            $objCaracteristica->cor        = $data['cor'];
            $objCaracteristica->save();
        }

        // Nao user o factory por agora pois ele enche o saco e nao deixa salvar o registro
        // $produto = Produto::factory()->create()([
        //     'nome'        => $data['nome'],
        //     'is_destaque' => $data['is_destaque'],
        //     'preco'       => $data['preco'],
        //     'fk_marca'    => $marca->id
        // ]);

        return response()->json([
            'message' => 'Produto created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'              => 'required|integer',
                'nome'            => 'required|string',
                'is_destaque'     => 'required|boolean',
                'preco'           => 'required|numeric',
                'fk_marca'        => 'required|integer',
                'cor'             => 'required|string',
                'caracteristicas' => 'required|json' // Vai vir um JSON com todas as medioas possiveis daquele produto (M, G, GG etc ...)
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $caracteristicas = json_decode($data['caracteristicas']);
        foreach ($caracteristicas as $caracteristica) {

            $objCaracteristica = Medida::where('id', $caracteristica)->first();
            if (!$objCaracteristica) {
                return response()->json([
                    'message' => "Medida $caracteristica not found!"
                ], 404);
            }
        }

        $marca = Marca::where('id', $data['fk_marca'])->first();
        if (!$marca) {
            return response()->json([
                'message' => 'Marca not found!'
            ], 404);
        }

        $produto = Produto::where('id', $data['id'])->first();
        $produto->nome        = $data['nome'];
        $produto->is_destaque = $data['is_destaque'];
        $produto->preco       = $data['preco'];
        $produto->fk_marca =    $marca->id;
        $produto->update();

        foreach ($caracteristicas as $caracteristica) {

            $objCaracteristica = new CaracteristicaProduto();
            $objCaracteristica->fk_medida  = $caracteristica;
            $objCaracteristica->fk_produto = $produto->id;
            $objCaracteristica->cor        = $data['cor'];
            $objCaracteristica->update();
        }

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

        $produto->marca;
        $produto->caracteristicas;

        return response()->json([
            'produto' => $produto

            // Falta retornar os dados das medidas do produtos, AS N medidas
            // 'caracteristicas' => $produto->caracteristicas->medidas
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
