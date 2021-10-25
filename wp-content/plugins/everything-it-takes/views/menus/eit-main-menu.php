<div class="accordion__section">
  <a href="#" class="accordion__head">
    <h5><?= esc_html( $this->menu_title ); ?></h5>
    <figure><img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/static/assets/img/svg/ico-chevron.svg" alt=""></figure>
  </a><!-- /.accordion__head -->

  <div class="accordion__head">
    <h5><?= esc_html( $this->menu_title ); ?></h5>
  </div><!-- /.accordion__head -->

    <div class="accordion__body">
        <div class="accordion__content">
            <nav class="nav nav--basic">
                <ul>
					<?php foreach ( $this->menu_items as $menu_item ) : ?>
                        <li>
                            <a href="<?= esc_url( $menu_item->url ); ?>"
                               target="<?= esc_attr( $menu_item->target ); ?>">
								<?= esc_html( $menu_item->title ); ?>
                            </a>
                        </li>
					<?php endforeach; ?>
                </ul>
            </nav><!-- /.nav -->
        </div><!-- /.accordion__content -->
    </div><!-- /.accordion__body -->
</div><!-- /.accordion__section -->
