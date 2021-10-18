<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<main class="hero bleed">
	<div class="grid-container">
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
							<address>
								<div class="loose-list">
									<ul>
										<li><a>Neurosurgery - Medical Arts and Research Center - MARC</a></li>
										<li><a>210-450-9060</a></li>
									</ul>
								</div>
							</address>
							<address>
								<div class="loose-list">
									<ul>
										<li><a>Neurosurgery - Medical Arts and Research Center - MARC</a></li>
										<li><a>210-450-9060</a></li>
									</ul>
								</div>
							</address>
							<address>
								<div class="loose-list">
									<ul>
										<li><a>Neurosurgery - Medical Arts and Research Center - MARC</a></li>
										<li><a>210-450-9060</a></li>
									</ul>
								</div>
							</address>
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
<?php get_footer();
