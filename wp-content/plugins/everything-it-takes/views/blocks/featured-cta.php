<?php use BrightNucleus\Views; ?>

<section class="callout">
    <div class="shell shell--alt callout__shell grid-container">
        <figure class="callout__background"><img
                    src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/background-noise-orange.jpg"
                    alt=""></figure><!-- /.callout__background -->

        <div class="callout__inner grid-x">
            <div class="callout__slider-contain cell large-6">
                <div class="callout-slider js-slider-callout">

					<?php foreach ( $this->slides as $slide ) : ?>

                        <div class="slide">
							<?php if ( ! empty( $slide['video'] ) ) : ?>
                            <a class="js-popup-video popup callout__popup video-cursor-hover"
                               href="<?= esc_url( $slide['video'] ); ?>">
								<?php endif; ?>
                                <figure>
									<?= wp_get_attachment_image( $slide['image_id'], 'eit-care-spotlight' ); ?>
                                </figure>
								<?php if ( ! empty( $slide['video'] ) ) : ?>
                            </a>
						<?php endif; ?>
                        </div><!-- /.slide -->

					<?php endforeach; ?>

                </div><!-- /.callout-slider -->
                <ul class="slider-nav callout-slider-nav">

					<?php foreach ( $this->slides as $slide ) : ?>

                        <li>
                            <svg class="circle" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle class="outer-circle" cx="11" cy="11" r="10" stroke="#273252" stroke-width="2"/>
                                <circle class="outer-circle-grow" cx="11" cy="11" r="10" stroke="#273252"
                                        stroke-width="2"/>
                                <circle class="inner-circle" cx="11" cy="11" r="4" fill="#273252"/>
                            </svg>
                        </li>

					<?php endforeach; ?>

                </ul><!-- /.callout-slider-nav -->
            </div><!-- /.callout__slider-contain -->

            <div class="callout__content cell large-6">
                <h6 data-aos="fade-up"><?= esc_html( $this->eyebrow ); ?></h6>

                <div class="callout__heading marker-circle marker-circle--darkorange" data-aos="fade-up">
                    <h2><?= nl2br( esc_html( $this->title ) ); ?></h2>
                    <figure class="section__heading-circle">
						<?= Views::render( 'icons/marker-circle' ); ?>
                    </figure><!-- /.callout__heading-figure -->
                </div><!-- /.callout__heading -->

                <div class="callout__entry" data-aos="fade-up">
                    <p><?= wp_kses_post( $this->text ); ?></p>
                </div><!-- /.callout__entry -->

                <div class="callout__actions" data-aos="fade-up">
					<?php if ( ! empty( $this->cta_1 ) ) : ?>
                        <a href="<?= esc_url( $this->cta_1['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--white callout__btn"
                           target="<?= esc_attr( $this->cta_1['target'] ); ?>"><?= esc_html( $this->cta_1['title'] ); ?></a>
					<?php endif; ?>
					<?php if ( ! empty( $this->cta_2 ) ) : ?>
                        <a href="<?= esc_url( $this->cta_2['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--white-outline callout__btn"
                           target="<?= esc_attr( $this->cta_2['target'] ); ?>"><?= esc_html( $this->cta_2['title'] ); ?></a>
					<?php endif; ?>
                </div><!-- /.callout__actions -->
            </div><!-- /.callout__content -->
        </div><!-- /.callout__inner -->
    </div><!-- /.shell -->
</section><!-- /.callout -->
