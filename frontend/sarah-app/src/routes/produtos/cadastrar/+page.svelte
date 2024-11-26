<script lang="ts">
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";

    import TextField from "$lib/components/form/TextField.svelte";

    import Clipboard from "@tabler/icons-svelte/icons/clipboard-data";

    import ProdutoApi from "$lib/models/ProdutoApi";

    /** session data */
    export let data;
    let token = data.auth_token!;
    let user_data = JSON.parse(localStorage.user);

    let nome = '';
    let is_destque = false;
    let preco = '';
    let fk_marca = '';
    let cor = '';;
    let categoria = ''
    let medida = '';
  
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
                        <TextField name="nome" label="Nome" bind:value={nome} required />
                        <TextField name="preco" label="Preço" bind:value={preco} required />
                        <TextField name="cor" label="Cor" bind:value={cor} required />
                        <p>Marcas</p>
                        <select id='marcas' bind:value={fk_marca} required>
                            <option value=''>Selecione a marca</option>
                            <option value='1'>Urban Style</option>
                            <option value='2'>EchoChic</option>
                            <option value='3'>Classique</option>
                            <option value='4'>SportFlex</option>
                            <option value='5'>VintageVibes</option>
                        </select>
                        <p>Categorias</p>
                        <select id='medidas' bind:value={categoria} required>
                            <option value=''>Selecione a medida</option>
                            <option value='1'>Casual</option>
                            <option value='2'>Esportivo</option>
                            <option value='3'>Formal</option>
                            <option value='4'>Noite</option>
                            <option value='5'>Inverno</option>
                            <option value='6'>Praia</option>
                            <option value='7'>Trabalho</option>
                            <option value='8'>Vintage</option>
                            <option value='9'>Sustentável</option>
                            <option value='10'>Streetwear</option>
                        </select>
                        <p>Medidas</p>
                        <select id='medidas' bind:value={medida} required>
                            <option value=''>Selecione a medida</option>
                            <option value='1'>Muito Pequeno (PP)</option>
                            <option value='2'>Pequeno (P)</option>
                            <option value='3'>Médio (M)</option>
                            <option value='4'>Grande (G)</option>
                            <option value='5'>Extra Grande (GG)</option>
                            <option value='6'>Extra Extra Grande (XG)</option>
                        </select>
                        <!-- <fieldset>
                            <div>
                                <input type='radio' id='is_destque' name='destaque' value='1' required />
                                <label for='is_destque'>Destaque</label>

                                <input type='radio' id='not_destaque' name='destaque' value='0' />
                                <label for='not_destque'>Não destaque</label>
                            </div>
                        </fieldset> -->
                    </div>

                    <BaseButton Icon={Clipboard} label="Cadastrar" type="submit" />
                </form>
            </section>
    </div>
</div>