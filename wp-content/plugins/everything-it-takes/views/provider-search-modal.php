<div class="hero__menu">
	<figure class="hero__menu-background"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/background-noise.jpg" alt="Background"></figure><!-- /.hero__menu-background -->

	<div class="menu-find js-menu-find">
		<a href="#" class="menu__close js-menu-find-close"><i class="fas fa-times"></i></a>

		<div class="menu__inner">
			<div class="menu__head">
				<div class="search search--find menu__search">
					<div class="search__inner">
						<form action="#" method="get">
							<label for="find" class="hidden"></label>
							<input type="text" placeholder="Browse Providers by name, specialty or location" name="find" id="find" value="" class="search__field js-find"/>
							<input type="submit" value="GO" class="search__btn"/>
						</form>
					</div><!-- /.search__inner -->
				</div><!-- /.search -->
			</div><!-- /.menu__head -->

			<div class="menu__body">
				<div class="menu__lists">
					<div class="accordion-find js-accordion-find">
						<div class="accordion__section">
							<div class="accordion__head">
								<h6>
									<span>Browse by name</span>
									<span>Back to all categories</span>
								</h6>
								<figure><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 11.8571L9 18" stroke="#635853" stroke-width="1.5" stroke-linecap="round"/></svg></figure>
							</div><!-- /.accordion__head -->

							<div class="accordion__body">
								<div class="accordion__content">
									<ul class="list-persons">
                                        <?php foreach ( $this->providers as $provider ) : ?>
                                            <li>
                                                <a href="<?= esc_url( $provider->get_url() ); ?>" class="person" target="_blank">
                                                    <figure><?= wp_kses_post( $provider->get_featured_image() ); ?></figure>
                                                    <p><?= esc_html( $provider->get_title() ); ?> <span>in <?= esc_html( $provider->get_specialty_name() ); ?></span></p>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
									</ul><!-- /.list-persons -->
								</div><!-- /.accordion__content -->
							</div><!-- /.accordion__body -->
						</div><!-- /.accordion__section -->

						<div class="accordion__section">
							<div class="accordion__head">
								<h6>
									<span>Browse by specialty</span>
									<span>Back to all categories</span>
								</h6>
								<figure><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 11.8571L9 18" stroke="#635853" stroke-width="1.5" stroke-linecap="round"/></svg></figure>
							</div><!-- /.accordion__head -->

							<div class="accordion__body">
								<div class="accordion__content">
                                    <ul class="list-persons">
                                        <?php /** @var WP_Term $specialty */ ?>
										<?php foreach ( $this->specialties as $specialty ) : ?>
                                            <li>
                                                <a href="<?= esc_url( get_site_url() . '/provider-directory?_specialty_filter=' . $specialty->slug ); ?>" class="person" target="_blank">
                                                    <p><?= esc_html( $specialty->name ); ?></p>
                                                </a>
                                            </li>
										<?php endforeach; ?>
                                    </ul><!-- /.list-persons -->
                                </div><!-- /.accordion__content -->
							</div><!-- /.accordion__body -->
						</div><!-- /.accordion__section -->

						<?php if ( ! empty( $this->locations ) ) : ?>
                            <div class="accordion__section">
                                <div class="accordion__head">
                                    <h6>
                                        <span>Browse by location</span>
                                        <span>Back to all categories</span>
                                    </h6>

                                    <figure><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 11.8571L9 18" stroke="#635853" stroke-width="1.5" stroke-linecap="round"/></svg></figure>
                                </div><!-- /.accordion__head -->

                                <div class="accordion__body">
                                    <div class="accordion__content">
                                        <ul class="list-persons">
		                                    <?php /** @var WP_Post $location */ ?>
		                                    <?php foreach ( $this->locations as $location ) : ?>
                                                <li>
                                                    <a href="<?= esc_url( get_site_url() . '/provider-directory?_p=' . $location->ID ); ?>" class="person" target="_blank">
                                                        <p><?= esc_html( $location->post_title ); ?></p>
                                                    </a>
                                                </li>
		                                    <?php endforeach; ?>
                                        </ul><!-- /.list-persons -->
                                    </div><!-- /.accordion__content -->
                                </div><!-- /.accordion__body -->
                            </div><!-- /.accordion__section -->
                        <?php endif; ?>

                        <?php if ( ! empty( $this->conditions ) ) : ?>
						    <div class="accordion__section">
                                <div class="accordion__head">
                                    <h6>
                                        <span>Browse by condition</span>
                                        <span>Back to all categories</span>
                                    </h6>

                                    <figure><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 11.8571L9 18" stroke="#635853" stroke-width="1.5" stroke-linecap="round"/></svg></figure>
                                </div><!-- /.accordion__head -->

                                <div class="accordion__body">
                                    <div class="accordion__content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum magni, assumenda. Velit numquam, tempora alias id amet eum eveniet, ipsam sequi dolores nisi, repellendus, autem necessitatibus odio sint. Cupiditate, dolorem.</p>
                                    </div><!-- /.accordion__content -->
                                </div><!-- /.accordion__body -->
						    </div><!-- /.accordion__section -->
                        <?php endif; ?>
					</div><!-- /.accordion -->
				</div><!-- /.menu__lists -->
			</div><!-- /.menu__body -->

			<div class="menu__foot">
				<div class="menu__list">
					<ul class="list-persons list-persons--alt">
						<li>
							<a href="#" class="person person--alt">
								<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
								<p>Search Term <span>in Physicians</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
								<p>Search Term <span>in Physicians</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
								<p>Search Term <span>in Physicians</span></p>
							</a>
						</li>
						<li class="list__more">
							<a href="#">See more Providers ...</a>
						</li>
					</ul><!-- /.list-persons -->
				</div><!-- /.menu__list -->

				<div class="menu__list">
					<ul class="list-persons list-persons--alt">
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Specialties</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Specialties</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Specialties</span></p>
							</a>
						</li>
						<li class="list__more">
							<a href="#">See more Specialties ...</a>
						</li>
					</ul><!-- /.list-persons -->
				</div><!-- /.menu__list -->

				<div class="menu__list">
					<ul class="list-persons list-persons--alt">
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Locations</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Locations</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Locations</span></p>
							</a>
						</li>
						<li class="list__more">
							<a href="#">See more Locations ...</a>
						</li>
					</ul><!-- /.list-persons -->
				</div><!-- /.menu__list -->

				<div class="menu__list">
					<ul class="list-persons list-persons--alt">
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Conditions</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Conditions</span></p>
							</a>
						</li>
						<li>
							<a href="#" class="person person--alt">
								<p>Search Term <span>in Conditions</span></p>
							</a>
						</li>
						<li class="list__more">
							<a href="#">See more Conditions ...</a>
						</li>
					</ul><!-- /.list-persons -->
				</div><!-- /.menu__list -->
			</div><!-- /.menu__foot -->
		</div><!-- /.menu__inner -->
	</div><!-- /.menu-find -->
</div><!-- /.hero__menu -->