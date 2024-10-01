<script lang="ts">
    import { goto } from "$app/navigation";
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import CpfField from "$lib/components/form/CpfField.svelte";
    import EmailField from "$lib/components/form/EmailField.svelte";
    import PasswordField from "$lib/components/form/PasswordField.svelte";
    import PhoneField from "$lib/components/form/PhoneField.svelte";
    import TextField from "$lib/components/form/TextField.svelte";
    import Id from "@tabler/icons-svelte/icons/id";
    import Lock from "@tabler/icons-svelte/icons/lock";
    import Mail from "@tabler/icons-svelte/icons/mail";
    import Phone from "@tabler/icons-svelte/icons/phone";
    import Plus from "@tabler/icons-svelte/icons/plus";
    import User from "@tabler/icons-svelte/icons/user";

	let username = '';
	let password = '';
    let is_admin = false;
    let cpf = '';
    let nome = '';
    let email = '';
    let telefone = '';

    const onSubmit = (e: Event) => {
		e.preventDefault();

        console.log(username);
        console.log(password);
        console.log(is_admin);
        console.log(cpf); // TODO: Manter apenas números
        console.log(nome);
        console.log(email);
        console.log(telefone); // TODO: Manter apenas números

        // TODO: Tentar tirar o JSON.stringify

		fetch('api/register', {
			method: 'POST',
			body: JSON.stringify({ username: username, password: password, is_admin: is_admin, cpf: cpf, nome: nome, email: email, telefone: telefone })
		}).then((response) => {
			response.json().then((value) => {
				alert(value.message);

				// goto("/login");
			});
		});
	};
</script>

<section class="h-4/5 flex justify-center items-center">
	<form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
        <TextField Icon={User} name="username" label="Usuário" placeholder="Usuário" bind:value={username} required />
        <PasswordField Icon={Lock} name="senha" label="Senha" placeholder="Senha" bind:value={password} required />
        <CpfField Icon={Id} name="cpf" bind:value={cpf} required />
        <TextField name="nome" label="Nome" placeholder="Nome" bind:value={nome} required />
        <EmailField Icon={Mail} name="email" bind:value={email} required />
        <PhoneField Icon={Phone} name="telefone" bind:value={telefone} required />
        <BaseButton Icon={Plus} label="Cadastrar" type="submit" />
	</form>
</section>

<style>
</style>