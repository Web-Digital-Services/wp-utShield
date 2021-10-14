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

namespace EverythingItTakes\Plugin\Infrastructure\Taxonomy;

use BrightNucleus\Config\ConfigFactory;
use BrightNucleus\Config\ConfigInterface;
use BrightNucleus\CustomContent\CustomTaxonomy;
use BrightNucleus\CustomContent\CustomTaxonomy\Argument;
use BrightNucleus\CustomContent\CustomTaxonomy\Name;
use EverythingItTakes\Plugin\Infrastructure\PostTypes\ReviewPostType;
use EverythingItTakes\Plugin\Registerable;

final class ReviewRatingTaxonomy implements Registerable {

	const SLUG = 'tadxp-review-rating';

	/**
	 * Registers the custom post type.
	 */
	public function register(): void {
		$custom_taxonomy = new CustomTaxonomy( $this->get_config() );

		add_action( 'init', [ $custom_taxonomy, 'register' ] );
	}

	/**
	 * Gets the config to register the custom post type.
	 *
	 * @return ConfigInterface
	 */
	private function get_config(): ConfigInterface {
		return ConfigFactory::create( [

			// This configuration key represents the slug of the CPT.
			self::SLUG => [

				Argument::IS_PUBLIC         => false,
				Argument::SHOW_UI           => true,

				// For most localization needs, it should be sufficient to only provide
				// these four name variants. The Custom Content component will figure
				// out the rest.
				Argument::NAMES             => [
					Name::SINGULAR_NAME_UC => _x( 'Review Rating', 'taxonomy uc singular name', 'kh-custom-content' ),
					Name::SINGULAR_NAME_LC => _x( 'review rating', 'taxonomy lc singular name', 'kh-custom-content' ),
					Name::PLURAL_NAME_UC   => _x( 'Review Ratings', 'taxonomy uc plural name', 'kh-custom-content' ),
					Name::PLURAL_NAME_LC   => _x( 'review ratings', 'taxonomy lc plural name', 'kh-custom-content' ),
				],

				// Here, we register the taxonomy with our previously created custom
				// post type.
				Argument::POST_TYPES        => [
					ReviewPostType::SLUG
				],
				Argument::SHOW_ADMIN_COLUMN => false,

				Argument::SHOW_IN_REST => true,
			],
		] );
	}

}
