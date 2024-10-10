<script lang="ts">
    import type { IconComponents } from '@tabler/icons-svelte';
    import BaseInput from './base/BaseInput.svelte';

    export let name: string;
    export let label = 'CPF';
    export let value = '';
    export let placeholder = '999.999.999-99';
    export let required = false;
    export let Icon: typeof IconComponents|null = null;
    export let mask = '999.999.999-99';
    export let disabled = false;

    function createMask(maskPattern: string) {
        return (inputValue: string): string => {
            let maskedValue = '';
            let maskIndex = 0;
            let valueIndex = 0;

            const cleanedValue = inputValue.replace(/\D/g, '');

            while (maskIndex < maskPattern.length && valueIndex < cleanedValue.length) {
                const maskChar = maskPattern[maskIndex];
                const valueChar = cleanedValue[valueIndex];

                if (maskChar === '9') {
                    maskedValue += valueChar;
                    valueIndex++;
                } else {
                    maskedValue += maskChar;
                }
                maskIndex++;
            }

            return maskedValue;
        };
    }

    const maskFunction = createMask(mask);
</script>

<BaseInput
    {label}
    {name}
    bind:value={value}
    {placeholder}
    {required}
    {Icon}
    {disabled}
    mask={maskFunction}
/>
