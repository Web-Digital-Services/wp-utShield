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
				<a href="#"><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/logo.svg" alt="Logo"></a>
				<a href="#" class="page__title">Patient Care</a>
			</div>
			<aside class="header__aside">
				<nav class="nav header__nav">
					<ul>
						<li>
							<a href="#" class="btn btn-rounded btn-rounded--trans">Academics</a>
						</li>
						<li>
							<a href="#" class="btn btn-rounded btn-rounded--trans">Patient Care</a>
						</li>
						<li>
							<a href="#" class="btn btn-rounded btn-rounded--trans">Research</a>
						</li>
					</ul>
				</nav><!-- /.nav -->

				<div class="header__actions">
					<a href="#" class="btn btn-rounded btn-rounded--outline js-button-find">Find a Provider</a>
				</div><!-- /.header__actions -->
			</aside><!-- /.header__aside -->
		</div><!-- /.header__inner -->
	</div><!-- /.shell -->
</header><!-- /.header -->

<div class="standard-cursor"></div>
<div class="video-cursor"></div>
<div class="slider-cursor"></div>

<div class="wrapper">
	<div class="main side-menu">
		<div class="main__content">
			<?php the_content(); ?>
		</div><!-- /.main__content -->
	</div><!-- /.main -->
</div><!-- /.wrapper -->
<?php wp_footer(); ?>

</body>
</html>

