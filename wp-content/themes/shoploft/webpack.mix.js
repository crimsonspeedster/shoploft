const mix = require('laravel-mix');
const path = require('path');


mix
    .alias({
        '@': path.join(__dirname, '/src'),
    })
    .options({
        processCssUrls: false
    })
    .js('src/back/js/index.js', 'dist/back/js/')
    .sass('src/back/scss/style.scss', 'dist/back/css')
    .sass('src/front/scss/style.scss', 'dist/front/css')
    .copy('src/front/js', 'dist/front/js')
    .copy('src/front/images', 'dist/front/images')
    .copy('src/front/fonts', 'dist/front/fonts')
    .copy('src/front/carousel', 'dist/front/carousel')
    .browserSync({
        proxy: "nginx",
        files: ['dist/css', 'dist/js', './**/*.php'],
    }).sourceMaps();
