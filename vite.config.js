import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        https: process.env.APP_ENV === 'production'
    },
    build: {
        manifest: true,
        rollupOptions: {
            output: {
                manualChunks: undefined,
            }
        }
    }
});
