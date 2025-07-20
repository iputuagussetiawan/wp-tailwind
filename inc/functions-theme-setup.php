<?php

/**
 * This function load login page style
 * We use custom login page style to make better layout
 */
function tmdr_login_css() {

    tmdr_print_css('tmdradmincss', 'admin/login.css');

}
add_action( 'login_enqueue_scripts', 'tmdr_login_css' );

/**
 * Register new color scheme for admin in profile menu
 */
function tmdr_admin_color_scheme(){
	//Get the theme directory
	$theme_dir = get_template_directory_uri();

	//Timedoor
	wp_admin_css_color( 'timedoor', __( 'Timedoor' ),
		$theme_dir . '/build/css/admin/colorScheme-tmdr.css',
		array( '#242e3b', '#fff', '#d54e21' , '#10af13')
	);

	// Website COlor Scheme
	wp_admin_css_color( 'website_color_scheme', __( 'Website Color Scheme' ),
		$theme_dir . '/build/css/admin/colorScheme-client.css',
		// array( '#242e3b', '#fff', '#d54e21' , '#10af13')
	);
}
add_action('admin_init', 'tmdr_admin_color_scheme');

/**
 * Automatically activate Timedoor Color Scheme when Activating custom theme.
 */

function mytheme_set_default_admin_color_scheme() {
    $user_id = get_current_user_id(); // Get the ID of the currently logged-in user
    update_user_meta($user_id, 'admin_color', 'timedoor'); // Set the color scheme for the current user

    // Optional: To set the color scheme for all users, loop through each user.
    /*
    $users = get_users();
    foreach ($users as $user) {
        update_user_meta($user->ID, 'admin_color', 'my_custom_scheme');
    }
    */
}
add_action('after_switch_theme', 'mytheme_set_default_admin_color_scheme');

/**
 * This function is use to get image background and logo for login page
 * The background image is set from admin page 
 */
function tmdr_custom_admin_login() {
    
    // Add Background Image to Admin Login Page
    if( class_exists('acf') && get_field('login_background_image', 'login') ) {
        $adminImage = get_field('login_background_image', 'login')['url'];
        $backgroundPosition = 'center';
    } else {
        $adminImage = 'https://wp-plugins.timedoor.net/assets/image/bg-img.png';
        $backgroundPosition = 'bottom';
    }
    echo '
    <style type="text/css">
        body.login:before {
            background-color: var(--web-identity);
            background-image: url("' . $adminImage . '");
            background-position: ' . $backgroundPosition . ';
        }
    </style>
    ';

    // Add Custom Logo to Admin Login Page
    $custom_logo = get_theme_mod( 'custom_logo' );

    if ( class_exists('acf') && get_field('login_logo', 'login') ) {
        $logo = get_field('login_logo', 'login')['url'];
    } else {
        $logo = 'https://placehold.co/300x84?text=Company+Logo';
    }
    
    echo '<style type="text/css">
    #login h1 a {
        background-image: url(' . $logo . ');
    }
    </style>';
    
}
add_action('login_enqueue_scripts', 'tmdr_custom_admin_login');

/**
 * Function to set the logo link in login page to our website home page
 * If we didn't change it, it will redirect to wordpress.org website
 */
function tmdr_logo_url_login() {
    return home_url();
}
add_filter('login_headerurl', 'tmdr_logo_url_login');

/**
 * Change logo alt text in login page to match the website name
 */
function tmdr_logo_url_title_login() {
    return wp_get_theme()->get('Theme Name');
}
add_filter('login_headertext', 'tmdr_logo_url_title_login');

/**
 * Add google recaptcha badge in login page
 */
function tmdr_recaptcha_badge_login() { 
    ?>
    <div class="message captcha-text">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer noopener">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer noopener">Terms of Service</a> apply.</div>
    
    <?php 
}
add_action('login_form','tmdr_recaptcha_badge_login');

/**
 * Change login logo title
 */
function tmdr_custom_title_login($origtitle) { 
    
    return get_bloginfo('name').' - Login';
    
}
add_filter('login_title', 'tmdr_custom_title_login', 99);

