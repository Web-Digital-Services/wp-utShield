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
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/assets/webfonts/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css2?family=Lora&family=Nunito+Sans:wght@300;400;900&display=swap" rel="stylesheet"> 
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>
	<header class="title-bar" data-responsive-toggle="regular" style="display: none;">
		<a href="<?php echo get_option('home'); ?>"><img  alt='Mobile Logo in White' src='<?php ut_display_logo('mobile'); ?>'></a>
		<button class="menu-icon" type="button" data-toggle="regular">Menu</button>
		</header>

	<header class="off-canvas-content" id="new" data-off-canvas-content="" style="display: block;">
		<div class="group">
			<div class="logo <?php echo $pipe; ?>">
				<a href="<?php echo get_option('home'); ?>"><img src='<?php ut_display_logo("desktop"); ?>' alt='Desktop Logo'></a>
				<?php 
					$site_title = get_bloginfo ( 'description' );
					if (!empty($site_title)){
						$pipe = 'pipe';
					}else{
						$pipe = '';
					}
				?>
				<p><?php echo $site_title; ?></p>
			</div>
			<div class="right">
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
                <a href="#" data-toggle="offCanvasRight" aria-expanded="false" aria-controls="offCanvasRight">
                    <span class="fa-stack outline">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>Search/Quicklinks</span>
                </a>
            </div>
        </div>
	</header>

<?php 
	//Get Banner content from the DB and assign to variables
	$banner_button_text = get_post_meta( get_the_ID(), 'banner-button-text', true ); 
	$banner_button_url = get_post_meta( get_the_ID(), 'banner-button-url', true ); 
	$banner_button_text2 = get_post_meta( get_the_ID(), 'banner-button-text2', true ); 
	$banner_button_url2 = get_post_meta( get_the_ID(), 'banner-button-url2', true ); 
	$banner_title = get_post_meta( get_the_ID(), 'banner-title', true);
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	
	$grid_layout = get_post_meta( $post->ID, 'banner_grid_layout_key', true );
	if (empty($grid_layout) || ($grid_layout == '84')){
		$column_left_css = 'cell large-8 medium-8 small-12 ';
		$column_right_css = 'cell large-4 medium-4 small-12';
	}elseif($grid_layout == '75'){
		$column_left_css = 'cell large-7 medium-7 small-12';
		$column_right_css = 'cell large-5 medium-5 small-12';
	}else{
		$column_left_css = 'cell large-8 medium-8 small-12';
		$column_right_css = 'cell large-4 medium-4 small-12';
	}
?>
<header>
	<section class="hero bleed">
		<div class="grid-container">
			<div class="grid-x margin-x">
				<div class="<?php echo $column_left_css; ?>">
					<?php         
						if( !empty( $banner_title ) ) {
							echo '<h1 class="close">' . $banner_title, '</h1>';
						}else{
							the_title('<h1 class="close">', '</h1>');
						}
						// Checks and displays the retrieved value
						if( !empty( $banner_byline ) ) {
							echo '<p class="banner-text">' . $banner_byline, '</p>';
						}
						if( !empty( $banner_button_text ) ) {
							echo '<div class="button-group">';
							if( !empty( $banner_button_text ) ) { echo '<p><a class="button" href="' . $banner_button_url, '">' . $banner_button_text, '</a></p>'; }
							if( !empty( $banner_button_text2 ) ) { echo '<p><a class="button ghost" href="' . $banner_button_url2, '">' . $banner_button_text2, '</a></p>'; }
							echo '</div>';
						} 
					?>
				</div>
				<div class="<?php echo $column_right_css; ?>">          
					<?php
						if (function_exists('display_featured_media')) {
							display_featured_media('large', 'close');
						} elseif ( has_post_thumbnail() ){
							the_post_thumbnail();
						}else{
							echo '<p class="white-text">Please install UT Featured Video Plugin</p>';
						}
					?>
				</div>
			</div>
		</div>
	</section>
</header>
	<header id="">

		<nav class="nav-bar" id="new-full <?php foundationpress_mobile_menu_id(); ?>">
			<div class="top-bar">	
				<div class="top-bar-left">
					<?php foundationpress_main_menu(); ?>
				</div>
			</div>
		</nav>
	</header>
	<!-- END Level 3 Header -->