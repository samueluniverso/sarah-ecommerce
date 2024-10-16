import { json } from '@sveltejs/kit';

import type { RequestEvent } from '@sveltejs/kit';

export const POST = async ({ request, cookies }: RequestEvent) => {
    try {
        const token = cookies.get('auth_token');
        // TODO: Retornar um unauthorized se não tiver token

        const data = await request.json();
        const username = data.username;
        const password = data.password;
        const is_admin = data.is_admin;
        const cpf = data.cpf.replace(/\D/g, '');
        const nome = data.nome;
        const email = data.email;
        const telefone = data.telefone.replace(/\D/g, '');

        const response = await fetch(`${process.env.BACKEND_API_URL}/pessoa/pessoa-fisica`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({ username, password, is_admin, cpf, nome, email, telefone })
        });

        if (!response.ok) {
            return response;
        }

        const result = await response.json();

        return json({ success: result.success, message: result.message });
    }
    catch (err: any) {
        return json({ success: false, message: err.message }, { status: 500 });
    }
}