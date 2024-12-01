<script lang="ts">
    import { fly } from "svelte/transition";

    let isOpen = false;

    const handleClickOutside = (e: MouseEvent) => {
        const target = e.target as HTMLElement;

        if (!target.closest('.container')) {
            isOpen = false;
        }
    }

    if (typeof window !== "undefined") {
        window.addEventListener('click', handleClickOutside);
    }
</script>

<span class="container relative flex justify-center">
    <button on:click={() => { isOpen = !isOpen }}>
        <slot name="trigger"/>
    </button>
    {#if isOpen}
        <span transition:fly={{ y: -10 }} class="triangle"></span>
        <div transition:fly={{ y: -10 }} class="popover">
            <slot name="product"/>
            <slot name="brand"/>
            <slot name="category"/>
            <slot name="content"/>
        </div>
    {/if}
</span>

<style>
    * {
        --triangle-height: 6px;
    }

    .triangle {
        position: absolute;
        top: 100%;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: var(--triangle-height) solid #fff;
        z-index: 101;
    }

    .popover {
        position: absolute;
        top: calc(100% + var(--triangle-height));
        background-color: #fff;
        padding: 8px;
        /* TODO: Usar a shadow do tailwind */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        width: max-content;
        z-index: 100;
    }
</style>