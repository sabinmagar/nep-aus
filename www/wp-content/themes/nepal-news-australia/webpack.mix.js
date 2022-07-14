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

mix
.disableNotifications()
.options({
    processCssUrls: false,
})
.js('js/app.js', 'public/app.min.js')
.js('js/custom.js', 'public/custom.min.js')
.postCss('css/app.css', 'public/app.min.css', [
        //
    ]);