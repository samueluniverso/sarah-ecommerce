<script lang="ts">
    import { goto, invalidate } from '$app/navigation';

    export let token: string;

    import CategoriaApi from "$lib/models/CategoriaApi.js";

    let data = CategoriaApi.listar();

    const onDelete = (id: any) => () => {

        CategoriaApi.delete(id, token);

        const thisPage = window.location.pathname;

        goto('/').then(
            () => goto(thisPage)
        );
    }

</script>

<div>
    <h1> Lista de Cateogiras </h1>
    <div class="container">
        <table class="border-4" id="table">
            <thead>
                <tr>
                    <th class="px-7">Nome</th>
                    <th class="px-40">Descricao</th>
                    <th class="px-7">Opções</th>
                </tr>
            </thead>
            <tbody>
                {#await data}
                    <p>Carregando...</p>
                {:then data}
                    {#each data as categoria}
                        <tr>
                            <td class="border-2">{categoria.nome}</td>
                            <td class="border-2">{categoria.descricao.substr(0, 45)}</td>
                            <td class="border-2">
                                <button on:click={onDelete(categoria.id)} class="bg-sarah-red text-sarah-white p-1 hover:brightness-75 transition duration-300 px-3 py-1 text-center me-1 mb-1" type="button">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    {/each}
                {:catch error}
                    <p>Erro ao carregar a lista de categorias</p>
                {/await}
            </tbody>
        </table>
    </div>
</div>