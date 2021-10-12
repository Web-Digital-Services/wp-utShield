<?php use BrightNucleus\Views; ?>

<section class="callout callout--alt callout--alt-large">
	<h6 class="callout__title"><?= nl2br( esc_html( $this->title_left ) ); ?></h6><!-- /.callout__title -->

	<div class="shell shell--alt callout__shell grid-container">
		<div class="callout__inner grid-x">
			<div class="callout__images cell large-6 medium-6">
				<figure class="callout__image js-image"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-4.jpg" srcset="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-4.jpg, <?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-4-2x.jpg 2x" alt="Image"></figure><!-- /.callout__image -->
				<figure class="callout__image callout__image--person js-image"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-6.jpg" srcset="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-6.jpg, <?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/callout/callout-img-6-2x.jpg 2x" alt="Image"></figure><!-- /.callout__image -->
			</div><!-- /.callout__images -->

			<div class="callout__content cell large-6 medium-6">
				<h6 data-aos="fade-up"><?= esc_html( $this->eyebrow ); ?></h6>

				<div class="callout__heading marker-line marker-line--orange" data-aos="fade-up">
					<h2><?= nl2br( esc_html( $this->title ) ); ?></h2>
					<figure class="section__heading-line">
                        <?= Views::render( 'icons/marker-line' ); ?>
					</figure><!-- /.callout__heading-figure -->
				</div><!-- /.callout__heading -->

				<div class="callout__entry" data-aos="fade-up">
					<?= wp_kses_post( wpautop( $this->text ) ); ?>
				</div><!-- /.callout__entry -->

				<div class="callout__actions" data-aos="fade-up">
					<?php if ( ! empty( $this->cta_1 ) ) : ?>
                        <a href="<?= esc_url( $this->cta_1['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--orange callout__btn"
                           target="<?= esc_attr( $this->cta_1['target'] ); ?>"><?= esc_html( $this->cta_1['title'] ); ?></a>
					<?php endif; ?>
					<?php if ( ! empty( $this->cta_2 ) ) : ?>
                        <a href="<?= esc_url( $this->cta_1['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--outline callout__btn"
                           target="<?= esc_attr( $this->cta_2['target'] ); ?>"><?= esc_html( $this->cta_2['title'] ); ?></a>
					<?php endif; ?>
				</div><!-- /.callout__actions -->
			</div><!-- /.callout__content -->
		</div><!-- /.callout__inner -->
	</div><!-- /.shell -->
</section><!-- /.callout -->
