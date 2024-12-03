class MedidaApi
{
    private static readonly api = `http://localhost:8083/api`;

    public static getMedida = async (id: number): Promise<any> => {
        try {
            const response = await fetch(`${this.api}/medida/${id}`, {
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
        completo: string,
        sigla: string,
        comprimento: number,
        largura: number,
        altura: number,
        token: string,
    ): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/medida/`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    'completo': completo,
                    'sigla': sigla,
                    'comprimento': comprimento,
                    'largura': largura,
                    'altura': altura
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
        completo: string,
        sigla: string,
        comprimento: number,
        largura: number,
        altura: number,
        token: string,
    ): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/medida/`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    'id': parseInt(id),
                    'completo': completo,
                    'sigla': sigla,
                    'comprimento': comprimento,
                    'largura': largura,
                    'altura': altura
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
            const response = await fetch(`${this.api}/medida/${id}`, {
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
            const response = await fetch(`${this.api}/medidas/listar`, {
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

export default MedidaApi;