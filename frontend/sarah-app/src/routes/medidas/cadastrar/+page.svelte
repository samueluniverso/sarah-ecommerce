<svelte:head>
    <title>Cadastrar Medidas</title>
</svelte:head>

<script lang="ts">

    import { goto } from '$app/navigation';
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import TextField from "$lib/components/form/TextField.svelte";
    import TabelaMedidas from "$lib/components/tables/TableMedidas.svelte";
    import Clipboard from "@tabler/icons-svelte/icons/clipboard-data";

    import MedidaApi from "$lib/models/MedidaApi.js";

    /** session data */
    export let data;
    let token = data.auth_token!;
    //let user_data = JSON.parse(localStorage.user);

    let completo = '';
    let sigla = '';
    let comprimento = '';
    let largura = '';
    let altura = '';

    let code = '';
    let is_update = false;
    let submit_label = "Cadastrar";
  
    const onSubmit = (e: Event) => {
		e.preventDefault();

        if (is_update) {
            MedidaApi.update(
                code,
                completo,
                sigla,
                parseFloat(comprimento),
                parseFloat(largura),
                parseFloat(altura),
                token
            );
            alert('Medida atualizada com sucesso!');
        }
        else {
            MedidaApi.store(
                completo,
                sigla,
                parseFloat(comprimento),
                parseFloat(largura),
                parseFloat(altura),
                token
            );
            alert('Medida cadastrada com sucesso!');
        }

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
                    <h1><strong>Cadastrar Medida</strong></h1>
                    <div>
                        <TextField name="competo" label="Completo" bind:value={completo} required />
                        <TextField name="sigla" label="Sigla" bind:value={sigla} required />
                        <TextField name="comprimento" label="Comprimento (cm)" bind:value={comprimento} required />
                        <TextField name="largura" label="Largura (cm)" bind:value={largura} required />
                        <TextField name="altura" label="Altura (cm)" bind:value={altura} required />
                    </div>
                    <BaseButton Icon={Clipboard} label="{submit_label}" type="submit" />
                </form>
            </section>
            <section class="h-4/5 w-80 flex justify-left items-left">
                <TabelaMedidas bind:code={code} bind:submit_label={submit_label} bind:is_update={is_update} bind:completo={completo} bind:sigla={sigla} bind:comprimento={comprimento} bind:largura={largura} bind:altura={altura} token={token} />
            </section>
    </div>
</div>