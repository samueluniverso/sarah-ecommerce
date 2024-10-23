<script lang="ts">
    import ProductCard from "$lib/components/cards/ProductCard.svelte";

    import ProdutoApi from "$lib/models/ProdutoApi";

    // ProdutoApi.getProduto(1).then((produto) => {
    //     console.log(produto);    
    // });

    let lista = ProdutoApi.paginar(9, 0);

</script>

<div class="container h-full mx-auto flex justify-center items-center">
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <p class="text-xl">Produtos</p>
        </div>
        {#await lista}
            <p>Carregando...</p>
        {:then lista}
            {#each lista as item}
                <ProductCard produto={item} />
            {/each}
        {:catch error}
            <p>Erro: {error.message}</p>
        {/await}
    </div>
</div>