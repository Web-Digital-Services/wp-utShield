<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<main class="hero bleed">
	<div class="grid-container shell">
		<div class="grid-x ">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="cell small-12 medium-8 large-9">
					<?php 
						$physician_Accepting_New = types_render_field("accepting-new-patients", array("output" => "raw")); 
						
						the_title('<h1>','</h1>');
						if($physician_Accepting_New == 'Accepting New Patients'){
							'<p class="text-accent bold"> <i class="fas fa-notes-medical"></i> <em>Accepting New Patients</em></p>';
						}else{
							'<p class="text-accent bold"> <i class="fas fa-notes-medical"></i> <em>Not Accepting New Patients</em></p>';
						}
						?>
					<div class="grid-x grid-margin-x">
						<div class="cell small-12 medium-6 large-4 small-order-3 medium-order-3 large-order-1">
							<h2 class="h4"> Practice Locations</h2>
							<?php
								$physician_locations = get_field('physician_locations_relationship');
								if( $physician_locations ): ?>
									<?php 
										foreach( $physician_locations as $location ): 
										// Setup this post for WP functions (variable must be named $post).
										setup_postdata($location); ?>
											<address>
												<div class="loose-list">
													<?php 
														$location = get_post($location); 
														$location_url = types_render_field( "url-location", array( "separator" => ", ", "id" => $location, "raw" => "true" )); 
														$phone_number = types_render_field( "phone-number-locations", array( "separator" => ", ", "id" => $location )); 
														if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $phone_number,  $matches ) ){
															$rendered_phone_number = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
														}
													?>
													<ul>
														<li><a href="<?php echo $location_url; ?>"><?php echo get_the_title( $location->ID ); ?></a></li>
														<li><a href="tel:<?php echo $phone_number; ?>"><?php echo $rendered_phone_number;?></a></li>
													</ul>
												</div>
											</address>
									<?php endforeach; ?>
									<?php 
									// Reset the global post object so that the rest of the page works correctly.
									wp_reset_postdata(); ?>
								<?php endif; ?>
						</div>
						<div class="cell small-12 medium-6 large-4 small-order-1 medium-order-1 large-order-2">
							<?php 
								$specialties = get_the_terms( get_the_ID(), 'specialty' );
								if (!empty($specialties)){
									echo '<h2 class="h4">Specialties</h2>';
									echo '<div>';
									echo '<ul>';
									foreach ( $specialties as $specialty ) {
										echo '<li>' . __( $specialty->name ) . '</li>';
									}
									echo '</ul>';
									echo '</div>';
								}
							?>
						</div>
						<div class="cell small-12 medium-6 large-4 small-order-2 medium-order-2 large-order-3">
							<div>
								<?php 
									$languages = get_the_terms( get_the_ID(), 'languages-spoken' );
									if (!empty($languages)){
										echo '<h2 class="h4">Languages</h2>';
										echo '<div>';
										echo '<ul>';
										foreach ( $languages as $language ) {
											echo '<li>' . __( $language->name ) . '</li>';
										}
										echo '</ul>';
										echo '</div>';
									}
								?>
							</div>
						</div>
					</div>
					<?php the_title('<p class="black">If you are a patient of ',', you can:</p>'); ?>
					<div class="loose-list">
						<ul class="no-bullet inline">
							<li>
							<a href="https://mychart.utmedicinesa.com/mychart/default.asp?postloginmode=msgoptions">
									<span class="fa-stack">
										<i class="fas fa-circle fa-stack-2x"></i>
										<i class="fas fa-comments fa-stack-1x fa-inverse"></i>
									</span>
									<span>Message via MyChart</span>
								</a>
							</li>
							<li>
								<a href="https://mychart.utmedicinesa.com/mychart/default.asp?postloginmode=apptsched">
									<span class="fa-stack">
										<i class="fas fa-circle fa-stack-2x"></i>
										<i class="fas fa-calendar  fa-stack-1x fa-inverse"></i>
									</span>
									<span>Request Appointment via MyChart</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="cell small-12 medium-4 large-3">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium', array('class'=> 'img-margin'));
					}?>
					<div class="grid-x">
						<div class="cell">
							<!-- MODAL CONTENTS -1-->
							
							<!-- MODAL CONTENTS-2-->
							
						</div>
					</div>
				</div>
			<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</main>
<?php load_theme_design('footer');
