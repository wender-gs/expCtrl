import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/css/createUser.css',
            'resources/css/dash.css',
            'resources/css/login.css',
            'resources/scss/style.scss',
            'resources/scss/media-querys.scss',

            'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
            'node_modules/jquery/dist/jquery.js',
            'resources/ts/main.ts'
        ]),
    ],
});
