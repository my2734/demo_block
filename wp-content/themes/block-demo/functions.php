<?php 

// function block_demo_styles() {
// 	wp_enqueue_style(
// 		'block-demo-style',
// 		get_stylesheet_uri().'assets/css/custom_style.css',
// 	);
// }
// add_action( 'wp_enqueue_scripts', 'block_demo_styles' );


if ( ! function_exists( 'fse_setup' ) ) {
	function fse_setup() {
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}
}
add_action( 'after_setup_theme', 'fse_setup' );