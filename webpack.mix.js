const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/sb-admin/sb-admin.js', 'public/js')
    .js('resources/js/sb-admin/sb-admin.min.js', 'public/js')
    .js('resources/js/sb-admin/demo/datatables-demo.js', 'public/js/demo')
    .js('resources/js/sb-admin/demo/chart-area-demo.js', 'public/js/demo')
    .js('resources/js/sb-admin/demo/chart-bar-demo.js', 'public/js/demo')
    .js('resources/js/sb-admin/demo/chart-pie-demo.js', 'public/js/demo')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/sb-admin/sb-admin.scss', 'public/css');