/**
 * Function to move language switcher on login page
 * Add javascript to move language switcher inside element with id login
 * Insert the language switcher to last element using appendChild
 */
function move_login_language_dropdown() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const languageDropdown = document.querySelector('.language-switcher');
            const loginForm = document.querySelector('#login');
            if (languageDropdown && loginForm) {
                loginForm.appendChild(languageDropdown);
            }
        });
    </script>
    <?php
}
add_action('login_enqueue_scripts', 'move_login_language_dropdown');

/**
 * Function to change the wordpress logo on admin dashboard to be website favicon
 * this function is generated using chatGPT
 */
function custom_admin_logo() {
    // Replace this URL with your uploaded favicon URL
    $favicon_url = get_site_icon_url(); // Automatically fetch the site's favicon if set, otherwise replace with the URL of your image

    if (!$favicon_url) {
        return;
    };

    echo '<style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            content: ""
            width: 100%;
            height: 100%;;
            color: rgba(0, 0, 0, 0);
            background-image: url(' . esc_url($favicon_url) . ') !important;
            background-position: center;
            background-size: contain;
        }
    </style>';
};
add_action('admin_head', 'custom_admin_logo');
add_action('wp_head', 'custom_admin_logo'); // Optional: Add to frontend admin bar

/**
 * Function to add custom logo upload via menu appearance > customize
 * This function also add support for <title> tag in wp_head, so you dont need to add it manually
 */
function tmdr_theme_setup() {
    /**
     * Enable title tag for wordpress
     * @link https://codex.wordpress.org/Title_Tag
     */
    add_theme_support( 'title-tag' );

    // Enable custom logo upload
    $defaults = array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme','tmdr_theme_setup');

/**
 * Enable wordpress submenu in admin under menu appearance
 * Also register starter menu which is main navbar and footer navbar
 * register_nav_menu need 2 parameter
 * First parameter is location identifier, like a slug
 * Second parameter is location descriptive text
 * @link https://developer.wordpress.org/reference/functions/register_nav_menu/
 */
function tmdr_menu_setup() {
    add_theme_support('menus');
    register_nav_menu('main_menu', 'Main Navbar');
    register_nav_menu('footer', 'Footer Navbar');
    register_nav_menu('footer-two', 'Footer Navbar Two');
    
}
add_action('init', 'tmdr_menu_setup');

/**
 * Replace custom logo class
 */
function tmdr_change_logo_class($html) {
    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    $html = str_replace('custom-logo', 'img-responsive', $html);
    return $html;
}
add_filter('get_custom_logo', 'tmdr_change_logo_class');

/**
 * Run the function add_example_separators() to add separator in admin menu
 * You can find the function in function-custom.php file
 * Find wordpress menu position in link below
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure
 */
function tmdr_add_separators() {
    /**
     * Positions for Core Menu Items
        2 Dashboard
        4 Separator
        5 Posts
        10 Media
        15 Links
        20 Pages
        25 Comments
        59 Separator
        60 Appearance
        65 Plugins
        70 Users
        75 Tools
        80 Settings
        99 Separator

     * Note: use position 32 - 56 for custom post type position in admin, so it doesn't get overwrite by this separator
    */
    add_admin_menu_separator(4, 'content');
    // add_admin_menu_separator(31, 'custom-post-types');
    add_admin_menu_separator(57, 'tmdr-settings');
    add_admin_menu_separator(59, 'wordpress-settings');
    add_admin_menu_separator(99, 'others');
}
add_action('admin_menu', 'tmdr_add_separators');

/**
 * Add <meta name="keywords" content="focus keywords">.
 */
add_filter( 'rank_math/frontend/show_keywords', '__return_true');

/**
 * Function to disable wordpress scaling down image
 * @link https://stackoverflow.com/questions/75044018/selectively-prevent-wordpress-from-generating-additional-image-sizes-on-upload
 */
add_filter('intermediate_image_sizes_advanced', '__return_empty_array');
