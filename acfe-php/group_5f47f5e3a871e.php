<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f47f5e3a871e',
	'title' => 'Widget - Social Icons',
	'fields' => array(
		array(
			'key' => 'field_5f47f6094b414',
			'label' => 'Icons',
			'name' => 'wsi',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'acfe_repeater_stylised_button' => 0,
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5f47f5e3b8598',
					'label' => 'Icon',
					'name' => 'ico',
					'type' => 'font-awesome',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_permissions' => '',
					'icon_sets' => array(
						0 => 'fas',
						1 => 'far',
						2 => 'fal',
						3 => 'fad',
						4 => 'fab',
					),
					'custom_icon_set' => '',
					'default_label' => '',
					'default_value' => '',
					'save_format' => 'element',
					'allow_null' => 1,
					'show_preview' => 1,
					'enqueue_fa' => 0,
					'fa_live_preview' => '',
					'choices' => array(
					),
				),
				array(
					'key' => 'field_5f47f5e3b85e0',
					'label' => 'Icon Color',
					'name' => 'icoc',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_permissions' => '',
					'default_value' => '',
				),
				array(
					'key' => 'field_5f47f5e3b8624',
					'label' => 'Icon Image',
					'name' => 'icoim',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_permissions' => '',
					'acfe_uploader' => 'wp',
					'acfe_thumbnail' => 0,
					'return_format' => 'id',
					'preview_size' => 'menu-50',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f47f5e3b86a7',
					'label' => 'Icon Size',
					'name' => 'fosz',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_permissions' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5f47f5e3b87ef',
					'label' => 'Link / Url',
					'name' => 'url',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f47f6094b414',
								'operator' => '!=empty',
							),
						),
						array(
							array(
								'field' => 'field_5f47f6094b414',
								'operator' => '!=empty',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_permissions' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'widget',
				'operator' => '==',
				'value' => 'acf_widget_20098',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_permissions' => '',
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1598552166,
));

endif;