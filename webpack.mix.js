let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.browserSync("127.0.0.1:8000");

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.pug$/,
                loader: "pug-plain-loader",
            },
        ],
    },
    plugins: [
        new (require('webpack').DefinePlugin)({
            __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false
        })
    ]
});

mix.js("resources/vue/src/main.js", "public/js")
    .vue()
    .less("resources/vue/src/assets/less/main.less", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);
