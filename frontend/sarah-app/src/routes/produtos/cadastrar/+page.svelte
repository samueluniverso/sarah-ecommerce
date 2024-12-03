<svelte:head>
    <title>Cadastrar Produtos</title>
</svelte:head>

<script lang="ts">
    import { goto } from '$app/navigation';
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import TextField from "$lib/components/form/TextField.svelte";
    import Clipboard from "@tabler/icons-svelte/icons/clipboard-data";

    import ProdutoApi from "$lib/models/ProdutoApi";
    import MarcaApi from "$lib/models/MarcaApi.js";
    import CategoriaApi from "$lib/models/CategoriaApi.js";
    import MedidaApi from "$lib/models/MedidaApi.js";

    /** session data */
    export let data;
    let token = data.auth_token!;
    //let user_data = JSON.parse(localStorage.user);

    let nome = '';
    let is_destque = false;
    let preco = '';
    let fk_marca = '';
    let cor = '';;
    let categoria = ''
    let medida = '';

    let list_marcas = MarcaApi.listar();
    let list_categorias = CategoriaApi.listar();
    let list_medidas = MedidaApi.listar();
  
    const onSubmit = (e: Event) => {
		e.preventDefault();

        let caracteristicas = {
            '0': medida,
        };
        let categorias = {
            '0': categoria,
        }

        ProdutoApi.store(
            nome,
            preco,
            cor,
            is_destque,
            fk_marca,
            JSON.stringify(categorias),
            JSON.stringify(caracteristicas),
            token
        );
        alert('Produto cadastrado com sucesso!');

        const thisPage = window.location.pathname;
        goto('/').then(
            () => goto(thisPage)
        );

    };
</script>

<div class="container h-full mx-auto flex justify-center items-center">
    <div class="grid grid-cols-1 gap-4">

    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1"></div>
            <section class="h-4/5 flex justify-center items-center">
                <form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
                    <h1><strong>Cadastrar Produto</strong></h1>
                    <div>
                        <TextField name="nome" label="Nome" bind:value={nome} required />
                        <TextField name="preco" label="Preço" bind:value={preco} required />
                        <TextField name="cor" label="Cor" bind:value={cor} required />

                        <p>Marcas</p>
                        {#await list_marcas}
                            <p>Carregando...</p>
                        {:then list_marcas}
                            <select id='marcas' bind:value={fk_marca} required>
                        {#each list_marcas as marca}
                            <option value={marca.id}>{marca.nome}</option>
                        {/each}
                        </select>
                        {:catch error}
                            <p>Erro ao carregar a lista de marcas</p>
                        {/await}

                        <p>Categorias</p>
                        {#await list_categorias}
                            <p>Carregando...</p>
                        {:then list_categorias}
                            <select id='categorias' bind:value={categoria} required>
                        {#each list_categorias as categoria}
                            <option value={categoria.id}>{categoria.nome}</option>
                        {/each}
                            </select>
                        {:catch error}
                            <p>Erro ao carregar a lista de categorias</p>
                        {/await}

                        <p>Medidas</p>
                        {#await list_medidas}
                            <p>Carregando...</p>
                        {:then list_medidas}
                            <select id='medidas' bind:value={medida} required>
                        {#each list_medidas as medida}
                            <option value={medida.id}>{medida.completo}</option>
                        {/each}
                            </select>
                        {:catch error}
                            <p>Erro ao carregar a lista de medidas</p>
                        {/await}
                    </div>

                    <BaseButton Icon={Clipboard} label="Cadastrar" type="submit" />
                </form>
            </section>
    </div>
</div>