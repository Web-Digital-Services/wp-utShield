<?php
global $post;

if ( 'provider-directory' === $post->post_name ) {
	return;
}
?>

<div class="header__actions">

	<?php $menu_item_class = 'btn btn-rounded btn-rounded--outline'; ?>

	<?php foreach ( $this->menu_items as $menu_item ) : ?>
		<?php if ( is_page_template( 'page-templates/blocks.php' ) ) {
			$menu_item->url  = '#';
			$menu_item_class .= ' js-button-find';
		} ?>
        <a href="<?= esc_url( $menu_item->url ); ?>"
           target="<?= esc_attr( $menu_item->target ); ?>"
           class="<?= esc_attr( $menu_item_class ); ?>">
			<?= esc_html( $menu_item->title ); ?>
        </a>
	<?php endforeach; ?>

</div><!-- /.header__actions -->
