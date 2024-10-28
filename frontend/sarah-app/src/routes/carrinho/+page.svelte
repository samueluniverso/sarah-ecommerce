<script lang="ts">
    import { get } from "svelte/store";
    import { itensCarrinho } from "../../cart"; 
    import ProductCartCard from "$lib/components/cards/ProductCartCard.svelte";
   
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";

    import CpfField from "$lib/components/form/CpfField.svelte";
    import EmailField from "$lib/components/form/EmailField.svelte";
    import PhoneField from "$lib/components/form/PhoneField.svelte";
    import TextField from "$lib/components/form/TextField.svelte";

    import Id from "@tabler/icons-svelte/icons/id";
    import User from "@tabler/icons-svelte/icons/user";
    import Mail from "@tabler/icons-svelte/icons/mail";
    import Phone from "@tabler/icons-svelte/icons/phone";
    import Currency from "@tabler/icons-svelte/icons/currency-dollar";

    import PessoaApi from "$lib/models/PessoaApi";

    let cpf = '';
    let nome = '';
    let email = '';
    let telefone = '';
  
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
                    <TextField Icon={User} name="nome" label="Nome" placeholder="Nome" bind:value={nome} required />
                    <CpfField Icon={Id} name="cpf" bind:value={cpf} required />
                    <EmailField Icon={Mail} name="email" bind:value={email} required />
                    <PhoneField Icon={Phone} name="telefone" bind:value={telefone} required />
                    <BaseButton Icon={Currency} label="Comprar" type="submit" />
                </form>
            </section>
    </div>
</div>