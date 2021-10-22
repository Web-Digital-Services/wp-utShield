<section class="section-testimonials">
    <figure class="section__background"><img
                src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/background-noise-cyan.jpg"
                alt=""></figure><!-- /.section__background -->

    <div class="shell grid-container">
        <div class="section__inner grid-x">
            <figure class="section__element"><img
                        src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/icons/quote-mark.svg"
                        alt=""></figure><!-- /.section__element -->

            <h6 data-aos="fade-up"><?= esc_html( $this->title ); ?></h6>

            <div class="slider-testimonials section__slider cell" data-aos="fade-up">
                <div class="slider-controls">
                    <button class="controls-prev" tabindex="-1">prev</button>
                    <button class="controls-next" tabindex="-1">next</button>
                </div>
                <div class="slider-testimonials-slider js-slider-testimonials">

					<?php foreach ( $this->reviews as $review ) : ?>
                        <div class="slider__slide">
                            <div class="testimonial">
                                <div class="blockquote testimonial__blockquote">
                                    <blockquote>
                                        <p><?= wp_kses_post( $review->get_content() ); ?></p>

										<?php if ( 0 !== $review->get_star_count() ) : ?>
                                            <ul class="list-stars blockquote__list">
												<?php for ( $i = 1; $i <= $review->get_star_count(); $i ++ ) : ?>
                                                    <li>
                                                        <figure><img
                                                                    src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/icons/star.svg"
                                                                    alt=""></figure>
                                                    </li>
												<?php endfor; ?>
                                            </ul><!-- /.list-stars -->
										<?php endif; ?>

                                        <cite><?= esc_html( $review->get_title() ); ?></cite>
                                    </blockquote>
                                </div><!-- /.blockquote -->
                            </div><!-- /.testimonial -->
                        </div><!-- /.slider__slide -->
					<?php endforeach; ?>

                </div><!-- /.slider -->

                <ul class="slider-nav testimonial-slider-nav">
	                <?php foreach ( $this->reviews as $review ) : ?>
                        <li>
                            <svg class="circle" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle class="outer-circle" cx="11" cy="11" r="10" stroke="#273252" stroke-width="2"/>
                                <circle class="outer-circle-grow" cx="11" cy="11" r="10" stroke="#273252" stroke-width="2"/>
                                <circle class="inner-circle" cx="11" cy="11" r="4" fill="#273252"/>
                            </svg>
                        </li>
                    <?php endforeach; ?>
                </ul><!-- /.slider-nav -->

            </div><!-- /.slider-testimonials -->
        </div><!-- /.section__inner -->
    </div><!-- /.shell -->
</section><!-- /.section-testimonials -->
