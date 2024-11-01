<?php 
/**
Plugin Name: WP Quick Notes
Description: Very simple plugin allows visitors writedown notes when listning to a podcast.
Version: 1.0
Author: MHPC Solutions
Author URI: https://profiles.wordpress.org/mhpcsolutions
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mhpc-quick-notes
**/

// Check the Absolute Path
if (!defined('ABSPATH')){
	exit;
}

// Constants
define('MHPC_QUICK_NOTES_PLUGIN_URL', __FILE__);

// File Includes
include('includes/Mhpc_Quick_Notes_Widget.php');

// Include scripts and styles
function mhpc_quick_notes_enqueue_scripts() {
	wp_register_style( 'mhpc-quick-notes-styles', plugins_url( '/css/style.css',MHPC_QUICK_NOTES_PLUGIN_URL ) );
	wp_register_script( 'mhpc-quick-notes-scripts', plugins_url( '/js/main.js',MHPC_QUICK_NOTES_PLUGIN_URL ) );

	wp_enqueue_style( 'mhpc-quick-notes-styles');
	wp_enqueue_script( 'mhpc-quick-notes-scripts');
}

// Register widget
function mhpc_register_quick_notes_widget(){
	register_widget( 'Mhpc_Quick_Notes_Widget' );
}

// Hooks
add_action( 'wp_enqueue_scripts', 'mhpc_quick_notes_enqueue_scripts' );
add_action('widgets_init', 'mhpc_register_quick_notes_widget');