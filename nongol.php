<?php
/*
 * Plugin Name:       Nongol
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Simple modal and popup plugin.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Agung Sundoro
 * Author URI:        https://agung2001.github.io
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-nongol-plugin
 * Domain Path:       /languages
 */

// Enqueue css and js for the plugin.
function nongol_scripts(){
    wp_enqueue_style('nongol-style', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_script('nongol-script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'nongol_scripts');

// Modal DOM.
function modal_dom(){
    include( plugin_dir_path( __FILE__ ) . 'views/modal.php');
}
add_action('wp_footer', 'modal_dom');