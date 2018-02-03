<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wesco-silo
 */

?>

		<div class="cf"></div>

	</div>

	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="footer-widgets">
		<div class="inner-wrap">

			<div class="footer-widget-area widget-area-1">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div class="footer-widget-area widget-area-2">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<div class="footer-widget-area widget-area-3">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
			<div class="cf"></div>

		</div>
	</div>
	<?php endif; ?>


	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="inner-wrap">
			<div class="site-info">
				<?php dynamic_sidebar( 'site-footer' ); ?>
			</div>
		</div>

	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
