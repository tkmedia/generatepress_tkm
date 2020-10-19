<?php
$uid = $block['id'];
$className = 'acftkm_image_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}

$img = get_field('fimg');
$img_style = get_field('fimg_sty');
$img_size = get_field('fimg_s');
$img_title = get_field('fimg_t');
$img_link = get_field('fimg_li');
$img_url = get_field('fimg_l');
$img_vid = get_field('fimg_v');
$img_form = get_field('fimg_f');
$img_url = wp_get_attachment_image_src($img, 'full');

$img_pt = get_field('fimg_pt');
$img_pb = get_field('fimg_pb');
$img_pr = get_field('fimg_pr');
$img_pl = get_field('fimg_pl');
$img_titlecolor = get_field('fimg_tc');
$img_titlesize = get_field('fimg_ts');
$img_titlealign = get_field('fimg_ta');
$img_titleposition = get_field('fimg_tp');

?>
<div id="<?php echo $uid; ?>" class="flex_content_cols <?php echo esc_attr($className); ?> image_style_<?php echo $img_style; ?>">
	<section id="section-<?php echo $uid; ?>" class="page_flexible flex_image page_flexible_content section-<?php echo $uid; ?>">
	    <?php if( $img_link ) { ?>
		    <?php if( $img_link == 'enlarge' ) { ?>
				<a class="flex_image_full_link" data-fancybox href="<?php echo $img_url[0]; ?>">
			<?php } elseif( $img_link == 'link' ) { ?>
				<a href="<?php echo $img_url; ?>" class="flex_image_full_link">
			<?php } elseif( $img_link == 'video' ) { ?> 
				<a class="flex_image_full_vid" data-fancybox href="<?php echo $img_vid; ?>">
			<?php } ?>    
		<?php } ?>
		
			<div class="media_content_item full_image image_style_<?php echo $img_style; ?>" style="padding-top:<?php echo $img_pt; ?>px;padding-bottom:<?php echo $img_pb; ?>px;padding-right:<?php echo $img_pr; ?>px;padding-left:<?php echo $img_pl; ?>px;">
				<div class="full_image_inner">
					<?php if( $img_title ) { ?>
					<div class="full_image_title title_<?php echo $img_titleposition; ?> align_<?php echo $img_titlealign; ?>" style="color:<?php echo $img_titlecolor;?>;font-size:<?php echo $img_titlesize;?>px;"><?php echo $img_title;?></div>
					<?php } ?>
					<div class="full_image_img"><?php echo wp_get_attachment_image( $img, $img_size );?></div>
				</div>
			</div>
			
		<?php if( $img_link ) { ?></a><?php } ?> 
			
	</section>
</div>