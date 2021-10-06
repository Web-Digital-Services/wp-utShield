<div class="grid-x grid-margin-x">
	<?php
        if ( have_posts() ) { while ( have_posts() ) { the_post();?>
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
		}
	?>
</div>