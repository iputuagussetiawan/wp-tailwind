<?php

/**
 * Functions for get wordpress current language
 * You just need to call the function in templates to get the current language
 * it is usefull when you work with polylang plugin
 * Expexted return format "en_us"
 * @return string
 */
function getCurrentLang()
{
	if (function_exists("pll_current_language")) {
		return pll_current_language();
	} else {
		return explode("_", get_locale())[0];
	}
}

/**
 * Functions to get page data object with page title only
 * See page title in page option general settings -> page link
 * @param string default empty
 * @return object
 */
function getPageData($page_title)
{
	$pageData = get_field("page_links", "page-links");

	foreach ($pageData as $data) {
		if ($data["page_title"] === $page_title) {
			return $data["page_object"];
		}
	}

	return 'No "' . $page_title . '" page_links configuration found.';
}

/**
 * Function to add separator to admin menu
 * This function receive 1 parameter which is menu position
 * Parameter can be either integer or string
 * You can either specify the position explicitly, or you can pass the slug or URL of an existing top-level menu and it will automatically figure out its position and add the separator right after that menu
 * @link https://w-shadow.com/blog/2012/10/16/add-separators-to-the-admin-menu/
 */
function add_admin_menu_separator($position, $text = "")
{
	global $menu;
	static $uid = 0;

	if (!is_int($position)) {
		//Find the position of the menu that matches
		//the specified file name or URL.
		$menuPosition = 0;
		foreach ($menu as $menuPosition => $item) {
			if ($item[2] === $position) {
				break;
			}
		}
		//We'll insert the separator just after the target menu.
		$position = $menuPosition + 1;
	}

	$menuFile = "separator-custom-" . $uid++;

	if (!$text) {
		$menu[$position] = [
			"", //Menu title (ignored)
			"read", //Required capability
			$menuFile, //URL or file (ignored, but must be unique)
			"", //Page title (ignored)
			"wp-menu-separator tmdr-separator", //CSS class. Identifies this item as a separator.
		];
	} else {
		$menu[$position] = [
			"", //Menu title (ignored)
			"read", //Required capability
			$menuFile, //URL or file (ignored, but must be unique)
			"", //Page title (ignored)
			"wp-menu-separator tmdr-separator " . $text, //CSS class. Identifies this item as a separator.
		];
	}
	ksort($menu);
}
/**
 * Function to show custom debugging helper
 * call the function anywhere in the template to show the debugging helper
 * write down the code that you want to debug on the template-parts/debug-console.php
 */

function show_debug_helper()
{
	echo get_template_part("template-parts/debug-console");
}
