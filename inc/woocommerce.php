<?php
/**
 * Custom functions for WooCommerce.
 * https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * http://www.wpexplorer.com/woocommerce-compatible-theme/
 *
 * @package wesco-silo
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'my_theme_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'my_theme_wrapper_end', 10 );

/**
 * The opening wrapper.
 */
function my_theme_wrapper_start() {
	echo '<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">';
}

/**
 * The closing wrapper.
 */
function my_theme_wrapper_end() {
	echo '</main>
    </div>';
}

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );
