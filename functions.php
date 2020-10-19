<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_tkm_enqueue_scripts() {
	if ( is_rtl() ) {
		//wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_tkm_enqueue_scripts', 100 );

// Avoid loading style.css of the child theme
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'generate-child' );
}, 50 );
// Add support for custom navigation menus.
register_nav_menus( array(
    'top_bar_nav'    => __( 'Custom Top Bar Nav', 'generatepress' ),
) );

/* ---------------------------------------------------------------------------
 * Styles
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkm_styles' ) )
{
	function tkm_styles()
	{
		// wp_enqueue_style ------------------------------------------------------
		wp_enqueue_style( 'tkm-google-fonts', 'https://fonts.googleapis.com/css?family=Assistant:300,400,500,600,700,800&display=swap&subset=hebrew', false ); 
		wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
		wp_enqueue_style( 'global', get_stylesheet_directory_uri() .'/assets/css/global.css', false );
		//wp_enqueue_style( 'aos', get_stylesheet_directory_uri() .'/assets/css/aos.css', false );
		//wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() .'/assets/css/jquery.fancybox.min.css', false );
		//wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
		wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() .'/assets/css/main.css', false );

		if ( class_exists( 'Sitepress', false ) ) { 
			if ( !is_rtl() ) {		
				wp_enqueue_style( 'style-ltr', get_stylesheet_directory_uri() .'/assets/css/main-ltr.css', false );
			}
		} 		

	}
}
add_action( 'wp_enqueue_scripts', 'tkm_styles', 99 );

//ENQUEUE BACKEND RESOURCES
function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_stylesheet_directory_uri() . '/assets/css/style-login.css', false );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

/* ---------------------------------------------------------------------------
 * Scripts
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkmnineteen_scripts' ) )
{
	function tkmnineteen_scripts()
	{
		// Custom ----------------------------------
		wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
		//wp_enqueue_script( 'gmapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDteU4kLMG25LuvR_Q5G0dTTyf6ZZxDgo4&language=he', array(), true );
		//wp_enqueue_script( 'acfmaps', get_stylesheet_directory_uri() . '/assets/js/acfmaps.js', array( 'jquery' ), null, true );
		// Main config -----------------------------
		
		if ( class_exists( 'Sitepress', false ) ) { 
			if ( !is_rtl() ) {		
				wp_enqueue_script( 'main-ltr', get_stylesheet_directory_uri() .'/assets/js/main-ltr.js', array( 'jquery' ), null, true );
			} else {
				wp_enqueue_script( 'main', get_stylesheet_directory_uri() .'/assets/js/essentials.js', array( 'jquery' ), null, true );
			}	
		} else {
			wp_enqueue_script( 'main', get_stylesheet_directory_uri() .'/assets/js/essentials.js', array( 'jquery' ), null, true );
		}	
		
	}
}
add_action( 'wp_enqueue_scripts', 'tkmnineteen_scripts' );

/* ---------------------------------------------------------------------------
 * Image Size | Add
 *
 * TIP: add_image_size ( string $name, int $width, int $height, bool|array $crop = false )
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkm_add_image_sizes' ) )
{
	function tkm_add_image_sizes() {

		// Content --------------------------------------------
		add_image_size( 'block-300', 300, 300, true );
		add_image_size( 'inside-post', 620, 425, true );
		add_image_size( 'inside-post-360', 360, 245, true );
		add_image_size( 'gallery-800', 800, 420, true );
		add_image_size( 'article-400', 400, 220, true );
		add_image_size( 'product-500', 500, 500 );
		add_image_size( 'product-830', 830, 630, true );
		add_image_size( 'product-500c', 500, 500, true );
		add_image_size( 'product-540', 540, 410, true );
		add_image_size( 'portrait', 320, 460, true );
		/* Menu Image */
		add_image_size( 'menu-50', 50, 50, true );
		add_image_size( 'menu-100', 100, 100, true );
		add_image_size( 'icon50', 100, 50 );

	}
}
add_action( 'after_setup_theme', 'tkm_add_image_sizes', 11 );

/**
 * Generatepress
 */
 
