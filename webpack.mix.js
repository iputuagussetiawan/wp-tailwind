const mix = require("laravel-mix");

// mix.sass('source/scss/pages/home.scss', 'assets/css/pages/')
//     .sourceMaps(true, 'source-map');

mix.js("src/js/pages/home.js", "build/js/pages/")
	.js("src/js/pages/about.js", "build/js/pages/")
	.sourceMaps(true, "source-map");

//Wordpress Custom Admin Login CSS
mix.sass("src/scss/admin/login.scss", "build/css/admin")
	.sass("src/scss/admin/colorScheme-tmdr.scss", "build/css/admin")
	.sass("src/scss/admin/colorScheme-client.scss", "build/css/admin")
	.sourceMaps(true, "source-map");

mix.options({
	processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});

// mix.disableNotifications()
