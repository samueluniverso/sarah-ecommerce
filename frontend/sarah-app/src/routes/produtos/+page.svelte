<script lang="ts">
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import ProductCard from "$lib/components/cards/ProductCard.svelte";

    const produtos : ProdutoCarrinho[] = [
        {
            id: 1,
            nome: "Produto 1",
            preco: 10.00,
            quantidade: 4
        },
        {
            id: 2,
            nome: "Produto 2",
            preco: 20.00,
            quantidade: 2
        },
        {
            id: 3,
            nome: "Produto 3",
            preco: 30.00,
            quantidade: 1
        },
        {
            id: 4,
            nome: "Produto 4",
            preco: 25.00,
            quantidade: 1
        },
        {
            id: 5,
            nome: "Produto 5",
            preco: 10.00,
            quantidade: 1
        },
        {
            id: 6,
            nome: "Produto 6",
            preco: 30.00,
            quantidade: 1
        }
    ];
</script>

<div class="container h-full mx-auto flex justify-center items-center">
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <p class="text-xl">Produtos</p>
        </div>
        {#each produtos as produto}
            <ProductCard produto={produto} />
        {/each}
    </div>
</div>