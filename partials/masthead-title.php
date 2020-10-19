<?php
$clean_title = get_field('mhcl_ti');
?>
<div id="page-title" class="masthead-title" itemprop="text">
	<div class="wf-wrap wrap">
		<div class="page-title-head hgroup">
			<h1 class="entry-title" itemprop="headline">
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