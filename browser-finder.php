<?php
/*
  Plugin Name: Browser and Operating System Finder
  Plugin URI: https://aftabmuni.wordpress.com/
  Description: Plugin is used to add browser name and OS name in body tag class
  Author: Aftab Muni
  Version: 1.2
  Author URI: https://aftabmuni.wordpress.com/
 */

/*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  Copyright 2005-2015 Automattic, Inc.
 */

define('BOFINDER_VERSION', '1.2');
define('BOFINDER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('BOFINDER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BOFINDER_DELETE_LIMIT', 100000);

require_once( ABSPATH . 'wp-includes/pluggable.php' );
require_once(BOFINDER_PLUGIN_DIR . 'class.browser.php');

if (@$_POST['bf_browser_hidden'] == 'Y') {
    if (!isset( $_POST['bf_nonce_check'] ) || ! wp_verify_nonce( $_POST['bf_nonce_check'], 'bf_nonce_action' ) ) {
	$message = $title = 'Sorry, your nonce did not verify.';
	wp_die( $message, $title);
    }

    $bf_browser_name = $_POST['bf_browser_name'];
    update_option('bf_browser_name', strtolower($bf_browser_name));

    $bf_os_name = $_POST['bf_os_name'];
    update_option('bf_os_name', strtolower($bf_os_name));

    $bf_clean_class = $_POST['bf_clean_class'];
    update_option('bf_clean_class', $bf_clean_class);
    ?>
    <div class="updated"><p><strong><?php _e('Settings saved.'); ?></strong></p></div>
    <?php
} else {
    $bf_browser_name = get_option('bf_browser_name');
    $bf_os_name = get_option('bf_os_name');
    $bf_clean_class = get_option('bf_clean_class');
}

if (isset($_REQUEST['type']) && $_REQUEST['type'] == 'reset-all') {
    delete_option('bf_browser_name');
    delete_option('bf_os_name');
    delete_option('bf_clean_class');
    header('Location: ?page=browser-finder');
}

add_action('admin_menu', 'browser_finder_admin_actions');

function browser_finder_admin() {
    require_once(BOFINDER_PLUGIN_DIR . 'browser_finder_import_admin.php');
}

function browser_finder_admin_actions() {
    add_options_page("Browser Finder", "Browser Finder", "activate_plugins", "browser-finder", "browser_finder_admin");
}

function add_extra_body_classes($classes) {
    $bf_browser_name = get_option('bf_browser_name');
    $bf_os_name = get_option('bf_os_name');
    $bf_clean_class = get_option('bf_clean_class');
    $browser = new Browser();
    if ($bf_clean_class == 1) {
        $classes = array();
    }
    if (!empty($bf_browser_name)) {
        $classes[] = $bf_browser_name . '-' . slugify($browser->getBrowser());
    }
    if (!empty($bf_os_name)) {
        $classes[] = $bf_os_name . '-' . slugify($browser->getPlatform());
    }
    return $classes;
}

add_filter('body_class', 'add_extra_body_classes');

/**
 * This function is used slugify the plain text
 * 
 * @param array $text contains the plain text
 */
function slugify($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}
?>