<?php
/**
 * The template part for page headers.
 *
 * @package wesco-silo
 */

?>

<header class="page-header header-bg-image cf"
<?php
if ( has_post_thumbnail() ) :
?>
style="background-image: url('<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>');"
<?php elseif ( is_search() ) : ?>
style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/h-search.jpg');"
<?php else : ?>
style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/h-default.jpg');"
<?php endif; ?>
>
	<div class="inner-wrap">
		<?php
		if ( is_home() && ! is_front_page() ) :

			single_post_title( '<h1 class="page-title">', '</h1>' );

		elseif ( is_archive() ) :

			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );

		elseif ( is_search() ) :
		?>
			<h1 class="page-title">
			<?php
			/* translators: used before search term in header of Search Results page */
			printf( esc_html__( 'Search Results for: %s', 'wesco-silo' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h1>
		<?php
		else :

			the_title( '<h1 class="page-title">', '</h1>' );

		endif;
		?>
	</div>
</header>
