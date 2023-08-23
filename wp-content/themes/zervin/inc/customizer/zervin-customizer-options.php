<?php
/**
 * Customizer section options.
 *
 * @package zervin
 *
 */

function zervin_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'arilewp_footer_copright_text',
			array(
				'sanitize_callback' =>  'zervin_sanitize_text',
				'default' => __('Copyright &copy; 2023 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Zervin theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'zervin'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('arilewp_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','zervin'),
				'section' => 'arilewp_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'zervin_customizer_theme_settings' );

function zervin_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}