<?php

// ======================================
// Functions Partial -- start
// ======================================

include_once get_theme_file_path("inc/class-tgm-plugin-activation.php");
include_once get_theme_file_path("inc/functions-custom.php");
include_once get_theme_file_path("inc/functions-plugin.php");
include_once get_theme_file_path("inc/functions-style-script.php");
include_once get_theme_file_path("inc/functions-acf.php");
include_once get_theme_file_path("inc/functions-polylang.php");
include_once get_theme_file_path("inc/functions-theme-setup.php");
include_once get_theme_file_path("inc/functions-basic-auth.php");

// ======================================
// Functions Partial -- end
// ======================================

// add class to li element
function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter("nav_menu_css_class", "add_additional_class_on_li", 1, 3);

function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, "link_class")) {
		$atts["class"] = $args->link_class;
	}
	return $atts;
}
add_filter("nav_menu_link_attributes", "add_menu_link_class", 1, 3);

function boilerplate_load_assets()
{
	wp_enqueue_script(
		"ourmainjs",
		get_theme_file_uri("/build/index.js"),
		["wp-element", "react-jsx-runtime"],
		"1.0",
		true
	);
	wp_enqueue_style("ourmaincss", get_theme_file_uri("/build/index.css"));
}

add_action("wp_enqueue_scripts", "boilerplate_load_assets");

function boilerplate_add_support()
{
	add_theme_support("title-tag");
	add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "boilerplate_add_support");
