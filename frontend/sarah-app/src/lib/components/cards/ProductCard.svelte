<script lang="ts">
    import SmallGreenButton from "../form/buttons/SmallGreenButton.svelte";
    import SmallRedButton from "../form/buttons/SmallRedButton.svelte";

    export let produto: Produto = {id: 0, nome: "", preco: 0.0, quantidade: 0};
</script>

<div class="card">
    <header class="card-header">
        <h2 class="text-4xl font-extrabold dark:text-black">{produto.nome}</h2>
    </header>
    <div class="card-body px-4">
        Quantidade: <strong> {produto.quantidade} </strong>
    </div>
    <div class="card-body px-4">
        Preço: R$ {produto.preco.toFixed(2)}
    </div>
    <footer class="card-footer">
        <SmallGreenButton label="Adicionar +" />
        <SmallRedButton label="Remover -" />
    </footer>
</div>