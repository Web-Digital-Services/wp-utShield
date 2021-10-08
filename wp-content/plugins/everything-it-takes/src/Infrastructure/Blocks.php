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

	const ICON = '<svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="512" height="512" rx="20" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M218.371 127.751C213.588 120.429 211.999 112.153 211.999 101.999C211.999 84.364 224.574 62.025 240.057 62.025H243.443C264.185 62.025 275.568 101.343 258.442 125.89C247.338 141.806 229.272 144.449 218.371 127.751ZM269.077 123.936C269.077 133.268 269.979 142.135 278.185 147.905C289.092 155.578 307.024 145.128 311.843 124.13C313.915 115.093 312.821 101.367 305.101 95.4341C287.891 82.2096 269.077 107.183 269.077 123.936ZM187.706 222.997C182.522 214.719 182.003 205.568 182.003 195.596C182.003 185.207 187.146 174.829 191.601 168.707C203.396 152.501 223.956 147.583 243.546 152.102C266.729 157.447 288.372 173.504 302.528 192.601L309.814 203.296C310.885 205.021 312.019 207.046 312.945 208.914C321.451 226.07 324.228 236.701 324.228 257.506C324.228 271.991 317.319 288.659 310.797 296.621C310.303 297.225 309.827 297.821 309.356 298.411L309.351 298.416L309.35 298.418L309.35 298.418C307.884 300.253 306.474 302.018 304.767 303.706C292.386 315.939 269.237 323.214 258.083 308.076C253.527 301.89 251.893 295.155 250.219 288.253C247.896 278.676 245.495 268.776 235.099 259.574C234.551 259.088 234.135 258.668 233.736 258.264L233.736 258.263L233.735 258.263L233.735 258.263C233.177 257.698 232.649 257.164 231.833 256.528C229.344 254.586 227.015 252.843 224.189 251.069C221.423 249.333 218.74 247.975 215.702 246.459C204.073 240.658 194.598 234.007 187.706 222.997ZM353.859 235.204C349.89 239.694 346.444 241.907 340.193 241.907C330.251 241.907 327.993 225.96 339.547 216.393C354.737 203.812 366.03 221.437 353.859 235.204ZM331.342 137.726C346.988 145.731 335.122 180.484 315.519 180.484C304.589 180.484 300.227 167.497 304.322 155.064C306.526 148.379 311.908 141.336 318.08 138.218C322.549 135.961 326.619 135.309 331.342 137.726ZM324.226 198.52V201.445C324.226 206.106 328.324 210.709 332.934 210.709C339.18 210.709 344.182 208.283 347.729 203.681C352.517 197.468 356.522 188.759 351.14 181.637C350.227 180.425 349.559 180.007 348.119 179.318C337.193 174.103 324.226 188 324.226 198.52Z" fill="#273252"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M216.562 320.705C251.95 320.705 280.636 349.613 280.636 385.274C280.636 420.933 251.95 449.841 216.562 449.841C181.175 449.841 152.488 420.933 152.488 385.274C152.488 349.613 181.175 320.705 216.562 320.705Z" fill="#273252"/>
</svg>';


	public function register(): void {
		add_filter( 'block_categories', [ $this, 'register_category' ] );

		add_action( 'after_setup_theme', [ $this, 'removeCorePatterns' ] );
//		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_admin_block_styles' ] );
	}

	public static function get_brand_icon(): string {
		return self::ICON;
	}

//	public function enqueue_admin_block_styles(): void {
//		$css_path    = 'css/admin/blocks.css';
//		$css_url     = EIT_PLUGIN_URL . '/' . $css_path;
//		$css_version = filemtime( EIT_PLUGIN_DIR . $css_path );
//
//		wp_enqueue_style( 'nd-admin-blocks', $css_url, array(), $css_version, 'all' );
//	}

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
