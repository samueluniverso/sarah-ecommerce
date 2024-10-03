import { writable } from "svelte/store";

const isBrowser = typeof window !== 'undefined';

const initialUser = isBrowser
   ? JSON.parse(localStorage.getItem('user') || 'null')
   : null;
export const user = writable(initialUser);

user.subscribe(value => {
    if (isBrowser) {
        if (value) {
            localStorage.setItem('user', JSON.stringify(value));
        } else {
            localStorage.removeItem('user');
        }
    }
});