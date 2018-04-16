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

mix.setPublicPath('webroot');

mix.js('./resources/js/app.js', 'webroot/js').extract(['vue']).version();

mix.sass('./resources/css/app.scss', 'webroot/css')
   .sass('./resources/css/dashboard.scss', 'webroot/css');