<?php use BrightNucleus\Views; ?>

<section class="callout callout--alt callout--alt-large">
	<h6 class="callout__title">Peter Andrew  Guarnero<br>PhD, RN, MSc</h6><!-- /.callout__title -->

	<div class="shell shell--alt callout__shell grid-container">
		<div class="callout__inner grid-x">
			<div class="callout__images cell large-6 medium-6">
				<figure class="callout__image js-image"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-4.jpg" srcset="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-4.jpg, <?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-4-2x.jpg 2x" alt="Image"></figure><!-- /.callout__image -->
				<figure class="callout__image callout__image--person js-image"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-6.jpg" srcset="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-6.jpg, <?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-6-2x.jpg 2x" alt="Image"></figure><!-- /.callout__image -->
			</div><!-- /.callout__images -->

			<div class="callout__content cell large-6 medium-6">
				<h6 data-aos="fade-up">Spotlight</h6>

				<div class="callout__heading marker-line marker-line--orange" data-aos="fade-up">
					<h2>Advancing <br> Patient Care</h2>
					<figure class="section__heading-line">
                        <?= Views::render( 'icons/marker-line' ); ?>
					</figure><!-- /.callout__heading-figure -->
				</div><!-- /.callout__heading -->

				<div class="callout__entry" data-aos="fade-up">
					<p>“I provide the students with an experience that challenges previously held beliefs about mental illness, how to interact with patients and how to advocate for the most vulnerable.”</p>
				</div><!-- /.callout__entry -->

				<div class="callout__actions" data-aos="fade-up">
					<a href="#" class="btn btn-rounded btn-rounded--orange callout__btn">View Profile</a>
					<a href="#" class="btn btn-rounded btn-rounded--outline callout__btn">Secondary CTA</a>
				</div><!-- /.callout__actions -->
			</div><!-- /.callout__content -->
		</div><!-- /.callout__inner -->
	</div><!-- /.shell -->
</section><!-- /.callout -->
