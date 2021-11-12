<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php 
	$profiles_title = types_render_field("title-profiles");
	$profiles_second_title = types_render_field("second-title-profiles"); 
	$profiles_bio = types_render_field("bio-profiles"); 
	$profiles_hometown = types_render_field("hometown-profiles"); 
	$profiles_undergrad = types_render_field("undergrad-profiles"); 
	$profiles_med_school = types_render_field("medical-school-profiles"); 
	$profiles_grad_school = types_render_field("grad-school-profiles"); 
	$profiles_hobbies = types_render_field("hobbies-profiles"); 
	$profiles_prof_interests = types_render_field("professional-interests-profiles"); 
	$profiles_publications_URL = types_render_field("publications-url-profiles"); 
	$profiles_phone = types_render_field("phone-profiles");
	$profiles_email = types_render_field("email-profiles");
?>
<div class="grid-container">
	<main class="grid-x grid-margin-x ">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="cell small-12 medium-4 large-4 small-order-2 medium-order-1">
				<?php 
					if ( has_post_thumbnail() ) { 
						the_post_thumbnail('post-thumbnail', ['class' => 'margin-bottom', 'title' => 'Feature image']);
					}else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/dist/assets/images/core/headshot-fallback.png" />';
					}
					if ( !empty ($profiles_phone) ||  !empty ($profiles_email) ){ 
						echo '<h2 class="sans-serif h5 bold" id="contact-us">Contact</h2>';
						echo '<address>'; 
						echo '<a href="tel:' . $profiles_phone . '">' . $profiles_phone . '</a><br>';
						echo $profiles_email;
						echo '</address>';
					} 
					if (!empty ($profiles_publications_URL)){ 
						echo '<a class="arrow" href="' . $profiles_publications_URL . '">Publications</a>';
					}
				?>
			</div>
			<div class="cell small-12 medium-8 large-8 small-order-1 medium-order-2">
				<h1><?php the_title(); ?></h1>
				<?php 
					if (!empty ($profiles_title)){ 
						echo '<p class="subheader">';
						echo $profiles_title; 
						echo '</p>';
					}
					if (!empty ($profiles_second_title)){ 
						echo '<p class="subheader">';
						echo $profiles_second_title; 
						echo '</p>';
					}
					if (!empty ($profiles_bio)){ 
						echo '<p>' . $profiles_bio . '</p>';
					}

					if (!empty ($profiles_hometown)){ 
						echo '<p class="bold close">Hometown</p><p>' . $profiles_hometown . '</p>';
					}
				?>
				<?php 
					/** Education */
					if ( !empty ($profiles_undergrad) ||  !empty ($profiles_med_school) || !empty ($profiles_grad_school) ){ 
						echo '<h2 class="sans-serif h5 bold">Education</h2>';
					}
					if (!empty ($profiles_undergrad)){ 
						echo '<p class="boldest close">Undergrad</p>' . $profiles_undergrad;
					}
					if (!empty ($profiles_med_school)){ 
						echo '<p class="boldest close">Medical School</p>' . $profiles_med_school;
					}
					if (!empty ($profiles_grad_school)){ 
						echo '<p class="boldest close">Graduate School</p>' . $profiles_grad_school;
					}
				?>				
				<?php 
					if (!empty ($profiles_hobbies)){ 
						echo '<h2 class="sans-serif h5 bold">Hobbies</h2>' . $profiles_hobbies;
					}
				?>					
				<?php 
					if (!empty ($profiles_prof_interests)){ 
						echo '<h2 class="sans-serif h5 bold">Professional Interests</h2>' . $profiles_prof_interests;
					}
				?>
			</div>
		<?php endwhile; ?>
	</main>
</div>
<?php load_theme_design('footer');
