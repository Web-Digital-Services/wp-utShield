<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php 
	$UTH_publications_citation = types_render_field("pub-citation");
	$UTH_publications_pub_date = types_render_field("pub-date");
	$UTH_publications_abstract = types_render_field("pub-abstract"); 
	$UTH_publications_publication_link = types_render_field("pub-link");
	$UTH_publications_pdf = (types_render_field( 'pub-pdf', array("output" => "raw") ));
?>
<div class="grid-container">
	<div class="grid-x grid-margin-x ">
			<main class="main-content cell small-12 medium-7 large-8">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
				<h1 class="close"><?php the_title(); ?></h1>
				<?php /* foundationpress_entry_meta(); */ ?>
				<?php /* do_action( 'foundationpress_post_before_entry_content' ); */?>
				<?php
					if (function_exists('display_featured_media')) {
					    display_featured_media('large', 'far');
					} else {
					   the_post_thumbnail('large', array( 'class' => 'featured-image-post' ));
					}
				?>
				<!-- Display the citation info -->
				<?php echo $UTH_publications_citation; ?>
				<!-- Display the Publication Categories (if any) -->
				<?php 
					$term_list = wp_get_post_terms($post->ID, 'publication-topic', array("fields" => "all"));
					$publication_topic = $term_list[0]->name;
					if (!empty ($publication_topic)){
						echo '<p><strong>Topic: </strong>' . $publication_topic . '</p>';
					}
				?>
				<?php if( !empty( $UTH_publications_abstract ) ) { echo '<p><strong>Abstract</strong><br>' . $UTH_publications_abstract . '</p>' ;} ?>
				<?php if( !empty( $UTH_publications_publication_link) ||  !empty( $UTH_publications_pdf )) { 
					echo '<ul class="inline loose-list-button">';
					if( !empty( $UTH_publications_publication_link)){
						echo '<li><a class="button" href="' . $UTH_publications_publication_link . '">View online publication</a></li>';
					}
					if( !empty( $UTH_publications_pdf)){
						echo '<li><a class="button" href="' . $UTH_publications_pdf . '">View publication (PDF)</a></li>';
					}
					echo '</ul>';
					}?>
			</main>
			<aside class="cell small-12 medium-5 large-4">
				<?php get_sidebar(); ?>
			</aside>
	</div>
	
</div>
<?php load_theme_design('footer');
