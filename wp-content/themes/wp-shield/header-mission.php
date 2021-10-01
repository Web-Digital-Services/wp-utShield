<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/assets/css/main.css">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
			<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
		<?php endif; ?>
		<header class="title-bar" data-responsive-toggle="regular">
			<button class="menu-icon" type="button" data-toggle="regular">Menu</button>
			</header>
		<!-- Level 3 Header -->
		<div class="title-bar global-bar">
			<div class="title-bar-left">
				<?php UTH_register_quick_links(); ?>	
			</div>  
			<div class="title-bar-right">
				<?php 
					$part_of_ut_health_label = get_theme_mod( 'part_of_ut_health_label');
					$part_of_ut_health_url = get_theme_mod( 'part_of_ut_health_url');
									
					if (!empty($part_of_ut_health_url) && ($part_of_ut_health_label)){
						echo '<p><a aria-label="Mobile Breadcrumb to parent site" href="'. $part_of_ut_health_url .'"><i class="fas fa-star"></i> ' . $part_of_ut_health_label . '</p></a>';
					}else{
						echo '<p><a aria-label="Mobile Breadcrumb to parent site" href="https://www.uthscsa.edu/"><i class="fas fa-star"></i> Part of UT Health San Antonio</p></a>';
					} 
				?>
			</div>
		</div>
		<div class="top-bar mission-bar">	
			<div class="top-bar-left">
				<nav role="navigation" id="<?php foundationpress_mobile_menu_id(); ?>">
					<?php foundationpress_main_menu(); ?>
				</nav>
			</div>
			<div class="top-bar-right">		
				<form method="get" class="search" action="<?php bloginfo('url'); ?>/">
					<!-- <label for="desktop-search" class="element-invisible">Desktop Search</label>-->
					<input class="search-box" type="search" size="5" name="s" id="desktop-search" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
				</form>
			</div>
		</div>
		<header id="mission">
			<div class="logo">
				<a href="<?php echo get_option('home'); ?>"><img src='<?php ut_display_logo(); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
			</div>
			<div id="level-1">
				<nav>
				<ul class="menu">
					<li><a href="#">Academics</a></li>
					<li><a href="#">Research</a></li>
					<li><a href="#">Patient Care</a></li>
					<li><a href="#">Community</a></li>
				</ul>
				</nav>
			</div>
		</header>
		<!-- END Level 3 Header -->