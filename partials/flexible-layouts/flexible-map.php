<?php
$map_bgi = get_sub_field('mp_bgi');
$map_bgc = get_sub_field('mp_bgc');
$map_pat = get_sub_field('mp_pat');
$map_pab = get_sub_field('mp_pab');
$map_par = get_sub_field('mp_par');
$map_pal = get_sub_field('mp_pal');
$map_mpat = get_sub_field('mp_mpat');
$map_mpab = get_sub_field('mp_mpab');
$map_bgi_url = wp_get_attachment_image_src($map_bgi, 'full');

$map_wrap = get_sub_field('mp_now');
$map_titlealign = get_sub_field('mp_tia');
$map_title = get_sub_field('mp_ti');
$map_subtitle = get_sub_field('mp_st');
$map_title_size = get_sub_field('mp_tsz');
$map_title_color = get_sub_field('mp_tcl');
$map_subtitle_size = get_sub_field('mp_stsz');
$map_subtitle_color = get_sub_field('mp_stcl');

$map = get_sub_field('mp_ma');
$map_name = get_sub_field('mp_na');

?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex_map flex-<?php echo $count;?>">
<?php if( $map_mpat || $map_mpab ) { ?>
<style>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $map_mpat; ?>px!important;padding-bottom:<?php echo $map_mpab; ?>px!important;}	
}
</style>
<?php } ?>
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_map page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $map_pat; ?>px;padding-bottom:<?php echo $map_pab; ?>px;padding-right:<?php echo $map_par; ?>px;padding-left:<?php echo $map_pal; ?>px;<?php if( $map_bgi ) { ?>background-image:url(<?php echo $map_bgi_url[0]; ?>);<?php } ?>background-color:<?php echo $map_bgc; ?>;">
		
		<div class="map_element flexible_page_element" itemprop="text">
			<?php if( $map_title || $map_subtitle ) { ?>
			<div class="map_title_wrap title_wrap_<?php echo $map_titlealign; ?> wrap">
				<?php if( $map_title ) { ?>
				<h2 class="section_title section_flex_title" style="text-align:<?php echo $map_titlealign; ?>;color:<?php echo $map_title_color; ?>;font-size:<?php echo $map_title_size; ?>px;"><?php echo $map_title; ?></h2>
				<?php } ?>
				<?php if( $map_subtitle ) { ?>
				<div class="section_subtitle" itemprop="headline" style="text-align:<?php echo $map_titlealign; ?>;color:<?php echo $map_subtitle_color; ?>;font-size:<?php echo $map_subtitle_size; ?>px;"><?php echo $map_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>

	        <div class="flex_map_row<?php if( !$map_wrap ) { ?> wrap<?php } ?>">
	            <div class="flex_map_col">
	                <div class="flex_map_content_inner">
						<div class="map google-acfmap acf-map" data-zoom="16">										
							<div class="marker" data-lat="<?php echo esc_attr($map['lat']); ?>" data-lng="<?php echo esc_attr($map['lng']); ?>" data-icon="">
								<?php if( $map_name ) { ?><h4><?php echo $map_name; ?></h4><?php } ?>
								<div class="location-image"></div>
								<p><?php echo $map['address']; ?></p>
							</div>
						</div>
	                </div>
	            </div>	
	        </div>					        

		</div>
	</section>
</div>