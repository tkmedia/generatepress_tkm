<?php
$default_masthead_bg = get_field('mmh_bg','option');
$default_masthead_bg_url = wp_get_attachment_image_src( $default_masthead_bg, 'full' );
$masthead_bg = get_field('mhsh_bgi');
$masthead_bg_url = wp_get_attachment_image_src( $masthead_bg, 'full' );
$clean_title = get_field('mhcl_ti');
?>
</script>
<div id="clean_masthead" itemprop="text">
	<div class="slide-inner masthead_img_slider" style="background-image:url(<?php if( $masthead_bg ) {echo $masthead_bg_url[0];} else {echo $default_masthead_bg_url[0];} ?>);"></div>
		<div class="page-title" itemprop="text">
			<div class="wf-wrap wrap">
				<div class="page-title-head hgroup">
					<h1 class="entry-title masthead_content_title main_slider_title <?php if ( !is_front_page() ) { ?>masthead_content_title_single<?php } ?>" itemprop="headline">
					<?php if( $clean_title ) { ?>
						<?php echo $clean_title; ?>
					<?php } else { ?>
						<?php the_title(); ?>
					<?php } ?>
					</h1>
				</div>
				<div class="yoast_breadcrumb">
					<div class="yoast_breadcrumb_wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>