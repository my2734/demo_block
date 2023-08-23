<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LMS Education Elementor
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>
<?php if(get_theme_mod('lms_education_elementor_preloader_hide','')){ ?>
	<div class="loader">
		<div class="preloader">
			<div class="diamond">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
<?php } ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lms-education-elementor' ); ?></a>

<div class="topheader">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-8 col-sm-7 text-md-left text-center align-self-center adver-text py-2">
				<?php if ( get_theme_mod('lms_education_elementor_header_advertisement_text') ) : ?>
					<p class="mb-0"><?php echo esc_html( get_theme_mod('lms_education_elementor_header_advertisement_text' ) ); ?></p>
				<?php endif; ?>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-5 align-self-center text-center text-md-right py-2">
				<?php if ( get_theme_mod('lms_education_elementor_header_button_url') || get_theme_mod('lms_education_elementor_header_button_text') ) : ?>
					<div class="register-btn my-4 my-md-0">
						<a href="<?php echo esc_html( get_theme_mod('lms_education_elementor_header_button_url' ) ); ?>"><?php echo esc_html( get_theme_mod('lms_education_elementor_header_button_text' ) ); ?></a>
					</div>
				<?php endif; ?>	
			</div>
		</div>
	</div>
</div>

<header id="site-navigation" class="header text-center text-md-left py-2 <?php if( get_theme_mod( 'lms_education_elementor_sticky_header',false) != '') { ?>sticky-header<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 align-self-center">
				<div class="logo text-center text-md-left mb-3 mb-md-0">
		    		<div class="logo-image">
		    			<?php the_custom_logo(); ?>
			    	</div>
			    	<div class="logo-content">
						<?php
							if ( get_theme_mod('lms_education_elementor_display_header_title', true) == true ) :
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
								echo esc_attr(get_bloginfo('name'));
								echo '</a>';
							endif;
							if ( get_theme_mod('lms_education_elementor_display_header_text', true) == true ) :
								echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
							endif;
						?>
					</div>
				</div>
		   	</div>
			<div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
				<?php if(has_nav_menu('main-menu')){ ?>
					<button class="menu-toggle my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><?php esc_html_e( 'Menu', 'lms-education-elementor' ); ?></span>
					</button>
					<nav id="main-menu" class="close-panal">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => 'false'
							));
						?>
						<button class="close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				<?php }?>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 align-self-center mt-2 mt-md-0">
				<?php if ( get_theme_mod('lms_education_elementor_login_enable', 'on' ) == true ) : ?>
					<span class="my-account mr-2">
						<?php if(class_exists('woocommerce')){ ?>
							<?php if ( is_user_logged_in() ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','lms-education-elementor'); ?>"><i class="fas fa-user"></i></a>
							<?php }
							else { ?>
								<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','lms-education-elementor'); ?>"><i class="fas fa-sign-in-alt"></i><?php esc_html_e('Login','lms-education-elementor'); ?><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','lms-education-elementor' );?></span></a>
							<?php } ?>
						<?php }?>
					</span>
				<?php endif; ?>	
				<?php if ( get_theme_mod('lms_education_elementor_cart_box_enable', 'on' ) == true ) : ?>
					<?php if ( class_exists( 'woocommerce' ) ) {?>
						<span class="header-cart">
							<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','lms-education-elementor' ); ?>"><i class="fas fa-shopping-bag mr-1"></i><span class="cart-item-box mr-1"><?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span><?php esc_html_e('Courses','lms-education-elementor'); ?><span class="screen-reader-text mr-1"><?php esc_html_e( 'Courses','lms-education-elementor' );?></span></a>
						</span>
					<?php }?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>