class UserApi
{
    private static readonly api = `http://localhost:8083/api`;

    public static getUser = async (id: number, token: string): Promise<any> => {

        try {
            const response = await fetch(`${this.api}/user/${id}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
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

export default UserApi;