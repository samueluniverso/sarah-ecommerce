class PedidoApi
{
    private static readonly api = `http://localhost:8083/api`;

    public static store = async (
        dt_pedido: string,
        observacao: string | undefined,
        fk_pessoa: number,
        produtos: Array<any>,
        endereco: Array<any>,
        token: string,
    ): Promise<any> => {
        try {
            const response = await fetch(`${this.api}/pedido/`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    "dt_pedido": dt_pedido,
                    "observacao": observacao,
                    "fk_pessoa": fk_pessoa,
                    "produtos": produtos,
                    "endereco": endereco
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

export default PedidoApi;