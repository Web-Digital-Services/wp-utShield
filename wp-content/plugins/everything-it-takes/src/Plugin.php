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

namespace EverythingItTakes\Plugin;

use BrightNucleus\Views;
use BrightNucleus\View\Location\FilesystemLocation;
use EverythingItTakes\Plugin\Infrastructure\Blocks;
use EverythingItTakes\Plugin\Infrastructure\BlocksAssetLoader;
use EverythingItTakes\Plugin\Infrastructure\Menus;
use EverythingItTakes\Plugin\Infrastructure\PostTypes\Review;
use EverythingItTakes\Plugin\Infrastructure\Taxonomy\ReviewRatingTaxonomy;

final class Plugin {
	public function run(): void {
		foreach ( $this->services as $class ) {
			/** @var Registerable $service */
			$service = new $class;
			$service->register();
		}

		$this->register_views();
	}

	public function register_views(): void {
		$folders = [
			get_stylesheet_directory() . '/partials',
			get_template_directory() . '/partials',
			EIT_PLUGIN_DIR . 'views',
		];

		foreach ( $folders as $folder ) {
			Views::addLocation( new FilesystemLocation( $folder ) );
		}
	}

	protected array $services = [
		// Application

		// Infrastructure
		Blocks::class,
		BlocksAssetLoader::class,
		Menus::class,

		// Infrastructure/Blocks
		Blocks\Reviews::class,

		// Infrastructure/PostTypes
		Review::class,

		// Infrastructure/Taxonomy
		ReviewRatingTaxonomy::class,

		// UI

	];
}
