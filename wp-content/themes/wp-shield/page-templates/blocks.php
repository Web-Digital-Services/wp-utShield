<?php declare( strict_types=1 );

/**
 * EverythingItTakes.com (Theme)
 *
 * @package   EverythingItTakes\Theme
 * @author    Ten Adams <digital@tenadams.com>
 * @license   MIT
 * @link      https://footsolutions.com
 * @copyright 2021 Ten Adams
 *
 * Template Name: Blocks
 */

namespace EverythingItTakes\Theme;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="standard-cursor"></div>
<div class="video-cursor"></div>
<div class="slider-cursor"></div>

<div class="wrapper">
	<div class="main side-menu">
		<div class="main__content">

			<header class="header js-header">
				<div class="shell shell--alt">
					<div class="header__inner">
						<div class="header__button">
							<a href="#" class="btn-menu js-burger-button">
								<span></span>
								<span></span>
								<span></span>
							</a>
						</div><!-- /.header__button -->
						<div class="logo header__logo">
							<a href="<?= esc_url( get_site_url() ); ?>"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/logo.svg" alt="Logo"></a>
							<a href="<?= get_the_permalink( get_the_ID() ); ?>" class="page__title"><?= the_title(); ?></a>
						</div>
						<aside class="header__aside">
							<?php do_action( 'eit_header_right_menu' ); ?>
							<?php do_action( 'eit_header_right_cta_menu' ); ?>
						</aside><!-- /.header__aside -->
					</div><!-- /.header__inner -->
				</div><!-- /.shell -->
			</header><!-- /.header -->

			<aside class="main__aside">
				<div class="sidebar main__sidebar">
					<div class="sidebar__button">
						<a href="#" class="btn-menu js-burger-button">
							<span></span>
							<span></span>
							<span></span>
							<p class="btn__closed">Menu</p>
							<p class="btn__open">Close</p>
						</a>
					</div><!-- /.sidebar__button -->

					<h6 class="sidebar__title">We Make Lives Better®</h6><!-- /.sidebar__title -->
				</div><!-- /.sidebar -->
			</aside><!-- /.main__aside -->

			<div class="menu js-menu">
				<div class="shell shell--alt">
					<div class="menu__inner">
						<div class="menu__nav">
							<div class="accordion-nav js-accordion-nav">
								<div class="accordion__section">
									<div class="accordion__head">
										<h5>Patient Care</h5>
										<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/ico-chevron.svg" alt="Icon"></figure>
									</div><!-- /.accordion__head -->

									<div class="accordion__body">
										<div class="accordion__content">
											<nav class="nav nav--mobile">
												<ul>
													<li>
														<a href="#">Academics</a>
													</li>
													<li>
														<a href="#">Research</a>
													</li>
												</ul>
											</nav><!-- /.nav -->
										</div><!-- /.accordion__content -->
									</div><!-- /.accordion__body -->
								</div><!-- /.accordion__section -->
							</div><!-- /.accordion -->
						</div><!-- /.menu__nav -->

						<div class="search menu__search">
							<div class="search__inner">
								<form action="https://www.uthscsa.edu/university/search-results" method="get">
									<input type="hidden" name="cx" value="010437378810256615478:b-bydlxgrme">
									<figure class="search__icon"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/ico-google.svg" alt="Google icon"></figure><!-- /.search__icon -->
									<label for="search" class="hidden"></label>
									<input type="text" placeholder="Search UT Health San Antonio" name="as_q" id="as_q" value="" class="search__field"/>
									<input type="submit" value="GO" class="search__btn"/>
								</form>
							</div><!-- /.search__inner -->
						</div><!-- /.search -->

						<div class="menu__body">
							<div class="accordion accordion-menu js-accordion menu__accordion">
								<?php do_action( 'eit_main_menu_1' ); ?>
								<?php do_action( 'eit_main_menu_2' ); ?>
								<?php do_action( 'eit_main_menu_3' ); ?>
							</div><!-- /.accordion -->

							<div class="socials socials--menu menu__socials">
								<?php do_action( 'eit_social_menu' ); ?>
							</div><!-- /.socials -->
						</div><!-- /.menu__body -->

						<div class="menu__footer">
							<h6>WE MAKE LIVES BETTER®</h6>
							<div class="menu__entry">
								<p>The University of Texas Health Science Center at San Antonio, also called UT Health San Antonio, is a leading academic health center with a mission to make lives better through excellence in advanced academics, life-saving research and comprehensive clinical care including health, dental and cancer services.</p>
							</div><!-- /.menu__entry -->
						</div><!-- /.menu__footer -->
					</div><!-- /.menu__inner -->
				</div><!-- /.shell -->
			</div><!-- /.menu -->

			<?php the_content(); ?>

			<footer class="footer">
				<div class="shell shell--alt grid-container">
					<div class="footer__inner">
						<div class="footer__content grid-x">
							<div class="footer__group cell large-3 medium-6 small-12 footer__group--alt" data-aos="fade-up">
								<a href="http://uthscsa.edu">
									<figure class="footer__logo"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/logo.svg" alt="Logo"></figure><!-- /.footer__logo -->
								</a>
								<div class="footer__list footer__list--alt">
									<ul class="list-about">
										<li>
											<p>7703 Floyd Curl Drive</p>
										</li>
										<li>
											<p>San Antonio, Texas 78229-3900</p>
										</li>
										<li>
											<p><a href="tel:210-567-7000">210-567-7000</a></p>
										</li>
										<li class="list__location">
											<a href="#">Map and directions</a>
										</li>
										<li>
											<p>Campus Status: <span>Normal</span></p>
										</li>
										<li>
											<p>IT Operations: <span>Normal</span></p>
										</li>
									</ul><!-- /.list-about -->
								</div><!-- /.footer__list -->
							</div><!-- /.footer__group -->

							<div class="footer__group cell large-3 medium-6 small-12" data-aos="fade-up">
								<div class="footer__list">
									<?php do_action( 'eit_footer_1_col_menu' ); ?>

									<div class="socials footer__socials">
										<?php do_action( 'eit_social_menu' ); ?>
									</div><!-- /.socials -->
								</div><!-- /.footer__list -->
							</div><!-- /.footer__group -->

							<div class="footer__group cell large-6 medium-12 small-12" data-aos="fade-up">
								<div class="footer__list">
									<?php do_action( 'eit_footer_2_col_menu' ); ?>
								</div><!-- /.footer__list -->
							</div><!-- /.footer__group -->
						</div><!-- /.footer__content -->

						<aside class="footer__aside">
							<div class="footer__aside-inner grid-x">
								<div class="footer__entry cell" data-aos="fade-up">
									<p>Links from websites affiliated with The University of Texas Health Science Center at San Antonio's website (uthscsa.edu) to other websites do not constitute or imply university endorsement of those sites, their content, or products and services associated with those sites. The content on this website is intended to be used for informational purposes only. Health information on this site is not meant to be used to diagnose or treat conditions. Consult a health care provider if you are in need of treatment.</p>
								</div><!-- /.footer__entry -->
								<div class="copyright footer__copyright cell">
									<p>Copyright 2021 UT Health San Antonio</p>
								</div><!-- /.copyright -->
							</div><!-- /.footer__aside-inner -->
						</aside><!-- /.footer__aside -->
					</div><!-- /.footer__inner -->
				</div><!-- /.shell -->
			</footer><!-- /.footer -->

		</div><!-- /.main__content -->
	</div><!-- /.main -->
</div><!-- /.wrapper -->
<?php wp_footer(); ?>

</body>
</html>

