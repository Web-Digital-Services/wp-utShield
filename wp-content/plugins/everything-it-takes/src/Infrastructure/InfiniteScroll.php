<?php declare( strict_types=1 );

/**
 * EverythingItTakes.com Plugin.
 *
 * @package   EverythingItTakes\Plugin
 * @author    Ten Adams <digital@tenadams.com>
 * @license   MIT
 * @link      https://tenadams.com/
 * @copyright 2021 Ten Adams
 */

namespace EverythingItTakes\Plugin\Infrastructure;

use EverythingItTakes\Plugin\Domain\ProviderRepository;
use EverythingItTakes\Plugin\Registerable;

class InfiniteScroll implements Registerable {

	public function register(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'be_load_more_js' ] );

		add_action( 'wp_ajax_be_ajax_load_more', [ $this, 'be_ajax_load_more' ] );
		add_action( 'wp_ajax_nopriv_be_ajax_load_more', [ $this, 'be_ajax_load_more' ] );
	}

	/**
	 * AJAX Load More
	 *
	 * @link http://www.billerickson.net/infinite-scroll-in-wordpress
	 */
	function be_ajax_load_more() {
		$args = [
			'posts_per_page' => 20,
			'paged'          => $_POST['page']
		];

		$providers = ( new ProviderRepository() )->find_by( $args );

		ob_start();
		foreach ( $providers as $provider ) : ?>
            <li>
                <a href="<?= esc_url( $provider->get_url() ); ?>" class="person" target="_blank">
                    <figure><?= wp_kses_post( $provider->get_featured_image() ); ?></figure>
                    <p><?= esc_html( $provider->get_title() ); ?>
                        <span>, <?= esc_html( $provider->get_specialty_name() ); ?></span></p>
                </a>
            </li>
		<?php endforeach;

		wp_reset_postdata();
		$data = ob_get_clean();
		wp_send_json_success( $data );
		wp_die();
	}

	/**
	 * Javascript for Load More
	 *
	 */
	function be_load_more_js() {
		global $wp_query;

		$args       = array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'query' => $wp_query->query,
		);
		$js_path    = 'js/load-more.js';
		$js_url     = EIT_PLUGIN_URL . '/' . $js_path;
		$js_version = filemtime( EIT_PLUGIN_DIR . $js_path );

		wp_enqueue_script( 'be-load-more', $js_url, array( 'jquery' ), $js_version, true );
		wp_localize_script( 'be-load-more', 'beloadmore', $args );
	}

}
