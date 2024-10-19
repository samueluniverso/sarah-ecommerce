import { writable, get } from "svelte/store";

export let itensCarrinho = writable<ItemCarrinho[]>([]);
/// [ { id: 1, quantidade, 4}, { id: 2, quantidade: 2} ]

/// adicionar ao carrinho
export const adicionarAoCarrinho = (id: number) => {
    let itens = get(itensCarrinho);
    let itemPoscao = itens.findIndex(
        (item) => {return item.id === id}
    );

    if (itemPoscao !== -1) {
        /// Item já está no carrinho, adicionar quantidade ao item
        itensCarrinho.update(() => {
            let itensAtualizados = itens.map((item) => {
                if (item.id == id) {
                    return { ...item, quantidade: item.quantidade + 1 }
                }
                return item;
            });

            return itensAtualizados;
        });
    } else {
        /// Item não está no carrinho, adicionar ele ao carrinho
        itensCarrinho.update(() => {
            return [ ...itens, {id: id, quantidade: 1} ]
        })
    }


}

/// remover do carrinho
export const removerDoCarrinho = (id: number) => {
    let itens = get(itensCarrinho);
    let itemPoscao = itens.findIndex(
        (item) => {return item.id === id}
    );

    if (itens[itemPoscao]?.quantidade -1 == 0) {
        itens.splice(itemPoscao, 1);
    }

    /// Item já está no carrinho, remover quantidade ao item
    itensCarrinho.update(() => {
        let itensAtualizados = itens.map((item) => {
            if (item.id == id) {
                return { ...item, quantidade: item.quantidade - 1 }
            }
            return item;
        });

        return itensAtualizados;
    });
}