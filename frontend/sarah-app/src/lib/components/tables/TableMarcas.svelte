<script lang="ts">
    import { goto } from '$app/navigation';

    export let nome: string;
    export let descricao: string;
    export let token: string;

    export let code: string;
    export let is_update: boolean;
    export let submit_label: string;

    
    import MarcaApi from "$lib/models/MarcaApi";

    let data = MarcaApi.listar();
    console.log(data);

    const onDelete = (id: any) => () => {

        MarcaApi.delete(id, token);

        const thisPage = window.location.pathname;
        goto('/').then(
            () => goto(thisPage)
        );
    }

    const onEdit = (id: any) => () => {

        let marca = MarcaApi.getMarca(id);
        marca.then((value) => {
            code = value.id;
            nome = value.nome;
            descricao = value.descricao;
            submit_label = 'Editar';
            is_update = true;
        });
    }

</script>

<div>
    <h1> Lista de Cateogiras </h1>
    <div class="container">
        <table class="border-4" id="table">
            <thead>
                <tr>
                    <th class="px-7">Nome</th>
                    <th class="px-60">Descricao</th>
                    <th class="px-7">Opções</th>
                </tr>
            </thead>
            <tbody>
                {#await data}
                    <p>Carregando...</p>
                {:then data}
                    {#each data as marca}
                        <tr>
                            <td class="border-2">{marca.nome}</td>
                            <td class="border-2">{marca.descricao.substr(0, 70) ?? ''}</td>
                            <td class="border-2">
                                <button on:click={onDelete(marca.id)} class="bg-sarah-red text-sarah-white p-1 hover:brightness-75 transition duration-300 px-3 py-1 text-center me-1 mb-1" type="button">
                                    Excluir
                                </button>
                            </td>
                            <td class="border-2">
                                <button on:click={onEdit(marca.id)} class="bg-sarah-green text-sarah-white p-1 hover:brightness-75 transition duration-300 px-3 py-1 text-center me-1 mb-1" type="button">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    {/each}
                {:catch error}
                    <p>Erro ao carregar a lista de marcas</p>
                {/await}
            </tbody>
        </table>
    </div>
</div>