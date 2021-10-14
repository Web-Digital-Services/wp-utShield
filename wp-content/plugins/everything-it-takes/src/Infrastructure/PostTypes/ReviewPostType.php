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

namespace EverythingItTakes\Plugin\Infrastructure\PostTypes;

use BrightNucleus\Config\ConfigFactory;
use BrightNucleus\Config\ConfigInterface;
use BrightNucleus\CustomContent\CustomPostType;
use BrightNucleus\CustomContent\CustomPostType\Argument;
use BrightNucleus\CustomContent\CustomPostType\Feature;
use BrightNucleus\CustomContent\CustomPostType\Name;
use EverythingItTakes\Plugin\Infrastructure\WPPostType;

final class ReviewPostType extends WPPostType {

	const SLUG = 'tadxp-review';

	/**
	 * Registers the custom post type.
	 */
	public function register(): void {
		$custom_post_type = new CustomPostType( $this->get_config() );

		add_action( 'init', [ $custom_post_type, 'register' ] );
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

				// For most localization needs, it should be sufficient to only provide
				// these four name variants. The Custom Content component will figure
				// out the rest.
				Argument::NAMES      => [
					Name::SINGULAR_NAME_UC => _x( 'Review', 'post type uc singular name', 'tadxp' ),
					Name::SINGULAR_NAME_LC => _x( 'review', 'post type lc singular name', 'tadxp' ),
					Name::PLURAL_NAME_UC   => _x( 'Reviews', 'post type uc plural name', 'tadxp' ),
					Name::PLURAL_NAME_LC   => _x( 'reviews', 'post type lc plural name', 'tadxp' ),
				],

				// Here, we register the taxonomy we'll later create with our new custom
				// post type.
				Argument::TAXONOMIES => [],

				// We also add some supported features to the custom post type.
				Argument::SUPPORTS   => [
					Feature::EDITOR,
					Feature::TITLE
				],

				Argument::IS_PUBLIC => false,
				Argument::SHOW_UI   => true,
				Argument::MENU_ICON => 'dashicons-star-half',
			],
		] );
	}

}
