import { user } from "$lib/stores";
import type { Handle } from "@sveltejs/kit";

export const handle: Handle = async ({ event, resolve }) => {
    const token = event.cookies.get('auth_token');

    if (!token) {
        user.set(null);
    }

    return await resolve(event);
}