import { resolve } from 'path';

export default {
    resolve: {
        alias: {
            '@scss': resolve(__dirname, 'assets/scss'),
            '@fonts': resolve(__dirname, 'assets/fonts'),
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
                assetFileNames: assetInfo => {
                    // Для CSS
                    if (assetInfo.name && assetInfo.name.endsWith('.css')) {
                        return '[name][extname]';
                    }
                    // Для шрифтов
                    if (assetInfo.name && assetInfo.name.match(/\.(ttf|otf|woff2?|eot)$/)) {
                        return 'fonts/[name][extname]';
                    }
                    // Для других ассетов (например, изображения)
                    if (assetInfo.name && assetInfo.name.match(/\.(png|jpe?g|gif|svg|webp)$/)) {
                        return 'img/[name][extname]';
                    }
                    // По умолчанию
                    return '[name][extname]';
                }
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
