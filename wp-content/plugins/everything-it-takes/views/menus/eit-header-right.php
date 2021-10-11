<nav class="nav header__nav">
    <ul>

		<?php foreach ( $this->menu_items as $menu_item ) : ?>
            <li>
                <a href="<?= esc_url( $menu_item->url ); ?>"
                   target="<?= esc_attr( $menu_item->target ); ?>"
                   class="btn btn-rounded btn-rounded--trans">
					<?= esc_html( $menu_item->title ); ?>
                </a>
            </li>
		<?php endforeach; ?>

    </ul>
</nav><!-- /.nav -->
