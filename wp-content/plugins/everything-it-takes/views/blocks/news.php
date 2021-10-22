<section class="section-news">
	<div class="shell shell--alt grid-container">
		<div class="section__inner grid-x">
			<div class="section__head cell">
                <?php if ( ! empty( $this->eyebrow ) ) : ?>
				    <h6 data-aos="fade-up"><?= esc_html( $this->eyebrow ); ?></h6>
                <?php endif; ?>
				<?php if ( ! empty( $this->eyebrow ) ) : ?>
				    <h3 data-aos="fade-up"><?= nl2br( esc_html( $this->title ) ); ?></h3>
				<?php endif; ?>
			</div><!-- /.section__head -->

			<div class="section__body cell">
				<div class="slider-news section__slider" data-aos="fade-up">
      <div class="slider__navigation">
						<div class="slider__prev"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/ico-arrow-left.svg" alt=""></div>
						<div class="slider__next"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/ico-arrow-right.svg" alt=""></div>
					</div><!-- /.slider__navigation -->
					<div class="slider-news-slider js-slider-news">

                        <?php foreach ( $this->posts as $post ) : ?>

                            <div class="slider__slide">
                                <article class="article-news">
                                    <a href="<?= esc_url( $post->get_url() ); ?>" class="article__link" target="_blank"></a>
                                    <figure class="article__image"><img src="<?= esc_url( $post->get_featured_image() ); ?>" alt="<?= esc_attr( $post->get_title() ); ?>"></figure><!-- /.article__image -->
                                    <h5><?= esc_html( $post->get_title() ); ?></h5>
                                    <span class="article__meta"><?= esc_html( $post->get_date() ); ?></span>
                                </article><!-- /.article-news -->
                            </div><!-- /.slider__slide -->

                        <?php endforeach; ?>

					</div><!-- /.slider -->

					
				</div><!-- /.slider-news -->
			</div><!-- /.section__body -->

			<?php if ( ! empty( $this->cta ) ) : ?>
                <div class="section__actions cell" data-aos="fade-up">
                    <a href="<?= esc_url( $this->cta['url'] ); ?>"
                       class="btn btn-rounded btn-rounded--outline"
                       target="<?= esc_attr( $this->cta['target'] ); ?>"><?= esc_html( $this->cta['title'] ); ?></a>
                </div><!-- /.section__actions -->
			<?php endif; ?>

		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-news -->
