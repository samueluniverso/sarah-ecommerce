<script>
	import '../app.css';
    import Header from '$lib/components/Header.svelte';
</script>

<div class="app">
	<main class="h-screen">
		<Header />
		<slot />
	</main>
</div>

<style>
</style>
