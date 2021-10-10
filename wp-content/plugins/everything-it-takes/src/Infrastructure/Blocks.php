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

use EverythingItTakes\Plugin\Registerable;

final class Blocks implements Registerable {

	const CATEGORY = 'ut-health';

	const ICON = '<svg width="466" height="703" viewBox="0 0 466 703" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g style="mix-blend-mode:multiply">
                    <path d="M232.594 0.182433C221.148 0.125575 210.015 4.04876 200.982 11.3225C191.949 18.5963 185.539 28.7989 182.78 40.2935H153.706V58.0426C153.706 58.0426 149.636 71.4798 127.249 84.917C110.865 93.3853 92.7418 97.6175 74.4311 97.2512H59.8941V121.017H0.970632V193.417H232.594V0.182433ZM232.594 702.126C201.871 685.583 172.334 666.783 144.209 645.87C86.0318 603.923 42.841 543.302 21.3225 473.393C7.06235 423.386 -0.119261 371.504 0.00149786 319.366V217.183H232.594V702.126Z" fill="#E05E1F"/>
                    <path d="M464.218 193.236H232.594V0.000609435C244.04 -0.0562491 255.173 3.86694 264.206 11.1407C273.24 18.4145 279.65 28.6171 282.408 40.1117H311.482V57.8608C311.482 57.8608 315.552 71.298 337.939 84.7352C354.323 93.2035 372.446 97.4357 390.757 97.0694H405.003V120.835H464.218V193.236ZM232.594 701.944C263.317 685.401 292.854 666.601 320.979 645.688C379.156 603.741 422.347 543.121 443.866 473.211C458.126 423.204 465.307 371.323 465.187 319.184V217.001H232.594V701.944Z" fill="#B34B19"/>
                    <path d="M88.3867 381.538L177.547 447.421L143.434 553.916L232.594 488.033V275.043L198.577 381.538H88.3867Z" fill="white"/>
                    <path d="M321.755 553.916L287.641 447.421L376.802 381.538H266.611L232.594 275.043V488.033L321.755 553.916Z" fill="white"/>
                </g>
            </svg>';


	public function register(): void {
		add_filter( 'block_categories', [ $this, 'register_category' ] );

		add_action( 'after_setup_theme', [ $this, 'removeCorePatterns' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_admin_block_styles' ] );
	}

	public static function get_brand_icon(): string {
		return self::ICON;
	}

	public function enqueue_admin_block_styles(): void {
		$css_path    = 'css/admin/blocks.css';
		$css_url     = EIT_PLUGIN_URL . '/' . $css_path;
		$css_version = filemtime( EIT_PLUGIN_DIR . $css_path );

		wp_enqueue_style( 'nd-admin-blocks', $css_url, array(), $css_version, 'all' );
	}

	/**
	 *
	 * @url https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
	 * @url https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 *
	 * @param $categories
	 *
	 * @return array
	 */
	public function register_category( $categories ): array {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => self::CATEGORY,
					'title' => 'UT Health',
				),
			)
		);
	}

	/**
	 * Remove 'Core' Block Patterns.
	 *
	 * @url https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
	 */
	public function removeCorePatterns(): void {
		remove_theme_support( 'core-block-patterns' );
	}

}
