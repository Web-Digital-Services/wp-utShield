<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>


<?php 
	$position = types_render_field("position"); 
	$phone = types_render_field("phone-number");
	$mail = types_render_field("email");
	$statement = types_render_field("statement");
	$education = types_render_field("education");
	$research = types_render_field("research");
	$awards = types_render_field("awards");
	$affiliations = types_render_field("affiliations");
	$members = types_render_field("lab-members");
	$news = types_render_field("news");
	$pubs = types_render_field("publications");
	$departments = types_render_field("dept-division-links");
	$research_profile = types_render_field("research-profile");
	$provider_profile = types_render_field("provider-profile-url");
 ?>

<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<?php while ( have_posts() ) : the_post(); ?>
			<aside class="cell small-12 medium-4 large-4 small-order-2 medium-order-1">
				<?php if ( has_post_thumbnail()) : ?>
        			<?php the_post_thumbnail('large', array('class'=> 'img-margin')); ?>
				<?php endif; ?>
				<?php if (!empty ($phone) || !empty ($mail)){
					echo '<div class="margin-bottom"><h2 class="sans-serif h5 bold close">Contact</h2>';
				}
				?>
				<?php if (!empty ($phone)){
					echo '<p class="close">' . $phone . '</p>';
				}
				?>
				<?php if (!empty ($mail)){
					echo '<p>' . $mail . '</p>';
				}
				?>
				<?php if (!empty($research_profile)){
					echo '<p><a class="coward" href="' . $research_profile . '">Research Profile</a></p>';
				}
				?>
				<?php if (!empty($provider_profile)){
					echo '<p><a class="coward" href="' . $provider_profile . '">Provider Profile</a></p>';
				}
				?>
				<?php if (!empty ($phone) || !empty ($mail)){
					echo '</div>';
				}
				?>
				<?php 
					$child_posts = toolset_get_related_posts( get_the_ID(), 'dept-division-links', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
					if (!empty($child_posts)) {
					echo '<h2 class="sans-serif h5 bold close">Departments & Divisions</h2>';
					foreach ($child_posts as $child_post) { 
						echo '<p><a href="' . types_render_field( "link-url", array( "id"=> "$child_post->ID" )) . '">' . types_render_field( "link-title", array( "id"=> "$child_post->ID" )) . '</a></p>'; 
					}
				} ?>
			</aside>
			<main class="cell small-12 medium-8 large-8 small-order-1 medium-order-2">
				<?php the_title('<h1>','</h1>'); ?>
					<?php if($position){
						echo '<p class="subheader">' . $position . '</p>';
					}
						?>
					<?php the_content(); ?>
					<?php if($statement){
						echo $statement;
					}
					?>
					<?php if($education){
						echo '<h2 class="sans-serif h5 bold">Education</h2>';
						echo $education;
					}
					?>
					<?php if($awards){
						echo '<h2 class="sans-serif h5 bold">Awards</h2>';
						echo $awards;
					}
					?>
					<?php if($research){
						echo '<h2 class="sans-serif h5 bold">Research</h2>';
						echo $research;
					}
					?>
					<?php if($affiliations){
						echo '<h2 class="sans-serif h5 bold">Professional Affiliations</h2>';
						echo $affiliations;
					}
					?>
					<?php if($pubs){
						echo '<h2 class="sans-serif h5 bold">Publications</h2>';
						echo $pubs;
					}
					?>
					<?php if($news){
						echo '<h2 class="sans-serif h5 bold">News</h2>';
						echo $news;
					}
					?>
					<?php if($members){
						echo '<h2 class="sans-serif h5 bold">Lab Members</h2>';
						echo $members;
					}
					?>
			</main>
		<?php endwhile; ?>
	</div>
</div>
<?php load_theme_design('footer');
