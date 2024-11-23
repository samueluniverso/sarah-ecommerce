<script lang="ts">
    import type { IconComponents } from "@tabler/icons-svelte";

    export let label = '';
    export let name: string;
    export let value = '';
    export let placeholder = '';
    export let required = false;
    export let type = 'text';
    export let Icon: typeof IconComponents|null = null;
    export let mask: ((value: string) => string) | null = null;
    export let disabled = false;

    export let onChange: ((e: Event) => void)|null = null;
    const handleInput = (e: Event) => {
        const target = e.target as HTMLInputElement;
        value = target.value;

        if (mask) {
            value = mask(value);
        }
    };
</script>

<div class="flex flex-col w-96">
    {#if label}
        <label class="select-none w-fit text-sm" for={name}>{label}</label>
    {/if}
    <span class="flex border-2 border-sarah-gold outline outline-2 outline-transparent has-[input:focus-visible]:outline-sarah-green transition-all duration-300">
        {#if Icon}
            <label class="select-none" for={name}>
                <svelte:component this={Icon} size={32} color="#000" class="p-1 w-8 border-r-2 border-r-sarah-gold" />
            </label>
        {/if}
        <input id={name} class="p-1 flex-1 focus-visible:outline-none" {name} value={value} on:change={onChange} on:input={handleInput} {required} {placeholder} {type} {disabled} />
        <slot/>
    </span>
</div>

<style>
</style>