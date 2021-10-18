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

namespace EverythingItTakes\Plugin\Application;

use EverythingItTakes\Plugin\Registerable;

final class BlockRandomizer implements Registerable {

	public function register(): void {
		add_action( 'acf/init', [ $this, 'register_block_checkbox' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_script' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ] );
	}

	public static function is_block_random(): bool {
		return get_field( 'nd_randomize' ) ?: false;
	}

	public function enqueue_style() {
		if ( ! is_page_template( 'page-templates/blocks.php' ) ) {
			return;
		}

		$css_path    = 'css/block-randomizer.css';
		$css_url     = EIT_PLUGIN_URL . '/' . $css_path;
		$css_version = filemtime( EIT_PLUGIN_DIR . $css_path );

		wp_enqueue_style( 'nd-block-randomizer', $css_url, [], $css_version );
	}

	public function enqueue_script() {
		if ( ! is_page_template( 'page-templates/blocks.php' ) ) {
			return;
		}

		$js_path    = 'js/block-randomizer.js';
		$js_url     = EIT_PLUGIN_URL . '/' . $js_path;
		$js_version = filemtime( EIT_PLUGIN_DIR . $js_path );

		wp_enqueue_script( 'nd-block-randomizer', $js_url, [ 'jquery' ], $js_version, false );
	}

	public function register_block_checkbox(): void {
		acf_add_local_field_group( array(
			'key'                   => 'group_616d4a5583356',
			'title'                 => 'Randomize',
			'fields'                => array(
				array(
					'key'               => 'field_616d4a6477b85',
					'label'             => 'Randomize?',
					'name'              => 'nd_randomize',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => 'Block will be randomized with other blocks of the same type, after any Block Visibility rules have been applied',
					'default_value'     => 0,
					'ui'                => 0,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/nd-care-spotlight-service',
					),
				),
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/nd-hero',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'side',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		) );
	}

}
