<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaFisicaController;
use App\Http\Controllers\PessoaJuridicaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PromocaoController;
use App\Http\Controllers\ProdutoController;
use App\Mail\MyTestEmailPedido;
use Illuminate\Support\Facades\Mail;

/**
 * Usuario
 */
Route::post('/login', [
    UserAuthController::class,
    'login'
]);

Route::post('/logout', [
    UserAuthController::class,
    'logout'
])->middleware('auth:sanctum');

Route::post('/register', [
    UserAuthController::class,
    'register'
]);

Route::get('/user/{id}', [
    UserAuthController::class,
    'get'
])->middleware('auth:sanctum');

/**
 * Pessoa Fisica
 */
Route::prefix('pessoa')->group(function () {
    Route::get('/pessoa-fisica/{id}', [
        PessoaFisicaController::class,
        'get'
    ])->middleware('auth:sanctum');

    Route::post('/pessoa-fisica/', [
        PessoaFisicaController::class,
        'store'
    ]);

    Route::delete('/pessoa-fisica/{id}', [
        PessoaFisicaController::class,
        'delete'
    ])->middleware('auth:sanctum');

    Route::put('/pessoa-fisica/', [
        PessoaFisicaController::class,
        'update'
    ])->middleware('auth:sanctum');

    Route::patch('/pessoa-fisica/{id}', [
        PessoaFisicaController::class,
        'softDelete'
    ])->middleware('auth:sanctum');
});

Route::get('/pessoa-fisica/nome/{nome}', [
    PessoaFisicaController::class,
    'getByNome'
])->middleware('auth:sanctum');

Route::get('/pessoa-fisica/cpf/{cpf}', [
    PessoaFisicaController::class,
    'getByCpf'
])->middleware('auth:sanctum');

Route::get('/pessoa-fisica/nome/{nome}', [
    PessoaFisicaController::class,
    'getByNome'
])->middleware('auth:sanctum');

/**
 * Pessoa juridica
 */
Route::get('/pessoa-juridica/{id}', [
    PessoaJuridicaController::class,
    'get'
])->middleware('auth:sanctum');

Route::post('/pessoa-juridica/', [
    PessoaJuridicaController::class,
    'store'
])->middleware('auth:sanctum');

