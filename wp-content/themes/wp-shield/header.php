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
		<script type="text/javascript">
      // Notice how this gets configured before we load Font Awesome
      window.FontAwesomeConfig = { autoReplaceSvg: false }
    </script>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/webfonts/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css" rel="stylesheet"> 
		<!-- <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">  -->
		<link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<div class="skip-link" role="navigation" aria-label="Skip to main content">
   			<a href="#main-content" class="element-focusable element-invisible" id="skip-link">Skip to main content</a>
  		</div>
	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>
	<header class="title-bar" data-responsive-toggle="header">
		<a href="<?php echo get_option('home'); ?>"><img  alt='Mobile Logo in White' src='<?php ut_display_logo('mobile'); ?>'></a>
		<button class="menu-icon" type="button" data-toggle="header">Menu</button>
	</header>
	<?php 
		$banner_design = get_post_meta( get_queried_object_id(), 'banner_design_key', true );

		if ($banner_design == 'super-hero-banner'){
		$super_hero = ' super-hero';
		}else{
			$super_hero = '';
		}
	?>
	<header class="off-canvas-content<?php echo $super_hero; ?>" id="header" data-off-canvas-content="" style="display: block;">
		<div class="group">
			<?php 
				$site_title = get_bloginfo ( 'description' );
				if (!empty($site_title)){
					$pipe = 'pipe';
				}else{
					$pipe = '';
				}
			?>
			<div class="logo <?php echo $pipe; ?>">
				<a href="<?php echo get_option('home'); ?>"><img src='<?php ut_display_logo("desktop"); ?>' alt='Desktop Logo'></a>
				<p><?php echo $site_title; ?></p>
			</div>
			<div class="right">
					<?php 
					$UTH_add_give_button_setting = get_theme_mod( 'UTH_add_give_button_setting'); 
					$UTH_contact_phone_number = get_theme_mod( 'UTH_contact_phone_number'); 
					$UTH_contact_url = get_theme_mod( 'UTH_contact_url'); 

					$UTH_featured_link_text = get_theme_mod( 'featured_link_text'); 
					$UTH_featured_link_url = get_theme_mod( 'featured_link_url'); 
					$UTH_featured_link_icon = get_theme_mod( 'featured_link_icon'); 
					$UTH_featured_link_text_two = get_theme_mod( 'featured_link_text_two'); 
					$UTH_featured_link_url_two = get_theme_mod( 'featured_link_url_two'); 
					$UTH_featured_link_icon_two = get_theme_mod( 'featured_link_icon_two'); 

					echo '<div class="circle-icons">';
					if (!empty($UTH_featured_link_url) && !empty($UTH_featured_link_text)){

						if (empty($UTH_featured_link_icon)){
							$icon_code = 'fa-external-link-alt';
						}else{
							$icon_code = $UTH_featured_link_icon;
						}

						echo '<a href="' . $UTH_featured_link_url . '">
						<span class="fa-stack outline">
							<i class="far fa-circle fa-stack-2x"></i>
							<i class="fas ' . $icon_code . ' fa-stack-1x fa-inverse"></i>
						</span>
						<span>' . $UTH_featured_link_text . '</span>
					</a>';
					}
					if (!empty($UTH_featured_link_url_two) && !empty($UTH_featured_link_text_two)){

						if (empty($UTH_featured_link_icon_two)){
							$icon_code_two = 'fa-external-link-alt';
						}else{
							$icon_code_two = $UTH_featured_link_icon_two;
						}

						echo '<a href="' . $UTH_featured_link_url_two . '">
						<span class="fa-stack outline">
							<i class="far fa-circle fa-stack-2x"></i>
							<i class="fas ' . $icon_code_two . ' fa-stack-1x fa-inverse"></i>
						</span>
						<span>' . $UTH_featured_link_text_two . '</span>
					</a>';
					}
					if (!empty($UTH_contact_url)){
						echo '<a href="' . $UTH_contact_url . '">
							<span class="fa-stack outline">
								<i class="far fa-circle fa-stack-2x"></i>
								<i class="fas fa-notes-medical fa-stack-1x fa-inverse"></i>
							</span>
							<span>Contact</span>
						</a>';
					}
					if(!empty($UTH_add_give_button_setting)) {
						echo '<a title="Give" aria-label="Give" target=_blank href="' . $UTH_add_give_button_setting . '">
      						<span class="fa-stack outline">
        					<i class="far fa-circle fa-stack-2x"></i>
        					<i class="fas fa-hand-holding-heart fa-stack-1x fa-inverse"></i>
      						</span>
      						<span>Give</span>
    						</a>';
					}
					if(!empty($UTH_contact_phone_number)) {
						$tel = str_replace(str_split('-()'), '', $UTH_contact_phone_number);
						echo '<a href="tel:' . $tel . '">
							<span class="fa-stack outline">
								<i class="far fa-circle fa-stack-2x"></i>
								<i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
							</span>
							<span>' . $UTH_contact_phone_number . '</span>
						</a>';
					}
					echo '<a href="#" data-toggle="offCanvasRight">
					<span class="fa-stack outline">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fas fa-search fa-stack-1x fa-inverse"></i>
					</span>
					<span>Search/Quicklinks</span>
				</a>';
					echo '</div>';
				?>
            </div>
        </div>
		<?php foundationpress_mobile_nav(); ?>
	</header>
	<?php 
		//Get Banner content from the DB and assign to variables
		if ( $banner_design == 'default-bleed' || (empty($banner_design) && is_page()) ){
			get_template_part( 'template-parts/banners/default' );
		}elseif($banner_design == 'hero-banner' || $banner_design == 'super-hero-banner'){
			get_template_part( 'template-parts/banners/hero' );
		}elseif($banner_design == 'video-banner'){
			get_template_part( 'template-parts/banners/video' );
		}elseif($banner_design == 'secondary-logo'){
			get_template_part( 'template-parts/banners/secondary-logo' );
		}elseif($banner_design == 'gradient-banner'){
			get_template_part( 'template-parts/banners/gradient' );
		}elseif($banner_design == 'hero-blur'){
			get_template_part( 'template-parts/banners/hero-blur' );
		}elseif($banner_design == 'grey-gradient-banner'){
			get_template_part( 'template-parts/banners/gradient-grey' );
		}elseif($banner_design == 'filters-banner'){
			get_template_part( 'template-parts/banners/filters-banner' );
		}elseif(empty($banner_design) && is_category()){
			get_template_part( 'template-parts/banners/category-archive' );
		}else{
			//No Banner
		}
	?>
	<?php foundationpress_main_menu(); ?>
	<!-- END Level 3 Header -->