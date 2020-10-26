<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_generatepress_tkm() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( '47c1358b-a99f-48d5-8d70-c72eee84790f', 'GeneratePress TKM', __FILE__ );

    // Active insights
    $client->insights()->init();

    // Active automatic updater
    $client->updater();

    // Active license page and checker
    $args = array(
        'type'       => 'options',
        'menu_title' => 'GeneratePress TKM',
        'page_title' => 'GeneratePress TKM Settings',
        'menu_slug'  => 'generatepress_tkm_settings',
    );
    $client->license()->add_settings_page( $args );

	global $generatepress_tkm_license;
	$generatepress_tkm_license = $client->license();
	//$generatepress_tkm_license->add_settings_page( $args );

	if ( $generatepress_tkm_license->is_valid()  ) {
		// TGM
		if( is_admin() ){
			include_once get_stylesheet_directory() .'/inc/class-mfn-tgmpa.php';
		}
		// ACF Fields
		require_once( get_stylesheet_directory() . '/inc/acf-blocks-site.php' );

	} else {
		// Hide the ACF admin menu item.
		add_filter('acf/settings/show_admin', 'tkm_acf_settings_show_admin');
		function tkm_acf_settings_show_admin( $show_admin ) {
		    return false;
		}
	}

}

appsero_init_tracker_generatepress_tkm();


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
		//wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() .'/assets/css/main.css', false );

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