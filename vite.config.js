import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/place_copy.js',
                'public/scss/main.scss',
                'public/js/mob-menu.js',
            ],
            refresh: true,
        }),
    ],
});
