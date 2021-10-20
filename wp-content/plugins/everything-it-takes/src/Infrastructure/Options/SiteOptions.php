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

namespace EverythingItTakes\Plugin\Infrastructure\Options;

use EverythingItTakes\Plugin\Registerable;

final class SiteOptions implements Registerable {

	/**
	 * Registers with the Advanced Custom Fields init hook.
	 */
	public function register(): void {
		// 9 so it doesn't register befor subpages.
		add_action( 'acf/init', [ $this, 'register_site_settings_page' ], 9 );
	}

	/**
	 * Registers the Site Settings page with Advanced Custom Fields.
	 *
	 * @since 1.0.0
	 */
	public function register_site_settings_page(): void {
		// Redirect = false if you want to use the parent page as a page + sub pages.
		acf_add_options_page( [ 'page_title' => 'Site Options', 'redirect' => true ] );
	}

}
