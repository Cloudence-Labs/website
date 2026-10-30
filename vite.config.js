import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/home-v2.js'],
            refresh: true,
        }),
        tailwindcss(),
        react(),
    ],
    build: {
        rollupOptions: {
            output: {
                // Keep the heavy 3D bundle out of the page-critical chunk.
                manualChunks(id) {
                    if (id.includes('node_modules/three') || id.includes('@react-three')) return 'three';
                    if (id.includes('node_modules/react')) return 'react';
                },
            },
        },
    },
});
