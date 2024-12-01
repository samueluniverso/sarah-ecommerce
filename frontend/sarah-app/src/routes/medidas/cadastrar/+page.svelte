<script lang="ts">
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";

    import TextField from "$lib/components/form/TextField.svelte";

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
  
    const onSubmit = (e: Event) => {
		e.preventDefault();

        MedidaApi.store(
            completo,
            sigla,
            parseFloat(comprimento),
            parseFloat(largura),
            parseFloat(altura),
            token
        );

        alert('Medida cadastrada com sucesso!');

    };
</script>

<div class="container h-full mx-auto flex justify-center items-center">
    <div class="grid grid-cols-1 gap-4">

    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1"></div>
            <section class="h-4/5 flex justify-center items-center">
                <form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
                    <div>
                        <TextField name="competo" label="Completo" bind:value={completo} required />
                        <TextField name="sigla" label="Sigla" bind:value={sigla} required />
                        <TextField name="comprimento" label="Comprimento" bind:value={comprimento} required />
                        <TextField name="largura" label="Largura" bind:value={largura} required />
                        <TextField name="altura" label="Altura" bind:value={altura} required />
                    </div>
                    <BaseButton Icon={Clipboard} label="Cadastrar" type="submit" />
                </form>
            </section>
    </div>
</div>