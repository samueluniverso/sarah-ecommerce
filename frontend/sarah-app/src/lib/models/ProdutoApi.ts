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
    
            return result;
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
}

export default ProdutoApi;