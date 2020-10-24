<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f8f0b172d87a',
	'title' => 'Summary',
	'fields' => array(
		array(
			'key' => 'field_5f8f0b216bf4b',
			'label' => 'Page Summary',
			'name' => 'p_sum',
			'type' => 'textarea',
			'instructions' => 'Summary to be shown on related elements',
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
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'br',
			'acfe_textarea_code' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'all',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'wp_block',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'acf-widgets',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'gp_elements',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'wpcf7r_leads',
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
	'modified' => 1603536545,
));

endif;