<?php
/**
 * Midwest Dev Custom Theme
 * Built on Beaver Builder Child Theme
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 * https://docs.wpbeaverbuilder.com/
 *
 * @version 1.0
 * @author Midwest Dev
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Theme directory constants
 */
define('MIDWESTDEV_THEME_DIR', get_stylesheet_directory());
define('MIDWESTDEV_THEME_URL', get_stylesheet_directory_uri());

/**
 * Enqueue child theme style.css file
 */
function midwestdev_enqueue_styles() {
  wp_enqueue_style(
    'midwestdev-style',
    get_stylesheet_uri(),
    array( 'fl-automator-skin' ),
    filemtime( get_stylesheet_directory() . '/style.css' )
  );
}
add_action( 'wp_enqueue_scripts', 'midwestdev_enqueue_styles' );

/**
 * Enqueue custom theme JavaScript
 * Uncomment when custom JS is needed
 */
// function midwestdev_enqueue_scripts() {
//     wp_enqueue_script(
//         'midwestdev-js',
//         MIDWESTDEV_THEME_URL . '/assets/js/midwestdev.js',
//         array('jquery'),
//         filemtime(MIDWESTDEV_THEME_DIR . '/assets/js/midwestdev.js'),
//         true
//     );
// }
// add_action('wp_enqueue_scripts', 'midwestdev_enqueue_scripts');

/**
 * Add your custom theme functions below!
 */