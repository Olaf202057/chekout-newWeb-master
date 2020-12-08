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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.styles(['public/css/app.css',
        'resources/css/bootstrap.min.css',
        'resources/css/font-awesome.css',
        'resources/css/ion.rangeSlider.min.css',
        'resources/css/magnific-popup.css',
        'resources/css/nice-select.css',
        'resources/css/responsive.css',
        'resources/css/swiper.min.css',
        'resources/css/style.css'
    ]
    , 'public/css/app.bundle.css').version();

mix.scripts([
    'public/js/app.js',
    'resources/js/template/jquery.min.js',
    'resources/js/template/popper.min.js',
    'resources/js/template/bootstrap.min.js',
    'resources/js/template/ion.rangeSlider.min.js',
    'resources/js/template/swiper.min.js',
    'resources/js/template/jquery.nice-select.min.js',
    'resources/js/template/jquery.magnific-popup.min.js',
    // 'resources/js/template/main.js',
    //'resources/js/template/map.js',
    'resources/js/template/sticksy.js',
    'resources/js/template/foodmart.js'
], 'public/js/app.bundle.js').version();
