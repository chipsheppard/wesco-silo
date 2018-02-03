<?php
/**
 * The template for displaying archive pages.
 *
 * @package wesco-silo
 */

get_header();

if ( have_posts() ) :

	get_template_part( 'template-parts/header', 'page' );

else :

	get_template_part( 'template-parts/header', 'none' );

endif;
?>
	<div class="inner-wrap">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( '&laquo; Previous', 'wesco-silo' ),
						'next_text' => __( 'Next &raquo;', 'wesco-silo' ),
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main>
		</div>
	</div>

<?php
get_footer();
