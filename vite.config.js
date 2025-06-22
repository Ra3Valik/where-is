import { resolve } from 'path';

export default {
    resolve: {
        alias: {
            '@scss': resolve(__dirname, 'assets/scss'),
        },
    },
    build: {
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'assets/js/main.js'),
                admin: resolve(__dirname, 'assets/js/admin.js'),
                style: resolve(__dirname, 'assets/scss/main.scss'),
                adminStyle: resolve(__dirname, 'assets/scss/admin.scss'),
                branding: resolve(__dirname, 'assets/scss/branding.scss'),
            },
            output: {
                entryFileNames: '[name].js',
                assetFileNames: '[name].css',
            },
        },
        outDir: 'dist',
        emptyOutDir: true,
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
					@use "@scss/core/variables" as *;
					@use "@scss/core/mixins" as *;
				`,
            },
        },
    },
};
