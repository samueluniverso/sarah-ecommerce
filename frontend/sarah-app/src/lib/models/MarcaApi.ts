class MarcaApi
{
    private static readonly api = `http://localhost:8083/api`;

    public static getMarca = async (id: number): Promise<any> => {
        try {
            const response = await fetch(`${this.api}/marca/${id}`, {
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
        descricao: string,
        token: string,
    ): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/marca/`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    'nome': nome,
                    'descricao': descricao,
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

    public static update = async (
        id: string,
        nome: string,
        descricao: string,
        token: string,
    ): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/marca/`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    'id': parseInt(id),
                    'nome': nome,
                    'descricao': descricao,
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

    public static delete = async (
        id: string,
        token: string,
    ): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/marca/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            if (!response.ok) {
                return response;
            }
        }
        catch (err: any) {
            console.log(err);
        }
    }

    public static listar = async (): Promise<any> => {
        try {
            const response = await fetch(`${this.api}/marcas/listar`, {
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

export default MarcaApi;