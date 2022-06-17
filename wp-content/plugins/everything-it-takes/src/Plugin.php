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
use EverythingItTakes\Plugin\Application\BlockRandomizer;
use EverythingItTakes\Plugin\Infrastructure\Blocks;
use EverythingItTakes\Plugin\Infrastructure\BlocksAssetLoader;
use EverythingItTakes\Plugin\Infrastructure\BodyClasses;
use EverythingItTakes\Plugin\Infrastructure\ImageSizes;
use EverythingItTakes\Plugin\Infrastructure\InfiniteScroll;
use EverythingItTakes\Plugin\Infrastructure\Menus;
use EverythingItTakes\Plugin\Infrastructure\Options\FooterOptions;
use EverythingItTakes\Plugin\Infrastructure\Options\SiteOptions;
use EverythingItTakes\Plugin\Infrastructure\PostTypes\ReviewPostType;
use EverythingItTakes\Plugin\Infrastructure\SearchWP;
use EverythingItTakes\Plugin\Infrastructure\Taxonomy\ReviewRatingTaxonomy;
use EverythingItTakes\Plugin\UI\Footer;
use EverythingItTakes\Plugin\UI\ProviderSearchModal;

final class Plugin {
	public function run(): void {
		foreach ( $this->services as $class ) {
			/** @var Registerable $service */
			$service = new $class;
			$service->register();
		}

		$this->register_views();
	}

	protected array $services = [
		// Application
		BlockRandomizer::class,

		// Infrastructure
		Blocks::class,
		BlocksAssetLoader::class,
		ImageSizes::class,
		InfiniteScroll::class,
		Menus::class,
		SearchWP::class,

		// Infrastructure/Blocks
		Blocks\CareSpotlightProvider::class,
		Blocks\CareSpotlightService::class,
		//Blocks\Events::class,
		Blocks\FeaturedCTA::class,
		Blocks\FeaturedCTABasic::class,
		Blocks\FullWidthImage::class,
		Blocks\Hero::class,
		Blocks\MarqueeText::class,
		Blocks\News::class,
		Blocks\Reviews::class,

		// Infrastructure/Options
		BodyClasses::class,
		FooterOptions::class,
		SiteOptions::class,

		// Infrastructure/PostTypes
		ReviewPostType::class,

		// Infrastructure/Taxonomy
		ReviewRatingTaxonomy::class,

		// UI
		Footer::class,
		ProviderSearchModal::class
	];

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
}
