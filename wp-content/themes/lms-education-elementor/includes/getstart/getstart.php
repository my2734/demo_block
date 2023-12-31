<?php
//about theme info
add_action( 'admin_menu', 'lms_education_elementor_gettingstarted' );
function lms_education_elementor_gettingstarted() {
	add_theme_page( esc_html__('LMS Education Elementor', 'lms-education-elementor'), esc_html__('LMS Education Elementor', 'lms-education-elementor'), 'edit_theme_options', 'lms_education_elementor_about', 'lms_education_elementor_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function lms_education_elementor_admin_theme_style() {
	wp_enqueue_style('lms-education-elementor-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('lms-education-elementor-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'lms_education_elementor_admin_theme_style');

// Changelog
if ( ! defined( 'LMS_EDUCATION_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'LMS_EDUCATION_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function lms_education_elementor_changelog_screen() {	
	global $wp_filesystem;
	$changelog_file = apply_filters( 'lms_education_elementor_changelog_file', LMS_EDUCATION_ELEMENTOR_CHANGELOG_URL );
	if ( $changelog_file && is_readable( $changelog_file ) ) {
		WP_Filesystem();
		$changelog = $wp_filesystem->get_contents( $changelog_file );
		$changelog_list = lms_education_elementor_parse_changelog( $changelog );
		echo wp_kses_post( $changelog_list );
	}
}

function lms_education_elementor_parse_changelog( $content ) {
	$content = explode ( '== ', $content );
	$changelog_isolated = '';
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}
	$changelog_array = explode( '= ', $changelog_isolated );
	unset( $changelog_array[0] );
	$changelog = '<div class="changelog">';
	foreach ( $changelog_array as $value) {
		$value = preg_replace( '/\n+/', '</span><span>', $value );
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div><hr>';
		$changelog .= str_replace( '<span></span>', '', $value );
	}
	$changelog .= '</div>';
	return wp_kses_post( $changelog );
}

//guidline for about theme
function lms_education_elementor_mostrar_guide() { 
	//custom function about theme customizer
	$lms_education_elementor_return = add_query_arg( array()) ;
	$lms_education_elementor_theme = wp_get_theme( 'lms-education-elementor' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'LMS Education Elementor', 'lms-education-elementor' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'lms-education-elementor' ); ?>: <?php echo esc_html($lms_education_elementor_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="lms_education_elementor_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'lms-education-elementor' ); ?></button>
				<button class="tablinks" onclick="lms_education_elementor_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Demo Import', 'lms-education-elementor' ); ?></button>
				<button class="tablinks" onclick="lms_education_elementor_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'lms-education-elementor' ); ?></button>
			</div>

			<div id="setup_customizer" class="tabcontent open">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'lms-education-elementor'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'lms-education-elementor'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'lms-education-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'lms-education-elementor'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'lms-education-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'lms-education-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'lms-education-elementor'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'lms-education-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'lms-education-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'lms-education-elementor'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'lms-education-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'lms-education-elementor'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'lms-education-elementor' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','lms-education-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','lms-education-elementor'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','lms-education-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','lms-education-elementor'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$plugin_ins = LMS_Education_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
					$lms_education_elementor_actions = $plugin_ins->recommended_actions;
					?>
					<div class="lms-education-elementor-recommended-plugins ">
							<div class="lms-education-elementor-action-list">
								<?php if ($lms_education_elementor_actions): foreach ($lms_education_elementor_actions as $key => $lms_education_elementor_actionValue): ?>
										<div class="lms-education-elementor-action" id="<?php echo esc_attr($lms_education_elementor_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($lms_education_elementor_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($lms_education_elementor_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($lms_education_elementor_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h2><?php esc_html_e( 'Welcome to Elemento Theme!', 'lms-education-elementor' ); ?></h2>
						<p><?php esc_html_e( 'For setup the theme, First you need to click on the Begin activating plugins', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '1. Install Kirki Customizer Framework ', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '>> Then click to Return to Required Plugins Installer ', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '2. Install WPElemento Importer', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '>> Then click to Return to Required Plugins Installer ', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '3. Activate Kirki Customizer Framework ', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '4. Activate WPElemento Importer ', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '>> Then click to Return to the Dashboard', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '>> Click on the start now button', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '>> Click install plugins', 'lms-education-elementor' ); ?></p>
						<p><?php esc_html_e( '>> Click import demo button to setup the theme and click visit your site button', 'lms-education-elementor' ); ?></p>
					</div>
				<?php } ?>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php lms_education_elementor_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'lms-education-elementor'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('LMS Education WordPress Theme', 'lms-education-elementor'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'lms-education-elementor'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'lms-education-elementor'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Doc', 'lms-education-elementor'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'lms-education-elementor'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'lms-education-elementor' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'lms-education-elementor' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'lms-education-elementor' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'lms-education-elementor' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'lms-education-elementor' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'lms-education-elementor' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'lms-education-elementor'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( LMS_EDUCATION_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'lms-education-elementor'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'lms-education-elementor' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>