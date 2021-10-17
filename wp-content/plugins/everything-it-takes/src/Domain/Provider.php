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

namespace EverythingItTakes\Plugin\Domain;

use EverythingItTakes\Plugin\Infrastructure\PostTypes\ProviderPostType;
use EverythingItTakes\Plugin\Infrastructure\Taxonomy\SpecialtyTaxonomy;

final class Provider extends WPPost {

	public function get_featured_image( string $image_size = 'eit-provider-icon' ): string {
		return get_the_post_thumbnail( $this->post->ID, $image_size );
	}

	public function get_specialty_name(): string {
		if ( null === $this->get_specialty() ) {
			return '';
		}

		return $this->get_specialty()->name;
	}

	private function get_specialty(): ?\WP_Term {
		$specialties = get_the_terms( $this->get_id(), SpecialtyTaxonomy::SLUG );

		if ( ! is_array( $specialties ) ) {
			return null;
		}

		return $specialties[0];
	}

	public function get_url(): string {
		return get_post_meta( $this->get_id(), ProviderPostType::PROFILE_URL_KEY, true ) ?: '';
	}

}
