import { sveltekit } from '@sveltejs/kit/vite';
import { defineConfig } from 'vite';
import { nodePolyfills } from 'vite-plugin-node-polyfills';
import dotenv from 'dotenv';

dotenv.config();

export default defineConfig({
	plugins: [
        sveltekit(),
        nodePolyfills()
    ],
	server: {
		host: '0.0.0.0',
		port: 3000
	}
});
