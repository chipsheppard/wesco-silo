<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wesco-silo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wesco-silo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="inner-wrap">

			<div class="site-branding">

				<?php if ( get_header_image() ) : ?>
					<div class="header-image">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
						</a>
					</div>
				<?php elseif ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<?php
				endif;
				$description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) :
				?>
					<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
				<?php endif; ?>

			</div><!-- .site-branding -->

			<div id="site-navigation" class="main-navigation">
				<button class="responsive-menu-icon" aria-controls="handheld-navigation" aria-expanded="false"><div class="menu-icon-wrap"><div class="menu-icon"></div></div></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => 'nav',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</div><!-- #site-navigation -->

		</div>
	</header>

	<div id="content" class="site-content">
