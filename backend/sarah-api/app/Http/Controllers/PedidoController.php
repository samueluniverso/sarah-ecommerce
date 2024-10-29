<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'dt_pedido'       => 'required|date',
                'dt_entrega'      => 'required|date',
                'dt_cancelamento' => 'nullable|date',
                'observacao'      => 'nullable|string',
                'fk_pessoa'       => 'required|integer',
                'fk_endereco'     => 'required|integer',
                'produtos'        => 'nullable|json'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        // Valida os novos produtos inseridos pela pessoa
        self::produtos($data['produtos']);

        $pedido = new Pedido();
        $pedido->dt_pedido       = $data['dt_pedido'];
        $pedido->dt_entrega      = $data['dt_entrega'];
        $pedido->dt_cancelamento = $data['dt_cancelamento'];
        $pedido->fk_pessoa       = $data['fk_pessoa'];
        $pedido->fk_endereco     = $data['fk_endereco'];
        $pedido->observacao      = $data['observacao'] ?? null;
        $pedido->save();

        $arrayProdutos = json_decode($data['produtos'], true);
        foreach ($arrayProdutos as $produtos) {

            foreach ($produtos as $produto) {

                $pedidoProduto = new PedidoProduto();
                $pedidoProduto->quantidade = $produto['quantidade'];
                $pedidoProduto->fk_produto = $produto['produto']; // Codigo do produto
                $pedidoProduto->fk_pedido  = $pedido->id;
                $pedidoProduto->save();
            }
        }

        return response()->json([
            'message' => 'Pedido created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'              => 'required|integer',
                'dt_pedido'       => 'required|date',
                'dt_entrega'      => 'required|date',
                'dt_cancelamento' => 'nullable|date',
                'observacao'      => 'nullable|string',
                'fk_pessoa'       => 'required|integer',
                'fk_endereco'     => 'required|integer',
                'produtos'        => 'nullable|json'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $pedido = Pedido::where('id', $data['id'])->first();
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido not found!'
            ], 404);
        }

        // Valida os novos produtos inseridos pela pessoa
        self::produtos($data['produtos']);

        // Nao esta pronto
        // Busca no banco de dados os produtos ja postos no pedido
        $produtos = PedidoProduto::where('fk_pedido', $data['id'])->first();
        // var_dump($produtos); die;

        // Junta os produtos do banco de dados (atualizados) com os novos produtos

        $pedido->dt_pedido       = $data['dt_pedido'];
        $pedido->dt_entrega      = $data['dt_entrega'];
        $pedido->dt_cancelamento = $data['dt_cancelamento'];
        $pedido->fk_pessoa       = $data['fk_pessoa'];
        $pedido->fk_endereco     = $data['fk_endereco'];
        $pedido->observacao      = $data['observacao'] ?? null;
        $pedido->update();

        return response()->json([
            'message' => 'Pedido updated successfully!'
        ], 200);
    }

    // Troca o nome dessa funcao
    private function produtos($produtos)
    {
        $arrayProdutos = json_decode($produtos, true);
        foreach ($arrayProdutos as $produtos) {

            foreach ($produtos as $produto) {

                // Verifica se o produto existe
                $objProduto = Produto::where('id', $produto['produto'])->first();
                if (!$objProduto) {
                    return response()->json([
                        'message' => "Produto {$produto['produto']} not found!"
                    ], 404);
                }

                // new Estoque

                // Parte a ser implementada

                // Verifica se tem estoque para esse produto

                // Desconta do estoque
            }
        }
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        $pedido = Pedido::where('id', $param)->first();
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido not found!'
            ], 404);
        }

        $pedido->produtos;
        $pedido->pessoa;
        $pedido->endereco;

        return response()->json([
            'data' => $pedido
        ], 200);
    }

    // Como fazer para deletar um produto do pedido?
    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $pedido = Pedido::withTrashed()->find($param);
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido not found!'
            ], 404);
        }
        $pedido->forceDelete();
        return response()->json([
            'message' => 'Pedido deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $pedido = Pedido::where('id', $param)->first();
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido not found!'
            ], 404);
        }
        $pedido->delete();
        return response()->json([
            'message' => 'Pedido inactivated successfully!'
        ], 200);
    }

    public function getByPessoa(Request $request)
    {
        return Pedido::where('fk_pessoa', $request->route('id'))->get();
    }

    public function getByEndereco(Request $request)
    {
        return Pedido::where('fk_endereco', $request->route('id'))->get();
    }

    public function listaPaginada(Request $request) {}
}
