<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package wesco-silo
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function wescosilo_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'wescosilo_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'wescosilo_jetpack_setup' );


/**
 * Custom render function for Infinite Scroll.
 */
function wescosilo_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}


/**
 * Add Theme support for JetPack Site Logo
 *
 * @link http://fikrirasy.id/2015/01/how-to-implement-jetpacks-site-logo-on-your-theme/
 */
function wescosilo_jetpack_support() {
	// Declaring site logo support.
	add_image_size( 'site-logo', 0, 60 );
	add_theme_support( 'site-logo', array(
		'header-text' => array(
			'site-title',
			'site-description',
		),
		'size' => 'site-logo',
	));
}
add_action( 'after_setup_theme', 'wescosilo_jetpack_support' );

/**
 * Add Theme support for JetPack Social Menu
 *
 * @link http://fikrirasy.id/2015/01/how-to-implement-jetpacks-site-logo-on-your-theme/
 * USAGE <?php themename_social_menu(); ?>
 */
function wescosilo_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
}
add_theme_support( 'jetpack-social-menu' );
