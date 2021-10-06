<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<main class="grid-container">
		<div class="grid-x grid-margin-x">
		<div class="cell small-12 medium-3 large-3">
			<?php get_sidebar(); ?>
		</div>
		<div class="cell small-12 medium-9 large-9">
			<div class="grid-x grid-margin-x">
				<div class="cell small-12 medium-6 large-6">
					<?php echo do_shortcode('[facetwp facet="result_count_physicians"]');?>
				</div>
				<div class="cell small-12 medium-6 large-6">
					<?php //echo facetwp_display( 'sort' ); ?>
				</div>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="card cell small-12 medium-4 large-4">
						<?php
							$getSpecialtyList = get_the_terms( $post->ID, 'specialty' );
							$showSpecialties = join(', ', wp_list_pluck($getSpecialtyList, 'name'));
							$physician_Accepting_New = types_render_field("accepting-new-patients", array("output" => "raw")); 
							$physician_Profile_Url = types_render_field("profile-url-physicians", array('output'=>'raw')); 

							if ( has_post_thumbnail() ) {
								the_post_thumbnail('medium', array('class' => 'stretch-image'));
							}
							else {
								echo '<img alt="This provider does not have a picture" src="https://utphysicians.wpengine.com/wp-content/uploads/2021/09/fall-back-location-image.jpg">';
							}
						?>
						<div class="card-section">
							<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
							<p><strong><?php echo $showSpecialties;?></strong></p>

							<?php 
							if(empty($physician_Accepting_New)){
								echo '<p><span class="fa-stack outline">';
								echo '<i class="far fa-circle fa-stack-2x"></i>';
								echo '<i class="fas fa-check  fa-stack-1x fa-inverse"></i>';
								echo '</span>Accepting New Patients</p>';
							}else{
								echo '<p><span class="fa-stack outline">';
								echo '<i class="far fa-circle fa-stack-2x"></i>';
								echo '<i class="fas fa-times  fa-stack-1x fa-inverse"></i>';
								echo '</span>Not Accepting New Patients</p>';
								echo $physician_Accepting_New;
								}
							?>
							<?php 
							if(!empty($physician_Profile_Url)){
								echo '<a class="button expanded" href="' . $physician_Profile_Url . '">View Profile</a>';
							}?>
						</div>
					</div>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; // End have_posts() check. ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer();
