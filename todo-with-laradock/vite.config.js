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
    //  以下は、Docker環境でviteのHMRを動作させるための設定。
    //  以下のページを参考にした。
    //  https://nnahito.com/articles/107#header-0
    server: {
        host: true,
        hmr: {
            host: 'localhost',    // Docker環境のhostを設定
        },
        watch: {
            usePolling: true,    // WindowsのWSL2やDocker環境でも動くように設定
        }
    }
});
