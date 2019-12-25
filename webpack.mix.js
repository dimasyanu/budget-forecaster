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
var out;
if (mix.config.production) {
	out = '.min.';
} else {
	out = '.';
}

mix
.js([
	'semantic/dist/components/site.js',
	'semantic/dist/components/dimmer.js',
	'semantic/dist/components/sidebar.js',
	'semantic/dist/components/transition.js',

	'resources/js/app.js',

], 'public/js/app' + out + 'js')

.combine([
	'semantic/dist/components/breadcrumb.css',
	'semantic/dist/components/button.css',
	'semantic/dist/components/card.css',
	'semantic/dist/components/container.css',
	'semantic/dist/components/dimmer.css',
	'semantic/dist/components/grid.css',
	'semantic/dist/components/header.css',
	'semantic/dist/components/icon.css',
	'semantic/dist/components/menu.css',
	'semantic/dist/components/segment.css',
	'semantic/dist/components/sidebar.css',
	'semantic/dist/components/site.css',
	'semantic/dist/components/transition.css',

	'resources/less/style.less'

], 'public/css/app' + out + 'css');