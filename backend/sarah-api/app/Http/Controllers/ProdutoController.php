<?php

namespace App\Http\Controllers;

use App\Models\CaracteristicaProduto;
use App\Models\Categoria;
use App\Models\Imagem;
use App\Models\ImagemProduto;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;
use stdClass;
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
                'imagens'         => 'nullable|json',
                'cor'             => 'required|string',
                'caracteristicas' => 'required|json', // Vai vir um JSON com todas as medioas possiveis daquele produto (M, G, GG etc ...)
                'categorias'      => 'required|json'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $categorias = json_decode($data['categorias']);
        foreach ($categorias as $categoria) {

            $objCategoria = Categoria::where('id', $categoria)->first();
            if (!$objCategoria) {
                return response()->json([
                    'message' => "Categoria $categoria not found!"
                ], 404);
            }
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

        if (empty($data['imagens'])) {
            $imagens = json_decode($data['imagens'])->image_data;
            self::storeImagens($imagens, $produto->id);
        }

        foreach ($caracteristicas as $caracteristica) {

            $objCaracteristica = new CaracteristicaProduto();
            $objCaracteristica->fk_medida  = $caracteristica;
            $objCaracteristica->fk_produto = $produto->id;
            $objCaracteristica->cor        = $data['cor'];
            $objCaracteristica->save();
        }

        foreach ($categorias as $categoria) {

            $objProdutoCategoria = new ProdutoCategoria();
            $objProdutoCategoria->fk_categoria  = $categoria;
            $objProdutoCategoria->fk_produto    = $produto->id;
            $objProdutoCategoria->save();
        }

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
                'imagens'         => 'nullable|json',
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

        if (empty($data['imagens'])) {
            $imagens = json_decode($data['imagens'])->image_data;
            self::storeImagens($imagens, $produto->id);
            self::deleteImagem($data['id']);
        }

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

        // Buscar medida do produto
        $produto->marca;
        $produto->caracteristicas;
        unset($produto->fk_marca);
        return response()->json([
            'data' => $produto
        ], 200);
    }

    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $produto = Produto::withTrashed()->find($param);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto not found!'
            ], 404);
        }
        $produto->forceDelete();
        return response()->json([
            'message' => 'Produto deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
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
            'message' => 'Produto inactivated successfully!'
        ], 200);
    }

    public function getByNome(Request $request)
    {
        return Produto::whereRaw('lower(nome) ILIKE ?', ["%{$request->route('nome')}%"])->get();
    }

    public function getByMarca(Request $request)
    {
        return Produto::where('fk_marca', $request->route('id'))->get();
    }

    public function getByCategoria(Request $request)
    {
        return ProdutoCategoria::where('fk_categoria', $request->route('id'))->get();
    }

    public function listaPaginada(Request $request)
    {
        try {
            $request->validate([
                'limit'  => 'nullable|integer|min:1',
                'offset' => 'nullable|integer|min:0'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $request->limit ?? '10'; // Se n    ao vier um limit ele assume como 10
        $request->offset ?? '0'; // Se nao vier um offset ele assume como 0

        $produto  = new Produto();
        $produtos = $produto->take($request->limit)->skip($request->offset)->get();

        $arrayProdutos = [];
        foreach ($produtos as $produto) {

            $objProduto = new stdClass();
            $objProduto->caracteristicas    = $produto->caracteristicas;
            $objProduto->marca              = $produto->marca;
            $objProduto->produtosCategorias = $produto->produtosCategorias;
            $objProduto->codigo_produto     = $produto['id'];
            $objProduto->produto            = $produto['nome'];
            $objProduto->preco              = $produto['preco'];
            $arrayProdutos[] = $objProduto;
        }

        return response()->json([
            'data' => $arrayProdutos
        ], 200);
    }

    // Esse metodo ficou meio ruim, pensar em uma abordagem usando JSON (condicao e o valor que desejo para ela)
    public function buscar(Request $request)
    {
        try {
            $data = $request->validate([
                'nome'        => 'nullable|string',
                'is_destaque' => 'nullable|boolean',
                'preco'       => 'nullable|numeric',
                'fk_marca'    => 'nullable|int',
                'combinar'    => 'required|boolean'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $query = Produto::query();

        $arrayColunas = ['nome', 'preco', 'is_destaque', 'fk_marca'];
        if ($data['combinar']) {

            foreach ($arrayColunas as $coluna) {
                if (!empty($data[$coluna])) {
                    $query->where($coluna, 'ILIKE', "%{$data[$coluna]}%");
                }
            }
        } else {
            foreach ($arrayColunas as $coluna) {
                if (!empty($data[$coluna])) {
                    $query->orWhere($coluna, 'ILIKE', "%{$data[$coluna]}%");
                }
            }
        }

        $produtos = $query->get();

        // $produtos = Produto::where('nome', 'ilike', "%{$data['nome']}%")
        //     ->orWhere('is_destaque','ilike', "%{$data['is_destaque']}%")
        //     // ->orWhere('preco'      ,'ilike', "%{$data['preco']}%")
        //     ->orWhere('preco'      ,'ilike', '%'.!isset($data['preco']) ? '0' : $data['preco'].'%')
        //     ->orWhere('fk_marca'   ,'ilike', "%{$data['fk_marca']}%")->get();
        //     // ->where('is_destaque','ilike', "%{$data['is_destaque']}%")
        //     // ->where('preco'      ,'ilike', "%{$data['preco']}%")
        //     // ->where('fk_marca'   ,'ilike', "%{$data['fk_marca']}%")->get();

        // $produtos = [];
        // if (isset($data['nome']) && (!empty($data['nome']))) {
        //     $produtos = Produto::where('nome', 'ilike', "%{$data['nome']}%")->get();
        // }

        return response()->json([
            'data' => $produtos
        ], 200);
    }


    public function storeImagens($imagens, $fk_produto)
    {
        foreach ($imagens as $imagen) {

            if (empty(trim($imagen->nome)) || empty(trim($imagen->path))) {
                continue;
            }

            $objImagem = new Imagem();
            $objImagem->nome = $imagen->nome;
            $objImagem->path = $imagen->path;
            $objImagem->checksum ?? null;
            $objImagem->save();

            $objImagenProduto = new ImagemProduto();
            $objImagenProduto->fk_imagem  = $objImagem->id;
            $objImagenProduto->fk_produto = $fk_produto;
            $objImagenProduto->save();
        }
    }

    public function deleteImagem($fk_produto)
    {
        $imagensProduto = ImagemProduto::where('fk_produto', $fk_produto)->get();
        foreach ($imagensProduto as $imagemProduto) {

            $imagem = Imagem::where('id', $imagemProduto->id)->get();
            $imagem->forceDelete();

            $imagemProduto->forceDelete();
        }
    }
}

// {
//     "where": [
//         {"value1": "teste", "operator": "=", "value2": "teste2"}
//     ],
//     "limit": 10,
//     "offset": 5,
//     "order_by": [
//         "name DESC"
//     ]
// }