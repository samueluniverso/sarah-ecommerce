<svelte:head>
    <title>Produtos</title>
</svelte:head>

<script lang="ts">
    import ProductCard from "$lib/components/cards/ProductCard.svelte";

    import ProdutoApi from "$lib/models/ProdutoApi";

    let num_produtos = 6;
    let num_pagina = 1;

    let count = ProdutoApi.getCount();

    $: lista = ProdutoApi.paginar(num_produtos, num_produtos * (num_pagina - 1));

    const changePage = (e: Event) => {
        let target = e.target as HTMLButtonElement;
        num_pagina = Number.parseInt(target.innerHTML);
    }
</script>

<div class="container h-full mx-auto my-8 flex justify-center">
    <div class="grid grid-cols-2 gap-4">
        {#await lista}
            <p>Carregando...</p>
        {:then lista}
            {#each lista as item}
                <ProductCard produto={item} />
            {/each}
        {:catch error}
            <p>Erro: {error.message}</p>
        {/await}
        <div class="col-span-2 pb-5">
            {#await count}
                <p>Carregando...</p>
            {:then count}
                {#each Array(Math.floor(count / num_produtos) + 1).fill(0).map((_, i) => i + 1) as pagina}
                    <button class="p-1 text-xs border-2 {pagina === num_pagina ? 'selected' : ''}" on:click={changePage}>{pagina}</button>
                {/each}
            {/await}
        </div>
    </div>
</div>

<style>
    .selected {
        color: #fff;
        background-color: rgb(50 81 64 / 1);
    }
</style>