<script lang="ts">
    import { get } from "svelte/store";
    import { itensCarrinho, adicionarAoCarrinho, removerDoCarrinho } from "../../../cart"; 

    /** produto vindo via api */
    export let produto : any;
    /** atribuir propriedaes  */
    let itemCarrinho: ProdutoCarrinho = {id: produto.codigo_produto, nome: produto.produto, preco: produto.preco, quantidade: 0};

    let carrinho = get(itensCarrinho);
    let itemCarrinhoIndex = carrinho.findIndex((item) => { return item.id === itemCarrinho.id; });

    let produtoCarrinho = carrinho[itemCarrinhoIndex];
    itensCarrinho.subscribe((novoItemCarrinho) => {
        carrinho = novoItemCarrinho;
        itemCarrinhoIndex = carrinho.findIndex((item) => { return item.id === itemCarrinho.id; });
        produtoCarrinho = carrinho[itemCarrinhoIndex];
    });

    import SmallGreenButton from "../form/buttons/SmallGreenButton.svelte";
    import SmallRedButton from "../form/buttons/SmallRedButton.svelte";

</script>

<div class="max-w-sm p-14 bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700">
    <header class="card-header">
        <h2 class="text-4xl font-extrabold dark:text-black">{itemCarrinho.nome}</h2>
    </header>
    <div class="card-body px-1">
        Preço: R$ {itemCarrinho.preco}
    </div>
    <div><br></div>
    {#if produtoCarrinho !== undefined}
        <div class="card-body px-4">
            Quantidade: <strong> {produtoCarrinho.quantidade} </strong>
        </div>
    {/if}
    <footer class="card-footer">
        <SmallGreenButton onClick={() => adicionarAoCarrinho(itemCarrinho.id)} label="Adicionar +" />
        <SmallRedButton onClick={() => removerDoCarrinho(itemCarrinho.id)} label="Remover -" />
    </footer>
</div>