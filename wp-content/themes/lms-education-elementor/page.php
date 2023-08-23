<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LMS Education Elementor
 */

get_header(); ?>

<div class="header-image-box text-center">
  <div class="container">
    <?php if ( get_theme_mod('lms_education_elementor_header_page_title' , true)) : ?>
      <h1><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if ( get_theme_mod('lms_education_elementor_header_breadcrumb' , true)) : ?>
      <div class="crumb-box mt-3">
        <?php lms_education_elementor_the_breadcrumb(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div id="content" class="mt-5">
  <div class="container">
    <?php
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', get_post_type());

        wp_link_pages(
          array(
            'before' => '<div class="lms-education-elementor-pagination">',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>'
          )
        );
        comments_template();
      endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>