// add widget content wrapper to widget title
add_filter( 'generate_start_widget_title', function() {
    return '<h2 class="widget-title"><span>';
});

add_filter( 'generate_end_widget_title', function() {
    return '</span></h2>';
});


/* ---------------------------------------------------------------------------
 * Advanced Custom Fields - Custom Functions
 * --------------------------------------------------------------------------- */
// Speed up ACF backend loading time
// Source: https://www.advancedcustomfields.com/blog/acf-pro-5-5-13-update/
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// Advanced Custom Fields Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


/* ---------------------------------------------------------------------------
 * ACF Blocks
 * --------------------------------------------------------------------------- */
// Add Custom Blocks Panel in Gutenberg
add_filter( 'block_categories', 'acftkm_block_categories' );
function acftkm_block_categories( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'acftkm-blocks',
				'title' => __( 'TKM ACF Blocks', 'generatepress_tkm' ),
			),
		),
		$categories
	);
}

// ACF Register Blocks
add_action('acf/init', 'acftkm_blocks');
function acftkm_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a grid / slider block.
        acf_register_block_type(array(
            'name'              => 'acftkm-gridslide',
            'mode'				=> 'preview',
            'title'             => __('Grid/Slide'),
            'description'       => __(''),
            'render_template'	=> 'partials/block-gridslide.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m381.16 122.88h-250.31c-9.426 0-17.067 7.64-17.067 17.067v232.11c0 9.426 7.64 17.067 17.067 17.067h250.31c9.426 0 17.067-7.64 17.067-17.067v-232.11c0-9.427-7.64-17.067-17.066-17.067zm-17.067 232.11h-216.18v-197.97h216.18v197.97z"></path><path d="m73.956 151.32c-9.427 0-17.067 7.64-17.067 17.067v175.22c0 9.427 7.64 17.067 17.067 17.067 9.426 0 17.067-7.64 17.067-17.067v-175.22c-1e-3 -9.426-7.641-17.067-17.067-17.067z"></path><path d="m17.067 179.77c-9.427 0-17.067 7.64-17.067 17.067v118.33c0 9.426 7.64 17.067 17.067 17.067s17.067-7.64 17.067-17.067v-118.33c-1e-3 -9.427-7.641-17.067-17.067-17.067z"></path><path d="m438.04 151.32c-9.426 0-17.067 7.64-17.067 17.067v175.22c0 9.427 7.64 17.067 17.067 17.067s17.067-7.64 17.067-17.067v-175.22c0-9.426-7.64-17.067-17.067-17.067z"></path><path d="m494.93 179.77c-9.426 0-17.067 7.64-17.067 17.067v118.33c0 9.426 7.64 17.067 17.067 17.067s17.067-7.641 17.067-17.068v-118.33c0-9.427-7.64-17.067-17.067-17.067z"></path></svg>',
            'enqueue_assets' => function(){
	            wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
	            wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
	            wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
			},
        ));

        // register a image block.
        acf_register_block_type(array(
            'name'              => 'acftkm-image',
            'mode'				=> 'preview',
            'title'             => __('Advanced Image'),
            'description'       => __(''),
            'render_template'	=> 'partials/block-image.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><rect y="18" width="24" height="2"></rect><rect y="22" width="17.6" height="2"></rect><path d="M0,0v16h24V0H0z M22,2v6.59l-2.5-2.5L16,9.59l-6-6l-8,8V2H22z M2.41,14L10,6.41l6,6l3.5-3.5l2.5,2.5V14H2.41z"></path></svg>',
            'enqueue_assets' => function(){
	            wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
	            wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
	            wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
			},
        ));
        
        // register a styled title block.
        acf_register_block_type(array(
            'name'              => 'acftkm-title',
            'mode'				=> 'preview',
            'title'             => __('Advanced Title'),
            'description'       => __(''),
            'render_template'	=> 'partials/block-title.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M5.22,12.67h1.87v6.01c0,0.53-0.06,1.07-0.18,1.58c-0.1,0.45-0.29,0.87-0.55,1.25c-0.24,0.34-0.56,0.62-0.94,0.81	c-0.42,0.2-0.89,0.3-1.36,0.29c-0.23,0.01-0.45-0.03-0.66-0.11c-0.17-0.07-0.32-0.16-0.46-0.28c-0.12-0.11-0.22-0.23-0.31-0.36	c-0.08-0.13-0.15-0.25-0.21-0.36c-0.05-0.1-0.11-0.2-0.18-0.29c-0.04-0.07-0.12-0.11-0.2-0.11c-0.12,0-0.24,0.03-0.33,0.1	c-0.1,0.07-0.18,0.16-0.25,0.26c-0.07,0.11-0.12,0.22-0.15,0.34c-0.03,0.12-0.05,0.25-0.05,0.37c0.01,0.18,0.09,0.34,0.22,0.46	c0.17,0.16,0.37,0.28,0.59,0.36c0.27,0.11,0.56,0.19,0.85,0.24c0.33,0.06,0.66,0.09,1,0.09c0.86,0.01,1.73-0.11,2.56-0.34	c0.75-0.2,1.46-0.55,2.08-1.03c0.59-0.46,1.06-1.05,1.39-1.73c0.35-0.76,0.53-1.59,0.51-2.43v-5.11h3.77v5.83	c0,0.26,0.03,0.52,0.08,0.77c0.05,0.25,0.16,0.48,0.31,0.68c0.18,0.22,0.41,0.38,0.67,0.49c0.36,0.14,0.74,0.2,1.13,0.18	c0.29,0,0.58-0.03,0.87-0.1c0.27-0.06,0.53-0.14,0.78-0.25c0.23-0.09,0.45-0.2,0.67-0.32c0.2-0.11,0.38-0.22,0.53-0.32l-0.17-0.38	c-0.12,0.06-0.27,0.13-0.43,0.19c-0.17,0.07-0.35,0.1-0.53,0.1c-0.15,0.01-0.3-0.06-0.4-0.18c-0.09-0.14-0.14-0.31-0.13-0.48v-6.23	h2.06v-0.9h-2.06V6.48c0-0.85,0.02-1.6,0.06-2.26c0.02-0.56,0.11-1.11,0.25-1.65c0.1-0.38,0.29-0.72,0.56-1	c0.27-0.24,0.63-0.36,1-0.34c0.16,0,0.32,0.04,0.46,0.11c0.13,0.08,0.25,0.17,0.35,0.28c0.1,0.11,0.2,0.24,0.28,0.37	c0.08,0.13,0.17,0.26,0.25,0.37c0.08,0.11,0.17,0.2,0.27,0.28c0.09,0.07,0.21,0.11,0.33,0.11c0.08,0,0.15-0.02,0.22-0.07	c0.07-0.05,0.14-0.11,0.19-0.18c0.11-0.16,0.17-0.35,0.17-0.54c0-0.23-0.08-0.44-0.24-0.61c-0.18-0.19-0.39-0.34-0.63-0.44	c-0.3-0.13-0.61-0.21-0.92-0.26c-0.37-0.06-0.74-0.09-1.11-0.09c-0.59,0-1.17,0.12-1.71,0.34c-0.6,0.24-1.13,0.62-1.56,1.1	c-0.5,0.57-0.89,1.23-1.14,1.94c-0.32,0.93-0.46,1.9-0.44,2.88v4.93h-3.77V5.72c0-0.14-0.02-0.27-0.04-0.41	c-0.04-0.18-0.13-0.35-0.26-0.47c-0.2-0.18-0.43-0.31-0.69-0.38C9.03,4.33,8.59,4.28,8.15,4.3c-0.51,0-1.02,0.04-1.52,0.12	C6.14,4.49,5.65,4.61,5.18,4.77c-0.45,0.15-0.89,0.35-1.3,0.59c-0.39,0.22-0.74,0.5-1.05,0.82C2.54,6.5,2.3,6.86,2.13,7.25	C1.96,7.66,1.87,8.1,1.87,8.55c0,0.29,0.05,0.58,0.14,0.85c0.09,0.26,0.23,0.5,0.42,0.7c0.19,0.2,0.42,0.36,0.67,0.47	c0.49,0.2,1.03,0.22,1.53,0.07c0.21-0.06,0.4-0.16,0.57-0.3c0.17-0.14,0.31-0.31,0.41-0.5c0.11-0.22,0.17-0.46,0.16-0.71	C5.79,8.96,5.76,8.79,5.7,8.64C5.65,8.52,5.59,8.41,5.5,8.31C5.43,8.24,5.34,8.18,5.24,8.14C5.16,8.1,5.07,8.08,4.98,8.08	c-0.1,0-0.19,0.03-0.27,0.09L4.46,8.35c-0.1,0.07-0.2,0.13-0.3,0.19C4.03,8.6,3.88,8.63,3.74,8.62c-0.06,0-0.11-0.01-0.17-0.02	C3.49,8.58,3.41,8.54,3.34,8.48C3.25,8.4,3.19,8.3,3.14,8.19C3.08,8.02,3.05,7.84,3.05,7.66c0-0.25,0.06-0.49,0.18-0.71	c0.13-0.22,0.29-0.42,0.48-0.6c0.2-0.18,0.43-0.35,0.67-0.48c0.24-0.14,0.49-0.25,0.74-0.35c0.23-0.09,0.46-0.16,0.7-0.22	C6.01,5.27,6.2,5.24,6.38,5.24c0.09,0,0.19,0.01,0.28,0.03c0.08,0.01,0.16,0.05,0.22,0.1C6.95,5.42,7,5.49,7.03,5.57	c0.04,0.12,0.06,0.24,0.05,0.36v5.83H5.22V12.67L5.22,12.67z"></path></svg>',
            'enqueue_assets' => function(){
	            wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
	            wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
	            wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
			},
        ));
        // register a form block.
        acf_register_block_type(array(
            'name'              => 'acftkm-form',
            'mode'				=> 'preview',
            'title'             => __('Form'),
            'description'       => __(''),
            'render_template'	=> 'partials/block-form.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m436 440.269c-4.143 0-7.5 3.358-7.5 7.5v36.731c0 6.893-5.607 12.5-12.5 12.5h-320c-6.893 0-12.5-5.607-12.5-12.5v-388.731c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v388.731c0 15.164 12.336 27.5 27.5 27.5h320c15.163 0 27.5-12.336 27.5-27.5v-36.731c0-4.142-3.357-7.5-7.5-7.5z"/><path d="m441.304 142.197-140-140c-1.408-1.407-3.315-2.197-5.304-2.197h-200c-15.164 0-27.5 12.336-27.5 27.5v35.859c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-35.859c0-6.893 5.607-12.5 12.5-12.5h192.5v112.5c0 15.164 12.337 27.5 27.5 27.5h112.5v260.769c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-268.269c0-1.989-.79-3.897-2.196-5.303zm-137.804-14.697v-101.894l114.394 114.394h-101.894c-6.893 0-12.5-5.607-12.5-12.5z"/><path d="m159 257.5c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5-22.5 10.093-22.5 22.5 10.093 22.5 22.5 22.5zm0-30c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5-7.5-3.364-7.5-7.5 3.364-7.5 7.5-7.5z"/><path d="m227 257.5h126c12.406 0 22.5-10.093 22.5-22.5s-10.094-22.5-22.5-22.5h-126c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5zm0-30h126c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5h-126c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5z"/><path d="m159 317.5c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5-22.5 10.093-22.5 22.5 10.093 22.5 22.5 22.5zm0-30c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5-7.5-3.364-7.5-7.5 3.364-7.5 7.5-7.5z"/><path d="m227 317.5h126c12.406 0 22.5-10.093 22.5-22.5s-10.094-22.5-22.5-22.5h-126c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5zm0-30h126c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5h-126c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5z"/><path d="m159 377.5c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5-22.5 10.093-22.5 22.5 10.093 22.5 22.5 22.5zm0-30c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5-7.5-3.364-7.5-7.5 3.364-7.5 7.5-7.5z"/><path d="m227 377.5h13.231c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-13.231c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5h126c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5h-80.77c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h80.77c12.406 0 22.5-10.093 22.5-22.5s-10.094-22.5-22.5-22.5h-126c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5z"/></g></g></svg>',
            'enqueue_assets' => function(){
	            wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
	            wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
	            wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
			},
        ));

    }
    
}