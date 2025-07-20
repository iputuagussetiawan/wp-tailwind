<?php

/**
 * TGMPA function
 * @link https://github.com/TGMPA/TGM-Plugin-Activation
 * @link https://github.com/webstylepress/WordPress-Snippets
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'tmdr_theme_required_plugins' );
function tmdr_theme_required_plugins() {

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then local source is also required.
     */

    $plugins = array(
        
        
        // Advanced custom field image ratio crop
        array(
            'name'             => 'Advanced Custom Fields: Image Aspect Ratio Crop Field',
            'slug'             => 'acf-image-aspect-ratio-crop',
            'required'         => true,
        ),
        
        
        // Duplicator
        array(
            'name'             => 'Duplicator – WordPress Migration & Backup Plugin',
            'slug'             => 'duplicator',
            'required'         => true,
        ),
        
    
        // Polylang
        array(
            'name'             => 'Polylang',
            'slug'             => 'polylang',
            'required'         => false,
        ),
    
        
        // CATPCHA4WP
        array(
            'name'             => 'CAPTCHA 4WP – Antispam CAPTCHA solution for WordPress',
            'slug'             => 'advanced-nocaptcha-recaptcha',
            'required'         => true,
        ),
        
        // Adminimize
        array(
            'name'             => 'Adminimize',
            'slug'             => 'adminimize',
            'required'         => true,
        ),
        
        // Capabilities
        array(
            'name'             => 'PublishPress Capabilities – User Role Editor, Access Permissions, Admin Menus',
            'slug'             => 'capability-manager-enhanced',
            'required'         => true,
        ),
        
        // SVG Support
        array(
            'name'             => 'SVG Support',
            'slug'             => 'svg-support',
            'required'         => true,
        ),

        
        // WPS Hide Login
        array(
            'name'             => 'WPS Hide Login',
            'slug'             => 'wps-hide-login',
            'required'         => true,
        ),
        
        // Contact Form 7
        array(
            'name'             => 'Contact Form 7',
            'slug'             => 'contact-form-7',
            'required'         => false,
        ),
        
        // Contact Form 7 Database Addon – CFDB7
        array(
            'name'             => 'Contact Form 7 Database Addon – CFDB7',
            'slug'             => 'contact-form-cfdb7',
            'required'         => false,
        ),
        
    
        
    );
    
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
            'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
            // <snip>...</snip>
            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            )
            */
    );
    tgmpa( $plugins, $config );
}