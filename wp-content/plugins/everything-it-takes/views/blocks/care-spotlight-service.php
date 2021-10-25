<?php use BrightNucleus\Views; ?>

<section class="callout callout--alt callout--alt-large<?= $this->is_random ? ' js-random-block js-random-care-spotlight' : ''; ?>">
	<h6 class="callout__title"><?= nl2br( esc_html( $this->title_left ) ); ?></h6><!-- /.callout__title -->

	<div class="shell shell--alt callout__shell grid-container">
		<div class="callout__inner grid-x">
			<div class="callout__images cell large-6 medium-6">

                <figure class="callout__image js-image"><?= wp_get_attachment_image( $this->image_id_1, 'eit-featured-cta-small' ); ?></figure><!-- /.callout__image -->

                <figure class="callout__image callout__image--person js-image"><?= wp_get_attachment_image( $this->image_id_2, 'eit-featured-cta-medium' ); ?></figure><!-- /.callout__image -->

			</div><!-- /.callout__images -->

			<div class="callout__content cell large-6 medium-6">
				<h2 class="eyebrow-sub" data-aos="fade-up"><?= esc_html( $this->eyebrow ); ?></h2>

				<div class="callout__heading marker-line marker-line--orange" data-aos="fade-up">
					<h3 class="heading-main"><?= nl2br( esc_html( $this->title ) ); ?></h3>
					<figure class="section__heading-line">
                        <?= Views::render( 'icons/marker-line', [ 'block_id' => $this->block_id ] ); ?>
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
                        <a href="<?= esc_url( $this->cta_2['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--outline callout__btn"
                           target="<?= esc_attr( $this->cta_2['target'] ); ?>"><?= esc_html( $this->cta_2['title'] ); ?></a>
					<?php endif; ?>
				</div><!-- /.callout__actions -->
			</div><!-- /.callout__content -->
		</div><!-- /.callout__inner -->
	</div><!-- /.shell -->
</section><!-- /.callout -->
