<script lang="ts">
    import { goto, invalidate } from '$app/navigation';

    export let token: string;

    import MedidaApi from "$lib/models/MedidaApi.js";

    let data = MedidaApi.listar();

    const onDelete = (id: any) => () => {
        console.log('here');
        console.log(id);
        console.log(token);

        MedidaApi.delete(id, token);

        const thisPage = window.location.pathname;

        goto('/').then(
            () => goto(thisPage)
        );
    }

</script>

<div>
    <h1> Lista de Medidas </h1>
    <div class="container">
        <table class="border-4" id="table">
            <thead>
                <tr>
                    <th class="px-7">Completo</th>
                    <th class="px-7">Sigla</th>
                    <th class="px-7">Comprimento</th>
                    <th class="px-7">Largura</th>
                    <th class="px-7">Altura</th>
                    <th class="px-7">Opções</th>
                </tr>
            </thead>
            <tbody>
                {#await data}
                    <p>Carregando...</p>
                {:then data}
                    {#each data as medida}
                        <tr>
                            <td class="border-2">{medida.completo}</td>
                            <td class="border-2">{medida.sigla}</td>
                            <td class="border-2">{medida.comprimento}</td>
                            <td class="border-2">{medida.largura}</td>
                            <td class="border-2">{medida.altura}</td>
                            <td class="border-2">
                                <button on:click={onDelete(medida.id)} class="bg-sarah-red text-sarah-white p-1 hover:brightness-75 transition duration-300 px-3 py-1 text-center me-1 mb-1" type="button">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    {/each}
                {:catch error}
                    <p>Erro ao carregar a lista de medidas</p>
                {/await}
            </tbody>
        </table>
    </div>
</div>