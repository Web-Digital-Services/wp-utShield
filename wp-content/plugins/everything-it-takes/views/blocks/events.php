<?php use BrightNucleus\Views; ?>

<section class="section-events">
	<div class="shell shell--alt grid-container">
		<div class="section__inner grid-x">
			<div class="section__content cell large-5 medium-6 small-12">
				<h6 data-aos="fade-up"><?= esc_html( $this->eyebrow ); ?></h6>

				<div class="section__heading marker-circle" data-aos="fade-up">
					<h3><?= nl2br( esc_html( $this->title ) ); ?></h3>
					<figure class="section__heading-circle">
    					<?= Views::render( 'icons/marker-circle' ); ?>
					</figure><!-- /.section__heading-circle -->
				</div><!-- /.section__heading -->

				<div class="section__entry" data-aos="fade-up">
					<p><?= esc_html( $this->text ); ?></p>
				</div><!-- /.section__entry -->

				<?php if ( ! empty( $this->cta ) ) : ?>
                    <div class="section__actions" data-aos="fade-up">
                        <a href="<?= esc_url( $this->cta['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--outline"
                           target="<?= esc_attr( $this->cta['target'] ); ?>"><?= esc_html( $this->cta['title'] ); ?></a>
                    </div><!-- /.section__actions -->
				<?php endif; ?>
			</div><!-- /.section__content -->

			<aside class="section__aside cell large-5 medium-6 small-12">
				<div class="events">
					<div class="events__items">
                        <?php foreach ( $this->events as $event ) : ?>
						<div class="events__item" data-aos="fade-up">
							<a href="<?= esc_url( $event->get_url() ); ?>" class="event" target="_blank">
								<aside class="event__aside">
									<div class="event__date">
										<h6><?= esc_html( $event->get_month() ); ?></h6>
										<p><?= esc_html( $event->get_day() ); ?></p>
									</div><!-- /.event__date -->
								</aside><!-- /.event__aside -->

								<div class="event__content">
									<span><?= esc_html( $event->get_title() ); ?></span>
								</div><!-- /.event__content -->
							</a><!-- /.event -->
						</div><!-- /.events__item -->
                        <?php endforeach; ?>
					</div><!-- /.events__items -->
				</div><!-- /.events -->

				<?php if ( ! empty( $this->cta ) ) : ?>
                    <div class="section__actions" data-aos="fade-up">
                        <a href="<?= esc_url( $this->cta['url'] ); ?>"
                           class="btn btn-rounded btn-rounded--outline"
                           target="<?= esc_attr( $this->cta['target'] ); ?>"><?= esc_html( $this->cta['title'] ); ?></a>
                    </div><!-- /.section__actions -->
				<?php endif; ?>

			</aside><!-- /.section__aside -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-events -->
