<script lang="ts">
    import { get } from "svelte/store";
    import { itensCarrinho, adicionarAoCarrinho, removerDoCarrinho } from "../../../cart"; 

    let carrinho = get(itensCarrinho);
    let itemCarrinhoIndex = carrinho.findIndex((item) => { return item.id === produto.id; });

    let produtoCarrinho = carrinho[itemCarrinhoIndex];
    itensCarrinho.subscribe((novoItemCarrinho) => {
        carrinho = novoItemCarrinho;
        itemCarrinhoIndex = carrinho.findIndex((item) => { return item.id === produto.id; });
        produtoCarrinho = carrinho[itemCarrinhoIndex];
    });

    export let produto: Produto = {id: 0, nome: "", preco: 0.0, quantidade: 0};

    import SmallGreenButton from "../form/buttons/SmallGreenButton.svelte";
    import SmallRedButton from "../form/buttons/SmallRedButton.svelte";


</script>

<div class="card">
    <header class="card-header">
        <h2 class="text-4xl font-extrabold dark:text-black">{produto.nome}</h2>
    </header>
    {#if produtoCarrinho !== undefined}
        <div class="card-body px-4">
            Quantidade: <strong> {produtoCarrinho.quantidade} </strong>
        </div>
    {/if}
    <div class="card-body px-4">
        Preço: R$ {produto.preco.toFixed(2)}
    </div>
    <footer class="card-footer">
        <SmallGreenButton onClick={() => adicionarAoCarrinho(produto.id)} label="Adicionar +" />
        <SmallRedButton onClick={() => removerDoCarrinho(produto.id)} label="Remover -" />
    </footer>
</div>