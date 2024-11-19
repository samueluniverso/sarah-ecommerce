class CepApi
{
    public static getData = async (cep: number): Promise<any> => {
        try {
            const response = await fetch(`https://brasilapi.com.br/api/cep/v2/${cep}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            });
    
            let result = await  response.json();
            return result;
        }
        catch (err: any) {
            console.log(err);
        }
    }
}

export default CepApi;