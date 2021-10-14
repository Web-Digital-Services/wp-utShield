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
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/assets/webfonts/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css2?family=Lora&family=Nunito+Sans:wght@300;400;900&display=swap" rel="stylesheet"> 
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>
	<header class="title-bar" data-responsive-toggle="regular" style="display: none;">
		<a href="<?php echo get_option('home'); ?>"><img src='<?php ut_display_logo('mobile'); ?>'></a>
		<button class="menu-icon" type="button" data-toggle="regular">Menu</button>
		</header>
	<!-- Level 3 Header -->
	<div class="title-bar global-bar">
		<div class="title-bar-left"></div>  
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
	<?php 
		$site_title = get_bloginfo ( 'description' );
		if (!empty($site_title)){
			$pipe = 'pipe';
		}else{
			$pipe = '';
		}
	?>
	<header id="regular">
		<div class="group">
			<div class="logo <?php echo $pipe; ?>">
				<a href="<?php echo get_option('home'); ?>"><img src='<?php ut_display_logo("desktop"); ?>' alt='Desktop Logo'></a>
				<p><?php echo $site_title; ?></p>
			</div>
			<div class="right">
				<form method="get" class="search" action="<?php bloginfo('url'); ?>/">
					<!-- <label for="desktop-search" class="element-invisible">Desktop Search</label>-->
					<input class="search-box" type="search" size="5" name="s" id="desktop-search" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
				</form>
				<?php 
					$UTH_add_give_button_setting = get_theme_mod( 'UTH_add_give_button_setting'); 
					$UTH_contact_phone_number = get_theme_mod( 'UTH_contact_phone_number'); 
					$UTH_contact_url = get_theme_mod( 'UTH_contact_url'); 
					echo '<div class="circle-icons">';
					if (!empty($UTH_contact_url)){
						echo '<a href="' . $UTH_contact_url . '">
							<span class="fa-stack outline">
								<i class="far fa-circle fa-stack-2x"></i>
								<i class="fas fa-notes-medical fa-stack-1x fa-inverse"></i>
							</span>
							<span>Contact</span>
						</a>';
					}
					if(!empty($UTH_contact_phone_number)) {
						echo '<a href="#">
							<span class="fa-stack outline">
								<i class="far fa-circle fa-stack-2x"></i>
								<i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
							</span>
							<span>' . $UTH_contact_phone_number . '</span>
						</a>';
					}
					echo '</div>';
				?>
			</div>
		</div>
		<nav class="site-navigation nav-bar" role="navigation" id="<?php foundationpress_mobile_menu_id(); ?>">
			<div class="top-bar">	
				<div class="top-bar-left">
					<?php foundationpress_main_menu(); ?>
				</div>
				<?php if ( has_nav_menu( 'utility-nav' ) ) {
						echo '<div class="top-bar-right">';
						if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ){
							get_template_part( 'template-parts/utility-nav' ); 
						}
					echo '</div>';
					} else {
						echo '<!-- no utility nav --> ';
					}
				?>
			</div>
		</nav>
	</header>
	<!-- END Level 3 Header -->