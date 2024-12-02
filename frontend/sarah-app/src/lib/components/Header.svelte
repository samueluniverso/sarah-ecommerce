<script lang="ts">
    import { user } from "$lib/stores";
    import { IconUserCircle } from "@tabler/icons-svelte";
    import { IconShoppingCart } from "@tabler/icons-svelte";
    import { IconSearch } from "@tabler/icons-svelte";
    import Popover from "./Popover.svelte";
    import { goto } from "$app/navigation";

    const onLogout = (e: Event) => {
		e.preventDefault();

		fetch('/api/logout', {
			method: 'POST'
		}).then((response) => {
			response.json().then((value) => {
				console.log(value);
                alert(value.message);

				user.set(null);

                goto('/');
			});
		});
	};

    const onProduct = (e: Event) => {
		e.preventDefault();

        goto('/produtos');
	};

    const onAddProduct = (e: Event) => {
		e.preventDefault();

        goto('/produtos/cadastrar');
	};

    const onAddBrand = (e: Event) => {
		e.preventDefault();

        goto('/marcas/cadastrar');
	};

    const onAddCategory = (e: Event) => {
		e.preventDefault();

        goto('/categorias/cadastrar');
	};

    const onAddMeasure = (e: Event) => {
		e.preventDefault();

        goto('/medidas/cadastrar');
	};

    const onCart = (e: Event) => {
		e.preventDefault();

        goto('/carrinho');
	};
</script>

<header class="px-32 py-2 bg-sarah-green border-b-sarah-gold border-b-2 shadow-custom">
    <div class="flex justify-between items-center">
        <a href="/" class="title flex items-center gap-2">
            <img src="/images/banner.png" alt="Sarah Banner" class="w-16" />
            <h1 class="text-white font-bold text-2xl tracking-widest">SARAH</h1>
        </a>
        <nav class="flex items-center">
            <button type="button" on:click={onProduct}>
                <IconSearch size={35} color={'#fff'} />
            </button>
            <button type="button" on:click={onCart}>
                <IconShoppingCart size={35} color={'#fff'} />
            </button>
            {#if $user}
                <Popover>
                    <div slot="trigger" class="flex items-center">
                        <IconUserCircle size={35} color={'#fff'} />
                        <span class="flex flex-col text-sarah-white text-sm leading-tight ml-1 font-bold">
                            <span class="w-fit">{$user.name}</span>
                            <span class="w-fit text-xs">{$user.username}</span>
                        </span>
                    </div>
                    <div class="flex flex-col" slot="product">
                        <button type="button" on:click={onAddProduct}>Produtos</button>
                    </div>
                    <div class="flex flex-col" slot="brand">
                        <button type="button" on:click={onAddBrand}>Marcas</button>
                    </div>
                    <div class="flex flex-col" slot="category">
                        <button type="button" on:click={onAddCategory}>Categorias</button>
                    </div>
                    <div class="flex flex-col" slot="measures">
                        <button type="button" on:click={onAddMeasure}>Medidas</button>
                    </div>
                    <div class="flex flex-col" slot="content">
                        <a href="/conta/editar">Conta</a>
                        <button type="button" on:click={onLogout}>Sair</button>
                    </div>
                </Popover>
            {:else}
                <IconUserCircle size={35} color={'#fff'} />
                <span class="flex flex-col text-sarah-white text-sm leading-tight ml-1 font-bold">
                    <a class="w-fit hover:underline" href="/login">Entre</a>
                    <a class="w-fit hover:underline" href="/cadastre-se">Cadastre-se</a>
                </span>
            {/if}
        </nav>
    </div>
</header>

<style>

</style>