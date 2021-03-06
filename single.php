<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

				get_template_part( 'template-parts/content', get_post_format() );

				the_post_navigation();

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
