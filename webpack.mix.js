// webpack.mix.js

let mix = require('laravel-mix');
mix.webpackConfig({
    stats: {
        children: true,
        warnings: false
    }
}).js('src/app.js', 'dist')
    .postCss('src/app.css', 'dist', [
        require('tailwindcss'),
    ]).options({
        processCssUrls: false
    })
    .disableNotifications();
