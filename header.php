<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Flyto
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Pushy Menu -->
<nav class="pushy pushy-right">
<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<div id="page" class="hfeed site">
<header id="masthead" class="site-header" role="banner" >
		<div class="overlay-grid"></div>
		<div class="top-bar clear">
			<div class="search-btn"></div>
			<div class="menu-btn"></div>	
		</div>	
		
		<div class="widesearch">
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="search-field" placeholder="To search, type and hit Enter.." value="" name="s" title="Search for:" />
				</label>
				
			</form>
		</div>
	
		<div class="col top">

			<div class="site-branding">
			
				<?php if( of_get_option('w2f_logo')!=''){ ?>
					<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo of_get_option('w2f_logo'); ?>" alt="" /> </a></div>
				<?php } else { ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>
				
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				
				<ul class="social-icons">
					<li> <a href="https://twitter.com/<?php echo of_get_option('w2f_twitter'); ?>"> <i class="fa fa-twitter-square"></i> </a> </li>
					<li> <a href="<?php echo of_get_option('w2f_facebook'); ?>"> <i class="fa fa-facebook-square"></i> </a> </li>
					<li> <a href="<?php echo of_get_option('w2f_instagram'); ?>"> <i class="fa fa-instagram"></i> </a> </li>
					<li> <a href="<?php echo of_get_option('w2f_flickr'); ?>"> <i class="fa fa-flickr"></i> </a> </li>
				</ul>
			</div>
		</div>

</header><!-- #masthead -->
	
	<div id="content" class="site-content" >
