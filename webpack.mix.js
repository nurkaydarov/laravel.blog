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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/flex-slider.css',
    'resources/css/fontawesome.css',
    'resources/css/owl.css',
    'resources/css/templatemo-stand-blog.css',
], 'public/assets/css/styles.css');

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/custom.js',
    'resources/js/slick.js',
    'resources/js/owl.js',
    'resources/js/isotope.js',
    'resources/js/accordions.js',
    'resources/js/bs-custom-file-input.min.js'

], 'public/assets/js/scripts.js');

mix.copyDirectory('resources/fonts', 'public/fonts');
mix.copyDirectory('resources/images', 'public/images');
