<script lang="ts">
    import { get } from "svelte/store";
    import { itensCarrinho, adicionarAoCarrinho, removerDoCarrinho } from "../../../cart";

    /** atribuir propriedaes  */
    export let itemCarrinho: any = {id: 0, quantidade: 0};

    import ProdutoApi from "$lib/models/ProdutoApi";
    let produto = ProdutoApi.getProduto(itemCarrinho.id);

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

<div class="w-96 h-72 p-4 bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700">
    {#await produto}
        <p>Carregando...</p>
        {:then produto}
            <img class="h-24" src="/images/produtos/imagem-padrao.jpg" alt="">
            <header class="card-header">
                <h2 class="text-2xl font-extrabold dark:text-black">{produto.nome}</h2>
            </header>
        <div class="card-body px-1">
            Preço: R$ {produto.preco}
        </div>
        <div><br></div>
        {#if produtoCarrinho !== undefined}
            <div class="card-body px-4">
                Quantidade: <strong> {produtoCarrinho.quantidade} </strong>
            </div>
        {/if}
        <footer class="card-footer flex">
            <SmallGreenButton onClick={() => adicionarAoCarrinho(produto.codigo_produto)} label="Adicionar +" />
            <SmallRedButton onClick={() => removerDoCarrinho(itemCarrinho.codigo_produto)} label="Remover -" />
        </footer>
    {:catch error}
        <p>Erro: {error.message}</p>
{/await}
</div>