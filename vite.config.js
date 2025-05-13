import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from "laravel-vite-plugin";
export default defineConfig({
    plugins: [
        tailwindcss(),

        //here is the setup for tailwind issues
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
})
