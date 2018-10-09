const workboxPlugin = require('workbox-webpack-plugin')
const mix = require('laravel-mix')
const tailwind = require('tailwindcss')
require('laravel-mix-purgecss')

mix.copy('node_modules/feathericon/build/svg-sprite/sprite.feathericon.svg', 'public/svg');

mix.setPublicPath('public')
    .less('resources/less/app.less', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .options({
        processCssUrls: false,
        postCss: [
            tailwind('./tailwind.js'),
        ]
    })

if (mix.inProduction()) {
    mix.purgeCss().version()
    mix.webpackConfig({
        plugins: [
            new workboxPlugin.InjectManifest({
                swSrc: 'resources/js/worker.js',   // more control over the caching
                swDest: 'sw.js',                   // the service-worker file name
                importsDirectory: 'service-worker' // have a dedicated folder for sw files
            })
        ]
  });
}
