<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wesco-silo
 */

get_header();

get_template_part( 'template-parts/header', 'none' );
?>

	<div class="inner-wrap">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">

					<div class="page-content">

						<p class="error-message"><?php esc_html_e( 'Nothing found at this location. Try the menu.', 'wesco-silo' ); ?></p>

					</div>

				</section>

			</main>
		</div>
	</div>

<?php
get_footer();
