import { json } from "@sveltejs/kit";

export const POST = async ({ request, cookies }) => {
    try {
        const token = cookies.get('auth_token');
        // TODO: Retornar um unauthorized se não tiver token

        if (!token) {
            return json({ success: false, message: 'Unauthorized' }, { status: 401 });
        }

        const response = await fetch(`${process.env.BACKEND_API_URL}/logout`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) {
            return response;
        }

        const result = await response.json();

        cookies.delete('auth_token', { path: '/' });

        return json(result);
    } catch (err) {
        return json({ success: false, message: err }, { status: 500 });
    }
}