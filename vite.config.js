import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/website/core.css',
                'resources/js/adminpanel/core.js',
                'resources/js/website/core.js',
            ],
            refresh: true,
        }),
    ],
});
