<?php 

/**
 * This function is used to make the enqueue script shorter
 * You just need to pass the file name and file path as parameters
 * File path is relative to theme folder
 * File versioning will automatically follow version in style.css
 */
function tmdr_print_css($name, $filePath) {
    $themeVersion = wp_get_theme()->get('Version');
    $cssPath = get_template_directory_uri() . '/build/css/';
    return wp_enqueue_style($name,  $cssPath . $filePath, array(), $themeVersion, 'all');
}

function tmdr_print_js($name, $filePath) {
    $themeVersion = wp_get_theme()->get('Version');
    $jsPath = get_template_directory_uri() . '/build/js/';
    wp_enqueue_script($name, $jsPath . $filePath, array(), $themeVersion, array('in_footer' => true, 'strategy' => 'defer'));
}

/**
 * Function for load google font
 * No need to change anything, just change the google_font_url variable to your theme font
 */
function tmdr_add_google_fonts() {
    $google_font_url = 'https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap';
    
    $onloadVal = "this.media='all'";
    
    echo '
    <link rel="preconnect" href = "https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as = "style" href="' . $google_font_url .  '" />
    <link rel="stylesheet" href="' . $google_font_url . '" media="print" onload="' . $onloadVal . '" />
    <noscript>
        <link rel="stylesheet" href="' . $google_font_url . '" />
    </noscript>
    ';
}
add_action('wp_enqueue_scripts', 'tmdr_add_google_fonts');

/**
 * Function for enqueue css and js from our template
 * Please reminder to enqueue spesific css or js to spesific page
 * @link https://developer.wordpress.org/reference/functions/
 */
function tmdr_script_enqueue() {
    
    // Global CSS
    tmdr_print_css('layoutCss', 'layout.css');
    
    // example code to add CSS and JS to Page Template
    // example is for page-home.php page template
    
    if (is_page_template('page-home.php')) {
        tmdr_print_css('homeCss', 'pages/home.css');
        tmdr_print_js('homeJs', 'pages/home.js');
    }

    if (is_page_template('page-about.php')) {
        tmdr_print_css('aboutCss', 'pages/about.css');
        tmdr_print_js('aboutJs', 'pages/about.js');
    }

    if (is_page_template('page-products.php')) {
        tmdr_print_css('aboutCss', 'pages/products.css');
        tmdr_print_js('aboutJs', 'pages/products.js');
    }

    if(is_tax('category-product')){
        tmdr_print_css('taxonomiesProductCss', 'pages/taxonomies-products.css');
        tmdr_print_js('taxonomies-productsJS', 'pages/taxonomies-products.js');
    }

    if (is_page_template('page-production.php')) {
        tmdr_print_css('productionCss', 'pages/production.css');
        tmdr_print_js('productionJs', 'pages/production.js');
    }

    if (is_page_template('page-blog.php')) {
        tmdr_print_css('blogCss', 'pages/blog.css');
        tmdr_print_js('blogJs', 'pages/blog.js');
    }
    
    if (is_singular('blog')) {
        tmdr_print_css('singleBlogCss', 'pages/single-blog.css');
        tmdr_print_js('singleBlogJs', 'pages/single-blog.js');
    }

    if (is_page_template('page-contact.php')) {
        tmdr_print_css('contactCss', 'pages/contact.css');
        tmdr_print_js('contactJs', 'pages/contact.js');
    }
    
    // example code to add CSS and JS to Singular Page
    /*
    if (is_singular('post_type')) {
        tmdr_print_css('nameCss', 'pages/filePath.css');
        tmdr_print_js('nameJs', 'pages/filePath.js');
    }
    */
    
    // example code to add CSS and JS to Archive Page
    /*
    if (is_archive('post_type')) {
        tmdr_print_css('nameCss', 'pages/filePath.css');
        tmdr_print_js('nameJs', 'pages/filePath.js');
    }
    */
    
    // example code to add CSS and JS to 404 Page
    /*
    if (is_404()) {
        tmdr_print_css('404Css', 'pages/404.css');
        tmdr_print_js('404Js', 'pages/404.js');
    }
    */
    
}
add_action('wp_enqueue_scripts', 'tmdr_script_enqueue');