<div class="grid-x grid-margin-x">
	<?php
		$physician_Last_name = types_render_field("last-name"); 

		$physician_args = 
			array(
			'posts_per_page' => 12,
			'post_type' => 'physicians-profile',
			'post__not_in'   => array( $post->ID ),
			'orderby'        => $physician_Last_name,
			'order'          => 'ASC'
		);
		
		$query_physicians = new WP_Query($physician_args); 
		
		if( $query_physicians->have_posts() ) { while( $query_physicians->have_posts() ) { $query_physicians->the_post();?>
			<div class="card cell small-12 medium-4 large-4">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium');
					}
					else {
						echo '<img alt="This provider does not have a picture" src="https://utphysicians.wpengine.com/wp-content/uploads/2021/09/uthealth-provider-profile-fallback-mobile_0.jpg">';
					}
				?>
				<div class="card-section">
					<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<p>specialty</p>
				</div>
			</div>
		<?php
			}
			wp_reset_postdata();
		}
	?>
</div>