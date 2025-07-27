<?php

/**
 * Function to Adds basic authentication and IP whitelisting
 */
function basic_auth_and_ip_whitelist()
{
	// Whitelisted IPs
	$whitelisted_ips = ["127.0.0.1", "103.100.175.121"]; // Add your whitelisted IPs here (local and office IP)

	// Basic Auth credentials
	$auth_user = "baledigital";
	$auth_pass = "#baledigital"; // please chaneg following regulation

	// check if Search engine visibility is checked, if true, apply basic auth
	// the settings is located in admin Settings -> Reading
	if (get_option("blog_public") == 0) {
		// Check if the IP is whitelisted
		$user_ip = $_SERVER["REMOTE_ADDR"];
		if (in_array($user_ip, $whitelisted_ips)) {
			return;
		}

		// Basic authentication
		if (
			!isset($_SERVER["PHP_AUTH_USER"]) ||
			$_SERVER["PHP_AUTH_USER"] !== $auth_user ||
			$_SERVER["PHP_AUTH_PW"] !== $auth_pass
		) {
			header('WWW-Authenticate: Basic realm="Protected Area"');
			header("HTTP/1.0 401 Unauthorized");
			echo "Unauthorized";
			exit();
		}
	}
}

// Hook into WordPress init
add_action("init", "basic_auth_and_ip_whitelist");
