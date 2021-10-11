<div class="header__actions">

	<?php foreach ( $this->menu_items as $menu_item ) : ?>
        <a href="<?= esc_url( $menu_item->url ); ?>"
           target="<?= esc_attr( $menu_item->target ); ?>"
           class="btn btn-rounded btn-rounded--outline js-button-find">
            <?= esc_html( $menu_item->title ); ?>
        </a>
	<?php endforeach; ?>

</div><!-- /.header__actions -->
