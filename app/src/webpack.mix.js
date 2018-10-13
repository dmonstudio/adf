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

mix.js('resources/assets/admin/js/app.js', 'public/js/admin.js')
    .js('resources/assets/admin/js/login.js', 'public/js/login.js')
    .sass('resources/assets/admin/sass/index.scss', 'public/css/admin.css')
    .version()
