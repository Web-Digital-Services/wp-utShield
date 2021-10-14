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

namespace EverythingItTakes\Plugin\UI;

use BrightNucleus\Views;
use EverythingItTakes\Plugin\Domain\ProviderCollection;
use EverythingItTakes\Plugin\Domain\ProviderRepository;
use EverythingItTakes\Plugin\Registerable;
use WP_Query;

final class ProviderSearchModal implements Registerable {

	public function register(): void {
		add_action( 'eit_provider_search_modal', [ $this, 'render' ] );
	}

	public function render(): void {
		echo Views::render( 'provider-search-modal', $this->get_args() );
	}

	private function get_args(): array {
		return [
			'providers' => $this->get_provider_data()
		];
	}

	private function get_provider_data(): ProviderCollection {
		return ( new ProviderRepository() )->find_all();
	}

//	private function get_specialty_data(): array {
//
//	}
//
//	private function get_location_data(): array {
//
//	}

}
