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

    declare class ProdutoCarrinho {
        id: number
        nome: string
        preco: number
        quantidade: number
    }

    declare class ItemCarrinho {
        id: number
        quantidade: number
    }

    declare class Produto {
        id: number
        nome: string
        is_destaque: boolean
        preco: number
        marca: Marca[]
        caracteristicas: Caracteristicas[]
    }

    declare class Marca {
        id: number
        nome: string
        descricao: string
    }

    declare class Caracteristicas {
        id: number
        cor: string
    }
}

export {};