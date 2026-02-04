<?php
/**
 * Beaver Builder Child Theme
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://docs.wpbeaverbuilder.com/
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Enqueue child theme style.css file
 * Do not delete this, you will need it
 */
add_action( 'wp_enqueue_scripts', function() {
  wp_enqueue_style(
    'child-style',
    get_stylesheet_uri(),
    array( 'fl-automator-skin' ),
    wp_get_theme()->get( 'Version' )
  );
});
/**
 * Add your custom theme functions below!
 */