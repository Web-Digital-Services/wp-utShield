<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/assets/webfonts/all.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="standard-cursor"></div>
<div class="video-cursor"></div>

<div class="wrapper">
	<div class="main side-menu">
		<div class="main__content">
    
    <div class="menu js-menu">
				<div class="shell shell--alt">
					<div class="menu__inner">
						<div class="menu__nav">
							<div class="accordion-nav js-accordion-nav">
								<div class="accordion__section">
									<a href="#" class="accordion__head">
										<h5>Patient Care</h5>
										<figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/ico-chevron.svg" alt="Icon"></figure>
									</a><!-- /.accordion__head -->

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
							<?php
								if ( is_page_template( 'page-templates/hero-secondary.php' ) ) {
									echo '<a href="' . esc_url( get_site_url() ) . '" class="page__logo"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/dist/assets/images/core/UTHSA_logo_H_Color-White.png" alt="Logo"></a>';
								}else{
									echo '<a href="' . esc_url( get_site_url() ) . '" class="page__logo"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/dist/assets/images/core/logo-black.svg" alt="Logo"></a>';
								}
								// Dont show page title if not on the home page.
								if ( is_front_page() ) {
        							echo'<a href="' . get_the_permalink( get_the_ID() ) . '" class="page__title">' .  get_the_title() . '</a>';
    							}
							?>
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
