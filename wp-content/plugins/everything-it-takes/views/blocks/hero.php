<?php use BrightNucleus\Views; ?>

<section class="hero js-hero">
	<figure class="hero__background"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/background-noise.jpg" alt="Background"></figure><!-- /.hero__background -->

	<div class="shell shell--alt grid-container">
		<div class="hero__inner grid-x">
			<div class="hero__content cell large-6 small-12">
                <?php if ( ! empty( $this->eyebrow ) ) : ?>
				    <h6 class="hero__subheading"><?= esc_html( $this->eyebrow ); ?></h6>
                <?php endif; ?>

				<div class="hero__heading">
					<h1 class="placeholder">Everything <br> It Takes</h1>
					<h1 class="intro">
						<span>Every<span>Discovery</span></span>
						<span>Every<span>Breakthrough</span></span>
						<span>Every<span>Patient</span></span>
						<span class="final">
              Everything<span>It Takes</span>
              <figure class="hero__heading-line">
                <?= Views::render( 'icons/marker-hero' ); ?>
              </figure><!-- /.hero__heading-line -->
            </span>
					</h1>
				</div><!-- /.hero__heading -->

				<div class="hero__entry">
					<?php if ( ! empty( $this->eyebrow ) ) : ?>
					    <p><?= esc_html( $this->text ); ?></p>
                    <?php endif; ?>
				</div><!-- /.hero__entry -->

				<div class="hero__actions">
					<a href="#" class="btn btn-rounded btn-rounded--search js-button-find">
						<figure><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17.001L22 22.001" stroke="#C0511B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="10" cy="10.001" r="8.75" stroke="#C0511B" stroke-width="2.5"/></svg></figure>
						<span><?= esc_html( $this->text ?: 'Find a Provider' ); ?></span>
					</a>
				</div><!-- /.hero__actions -->
			</div><!-- /.hero__content -->

			<div class="hero__image-contain cell large-6 small-12">
				<figure class="hero__image"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/hero-image2.png" alt="Image"></figure><!-- /.hero__image -->
			</div><!-- /.hero__image-contain -->
		</div><!-- /.hero__inner -->

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
									<input type="text" placeholder="Browse Providers by name, specialty, location or condition" name="find" id="find" value="" class="search__field js-find"/>
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
												<li>
													<a href="#" class="person">
														<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
														<p>Firstname Lastname, MD <span>in Physicians</span></p>
													</a>
												</li>
												<li>
													<a href="#" class="person">
														<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
														<p>Firstname Lastname, MD <span>in Physicians</span></p>
													</a>
												</li>
												<li>
													<a href="#" class="person">
														<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
														<p>Firstname Lastname, MD <span>in Physicians</span></p>
													</a>
												</li>
												<li>
													<a href="#" class="person">
														<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/temp/ico-person.png" alt="Person image"></figure>
														<p>Firstname Lastname, MD <span>in Physicians</span></p>
													</a>
												</li>
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
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum magni, assumenda. Velit numquam, tempora alias id amet eum eveniet, ipsam sequi dolores nisi, repellendus, autem necessitatibus odio sint. Cupiditate, dolorem.</p>
										</div><!-- /.accordion__content -->
									</div><!-- /.accordion__body -->
								</div><!-- /.accordion__section -->

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
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum magni, assumenda. Velit numquam, tempora alias id amet eum eveniet, ipsam sequi dolores nisi, repellendus, autem necessitatibus odio sint. Cupiditate, dolorem.</p>
										</div><!-- /.accordion__content -->
									</div><!-- /.accordion__body -->
								</div><!-- /.accordion__section -->

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
	</div><!-- /.shell -->
</section><!-- /.hero -->
