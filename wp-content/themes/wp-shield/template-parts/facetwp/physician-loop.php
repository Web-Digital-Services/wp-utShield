<div class="grid-x grid-margin-x">
	<?php
        if ( have_posts() ) { while ( have_posts() ) { the_post();?>
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
							if($physician_Accepting_New == 'Accepting New Patients'){
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
			<?php
			}
		}
	?>
</div>