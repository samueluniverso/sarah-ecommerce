<script lang="ts">
    import { get } from "svelte/store";
    import { itensCarrinho } from "../../cart"; 
    import ProductCartCard from "$lib/components/cards/ProductCartCard.svelte";
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";

    import TextField from "$lib/components/form/TextField.svelte";

    import Currency from "@tabler/icons-svelte/icons/currency-dollar";

    import PessoaApi from "$lib/models/PessoaApi";
    import CepFieldChange from "$lib/components/form/CepFieldChange.svelte";
    import CepApi from "$lib/models/CepApi";

    /** session data */
    export let data;
    let token = data.auth_token!;
    let user_data = JSON.parse(localStorage.user);
    let pessoa = PessoaApi.getPessoa(user_data.id, token);

    let cep = '';
    let cidade = '';
    let bairro = '';
    let rua = '';
    let numero = '';
    let logradouro = '';
  
    let itemCarrinho: ProdutoCarrinho = {id: 0, nome: "", preco: 0.00, quantidade: 0};

    let carrinho = get(itensCarrinho);
    let itemCarrinhoIndex = carrinho.findIndex((item) => { return item.id === itemCarrinho.id; });

    let produtoCarrinho = carrinho[itemCarrinhoIndex];
    itensCarrinho.subscribe((novoItemCarrinho) => {
        carrinho = novoItemCarrinho;
        itemCarrinhoIndex = carrinho.findIndex((item) => { return item.id === itemCarrinho.id; });
        produtoCarrinho = carrinho[itemCarrinhoIndex];
    });

    const onSubmit = (e: Event) => {
		e.preventDefault();

        //TODO: Implementar a lógica de compra
	};

    function cepData()
    {
        CepApi.getData(parseInt(cep)).then((data) => {
            if (data.name == 'CepPromiseError') {
                alert('CEP não encontrado');
                return;
            }
            console.log(data);
            cidade = data.city;
            bairro = data.neighborhood;
            rua = data.street;
        });
    }

</script>

<div class="container h-full mx-auto flex justify-center items-center">
    <div class="grid grid-cols-1 gap-4">
        {#each carrinho as item}
            <ProductCartCard itemCarrinho={item} />
        {/each}
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1"></div>
            <section class="h-4/5 flex justify-center items-center">
                <form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
                    <CepFieldChange name="cep" label="CEP" onChange={() => cepData()} bind:value={cep} required />
                    <div>
                        <TextField name="cidade" label="Cidade" bind:value={cidade} disabled required />
                        <TextField name="bairro" label="Bairro" bind:value={bairro} required />
                        <TextField name="rua" label="Rua" bind:value={rua} required />
                        <TextField name="numero" label="Número" bind:value={numero} required />
                        <TextField name="logradouro" label="Logradouro" bind:value={logradouro} required />
                    </div>
                    <BaseButton Icon={Currency} label="Comprar" type="submit" />
                </form>
            </section>
    </div>
</div>