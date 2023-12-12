import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/scss/app.scss", "resources/css/app.css"],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            // Define the entry point for your custom JavaScript file
            input: {
                app: "resources/js/app.js",
            },
        },
        // Define the output directory for the compiled JavaScript
        outDir: "public/js",
    },
});