Route::patch('/pessoa-juridica/{id}', [
    PessoaJuridicaController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::delete('/pessoa-juridica/{id}', [
    PessoaJuridicaController::class,
    'delete'
])->middleware('auth:sanctum');

Route::put('/pessoa-juridica/', [
    PessoaJuridicaController::class,
    'update'
])->middleware('auth:sanctum');

Route::get('/pessoa-juridica/nome-fantasia/{nome}', [
    PessoaJuridicaController::class,
    'getByNomeFantasia'
])->middleware('auth:sanctum');

Route::get('/pessoa-juridica/razao-social/{nome}', [
    PessoaJuridicaController::class,
    'getByNomeRazaoSocial'
])->middleware('auth:sanctum');

Route::get('/pessoa-juridica/cnpj/{cnpj}', [
    PessoaJuridicaController::class,
    'getByCnpj'
])->middleware('auth:sanctum');

/**
 * Categoria
 */
Route::get('/categoria/{id}', [
    CategoriaController::class,
    'get'
]);

Route::post('/categoria/', [
    CategoriaController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/categoria/', [
    CategoriaController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/categoria/{id}', [
    CategoriaController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/categoria/{id}', [
    CategoriaController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/categoria/nome/{nome}', [
    CategoriaController::class,
    'getByNome'
])->middleware('auth:sanctum');;

Route::get('/categoria/descricao/{descricao}', [
    CategoriaController::class,
    'getByDescricao'
])->middleware('auth:sanctum');


Route::prefix('categorias')->group(function () {
    Route::get('/paginar/limit/{limit}/offset/{offset}', [
        CategoriaController::class,
        'listaPaginada'
    ]);

    Route::get('/', [
        CategoriaController::class,
        'list'
    ]);
});

/*
 * Marca
 */
Route::get('/marca/{id}', [
    MarcaController::class,
    'get'
]);

Route::post('/marca/', [
    MarcaController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/marca/', [
    MarcaController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/marca/{id}', [
    MarcaController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/marca/{id}', [
    MarcaController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/marca/nome/{nome}', [
    MarcaController::class,
    'getByNome'
])->middleware('auth:sanctum');;

Route::get('/marca/descricao/{descricao}', [
    MarcaController::class,
    'getByDescricao'
])->middleware('auth:sanctum');;

// Rota em teste
Route::prefix('marcas')->group(function () {
    Route::get('/paginar', [
        MarcaController::class,
        'listaPaginada2'
    ]);
    Route::get('/', [
        MarcaController::class,
        'list'
    ]);
});

// Route::prefix('marcas')->group(function () {
//     Route::get('/paginar/limit/{limit}/offset/{offset}', [
//         ProdutoController::class,
//         'listaPaginada'
//     ]);
// });

/**
 * Medida
 */
Route::get('/medida/{id}', [
    MedidaController::class,
    'get'
]);

Route::post('/medida/', [
    MedidaController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/medida/', [
    MedidaController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/medida/{id}', [
    MedidaController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/medida/{id}', [
    MedidaController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::prefix('medidas')->group(function () {
    Route::get('/paginar/limit/{limit}/offset/{offset}', [
        MedidaController::class,
        'listaPaginada'
    ]);
    Route::get('/', [
        MedidaController::class,
        'list'
    ]);
});

/**
 * Promocao
 */
Route::get('/promocao/{id}', [
    PromocaoController::class,
    'get'
]);

Route::post('/promocao/', [
    PromocaoController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/promocao/', [
    PromocaoController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/promocao/{id}', [
    PromocaoController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/promocao/{id}', [
    PromocaoController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/promocao/produto/{id}', [
    PromocaoController::class,
    'getByProduto'
])->middleware('auth:sanctum');;

Route::prefix('promocoes')->group(function () {
    Route::get('/paginar/limit/{limit}/offset/{offset}', [
        PromocaoController::class,
        'listaPaginada'
    ]);
});

/**
 * Produto
 */
Route::get('/produto/{id}', [
    ProdutoController::class,
    'get'
]);

Route::post('/produto/', [
    ProdutoController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/produto/', [
    ProdutoController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/produto/{id}', [
    ProdutoController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/produto/{id}', [
    ProdutoController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/produto/nome/{nome}', [
    ProdutoController::class,
    'getByNome'
])->middleware('auth:sanctum');;

Route::get('/produto/marca/{id}', [
    ProdutoController::class,
    'getByMarca'
])->middleware('auth:sanctum');;

Route::get('/produto/categoria/{id}', [
    ProdutoController::class,
    'getByCategoria'
])->middleware('auth:sanctum');;

Route::prefix('produtos')->group(function () {
    Route::get('/paginar/limit/{limit}/offset/{offset}', [
        ProdutoController::class,
        'listaPaginada'
    ]);

    Route::post('/buscar', [
        ProdutoController::class,
        'buscar'
    ])->middleware('auth:sanctum');
});

/**
 * Produto
 */
Route::get('/produto/{id}', [
    ProdutoController::class,
    'get'
]);

Route::post('/produto/', [
    ProdutoController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/produto/', [
    ProdutoController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/produto/{id}', [
    ProdutoController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/produto/{id}', [
    ProdutoController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/produto/nome/{nome}', [
    ProdutoController::class,
    'getByNome'
])->middleware('auth:sanctum');;

Route::get('/produto/marca/{id}', [
    ProdutoController::class,
    'getByMarca'
])->middleware('auth:sanctum');;

Route::get('/produto/categoria/{id}', [
    ProdutoController::class,
    'getByCategoria'
])->middleware('auth:sanctum');;

Route::prefix('produtos')->group(function () {
    Route::get('/paginar/limit/{limit}/offset/{offset}', [
        ProdutoController::class,
        'listaPaginada'
    ]);

    Route::post('/buscar', [
        ProdutoController::class,
        'buscar'
    ])->middleware('auth:sanctum');
});

/**
 * Pedido
 */
Route::get('/pedido/{id}', [
    PedidoController::class,
    'get'
]);

Route::post('/pedido/', [
    PedidoController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/pedido/', [
    PedidoController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/pedido/{id}', [
    PedidoController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/pedido/{id}', [
    PedidoController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/pedido/pessoa/{id}', [
    PedidoController::class,
    'getByPessoa'
])->middleware('auth:sanctum');;

Route::get('/pedido/endereco/{id}', [
    PedidoController::class,
    'getByEndereco'
])->middleware('auth:sanctum');

// Route::prefix('produtos')->group(function () {
//     Route::get('/paginar/limit/{limit}/offset/{offset}', [
//         PedidoController::class,
//         'listaPaginada'
//     ]);
// });


/**
 * Forma Pagamento
 */
Route::get('/forma-pagamento/{id}', [
    FormaPagamentoController::class,
    'get'
]);

Route::post('/forma-pagamento/', [
    FormaPagamentoController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/forma-pagamento/', [
    FormaPagamentoController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/forma-pagamento/{id}', [
    FormaPagamentoController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/forma-pagamento/{id}', [
    FormaPagamentoController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/forma-pagamento/tipo/{tipo}', [
    FormaPagamentoController::class,
    'getByTipo'
])->middleware('auth:sanctum');;

Route::get('/forma-pagamento/descricao/{descricao}', [
    FormaPagamentoController::class,
    'getByDescricao'
])->middleware('auth:sanctum');

// Route::prefix('forma-pagamentos')->group(function () {
//     Route::get('/paginar/limit/{limit}/offset/{offset}', [
//         FormaPagamentoController::class,
//         'listaPaginada'
//     ]);
// });


/**
 * Pagamento
 */

Route::get('/pagamento/{id}', [
    PagamentoController::class,
    'get'
]); // Essa eu acho que deveria ser sanctum

Route::post('/pagamento/', [
    PagamentoController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/pagamento/', [
    PagamentoController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/pagamento/{id}', [
    PagamentoController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/pagamento/{id}', [
    PagamentoController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/pagamento-confirma/{codigo-pedido}', [
    PagamentoController::class,
    'get'
])->middleware('auth:sanctum');

Route::get('/pagamento/pedido/{id}', [
    PagamentoController::class,
    'getByPedido'
])->middleware('auth:sanctum');

Route::get('/pagamento/confirma/{id}', [
    PagamentoController::class,
    'confirmaPagamento'
]);

// Route::get('/pagamento/confirma/{id}', [
//     PagamentoController::class,
//     'confirmaPagamento'
// ])->middleware('auth:sanctum');

/**
 * Estoque
 */
Route::get('/estoque/{id}', [
    EstoqueController::class,
    'get'
]);

Route::post('/estoque/', [
    EstoqueController::class,
    'store'
])->middleware('auth:sanctum');

Route::put('/estoque/', [
    EstoqueController::class,
    'update'
])->middleware('auth:sanctum');

Route::delete('/estoque/{id}', [
    EstoqueController::class,
    'delete'
])->middleware('auth:sanctum');

Route::patch('/estoque/{id}', [
    EstoqueController::class,
    'softDelete'
])->middleware('auth:sanctum');

Route::get('/estoque/produto/{id}', [
    EstoqueController::class,
    'getByProduto'
])->middleware('auth:sanctum');

Route::get('/estoque/medida/{id}', [
    EstoqueController::class,
    'getByMedida'
])->middleware('auth:sanctum');

Route::get('/estoque/quantidade/{id}', [
    EstoqueController::class,
    'getByQuantidade'
])->middleware('auth:sanctum');


// http://localhost:8083/api/pedido-teste
Route::post('/teste/', [
    PedidoController::class,
    'teste'
]);

// Route::get('/testroute', function () {
//     $name = "Funny Coder";

//     // The email sending is done using the to method on the Mail facade
//     Mail::to('testreceiver@gmail.com')->send(new MyTestEmailPedido($name));
// });



// Route::prefix('pagamentos')->group(function () {
//     Route::get('/paginar/limit/{limit}/offset/{offset}', [
//         PagamentoController::class,
//         'listaPaginada'
//     ]);
// });