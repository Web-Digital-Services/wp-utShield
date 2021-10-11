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

