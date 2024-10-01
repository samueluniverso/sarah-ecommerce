<script lang="ts">
    import { goto } from "$app/navigation";
    import BaseButton from "$lib/components/form/base/BaseButton.svelte";
    import PasswordField from "$lib/components/form/PasswordField.svelte";
    import TextField from "$lib/components/form/TextField.svelte";
    import { user } from "$lib/stores";
    import { IconLogin2 } from "@tabler/icons-svelte";
    import Lock from "@tabler/icons-svelte/icons/lock";
    import User from "@tabler/icons-svelte/icons/user";

	let username = '';
	let password = '';

    const onSubmit = (e: Event) => {
		e.preventDefault();

		fetch('api/login', {
			method: 'POST',
			body: JSON.stringify({ username: username, password: password })
		}).then((response) => {
			response.json().then((value) => {
				alert(value.message);

				if (response.status == 200) {
					user.set({ id: value.id, name: value.name, username: username });

					goto("/");
				}
			});
		});
	};
</script>

<section class="h-4/5 flex justify-center items-center">
	<form on:submit={onSubmit} class="py-8 px-4 flex flex-col shadow-custom gap-4">
        <TextField Icon={User} name="username" label="Usuário" placeholder="Usuário" bind:value={username} required />
        <PasswordField Icon={Lock} name="senha" label="Senha" placeholder="Senha" bind:value={password} required />
        <BaseButton Icon={IconLogin2} label="Entrar" type="submit" />
	</form>
</section>

<style>
</style>