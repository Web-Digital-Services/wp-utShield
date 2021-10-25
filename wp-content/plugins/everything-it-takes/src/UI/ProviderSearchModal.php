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
use EverythingItTakes\Plugin\Infrastructure\PostTypes\LocationPostType;
use EverythingItTakes\Plugin\Infrastructure\Taxonomy\SpecialtyTaxonomy;
use EverythingItTakes\Plugin\Registerable;
use WP_Query;

final class ProviderSearchModal implements Registerable {

	public function register(): void {
		add_action( 'eit_provider_search_modal', [ $this, 'render' ] );
	}

	public function render(): void {
//		if ( false !== get_transient( 'nd_provider_search_modal' ) ) {
//			echo get_transient( 'nd_provider_search_modal' );
//
//			return;
//		}

		$view = Views::render( 'provider-search-modal', $this->get_args() );

//		set_transient( 'nd_provider_search_modal', $view, DAY_IN_SECONDS );

		echo $view;
	}

	private function get_args(): array {
		return [
			'providers'   => $this->get_provider_data(),
			'specialties' => $this->get_specialty_data(),
			'locations'   => $this->get_location_data(),
			'conditions'  => $this->get_condition_data()
		];
	}

	private function get_provider_data(): ProviderCollection {
		return ( new ProviderRepository() )->find_by( [ 'posts_per_page' => 20 ] );
	}

	private function get_specialty_data(): array {
		$specialties = get_terms(
			[
				'number'   => 20,
				'taxonomy' => SpecialtyTaxonomy::SLUG
			]
		);

		return is_array( $specialties ) ? $specialties : [];
	}

	private function get_location_data(): array {
		$args = [
			'post_type'      => LocationPostType::SLUG,
			'posts_per_page' => 500,
			'order'          => 'ASC',
			'orderby'        => 'title',
		];

		$query = new WP_Query( $args );

		return $query->posts;
	}

	private function get_condition_data(): array {
		return [];
	}

}
