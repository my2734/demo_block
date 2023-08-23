<?php
/**
 * Plugin Name:       Block Demo
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blockdemo
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
function create_block_blockdemo_block_init() {
	register_block_type( 
		__DIR__ . '/build',
		['render_callback'=>"function_render_callBack"] 
	);
}
add_action( 'init', 'create_block_blockdemo_block_init' );

function function_render_callBack(){
	return "
		<p id='app'>hello ca nha yeu cua ken</p>
	";
}

// function myguten_enqueue() {
//     wp_enqueue_script( 'myguten-script',
//         plugins_url( 'myguten.js', __FILE__ ),
//         array( 'wp-blocks' )
//     );
// }
// add_action( 'enqueue_block_editor_assets', 'myguten_enqueue' );


function deno(){
	return "<h1>Hello ca nha yeu cua ken</h1>";
}