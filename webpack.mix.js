const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.sass', 'public/css', [
        //
    ]);

mix.sass('resources/sass/index.sass', 'public/css');
mix.sass('resources/sass/home.sass', 'public/css');
mix.sass('resources/sass/navbar.sass', 'public/css');
mix.sass('resources/sass/header.sass', 'public/css');
mix.sass('resources/sass/create.sass', 'public/css');