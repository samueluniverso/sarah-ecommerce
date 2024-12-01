<svelte:head>
    <title>Conta</title>
</svelte:head>

<script lang="ts">
    import { goto } from "$app/navigation";
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import CpfField from "$lib/components/form/CpfField.svelte";
    import EmailField from "$lib/components/form/EmailField.svelte";
    import PasswordField from "$lib/components/form/PasswordField.svelte";
    import PhoneField from "$lib/components/form/PhoneField.svelte";
    import TextField from "$lib/components/form/TextField.svelte";
    import { user } from "$lib/stores";
    import Id from "@tabler/icons-svelte/icons/id";
    import Mail from "@tabler/icons-svelte/icons/mail";
    import Phone from "@tabler/icons-svelte/icons/phone";
    import User from "@tabler/icons-svelte/icons/user";
    import { onMount } from "svelte";

    let id = 0;
	let username = '';
    let cpf = '';
    let nome = '';
    let email = '';
    let telefone = '';

    function getCookie(name: string): string | null {
        const cookieValue = document.cookie
            .split('; ')
            .find(row => row.startsWith(name + '='))
            ?.split('=')[1];

        return cookieValue ? decodeURIComponent(cookieValue) : null;
    }

    onMount(async () => {
        const token = getCookie('auth_token');

        let result = await fetch(
            `http://localhost:8083/api/pessoa/pessoa-fisica/${$user.id}`,
            {
                method: "GET",
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            }
        );
        const userData = await result.json();
        id = $user.id;
        username = $user.username;
        nome = $user.name;
        email = userData.pessoa_fisica.pessoa.user.email;
        cpf = userData.pessoa_fisica.cpf;
        telefone = userData.pessoa_fisica.pessoa.telefone;
    })

    const onSubmit = (e: Event) => {
		e.preventDefault();

        console.log(username);
        console.log(cpf); // TODO: Manter apenas números
        console.log(nome);
        console.log(email);
        console.log(telefone); // TODO: Manter apenas números

        // TODO: Colocar isso dentro da model
        // TODO: Tentar tirar o JSON.stringify

		fetch(`/api/update`, {
			method: 'POST',
			body: JSON.stringify({ id: id, email: email, telefone: telefone })
		}).then((response) => {
			response.json().then((value) => {
                console.log(value);
				alert(value.message);

				// goto("/login");
			});
		});
	};

    const handleExcluir = async (e: Event) => {
        const token = getCookie('auth_token');

        let result = await fetch(
            `http://localhost:8083/api/pessoa/pessoa-fisica/${$user.id}`,
            {
                method: "DELETE",
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            }
        );
        alert((await result.json()).message);
        user.set(null);
        goto('/');
    }
</script>

<section class="h-4/5 flex justify-center items-center">
	<form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
        <TextField Icon={User} name="username" label="Usuário" placeholder="Usuário" value={username} disabled />
        <CpfField Icon={Id} name="cpf" value={cpf} disabled />
        <TextField name="nome" label="Nome" placeholder="Nome" value={nome} disabled />
        <EmailField Icon={Mail} name="email" bind:value={email} required />
        <PhoneField Icon={Phone} name="telefone" bind:value={telefone} required />
        <BaseButton label="Salvar" type="submit" />
        <BaseButton label="Excluir conta" type="button" onClick={handleExcluir} />
	</form>
</section>

<style>
</style>