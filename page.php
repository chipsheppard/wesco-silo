<?php
/**
 * This is the template that displays all pages by default. It has a left sidebar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wesco-silo
 */

get_header();

get_template_part( 'template-parts/header', 'page' );
?>

	<div class="inner-wrap">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
			?>

			</main>
		</div>
	</div>

<?php
get_footer();
