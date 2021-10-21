<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
	<div class="shell shell--alt grid-container">
		<div class="footer__inner">
			<div class="footer__content grid-x">
				<div class="footer__group cell large-3 medium-6 small-12 footer__group--alt">
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

				<div class="footer__group cell large-3 medium-6 small-12">
					<div class="footer__list">
						<?php do_action( 'eit_footer_1_col_menu' ); ?>

						<div class="socials footer__socials">
							<?php do_action( 'eit_social_menu' ); ?>
						</div><!-- /.socials -->
					</div><!-- /.footer__list -->
				</div><!-- /.footer__group -->

				<div class="footer__group cell large-6 medium-12 small-12">
					<div class="footer__list">
						<?php do_action( 'eit_footer_2_col_menu' ); ?>
					</div><!-- /.footer__list -->
				</div><!-- /.footer__group -->
			</div><!-- /.footer__content -->

			<aside class="footer__aside">
				<div class="footer__aside-inner grid-x">
					<?php do_action( 'eit_footer_text' ); ?>
					<?php do_action( 'eit_footer_copyright' ); ?>
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
