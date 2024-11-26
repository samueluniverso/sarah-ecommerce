class ProdutoApi
{
    private static readonly api = `http://localhost:8083/api`;

    public static getProduto = async (id: number): Promise<any> => {
        try {
            const response = await fetch(`${this.api}/produto/${id}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            });
    
            let result = await response.json();
            return result.data;
        }
        catch (err: any) {
            console.log(err);
        }
    }

    public static paginar = async (limit: number, offset: number): Promise<any> => {
        limit ?? 9;
        offset ?? 0;

        try {
            const response = await fetch(`${this.api}/produtos/paginar/limit/${limit}/offset/${offset}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            });
    
            let result = await response.json();
            return result.data;
        }
        catch (err: any) {
            console.log(err);
        }
    }

    public static store = async (
        nome: string,
        preco: string,
        cor: string,
        is_destaque: boolean,
        fk_marca: string,
        categorias: string,
        caracteristicas: string,
        token: string,
    ): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/produto/`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    'nome': nome,
                    'preco': preco,
                    'cor': cor,
                    'is_destaque': is_destaque,
                    'fk_marca': fk_marca,
                    'categorias': categorias,
                    'caracteristicas': caracteristicas
                })
            });

            if (!response.ok) {
                return response;
            }
        }
        catch (err: any) {
            console.log(err);
        }
    }
}

export default ProdutoApi;