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

mix.js('./resources/js/app.js', 'webroot/js/mix')
    .js('./resources/js/assets.js', 'webroot/js/mix/assets.budle.js')
    .js('./resources/js/components/Users/index.js', 'webroot/js/mix/users.bundle.js')
    .extract(['vue', 'emojione', 'axios']).version().sourceMaps();

mix.sass('./resources/css/app.scss', 'webroot/css')
   .sass('./resources/css/dashboard.scss', 'webroot/css').version().sourceMaps();