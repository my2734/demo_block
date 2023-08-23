<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'lms-education-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'lms-education-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'lms-education-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// HEADER SECTION

	Kirki::add_section( 'lms_education_elementor_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'lms-education-elementor' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'lms-education-elementor' ),
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_section_header',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_menu_size_heading',
		'section'     => 'lms_education_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_menu_size',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'lms-education-elementor' ),
		'type'        => 'text',
		'section'     => 'lms_education_elementor_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_menu_text_transform_heading',
		'section'     => 'lms_education_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'lms_education_elementor_menu_text_transform',
		'section'     => 'lms_education_elementor_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'lms-education-elementor' ),
			'uppercase' => esc_html__( 'Uppercase', 'lms-education-elementor' ),
			'lowercase' => esc_html__( 'Lowercase', 'lms-education-elementor' ),
			'capitalize' => esc_html__( 'Capitalize', 'lms-education-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Advertisement Text', 'lms-education-elementor' ),
		'settings' => 'lms_education_elementor_header_advertisement_text',
		'section'  => 'lms_education_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_enable_button_heading',
		'section'     => 'lms_education_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Register Button', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Button Text', 'lms-education-elementor' ),
		'settings' => 'lms_education_elementor_header_button_text',
		'section'  => 'lms_education_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    =>  esc_html__( 'Button Link', 'lms-education-elementor' ),
		'settings' => 'lms_education_elementor_header_button_url',
		'section'  => 'lms_education_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_login_enable',
		'label'       => esc_html__( 'Enable/Disable Login', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_menu_color',
		'label'       => __( 'Menu Color', 'lms-education-elementor' ),
		'type'        => 'color',
		'section'     => 'lms_education_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_menu_hover_color',
		'label'       => __( 'Menu Hover Color', 'lms-education-elementor' ),
		'type'        => 'color',
		'default'     => '#121212',
		'section'     => 'lms_education_elementor_section_header',
		'transport' => 'auto',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a:hover', '#main-menu ul li a:hover', '#main-menu li:hover > a','#main-menu a:focus','#main-menu li.focus > a','#main-menu ul li.current-menu-item > a','#main-menu ul li.current_page_item > a','#main-menu ul li.current-menu-parent > a','#main-menu ul li.current_page_ancestor > a','#main-menu ul li.current-menu-ancestor > a'),
				'property' => 'color',
			),

		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_submenu_color',
		'label'       => __( 'Submenu Color', 'lms-education-elementor' ),
		'type'        => 'color',
		'section'     => 'lms_education_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a', '#main-menu ul.sub-menu li a'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_submenu_hover_color',
		'label'       => __( 'Submenu Hover Color', 'lms-education-elementor' ),
		'type'        => 'color',
		'section'     => 'lms_education_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#fff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a:hover', '#main-menu ul.sub-menu li a:hover'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_submenu_hover_background_color',
		'label'       => __( 'Submenu Hover Background Color', 'lms-education-elementor' ),
		'type'        => 'color',
		'section'     => 'lms_education_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#1d62b1',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a:hover', '#main-menu ul.sub-menu li a:hover'),
				'property' => 'background',
			),
		),
	) );

	// TYPOGRAPHY SETTINGS
	Kirki::add_panel( 'lms_education_elementor_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'lms-education-elementor' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'lms_education_elementor_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_h1_typography_heading',
		'section'     => 'lms_education_elementor_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_h1_typography_font',
		'section'   =>  'lms_education_elementor_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h1',
				'suffix' => '!important'
			],
		],
	) );


	//Heading 2 Section

	Kirki::add_section( 'lms_education_elementor_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_h2_typography_heading',
		'section'     => 'lms_education_elementor_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_h2_typography_font',
		'section'   =>  'lms_education_elementor_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'lms_education_elementor_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_h3_typography_heading',
		'section'     => 'lms_education_elementor_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_h3_typography_font',
		'section'   =>  'lms_education_elementor_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'lms_education_elementor_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_h4_typography_heading',
		'section'     => 'lms_education_elementor_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_h4_typography_font',
		'section'   =>  'lms_education_elementor_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'lms_education_elementor_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_h5_typography_heading',
		'section'     => 'lms_education_elementor_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_h5_typography_font',
		'section'   =>  'lms_education_elementor_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'lms_education_elementor_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_h6_typography_heading',
		'section'     => 'lms_education_elementor_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_h6_typography_font',
		'section'   =>  'lms_education_elementor_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'lms_education_elementor_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'lms-education-elementor' ),
		'panel'    => 'lms_education_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_body_typography_heading',
		'section'     => 'lms_education_elementor_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'lms_education_elementor_body_typography_font',
		'section'   =>  'lms_education_elementor_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Figtree',
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	//ADDITIONAL SETTINGS

	Kirki::add_section( 'lms_education_elementor_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'lms-education-elementor' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'lms-education-elementor' ),
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_header_background_attachment_heading',
		'section'     => 'lms_education_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'lms_education_elementor_header_background_attachment',
		'section'     => 'lms_education_elementor_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'lms-education-elementor' ),
			'fixed' => esc_html__( 'Fixed', 'lms-education-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'lms_education_elementor_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'lms-education-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'lms-education-elementor' ),
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_length_setting_heading',
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'lms_education_elementor_length_setting',
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'lms-education-elementor' ),
		'settings'    => 'lms_education_elementor_single_post_tag',
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'lms-education-elementor' ),
		'settings'    => 'lms_education_elementor_single_post_category',
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_single_post_radius',
		'section'     => 'lms_education_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'lms-education-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'lms_education_elementor_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'lms-education-elementor' ),
		'type'        => 'text',
		'section'     => 'lms_education_elementor_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'lms_education_elementor_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'lms-education-elementor' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'lms-education-elementor' ),
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'lms-education-elementor' ),
		'settings'    => 'lms_education_elementor_shop_page_layout',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'lms-education-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'lms-education-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'lms_education_elementor_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'lms-education-elementor' ),
		'settings'    => 'lms_education_elementor_products_per_row',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'lms-education-elementor' ),
		'settings'    => 'lms_education_elementor_products_per_page',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_elementor_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'lms-education-elementor' ),
		'settings'    => 'lms_education_elementor_single_product_sidebar_layout',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'lms-education-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'lms-education-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'lms_education_elementor_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_products_button_border_radius_heading',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'lms-education-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'lms_education_elementor_products_button_border_radius',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_sale_badge_position_heading',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'lms-education-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'lms_education_elementor_sale_badge_position',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'lms-education-elementor' ),
			'left' => esc_html__( 'Left', 'lms-education-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_products_sale_font_size_heading',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'lms-education-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'lms_education_elementor_products_sale_font_size',
		'section'     => 'lms_education_elementor_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'lms_education_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'lms-education-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'lms-education-elementor' ),
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_footer_text_heading',
		'section'     => 'lms_education_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'lms-education-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_elementor_footer_text',
		'section'  => 'lms_education_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_elementor_footer_enable_heading',
		'section'     => 'lms_education_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'lms-education-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'lms-education-elementor' ),
		'section'     => 'lms_education_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education-elementor' ),
			'off' => esc_html__( 'Disable', 'lms-education-elementor' ),
		],
	] );
}
