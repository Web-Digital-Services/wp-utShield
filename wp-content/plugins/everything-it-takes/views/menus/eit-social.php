<ul>
	<?php foreach ( $this->menu_items as $menu_item ) : ?>
        <li>
            <a href="<?= esc_url( $menu_item->url ); ?>"
               target="<?= esc_attr( $menu_item->target ); ?>">
                <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/social/<?= strtolower( esc_attr( $menu_item->title ) ); ?>.svg"
                     alt="<?= esc_attr( $menu_item->title ); ?>">
            </a>
        </li>
	<?php endforeach; ?>
</ul>
