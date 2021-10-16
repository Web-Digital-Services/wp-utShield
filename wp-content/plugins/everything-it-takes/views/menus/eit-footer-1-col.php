<h6><?= esc_html( $this->menu_title ); ?></h6>
<ul class="list-basic">

	<?php foreach ( $this->menu_items as $menu_item ) : ?>
        <li>
            <a href="<?= esc_url( $menu_item->url ); ?>"
               target="<?= esc_attr( $menu_item->target ); ?>">
				<?= esc_html( $menu_item->title ); ?>
            </a>
        </li>
	<?php endforeach; ?>

</ul><!-- /.list-basic -->
