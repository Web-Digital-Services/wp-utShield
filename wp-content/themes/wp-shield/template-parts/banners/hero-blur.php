<?php
/**
 * The default template for displaying the homepage banner
 *
 * The homepage banner features a full width image and text box with a call to action. 
 * The recommended image size is 1525x400px
 * 
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>	
<?php /** Localize Metafield Values as Variables **/
	$banner_extra_classes = get_post_meta( get_the_ID(), 'banner-extra-classes', true ); 
	$spacing_classes = get_post_meta( get_the_ID(), 'banner-classes', true ); 
	$gridx_classes = get_post_meta( get_the_ID(), 'banner-gridx-classes', true ); 
	$banner_design = get_post_meta( $post->ID, 'banner_design_key', true );
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$imgID  = get_post_thumbnail_id($post->ID); 
	$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true);
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	$banner_eyebrow = get_post_meta( get_the_ID(), 'banner-eyebrow', true);
	$banner_title = get_post_meta( get_the_ID(), 'banner-title', true );
	$banner_button_text = get_post_meta( get_the_ID(), 'banner-button-text', true ); 
	$banner_button_url = get_post_meta( get_the_ID(), 'banner-button-url', true ); 
	$banner_button_text2 = get_post_meta( get_the_ID(), 'banner-button-text2', true ); 
	$banner_button_url2 = get_post_meta( get_the_ID(), 'banner-button-url2', true ); 
	$title_box_alignment = get_post_meta( $post->ID, 'title_box_key', true ); 
	$callout_color = get_post_meta( $post->ID, 'callout_color_key', true ); 
	$extra_roomy_status = get_post_meta( get_the_ID(), 'extraroomy', true );
	$video_url = get_post_meta( get_the_ID(), 'ut_featured_video_url', true );
	$video_title = get_post_meta( get_the_ID(), 'ut_featured_video_title', true );
	$formatted_text = get_post_meta( get_the_ID(), 'wpcf-featured-text-paragraphs', false );

	if ($title_box_alignment == 'right-aligned'){
		$text_box_order = 'small-order-2 medium-order-2 large-order-2';
	}

	$colorized = get_post_meta( get_the_ID(), 'colorized', true ); 
	if ($title_box_alignment == 'center-aligned'){ $colorized_status = 'alpha-darker'; }
	elseif($colorized == 'yes' && (empty($banner_title) && !empty($banner_byline) && empty($banner_button_text))){ $colorized_status = 'alpha-darker'; }
	elseif ($colorized == 'yes'){ $colorized_status = 'alpha'; }
	else{ $colorized_status = 'null'; }

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
	$align_center = get_post_meta( get_the_ID(), 'align-center-middle', true );
	if ( $align_center == 'yes'){
		$align_center_middle = 'align-center-middle';
	}else{
		$align_center_middle = '';
	}
?>
	<section class="hero bleed blur img-fill full <?php echo $banner_extra_classes; ?>">
		<img alt="<?php echo $imgAlt; ?>" src="<?php echo $thumb['0'];?>">
		<div class="grid-container<?php echo ' ' . $spacing_classes;?>">
			<div class="grid-x grid-margin-x <?php echo $align_center_middle; ?><?php echo ' ' . $gridx_classes;?>">
				<div class="<?php echo $column_left_css; ?> <?php echo $text_box_order; ?>">
					<?php 
						if( !empty( $banner_eyebrow ) ) {
							echo '<p class="eyebrow">' . $banner_eyebrow, '</p>';
						}        
						if( !empty( $banner_title ) ) {
							echo '<h1>' . $banner_title, '</h1>';
						}else{
							the_title('<h1 class="close">', '</h1>');
						}
						// Checks and displays the retrieved value
						if( !empty( $banner_byline ) ) {
							echo '<p>' . $banner_byline, '</p>';
						}
						//Print multivalue text field in paragraph tags
						$i = 0;
						while($i < count($formatted_text))
							{
								echo '<p>' . $formatted_text[$i] . '</p>';
								$i++;
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
                    if( !empty( $thumb['0'] ) && !empty( $video_url )) {
						if( !empty( $video_title ) ) {
							echo '<div class="responsive-embed">
                        	<iframe width="560" height="315" src="' . $video_url . '" title="'. $video_title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                      		</div>';
						}else{
							echo '<div class="responsive-embed">
                        <iframe width="560" height="315" src="' . $video_url . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                      </div>';
						}
                    }elseif ( !empty( !$thumb['0'] ) && empty( $video_url )){
						echo '<img alt="' . $imgAlt . '" src="' . $thumb['0'] . '">';
                    }else{
						echo '<img alt="' . $imgAlt . '" src="' . $thumb['0'] . '">';
					}
                    ?>         
				</div>
			</div>
		</div>
	</section>
