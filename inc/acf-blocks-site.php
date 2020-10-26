<?php
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
            'mode'				=> 'edit',
            'title'             => __('Grid/Slide'),
            'description'       => __(''),
            'render_template'	=> 'partials/blocks/block-gridslide.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m381.16 122.88h-250.31c-9.426 0-17.067 7.64-17.067 17.067v232.11c0 9.426 7.64 17.067 17.067 17.067h250.31c9.426 0 17.067-7.64 17.067-17.067v-232.11c0-9.427-7.64-17.067-17.066-17.067zm-17.067 232.11h-216.18v-197.97h216.18v197.97z"></path><path d="m73.956 151.32c-9.427 0-17.067 7.64-17.067 17.067v175.22c0 9.427 7.64 17.067 17.067 17.067 9.426 0 17.067-7.64 17.067-17.067v-175.22c-1e-3 -9.426-7.641-17.067-17.067-17.067z"></path><path d="m17.067 179.77c-9.427 0-17.067 7.64-17.067 17.067v118.33c0 9.426 7.64 17.067 17.067 17.067s17.067-7.64 17.067-17.067v-118.33c-1e-3 -9.427-7.641-17.067-17.067-17.067z"></path><path d="m438.04 151.32c-9.426 0-17.067 7.64-17.067 17.067v175.22c0 9.427 7.64 17.067 17.067 17.067s17.067-7.64 17.067-17.067v-175.22c0-9.426-7.64-17.067-17.067-17.067z"></path><path d="m494.93 179.77c-9.426 0-17.067 7.64-17.067 17.067v118.33c0 9.426 7.64 17.067 17.067 17.067s17.067-7.641 17.067-17.068v-118.33c0-9.427-7.64-17.067-17.067-17.067z"></path></svg>',
            'enqueue_assets' => function(){
	            wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
	            wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
	            wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
			},
        ));

       // register a grid / slider block.
        acf_register_block_type(array(
            'name'              => 'acftkm-products',
            'mode'				=> 'edit',
            'title'             => __('Products'),
            'description'       => __(''),
            'render_template'	=> 'partials/blocks/block-products.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g><g><path d="M480.451,40.081H31.549C14.152,40.081,0,54.233,0,71.629v304.613c0,17.396,14.152,31.548,31.549,31.548h151.826
			l-6.141,49.129H151.79c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h208.42c4.143,0,7.5-3.358,7.5-7.5
			c0-4.142-3.357-7.5-7.5-7.5h-25.443l-6.142-49.129h151.826c17.396,0,31.549-14.152,31.549-31.548V71.629
			C512,54.233,497.848,40.081,480.451,40.081z M192.351,456.919l6.142-49.129h27.603l2.708,10.83
			c3.126,12.503,14.31,21.234,27.197,21.234c12.887,0,24.071-8.731,27.197-21.234l2.708-10.83h27.603l6.14,49.129H192.351z
			 M241.557,407.79h28.885l-1.798,7.192c-1.453,5.813-6.652,9.872-12.645,9.872s-11.191-4.06-12.645-9.872L241.557,407.79z
			 M497,376.242L497,376.242c0,9.125-7.424,16.548-16.549,16.548H31.549c-9.125,0-16.549-7.423-16.549-16.548V71.629
			c0-9.125,7.424-16.548,16.549-16.548h448.902c9.125,0,16.549,7.423,16.549,16.548V376.242z"/></g>
</g><g><g><path d="M424.338,72.146H39.564c-4.143,0-7.5,3.357-7.5,7.5v288.58c0,4.143,3.357,7.5,7.5,7.5h16.033c4.143,0,7.5-3.357,7.5-7.5
			c0.001-4.142-3.357-7.5-7.499-7.5h-8.533V87.146h377.273c4.143,0,7.5-3.358,7.5-7.5C431.838,75.503,428.481,72.146,424.338,72.146
			z"/></g></g><g><g><path d="M472.436,72.146h-16.033c-4.143,0-7.5,3.357-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h8.533v273.58H87.662
			c-4.143,0-7.5,3.358-7.5,7.5c0,4.143,3.357,7.5,7.5,7.5h384.773c4.143,0,7.5-3.357,7.5-7.5V79.646
			C479.936,75.503,476.578,72.146,472.436,72.146z"/></g></g><g><g><path d="M358.1,155.184c-1.348-1.723-3.381-2.771-5.565-2.87l-176.354-8.017c-0.138-0.006-0.273-0.009-0.412-0.007
			c-1.044-3.427-3.25-6.399-6.236-8.391l-21.597-14.398c-3.446-2.297-8.103-1.366-10.4,2.081c-2.297,3.447-1.366,8.103,2.08,10.4
			l21.596,14.396c0.102,0.068,0.177,0.171,0.211,0.289l27.509,96.281c0.858,3.002,2.27,5.7,4.083,8.03l-10.065,20.13
			c-2.423,4.845-2.169,10.488,0.679,15.096c1.033,1.671,2.343,3.094,3.848,4.234c-1.97,3.439-3.103,7.417-3.103,11.657
			c0,12.976,10.557,23.532,23.532,23.532c12.975,0,23.532-10.557,23.532-23.532c0-3.009-0.574-5.885-1.608-8.532h68.377
			c-1.034,2.647-1.608,5.523-1.608,8.532c0,12.976,10.557,23.532,23.532,23.532c12.975,0,23.532-10.557,23.532-23.532
			c0-3.764-0.893-7.321-2.471-10.479c1.514-1.372,2.471-3.348,2.471-5.553c0-4.142-3.357-7.5-7.5-7.5H196.825
			c-0.107,0-0.288,0-0.439-0.245c-0.151-0.244-0.07-0.405-0.022-0.502l9.272-18.543c1.887,0.485,3.853,0.747,5.865,0.747
			c0.927,0,1.863-0.055,2.805-0.165l105.386-12.398c13.611-1.602,24.562-11.706,27.25-25.146l12.606-63.034
			C359.977,159.132,359.448,156.907,358.1,155.184z M320.129,295.565c4.705,0,8.532,3.828,8.532,8.532
			c0,4.705-3.827,8.532-8.532,8.532s-8.532-3.827-8.532-8.532S315.424,295.565,320.129,295.565z M207.904,295.565
			c4.705,0,8.532,3.827,8.532,8.532c0,4.705-3.827,8.532-8.532,8.532c-4.705,0-8.532-3.827-8.532-8.532
			S203.199,295.565,207.904,295.565z M189.512,192.387l-9.399-32.895l29.985,1.363l5.199,31.532H189.512z M212.554,246.958
			c-4.182,0.492-8.047-2.087-9.201-6.13l-9.555-33.441h23.972l6.301,38.216L212.554,246.958z M256.517,241.786l-17.532,2.063
			l-6.011-36.461h23.543V241.786z M256.517,192.387H230.5l-5.084-30.835l31.101,1.414V192.387z M294.499,237.317l-22.982,2.704
			v-32.634h25.691L294.499,237.317z M298.566,192.387h-27.049v-28.74l29.529,1.342L298.566,192.387z M332.232,221.371
			c-1.41,7.048-7.154,12.349-14.293,13.189l-8.217,0.967l2.547-28.139h22.759L332.232,221.371z M338.029,192.387h-24.401
			l2.418-26.716l27.08,1.231L338.029,192.387z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>',
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
            'render_template'	=> 'partials/blocks/block-image.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg height="511pt" viewBox="1 -34 511.999 511" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m415.058594 49.683594c-28.46875 0-51.628906 23.160156-51.628906 51.628906s23.160156 51.628906 51.628906 51.628906 51.628906-23.160156 51.628906-51.628906-23.160156-51.628906-51.628906-51.628906zm0 88.226562c-20.183594 0-36.597656-16.417968-36.597656-36.597656s16.417968-36.597656 36.597656-36.597656c20.179687 0 36.597656 16.417968 36.597656 36.597656s-16.417969 36.597656-36.597656 36.597656zm0 0"/><path d="m473.679688.5h-380.390626c-21.128906 0-38.316406 17.1875-38.316406 38.316406v18.859375h-16.652344c-21.128906 0-38.320312 17.1875-38.320312 38.320313v309.46875c0 21.132812 17.191406 38.320312 38.320312 38.320312h251.746094c4.152344 0 7.515625-3.363281 7.515625-7.515625 0-4.148437-3.363281-7.511719-7.515625-7.511719h-251.746094c-12.84375 0-23.292968-10.449218-23.292968-23.292968v-309.46875c0-12.84375 10.449218-23.292969 23.292968-23.292969h16.652344v275.589844c0 21.128906 17.1875 38.316406 38.316406 38.316406h348.710938v18.855469c0 12.84375-10.449219 23.292968-23.289062 23.292968h-81.050782c-4.152344 0-7.515625 3.363282-7.515625 7.511719 0 4.152344 3.363281 7.515625 7.515625 7.515625h81.050782c21.128906 0 38.316406-17.1875 38.316406-38.320312v-18.855469h16.652344c21.128906 0 38.320312-17.1875 38.320312-38.316406v-309.476563c0-21.128906-17.191406-38.316406-38.320312-38.316406zm23.292968 281.925781-100.167968-112.882812c-2.277344-2.570313-5.558594-4.105469-8.992188-4.207031-3.429688-.125-6.800781 1.230468-9.230469 3.660156l-62.109375 62.082031-82.105468-92.53125c-2.277344-2.570313-5.558594-4.101563-8.992188-4.203125-3.46875-.125-6.800781 1.230469-9.230469 3.660156l-58.222656 58.195313c-2.9375 2.933593-2.9375 7.691406-.003906 10.628906 2.933593 2.9375 7.691406 2.933594 10.625 0l56.347656-56.316406 106.714844 120.265625c1.484375 1.671875 3.550781 2.523437 5.625 2.523437 1.773437 0 3.554687-.621093 4.984375-1.890625 3.105468-2.757812 3.386718-7.503906.632812-10.609375l-16.382812-18.464843 60.863281-60.832032 109.644531 123.566406v43.21875c0 12.84375-10.449218 23.292969-23.292968 23.292969h-380.390626c-12.839843 0-23.289062-10.449219-23.289062-23.292969v-42.960937l66.082031-66.046875c2.933594-2.9375 2.9375-7.695312.003907-10.628906-2.9375-2.9375-7.695313-2.9375-10.628907-.003906l-55.457031 55.433593v-245.265625c0-12.839844 10.449219-23.289062 23.289062-23.289062h380.390626c12.84375 0 23.292968 10.449218 23.292968 23.289062zm0 0"/></svg>',
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
            'render_template'	=> 'partials/blocks/block-title.php',
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
            'render_template'	=> 'partials/blocks/block-form.php',
            //'render_callback'   => 'acf_blocks_template',
            'category'          => 'acftkm-blocks',
            'icon'              => '<svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m436 440.269c-4.143 0-7.5 3.358-7.5 7.5v36.731c0 6.893-5.607 12.5-12.5 12.5h-320c-6.893 0-12.5-5.607-12.5-12.5v-388.731c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v388.731c0 15.164 12.336 27.5 27.5 27.5h320c15.163 0 27.5-12.336 27.5-27.5v-36.731c0-4.142-3.357-7.5-7.5-7.5z"/><path d="m441.304 142.197-140-140c-1.408-1.407-3.315-2.197-5.304-2.197h-200c-15.164 0-27.5 12.336-27.5 27.5v35.859c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-35.859c0-6.893 5.607-12.5 12.5-12.5h192.5v112.5c0 15.164 12.337 27.5 27.5 27.5h112.5v260.769c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-268.269c0-1.989-.79-3.897-2.196-5.303zm-137.804-14.697v-101.894l114.394 114.394h-101.894c-6.893 0-12.5-5.607-12.5-12.5z"/><path d="m159 257.5c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5-22.5 10.093-22.5 22.5 10.093 22.5 22.5 22.5zm0-30c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5-7.5-3.364-7.5-7.5 3.364-7.5 7.5-7.5z"/><path d="m227 257.5h126c12.406 0 22.5-10.093 22.5-22.5s-10.094-22.5-22.5-22.5h-126c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5zm0-30h126c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5h-126c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5z"/><path d="m159 317.5c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5-22.5 10.093-22.5 22.5 10.093 22.5 22.5 22.5zm0-30c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5-7.5-3.364-7.5-7.5 3.364-7.5 7.5-7.5z"/><path d="m227 317.5h126c12.406 0 22.5-10.093 22.5-22.5s-10.094-22.5-22.5-22.5h-126c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5zm0-30h126c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5h-126c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5z"/><path d="m159 377.5c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5-22.5 10.093-22.5 22.5 10.093 22.5 22.5 22.5zm0-30c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5-7.5-3.364-7.5-7.5 3.364-7.5 7.5-7.5z"/><path d="m227 377.5h13.231c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-13.231c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5h126c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5h-80.77c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h80.77c12.406 0 22.5-10.093 22.5-22.5s-10.094-22.5-22.5-22.5h-126c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5z"/></g></g></svg>',
            'enqueue_assets' => function(){
	            wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() .'/assets/css/plugins.css', false );
	            wp_enqueue_style( 'elements', get_stylesheet_directory_uri() .'/assets/css/elements.css', false );
	            wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), null, true );
			},
        ));
        	    
        // register a Styles Title block.
        acf_register_block_type(array(
            'name'              => 'tkmb-style-title',
            'mode'				=> 'preview',
            'title'             => __('Styled Title', 'tkmnineteen'),
            'description'       => __('', 'tkmnineteen'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-style-title.php',
            'category'          => 'tkmb-blocks',
            'align'             => 'wide',
            'icon'              => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"></defs><title/><g data-name="22-chat" id="_22-chat"><polygon class="acfb_svg_icon" points="31 3 1 3 1 23 8 23 14 29 14 23 31 23 31 3"/><line class="acfb_svg_icon" x1="7" x2="25" y1="9" y2="9"/><line class="acfb_svg_icon" x1="7" x2="25" y1="13" y2="13"/><line class="acfb_svg_icon" x1="7" x2="25" y1="17" y2="17"/></g></svg>',
        ));
	    
        // register a Product block.
        acf_register_block_type(array(
            'name'              => 'tkmb-product-block',
            'mode'				=> 'edit',
            'title'             => __('Product Block', 'tkmnineteen'),
            'description'       => __('', 'tkmnineteen'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-product.php',
            'category'          => 'tkmb-blocks',
            'align'             => 'wide',
            'icon'				=> '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 309.023 309.023" style="enable-background:new 0 0 309.023 309.023;" xml:space="preserve"><g>
	<path d="M221.621,50.647c-0.276-2.496-1.837-4.716-4.11-5.867L157.901,14.58c-2.131-1.08-4.648-1.08-6.779,0L91.51,44.778
		c-2.521,1.277-4.11,3.863-4.11,6.69v0.001v0.001v50.312L4.28,142.215c-2.496,1.187-4.138,3.65-4.272,6.411
		c-0.134,2.762,1.262,5.372,3.632,6.794l52.411,31.449v54.938c0,2.83,1.593,5.419,4.118,6.694l90.96,45.946
		c1.063,0.537,2.223,0.806,3.382,0.806c1.159,0,2.318-0.269,3.382-0.806l90.959-45.946c2.525-1.275,4.118-3.864,4.118-6.694v-54.938
		l52.411-31.449c2.371-1.422,3.767-4.032,3.633-6.794c-0.134-2.761-1.775-5.224-4.271-6.41l-83.122-40.438V50.647z M228.855,122.3
		l-7.233,3.632v-7.317L228.855,122.3z M154.512,29.678l43.014,21.792l-43.014,21.791l-43.016-21.793L154.512,29.678z
		 M87.399,118.616v7.314l-7.23-3.63L87.399,118.616z M23.356,149.758l40.104-19.061l76.048,38.18l-40.302,26.395L23.356,149.758z
		 M147.012,275.563l-75.96-38.37V195.87l24.471,14.684c1.189,0.714,2.525,1.069,3.859,1.069c1.433,0,2.863-0.41,4.109-1.226
		l43.521-28.503V275.563z M154.512,159.624l-52.112-26.163V63.675l48.723,24.684c1.065,0.54,2.227,0.81,3.39,0.81
		c1.162,0,2.324-0.27,3.39-0.81l48.72-24.682v69.785L154.512,159.624z M237.971,237.193l-75.959,38.37v-93.668l43.519,28.503
		c1.246,0.816,2.677,1.226,4.109,1.226c1.334,0,2.67-0.355,3.859-1.069l24.472-14.685V237.193z M209.814,195.272l-40.301-26.395
		l76.048-38.181l40.105,19.061L209.814,195.272z"/></g></svg>',
        ));

        // register a Image block.
        acf_register_block_type(array(
            'name'              => 'tkmb-image-block',
            'mode'				=> 'edit',
            'title'             => __('Styled Image', 'tkmnineteen'),
            'description'       => __('', 'tkmnineteen'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-image.php',
            'category'          => 'tkmb-blocks',
            'align'             => 'wide',
            'icon'				=> '<svg height="512pt" viewBox="0 -36 512 511" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m231.898438 198.617188c28.203124 0 51.152343-22.945313 51.152343-51.148438 0-28.207031-22.949219-51.152344-51.152343-51.152344-28.203126 0-51.148438 22.945313-51.148438 51.152344 0 28.203125 22.945312 51.148438 51.148438 51.148438zm0-72.300782c11.664062 0 21.152343 9.488282 21.152343 21.152344 0 11.660156-9.488281 21.148438-21.152343 21.148438-11.660157 0-21.148438-9.488282-21.148438-21.148438 0-11.664062 9.488281-21.152344 21.148438-21.152344zm0 0"/><path d="m493.304688.5h-474.609376c-10.308593 0-18.695312 8.386719-18.695312 18.695312v401.726563c0 10.308594 8.386719 18.695313 18.695312 18.695313h474.609376c10.308593 0 18.695312-8.386719 18.695312-18.695313v-401.726563c0-10.308593-8.386719-18.695312-18.695312-18.695312zm-11.304688 30v237.40625l-94.351562-94.355469c-6.152344-6.140625-16.15625-6.136719-22.304688.011719l-133.441406 133.441406-85.238282-85.234375c-2.980468-2.984375-6.945312-4.628906-11.164062-4.628906-4.214844 0-8.175781 1.640625-11.15625 4.621094l-94.34375 94.34375v-285.605469zm-452 379.117188v-51.085938l105.5-105.5 85.234375 85.234375c2.984375 2.984375 6.949219 4.632813 11.167969 4.632813 4.210937 0 8.175781-1.644532 11.152344-4.625l133.445312-133.445313 105.503906 105.503906v99.285157zm0 0"/></svg>',
        ));

        // register a Image Text block.
        acf_register_block_type(array(
            'name'              => 'tkmb-image-content',
            'mode'				=> 'preview',
            'title'             => __('Image Content', 'tkmnineteen'),
            'description'       => __('', 'tkmnineteen'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-image-content.php',
            'category'          => 'tkmb-blocks',
            'align'             => 'wide',
            'icon'				=> '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="986.8px" height="986.8px" viewBox="0 0 986.8 986.8" style="enable-background:new 0 0 986.8 986.8;" xml:space="preserve"
	><g>
	<path d="M399.8,164.649H110.5c-22.1,0-40,17.9-40,40c0,22.1,17.9,40,40,40h289.3c22.101,0,40-17.9,40-40
		C439.8,182.55,421.9,164.649,399.8,164.649z"/>
	<path d="M399.8,450.85H206.5c-22.1,0-40,17.9-40,40c0,22.099,17.9,40,40,40h193.3c22.101,0,40-17.9,40-40
		C439.8,468.75,421.9,450.85,399.8,450.85z"/>
	<path d="M399.8,307.75H40c-22.1,0-40,17.9-40,40s17.9,40,40,40h359.8c22.101,0,40-17.9,40-40S421.9,307.75,399.8,307.75z"/>
	<path d="M399.8,594.05H40c-22.1,0-40,17.898-40,40c0,22.1,17.9,40,40,40h359.8c22.101,0,40-17.9,40-40
		C439.8,611.949,421.9,594.05,399.8,594.05z"/>
	<path d="M399.8,737.15H40c-22.1,0-40,17.9-40,40s17.9,40,40,40h359.8c22.101,0,40-17.9,40-40S421.9,737.15,399.8,737.15z"/>
	<path d="M926.8,160.25H572.4c-33.101,0-60,26.9-60,60V766.55c0,33.1,26.899,60,60,60H926.8c33.101,0,60-26.9,60-60V220.25
		C986.8,187.05,960,160.25,926.8,160.25z"/></g></svg>',
        ));

        // register a Button block.
        acf_register_block_type(array(
            'name'              => 'tkmb-button',
            'mode'				=> 'preview',
            'title'             => __('Button block', 'tkmnineteen'),
            'description'       => __('', 'tkmnineteen'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-button.php',
            'category'          => 'tkmb-blocks',
            'align'             => 'wide',
            'icon'				=> '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 43.161 43.161" style="enable-background:new 0 0 43.161 43.161;" xml:space="preserve">
<g>
	<g>
		<path style="fill:#010002;" d="M39.306,6.606H3.854C1.728,6.606,0,8.335,0,10.46v22.241c0,2.126,1.729,3.854,3.854,3.854h35.452
			c2.127,0,3.855-1.729,3.855-3.854V10.46C43.161,8.334,41.433,6.606,39.306,6.606z M39.199,32.591H3.962V10.57h35.236v22.021
			H39.199z"/>
		<rect x="8.909" y="25.247" style="fill:#010002;" width="3.621" height="3.619"/>
		<rect x="16.15" y="25.247" style="fill:#010002;" width="3.62" height="3.619"/>
		<rect x="23.39" y="25.247" style="fill:#010002;" width="3.62" height="3.619"/>
		<rect x="30.63" y="25.247" style="fill:#010002;" width="3.62" height="3.619"/>
	</g></svg>',
        ));
        
        // register a Button block.
        acf_register_block_type(array(
            'name'              => 'tkmb-custom-slider',
            'mode'				=> 'edit',
            'title'             => __('Custom Slider Block', 'tkmnineteen'),
            'description'       => __('', 'tkmnineteen'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-custom-slider.php',
            'category'          => 'tkmb-blocks',
            'align'             => 'wide',
            'icon'				=> '<svg width="682pt" height="682pt" viewBox="-21 -91 682.66669 682" xmlns="http://www.w3.org/2000/svg">
            <path d="m639.98 7.5312c-0.33594-6.6172-5.7969-11.863-12.484-11.863h-615c-6.6875 0-12.148 5.2461-12.484 11.863-0.015625 0.21484-0.015625 0.42578-0.015625 0.64062v474.99c0 6.9062 5.6016 12.508 12.5 12.508h615c6.8984 0 12.5-5.6016 12.5-12.508v-474.99c0-0.21484 0-0.42578-0.015625-0.64062zm-24.984 463.12h-590v-367.46h590zm0-392.46h-590v-57.668h590z"/>
            <path d="m213.75 62.723h-100c-6.9062 0-12.5-5.5977-12.5-12.5 0-6.9102 5.5938-12.504 12.5-12.504h100c6.9062 0 12.5 5.5938 12.5 12.504 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m63.773 62.723c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9102 5.5898-12.504 12.496-12.504h0.007813c6.9062 0 12.5 5.5938 12.5 12.504 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m558.75 176.72h-50v-11.258c0-13.789-11.211-25.004-25-25.004h-327.5c-13.789 0-25 11.215-25 25.004v11.258h-50c-13.789 0-25 11.215-25 25.004v127.54c0 13.793 11.211 25.008 25 25.008h50v11.258c0 13.789 11.211 25.004 25 25.004h327.5c13.789 0 25-11.215 25-25.004v-11.258h50c13.789 0 25-11.215 25-25.008v-127.54c0-13.789-11.211-25.004-25-25.004zm-427.5 152.54h-50v-127.54h50l0.015625 127.54s0 0-0.015625 0zm352.52 36.266s0 0-0.015625 0h-327.5v-200.07h327.5v36.266l0.015625 127.89zm74.984-36.266h-50v-127.54h50l0.015625 127.54s0 0-0.015625 0z"/>
            <path d="m230.8 314.23c-3.125 0-6.2539-1.168-8.6836-3.5117l-37.5-36.227c-2.4375-2.3555-3.8164-5.6055-3.8164-8.9922 0-3.3945 1.3789-6.6406 3.8164-9l37.5-36.227c4.9727-4.793 12.879-4.6562 17.68 0.30859 4.793 4.9727 4.6562 12.887-0.30859 17.68l-28.195 27.238 28.195 27.23c4.9648 4.8008 5.1016 12.715 0.30859 17.68-2.457 2.5391-5.7266 3.8203-8.9961 3.8203z"/>
            <path d="m410.45 314.23c-3.2695 0-6.5391-1.2812-8.9961-3.8203-4.793-4.9648-4.6562-12.883 0.30859-17.68l28.195-27.234-28.195-27.234c-4.9648-4.793-5.1016-12.715-0.30859-17.68 4.8008-4.9648 12.711-5.1016 17.68-0.30859l37.5 36.227c2.4375 2.3594 3.8164 5.6055 3.8164 8.9961 0 3.3906-1.3789 6.6406-3.8164 8.9961l-37.5 36.227c-2.4297 2.3438-5.5586 3.5117-8.6836 3.5117z"/>
            <path d="m320.02 435.65c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9062 5.5898-12.508 12.496-12.508h0.007813c6.9062 0 12.5 5.6016 12.5 12.508 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m370.02 435.65c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9062 5.5898-12.508 12.496-12.508h0.007813c6.9062 0 12.5 5.6016 12.5 12.508 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m270.02 435.65c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9062 5.5898-12.508 12.496-12.508h0.007813c6.9062 0 12.5 5.6016 12.5 12.508 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            </svg>',
        ));
        	    
    }
    
}
	    