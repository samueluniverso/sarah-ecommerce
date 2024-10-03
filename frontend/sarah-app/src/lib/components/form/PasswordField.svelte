<script lang="ts">
    import type { IconComponents } from '@tabler/icons-svelte';
    import BaseInput from './base/BaseInput.svelte';
    import EyeOff from '@tabler/icons-svelte/icons/eye-off';
    import Eye from '@tabler/icons-svelte/icons/eye';

    export let label = '';
    export let name: string;
    export let value = '';
    export let placeholder = '';
    export let required = false;
    export let Icon: typeof IconComponents|null = null;
    export let disabled = false;

    let isVisible = false;
</script>

<BaseInput
    {label}
    {name}
    bind:value={value}
    {placeholder}
    {required}
    {Icon}
    type={isVisible ? 'text' : 'password'}
    {disabled}
>
    <button type="button" on:click={() => { isVisible = !isVisible }}>
        {#if isVisible}
            <EyeOff class="p-1 w-8 border-r-sarah-gold" size={32} color="#000" />
        {:else}
            <Eye class="p-1 w-8 border-r-sarah-gold" size={32} color="#000" />
        {/if}
    </button>
</BaseInput>