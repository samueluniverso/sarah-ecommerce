<script lang="ts">
    import type { IconComponents } from '@tabler/icons-svelte';
    import BaseInput from './base/BaseInput.svelte';

    export let label = 'Email';
    export let name: string;
    export let value = '';
    export let placeholder = 'example@domain.com';
    export let required = false;
    export let Icon: typeof IconComponents|null = null;
    export let type = 'email';
    export let disabled = false;
</script>

<BaseInput
    {label}
    {name}
    bind:value={value}
    {placeholder}
    {required}
    {Icon}
    {type}
    {disabled}
/>
