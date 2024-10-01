import { json } from '@sveltejs/kit';

export const POST = async ({ request, cookies }) => {
    try {
        const token = cookies.get('auth_token');
        // TODO: Retornar um unauthorized se não tiver token

        const data = await request.json();
        const id = data.id;
        const email = data.email;
        const telefone = data.telefone.replace(/\D/g, '');

        const response = await fetch(`${process.env.BACKEND_API_URL}/pessoa-fisica`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({ id, email, telefone })
        });

        console.log(response);
        if (!response.ok) {
            return response;
        }

        const result = await response.json();

        return json({ success: result.success, message: result.message });
    } catch (err: any) {
        return json({ success: false, message: err.message }, { status: 500 });
    }
}