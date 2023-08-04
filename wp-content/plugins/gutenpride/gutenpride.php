<?php

/**
 * Plugin Name:       Gutenpride
 * Description:       A Gutenberg block to show your pride! This block enables you to type text and style it with the color font Gilbert from Type with Pride.
 * Version:           0.1.0
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenpride
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_gutenpride_block_init()
{
	// die(plugin_dir_path(__FILE__));
	// die(get_template_directory_uri());
	// die(plugin_dir_url(__FILE__));
	register_block_type(__DIR__ . '/build');
}
add_action('init', 'create_block_gutenpride_block_init');


add_shortcode('shortcode_demo', 'shortcode_demo_shortcode');

function shortcode_demo_shortcode()
{
	//js
	wp_enqueue_media();
	wp_enqueue_script("jquery", 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', '1.0', true);
	wp_enqueue_script("zz-shortcode-jscss-script", plugin_dir_url(__FILE__) . 'main.js', array('jquery'), true);
	//css
	// return "<button id='demo_button'>Upload image</button>";
	$html = '<div class="container">
	<div id="content_image" class="row">
		
	</div>
	<div class="text-center mt-5">
		<button id="demo_button" class="btn btn-primary">Upload image</button>
	</div>
</div>';
	return $html;
	// return '<h1>Hello ca nha yeu</h1>';
}
