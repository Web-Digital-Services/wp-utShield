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
use EverythingItTakes\Plugin\Application\DomainMaintainer;
use EverythingItTakes\Plugin\Application\LocationImporter;
use EverythingItTakes\Plugin\Infrastructure\Blocks;
use EverythingItTakes\Plugin\Infrastructure\CountryTaxonomy;
use EverythingItTakes\Plugin\Infrastructure\DomainMaintainSettings;
use EverythingItTakes\Plugin\Infrastructure\FacetWP;
use EverythingItTakes\Plugin\Infrastructure\FourZeroFourSettings;
use EverythingItTakes\Plugin\Infrastructure\GoogleMapsSettings;
use EverythingItTakes\Plugin\Infrastructure\IconField;
use EverythingItTakes\Plugin\Infrastructure\LocationFields;
use EverythingItTakes\Plugin\Infrastructure\LocationImporterSettings;
use EverythingItTakes\Plugin\Infrastructure\LocationTaxonomy;
use EverythingItTakes\Plugin\Infrastructure\SearchWP;
use EverythingItTakes\Plugin\Infrastructure\SiteOptions;
use EverythingItTakes\Plugin\Infrastructure\StateTaxonomy;
use EverythingItTakes\Plugin\Infrastructure\TeamPostType;
use EverythingItTakes\Plugin\Infrastructure\TestimonialPostType;
use EverythingItTakes\Plugin\Infrastructure\TimeKit\TimeKitScript;
use EverythingItTakes\Plugin\Infrastructure\TimeKit\Proxy;
use EverythingItTakes\Plugin\UI\OpeningHours;

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
			FS_PLUGIN_DIR . 'views',
		];

		foreach ( $folders as $folder ) {
			Views::addLocation( new FilesystemLocation( $folder ) );
		}
	}

	protected array $services = [
		// Application
		DomainMaintainer::class,
		LocationImporter::class,

		// Infrastructure
		CountryTaxonomy::class,
		DomainMaintainSettings::class,
		FacetWP::class,
		FourZeroFourSettings::class,
		GoogleMapsSettings::class,
		IconField::class,
		LocationImporterSettings::class,
		LocationFields::class,
		// Not currently using, so disabled.
//		LocationTaxonomy::class,
		Proxy::class,
		SearchWP::class,
		StateTaxonomy::class,
		TeamPostType::class,
		TestimonialPostType::class,
		TimeKitScript::class,
		SiteOptions::class,

		// Block(s)
		Blocks::class,
		Blocks\Announcement::class,
		Blocks\BookingForm::class,
		Blocks\ConditionIntro::class,
		Blocks\ConditionSymptomsCausesTreatments::class,
		Blocks\ConditionVideos::class,
		Blocks\CTA::class,
		Blocks\Feature::class,
		Blocks\Feed::class,
		Blocks\Form::class,
		Blocks\FormConfirmation::class,
		Blocks\Grid2Col::class,
		Blocks\Grid3Col::class,
		Blocks\Hero::class,
		Blocks\HeroLocation::class,
		Blocks\Locations::class,
		Blocks\Logos::class,
		Blocks\MediaFull::class,
		Blocks\Mosaic::class,
		Blocks\Reviews::class,
		Blocks\Team::class,
		Blocks\Testimonial::class,
		Blocks\TextOneColumn::class,
		Blocks\TextTwoColumns::class,

		// UI
		OpeningHours::class
	];
}
