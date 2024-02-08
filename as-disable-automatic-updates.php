<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

/**
* Plugin Name: AS Disable Automatic Updates
* Plugin URI: https://360activesolution.com/as-disable-automatic-updates
* Description: It will disable all the updates related to wordpress core, themes and plugins on activation. 
* Version: 1.0
* Author: AS Themes
* Author URI: https://360activesolution.com
* License:        GPL-3.0+
* License URI:    http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:    as-disable-automatic-updates
* Domain Path:    /languages
**/

/*
* Remove all update notifications of WordPress core, plugins and themes.
* This function fake last checked time using __return_null
*/
function asdau_remove_core_updates(){
	global $wp_version;
	return(object) array(
		'last_checked'=> time(),
		'version_checked'=> $wp_version,
		'updates' => array ()
	);
}
add_filter('pre_site_transient_update_core','asdau_remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','asdau_remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','asdau_remove_core_updates'); //hide updates for all themes


// If automatic updates are enabled, it will disable all automatic updates
add_filter ( 'automatic_updater_disabled', '__return_true' );
