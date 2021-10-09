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

	const ICON = '<svg width="466" height="550" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M232.594-10.823A51.004 51.004 0 00200.982-.034a51.197 51.197 0 00-18.202 28.058h-29.074v17.19s-4.07 13.014-26.457 26.027a113.096 113.096 0 01-52.818 11.946H59.894v23.017H.971v70.119h231.623V-10.823zm0 679.823a724.441 724.441 0 01-88.385-54.483C86.032 573.892 42.841 515.182 21.323 447.475A523.712 523.712 0 010 298.302v-98.963h232.593V669z" fill="#E05E1F"/><path d="M464.218 176.146H232.594V-10.999A51.004 51.004 0 01264.206-.21a51.186 51.186 0 0118.202 28.058h29.074v17.19s4.07 13.013 26.457 26.027a113.095 113.095 0 0052.818 11.945h14.246v23.017h59.215v70.119zM232.594 668.824a724.565 724.565 0 0088.385-54.483c58.177-40.625 101.368-99.335 122.887-167.042a523.744 523.744 0 0021.321-149.173v-98.963H232.594v469.661z" fill="#B34B19"/><path d="M88.387 358.515l89.16 63.806-34.113 103.139 89.16-63.806V255.376l-34.017 103.139H88.387zM321.755 525.46l-34.114-103.139 89.161-63.806H266.611l-34.017-103.139v206.278l89.161 63.806z" fill="#fff"/></svg>';


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
