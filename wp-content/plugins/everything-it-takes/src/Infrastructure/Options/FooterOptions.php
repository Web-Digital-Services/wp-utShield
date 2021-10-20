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

final class FooterOptions implements Registerable {

	const SLUG = 'tadxp_footer';

	const TEXT = self::SLUG . '_text';
	const COPYRIGHT = self::SLUG . '_copyright';

	/**
	 * Registers with the Advanced Custom Fields init hook.
	 */
	public function register(): void {
		add_action( 'acf/init', [ $this, 'register_options_page' ] );
		add_action( 'acf/init', [ $this, 'register_settings' ] );
	}

	public function register_options_page(): void {
		$args = [
			'page_title'  => __( 'Footer' ),
			'menu_title'  => __( 'Footer' ),
			'parent_slug' => 'acf-options-site-options',
		];

		acf_add_options_sub_page( $args );
	}

	public function register_settings(): void {
		acf_add_local_field_group( array(
			'key'                   => 'group_' . self::SLUG,
			'title'                 => 'Footer',
			'fields'                => array(
				array(
					'key'               => 'field_' . self::TEXT,
					'label'             => 'Text',
					'name'              => self::TEXT,
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_' . self::COPYRIGHT,
					'label'             => 'Copyright',
					'name'              => self::COPYRIGHT,
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'acf-options-footer',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		) );
	}

}
