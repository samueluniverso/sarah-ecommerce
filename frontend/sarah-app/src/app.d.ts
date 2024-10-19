// See https://kit.svelte.dev/docs/types#app
// for information about these interfaces
declare global {
	namespace App {
		// interface Error {}
		// interface Locals {}
		// interface PageData {}
		// interface PageState {}
		// interface Platform {}
	}

    declare class Produto {
        id: number
        nome: string
        preco: number
        quantidade: number
    }

    declare class ItemCarrinho {
        id: number
        quantidade: number
    }
}

export {};