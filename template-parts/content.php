<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wesco-silo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-wrap">

		<header class="entry-header">

			<?php
			if ( is_single() ) :

				the_title( '<h1 class="entry-title">', '</h1>' );

			else :

				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			endif;

			if ( 'post' === get_post_type() ) :
			?>

				<div class="entry-meta">
					<?php wescosilo_posted_on(); ?>
				</div>

			<?php endif; ?>

		</header>

		<?php if ( has_post_thumbnail() && ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title_attribute() ); ?>">
				<?php
				the_post_thumbnail( 'thumbnail', array(
					'class' => 'alignleft',
				) );
				?>
			</a>
		<?php endif; ?>

		<div class="entry-content">

			<?php
			if ( is_single() ) :

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wesco-silo' ), array(
						'span' => array(
							'class' => array(),
						),
					) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wesco-silo' ),
					'after'  => '</div>',
				) );

			else :

				the_excerpt();

			endif;
			?>

		</div>

		<footer class="entry-footer">
			<?php wescosilo_entry_footer(); ?>
		</footer>

	</div>

</article>
