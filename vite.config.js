import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

const port = 5173;
const host = 'hotelspoll.ddev.site';
const origin = "https://{$host}:${port}";
export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
         host: true,
         port: port,
         strictPort: true,
         hmr: {
             protocol: 'wss',
             host: host,
         }
         // origin: origin,
        },
});
