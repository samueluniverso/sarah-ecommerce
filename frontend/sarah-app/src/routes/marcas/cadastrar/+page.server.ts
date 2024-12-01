
import type { Cookies } from '@sveltejs/kit';

export async function load({ cookies }: { cookies: Cookies }) {
    let auth_token = cookies.get('auth_token');

    return {auth_token};
}