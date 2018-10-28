let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/admin/app.js', 'public/js/admin.js')
    .js('resources/js/admin/login.js', 'public/js/login.js')
    .extract(['vue', 'vue-router', 'lodash', 'axios', 'element-ui'])
    .sass('resources/sass/admin/index.scss', 'public/css/admin.css')
    .sass('resources/sass/frontend/index.scss', 'public/css/adf.css')
    .version()
    .copy('resources/images/static/*', 'public/images/')
