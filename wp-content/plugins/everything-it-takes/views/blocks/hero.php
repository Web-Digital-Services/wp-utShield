<?php use BrightNucleus\Views; ?>

<?php
//\Kint::dump( $this );
//die();
?>

<section class="hero js-hero<?= $this->is_random ? ' js-random-block js-random-hero' : ''; ?>" data-block-type="hero">
	<figure class="hero__background"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/background-noise.jpg" alt="Background"></figure><!-- /.hero__background -->

	<div class="shell shell--alt grid-container">
		<div class="hero__inner">
			<div class="hero__content">
                <?php if ( ! empty( $this->eyebrow ) ) : ?>
				    <h1 class="hero__subheading"><?= esc_html( $this->eyebrow ); ?></h1>
                <?php endif; ?>

				<div class="hero__heading">
					<h2 class="placeholder">Everything <br> It Takes</h2>
					<h2 class="intro">
						<span>Every<span>Discovery</span></span>
						<span>Every<span>Breakthrough</span></span>
						<span>Every<span>Patient</span></span>
						<span class="final">
              Everything<span>It Takes</span>
              <figure class="hero__heading-line">
                <?= Views::render( 'icons/marker-hero' ); ?>
              </figure><!-- /.hero__heading-line -->
            </span>
					</h2>
				</div><!-- /.hero__heading -->

				<div class="hero__entry">
					<?php if ( ! empty( $this->text ) ) : ?>
					    <p><?= esc_html( $this->text ); ?></p>
                    <?php endif; ?>
				</div><!-- /.hero__entry -->

				<div class="hero__actions">
					<a href="#" class="btn btn-rounded btn-rounded--search js-button-find">
						<figure><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17.001L22 22.001" stroke="#C0511B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="10" cy="10.001" r="8.75" stroke="#C0511B" stroke-width="2.5"/></svg></figure>
						<span><?= esc_html( $this->cta_text ?: 'Find a Provider' ); ?></span>
					</a>
				</div><!-- /.hero__actions -->
			</div><!-- /.hero__content -->

			<div class="hero__image-contain">
                <figure class="hero__image"><?= wp_get_attachment_image( $this->image_id, 'eit-hero' ); ?></figure><!-- /.hero__image -->
			</div><!-- /.hero__image-contain -->
		</div><!-- /.hero__inner -->

        <?php do_action( 'eit_provider_search_modal' ); ?>

	</div><!-- /.shell -->
</section><!-- /.hero -->
