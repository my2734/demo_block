<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FSE
 * @since 1.0.0
 */

/**
 * Enqueue the style.css file.
 * 
 * @since 1.0.0
 */
function fse_styles() {
	wp_enqueue_style(
		'fse-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'fse_styles' );


if ( ! function_exists( 'fse_setup' ) ) {
	function fse_setup() {
            add_theme_support( 'wp-block-styles' );
        }
}
add_action( 'after_setup_theme', 'fse_setup' );

function j0e_enqueue_styles()
{
	//css
	wp_enqueue_style('bootstrap-css', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
	// die("hello ca nha yeu");
}

add_action('wp_enqueue_scripts', 'j0e_enqueue_styles');