<div id="mh_hero">
<?php 
$page_top_slider_style = get_post_meta( get_the_ID(), 'hmhs_sty', true );	
if( $page_top_slider_style == 'full_slider' ):
	get_template_part('partials/masthead-full' );
endif;
if( $page_top_slider_style == 'single_imbg' ):
	get_template_part('partials/masthead-single' );
endif;
if( $page_top_slider_style == 'no_image_top' ):
	get_template_part('partials/masthead-title' );
endif;	
if( $page_top_slider_style == 'manual_slider' ):
	get_template_part('partials/masthead-full-manual' );
endif;			
if( $page_top_slider_style == 'clean_top' ):
	get_template_part('partials/masthead-clean');
endif;
?>
</div>
