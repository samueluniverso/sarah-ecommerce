<script lang='ts'>
    import type { IconComponents } from "@tabler/icons-svelte";

    export let Icon: typeof IconComponents|null = null;
    export let label: string;
    export let type: "button"|"submit" = "button";
    export let onClick: ((e: Event) => void)|null = null;
</script>

<button on:click={onClick} class="flex justify-center items-center bg-sarah-green text-sarah-white p-1 hover:brightness-75 transition duration-300" {type}>
    {#if Icon}
        <svelte:component this={Icon} size={24} class="mr-1"/>
    {/if}
    {label}
</button>