<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wesco-silo
 */

?>

<section class="no-results not-found">

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Try the main menu or a search.', 'wesco-silo' ); ?></p>
			<?php
			get_search_form();

		elseif ( is_search() ) :
		?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wesco-silo' ); ?></p>
			<?php
			get_search_form();

		else :
		?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wesco-silo' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>

</section>
