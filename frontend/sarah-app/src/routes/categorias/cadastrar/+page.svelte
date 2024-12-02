<svelte:head>
    <title>Cadastrar Categorias</title>
</svelte:head>

<script lang="ts">
   import { goto } from "$app/navigation";

    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import TextField from "$lib/components/form/TextField.svelte";
    import Clipboard from "@tabler/icons-svelte/icons/clipboard-data";

    import CategoraiApi from "$lib/models/CategoriaApi.js";
    import TableCategorias from "$lib/components/tables/TableCategorias.svelte";

    /** session data */
    export let data;
    let token = data.auth_token!;
    //let user_data = JSON.parse(localStorage.user);

    let nome = '';
    let descricao = '';
  
    const onSubmit = (e: Event) => {
		e.preventDefault();

        CategoraiApi.store(
            nome,
            descricao,
            token
        );

        alert('Categoria cadastrada com sucesso!');
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
                    <h1><strong>Cadastrar Categoria</strong></h1>
                    <div>
                        <TextField name="nome" label="Nome" bind:value={nome} required />
                        <TextField name="descricao" label="Descrição" bind:value={descricao} required />
                    </div>
                    <BaseButton Icon={Clipboard} label="Cadastrar" type="submit" />
                </form>
            </section>
            <section class="h-4/5 w-80 flex justify-left items-left">
                <TableCategorias token={token} />
            </section>
    </div>
</div>