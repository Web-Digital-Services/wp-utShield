<section class="callout--basic">
	<figure class="callout__background"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/background-noise-orange.jpg" alt="Background"></figure><!-- /.callout__background -->
	<figure class="callout__element"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/shield.svg" alt="UT Health Shield"></figure><!-- /.callout__element -->
	<div class="shell shell--alt grid-container">
		<div class="callout__inner grid-x">
			<div class="callout__entry cell large-8 medium-8 small-12" data-aos="fade-up">

                <?= wp_kses_post( $this->text ); ?>

			</div><!-- /.callout__entry -->

			<div class="callout__actions cell large-2 medium-4 small-12" data-aos="fade-up">

				<?php if ( ! empty( $this->cta ) ) : ?>
					<a href="<?= esc_url( $this->cta['url'] ); ?>"
					   class="btn btn-rounded btn-rounded--white"
					   target="<?= esc_attr( $this->cta['target'] ); ?>"><?= esc_html( $this->cta['title'] ); ?></a>
				<?php endif; ?>

			</div><!-- /.callout__actions -->
		</div><!-- /.callout__inner -->
	</div><!-- /.shell -->
</section><!-- /.callout-basic -->
