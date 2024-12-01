<svelte:head>
    <title>Cadastrar Marcas</title>
</svelte:head>

<script lang="ts">
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";

    import TextField from "$lib/components/form/TextField.svelte";

    import Clipboard from "@tabler/icons-svelte/icons/clipboard-data";

    import MarcaApi from "$lib/models/MarcaApi.js";
    import TableMarcas from "$lib/components/tables/TableMarcas.svelte";

    /** session data */
    export let data;
    let token = data.auth_token!;
    //let user_data = JSON.parse(localStorage.user);

    let nome = '';
    let descricao = '';
  
    const onSubmit = (e: Event) => {
		e.preventDefault();

        MarcaApi.store(
            nome,
            descricao,
            token
        );

        alert('Marca cadastrada com sucesso!');

    };
</script>

<div class="container h-full mx-auto flex justify-center items-center">
    <div class="grid grid-cols-1 gap-4">

    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1"></div>
            <section class="h-4/5 flex justify-center items-center">
                <form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
                    <h1><strong>Cadastrar Marca</strong></h1>
                    <div>
                        <TextField name="nome" label="Nome" bind:value={nome} required />
                        <TextField name="descricao" label="Descrição" bind:value={descricao} required />
                    </div>
                    <BaseButton Icon={Clipboard} label="Cadastrar" type="submit" />
                </form>
            </section>
            <section class="h-4/5 w-80 flex justify-left items-left">
                <TableMarcas token={token} />
            </section>
    </div>
</div>