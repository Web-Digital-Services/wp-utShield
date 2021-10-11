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

namespace EverythingItTakes\Plugin\Infrastructure\Blocks;

use EverythingItTakes\Plugin\Infrastructure\ACFBlock;

final class FeaturedCTA extends ACFBlock {

	public function register(): void {
		parent::register();

		add_action( 'acf/init', [ $this, 'register_repeater_fields' ] );
	}

	public function get_args(): array {
		$args = parent::get_args();

		$args['slides'] = get_field( 'gallery' ) ?: [];

		return $args;
	}

	public function get_slug(): string {
		return 'nd_featured_cta';
	}

	public function get_title(): string {
		return 'Featured CTA';
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'eyebrow',
				'label' => 'Eyebrow',
				'type'  => 'text'
			],
			[
				'key'   => 'title',
				'label' => 'Title',
				'type'  => 'textarea'
			],
			[
				'key'   => 'text',
				'label' => 'Text',
				'type'  => 'textarea'
			],
			[
				'key'   => 'cta_1',
				'label' => 'CTA #1',
				'type'  => 'link',
				'width' => 50,
			],
			[
				'key'   => 'cta_2',
				'label' => 'CTA #2',
				'type'  => 'link',
				'width' => 50,
			],
		];
	}

	public function register_repeater_fields(): void {
		acf_add_local_field_group( array(
			'key'                   => 'group_61641f8261908',
			'title'                 => 'Gallery',
			'fields'                => array(
				array(
					'key'               => 'field_61641f8720c0d',
					'label'             => 'Gallery',
					'name'              => 'gallery',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'collapsed'         => '',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'table',
					'button_label'      => 'Add Slide',
					'sub_fields'        => array(
						array(
							'key'               => 'field_61641fb920c0f',
							'label'             => 'Image',
							'name'              => 'image_id',
							'type'              => 'image',
							'instructions'      => '',
							'required'          => 1,
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
							'return_format'     => 'id',
						),
						array(
							'key'               => 'field_61641fccb5c4f',
							'label'             => 'Video',
							'name'              => 'video',
							'type'              => 'url',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'width'             => '',
							'height'            => '',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'acf/nd-featured-cta',
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


