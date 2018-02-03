<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wesco-silo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wescosilo_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'wescosilo_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wescosilo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'wescosilo_pingback_header' );


/**
 * Dont Update the Theme
 * If there is a theme in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Bill Erickson
 * @link   http://www.billerickson.net/excluding-theme-from-updates
 * @param array  $r Existing request arguments.
 * @param string $url Request URL.
 * @return array Amended request arguments
 */
function ea_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}
	$themes = json_decode( $r['body']['themes'] );
	$child = get_option( 'stylesheet' );
	unset( $themes->themes->$child );
	$r['body']['themes'] = wp_json_encode( $themes );
	return $r;
}


/**
 * Add a span around "Category:, Tag:, etc...
 * filter get_the_archive_title
 *
 * @param string $title the title.
 */
function wrap_archive_title_part( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'wrap_archive_title_part' );


/**
 * Change Text in Search Submit Button
 *
 * @param string $text Search button text.
 * @link https://wordpress.org/support/topic/how-do-i-change-some-details-of-the-search-widget
 */
function wescosilo_search_button( $text ) {
	$text = str_replace( 'value="Search"', 'value="&#xf179;"', $text );
	return $text;
}
add_filter( 'get_search_form', 'wescosilo_search_button' );


/**
 * Filter the Excerpt's Read More link.
 *
 * @param string $more The more link text.
 */
function wescosilo_excerpt_more( $more ) {
	return '<a href="' . get_the_permalink() . '" rel="nofollow"> ...</a>';
}
add_filter( 'excerpt_more', 'wescosilo_excerpt_more' );


/**
 * Remove <p> tags from images
 *
 * @param string $content The contant.
 */
function wescosilo_no_ptags_on_images( $content ) {
	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}
add_filter( 'the_content', 'wescosilo_no_ptags_on_images', 100 );


/**
 * Remove empty paragraphs created by wpautop()
 *
 * @param string $content The contant.
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	return $content;
}
add_filter( 'the_content', 'remove_empty_p', 101, 1 );
