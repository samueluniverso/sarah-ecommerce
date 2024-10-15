import { json } from "@sveltejs/kit";

// TODO: Colocar isso na model depois
const getUser = async (id: number, token: string): Promise<any> => {
    try
    {
        const response = await fetch(`${process.env.BACKEND_API_URL}/pessoa/pessoa-fisica/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        let result = await response.json();

        return { id: result.pessoa_fisica.id, name: result.pessoa_fisica.pessoa.nome };
    }
    catch (err: any)
    {
        console.log(err);
    }
}

export const POST = async ({ request, cookies }) => {
    try {
        const data = await request.json();
        const username = data.username;
        const password = data.password;

        const response = await fetch(`${process.env.BACKEND_API_URL}/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        });

        if (!response.ok) {
            return response;
        }

        const result = await response.json();

        cookies.set('auth_token', result.token, {
            // httpOnly: true,
            httpOnly: false,
            path: '/',
            secure: process.env.NODE_ENV === 'production',
            maxAge: 60 * 60 * 24
        });

        let user = await getUser(result.pessoa_id, result.token);

        return json({ success: result.success, message: result.message, name: user.name, id: user.id });
    } catch (err: any) {
        return json({ success: false, message: err.message }, { status: 500 });
    }
}