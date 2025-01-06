<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>


<?php 
	$UTH_lab_research = types_render_field("lab-research");
	$UTH_lab_staff = types_render_field("lab-staff");
	$UTH_lab_additional_info = types_render_field("lab-additional-info"); 
	$UTH_lab_faculty_profile_url = types_render_field("faculty-profile-url");
	$UTH_lab_button_text = types_render_field("button-text-for-faculty-profile-link"); 
	$UTH_lab_subtitle = types_render_field("subtitle-lab"); 
	$UTH_lab_pub_biblio = types_render_field("publication-bibliography-url-lab"); 
	$UTH_lab_spotlight = types_render_field("spotlight"); 
	$UTH_lab_news_URL = types_render_field('all-news-url', array('output' => 'raw')); 
	$UTH_lab_jobs = do_shortcode('[wpv-view name="jobs-associated-with-labs"]'); 
?>
<section class="bleed">
<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<?php while ( have_posts() ) : the_post(); ?>
			
			<main class="cell small-12 medium-7 large-8">
				<?php the_title('<h1>','</h1>'); ?>
				<?php the_post_thumbnail('large', array( 'class' => 'featured-image-post' )); ?>
				<?php the_content(); ?>
				<?php if(!empty($UTH_lab_button_text) || !empty($UTH_lab_faculty_profile_url)): ?>
					<a class="arrow" href="<?php echo $UTH_lab_faculty_profile_url; ?>"><?php echo $UTH_lab_button_text; ?></a>
				<?php endif ?>
			</main>
			<aside class="cell small-12 medium-4 large-4">
			<?php if(!empty($UTH_lab_pub_biblio)): ?>
				<a class="callout color orange" href="<?php echo $UTH_lab_pub_biblio; ?>">
					<span class="fa-stack fa-2x">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fas fa-book fa-stack-1x fa-inverse"></i>
						</span>
						<h3>Publications</h3>
		        </a>
				<?php endif ?>
				<?php echo do_shortcode('[wpv-view name="grants-associated-with-labs"]'); ?>
				<?php echo do_shortcode('[wpv-view name="jobs-associated-with-labs"]'); ?>
				<?php echo do_shortcode('[wpv-view name="resources-associated-with-labs"]'); ?>
			</aside>
		<?php endwhile; ?>
	</div>
</div>
</section>
<?php if (!empty($UTH_lab_research) || !empty($UTH_lab_additional_info) || !empty( $UTH_lab_staff)): ?>
<section class="bleed beige close">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell small-12 medium-8">
				<?php if (!empty($UTH_lab_research) && !empty($UTH_lab_additional_info)): ?>
					<h3 class="h4">Lab Research</h3>
					<ul class="accordion orange" data-accordion="lihp7t-accordion" data-allow-all-closed="true">
                        <li class="accordion-item" data-accordion-item="">
                            <a href="#" class="accordion-title" aria-controls="t4kjuc-accordion" id="t4kjuc-accordion-label" aria-expanded="false"><strong>Research</strong></a>
                            <div class="accordion-content" data-tab-content="" role="region" aria-labelledby="t4kjuc-accordion-label" aria-hidden="true" id="t4kjuc-accordion">
                            <?php echo $UTH_lab_research ;?>
                            </div></li>
                        <li class="accordion-item" data-accordion-item="">
                            <a href="#" class="accordion-title" aria-controls="eaylps-accordion" id="eaylps-accordion-label" aria-expanded="false"><strong>Additional Info</strong></a>
                            <div class="accordion-content" data-tab-content="" role="region" aria-labelledby="eaylps-accordion-label" aria-hidden="true" id="eaylps-accordion">
                            <?php echo $UTH_lab_additional_info ;?>
                            </div>
                        </li>
                    </ul>
					<?php else: ?>
						<h3 class="h4">Lab Research</h3>
						<?php echo $UTH_lab_research ;?>
						<?php echo $UTH_lab_additional_info ;?>
				<?php endif ?>	
			</div>
			<div class="cell small-12 medium-4">
				<?php if( !empty( $UTH_lab_staff ) ): ?> 
					<h3 class="h4">Lab Staff</h3>
					<?php echo $UTH_lab_staff; ?>
					<?php endif ?>
				<?php echo do_shortcode('[wpv-view name="events-associated-with-labs"]'); ?>
            	<?php echo do_shortcode('[wpv-view name="featured-news-associated-with-labs"]'); ?>
            	<?php echo do_shortcode('[wpv-view name="news-associated-with-labs"]'); ?>
				<?php if( !empty( $UTH_lab_news_URL ) ): ?>
					<p><a class="button" href="<?php echo $UTH_lab_news_URL; ?>">All news</a><p>
					<?php endif ?>
				</div>
	</div>
</section>
<?php endif ?>

<?php load_theme_design('footer'); ?>
