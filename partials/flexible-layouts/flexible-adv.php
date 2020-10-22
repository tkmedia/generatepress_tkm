<?php 
$adv_style = get_sub_field('adv_sy');
$adv_bgi = get_sub_field('adv_bgi');
$adv_bgc = get_sub_field('adv_bgc');
$adv_pat = get_sub_field('adv_pat');
$adv_pab = get_sub_field('adv_pab');
$adv_par = get_sub_field('adv_par');
$adv_pal = get_sub_field('adv_pal');
$adv_mpat = get_sub_field('adv_mpat');
$adv_mpab = get_sub_field('adv_mpab');

$adv_bgi_url = wp_get_attachment_image_src($adv_bgi, 'full');

$adv_cols = get_sub_field('adv_cols');
$adv_align = get_sub_field('adv_ali');

$adv_cpat = get_sub_field('adv_cpat');
$adv_cpab = get_sub_field('adv_cpab');
$adv_cpar = get_sub_field('adv_cpar');
$adv_cpal = get_sub_field('adv_cpal');
$adv_cbg = get_sub_field('adv_cbg');
$adv_ctitle = get_sub_field('adv_cti');
$adv_ctext = get_sub_field('adv_ctx');
$adv_titlesize = get_sub_field('adv_ctis');
$adv_titlecolor = get_sub_field('adv_ctic');
$adv_contentsize = get_sub_field('adv_ccs');
$adv_contentcolor = get_sub_field('adv_ccc');

$adv_sco = get_sub_field('adv_sco');
$adv_sbgi = get_sub_field('adv_sbgi');
$adv_sbgi_url = wp_get_attachment_image_src($adv_sbgi, 'full');

$adv_slidercolor = get_sub_field('adv_sic');
$adv_slidersize = get_sub_field('adv_sis');
?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?>">
<?php if( $adv_mpat || $adv_mpab ) { ?>
<style>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $adv_mpat; ?>px!important;padding-bottom:<?php echo $adv_mpab; ?>px!important;}	
}
</style>
<?php } ?>
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_adv page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $adv_pat; ?>px;padding-bottom:<?php echo $adv_pab; ?>px;padding-right:<?php echo $adv_par; ?>px;padding-left:<?php echo $adv_pal; ?>px;background-image:url(<?php echo $adv_bgi_url[0]; ?>);background-color:<?php echo $adv_bgc; ?>;">

		<div class="flex_adv flexible_page_element" itemprop="text">
			<div class="flex_adv_container flex_adv_<?php echo $adv_style;?>">
				<div class="flex_adv_row row-flex<?php if( $adv_align ) { ?> vertical_align<?php } ?>">
					<div class="flex_adv_col flex_adv_col_text col-xs-12 col-sm-6" style="background:<?php echo $adv_cbg; ?>;">
						<div class="flex_adv_col_content" style="padding-top:<?php echo $adv_cpat; ?>px;padding-bottom:<?php echo $adv_cpab; ?>px;padding-right:<?php echo $adv_cpar; ?>px;padding-left:<?php echo $adv_cpal; ?>px;">
							<div class="full_content_inner">
								<?php if( $adv_ctitle ) { ?>
								<div class="full_content_title" style="color:<?php echo $adv_titlecolor;?>;font-size:<?php echo $adv_titlesize;?>px;"><?php echo $adv_ctitle;?></div>
								<?php } ?>
								<?php if( $adv_ctext ) { ?>
								<div class="full_content_text" style="color:<?php echo $adv_contentcolor;?>;font-size:<?php echo $adv_contentsize;?>px;"><?php echo $adv_ctext;?></div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="flex_adv_col flex_adv_col_slide col-xs-12 col-sm-6" style="background-image:url(<?php echo $adv_sbgi_url[0]; ?>);">
						<div class="flex_adv_slider">
						<?php if( have_rows('adv_sli') ): ?>								
							<div class="flex_adv_slider_row">
							<?php 
							$i = 1; while( have_rows('adv_sli') ): the_row(); 
							$adv_slitext = get_sub_field('adv_slit');
							?>		
								<div class="flex_adv_slider_item">
									<div class="flex_adv_slider_item_inner" style="color:<?php echo $adv_slidercolor;?>;font-size:<?php echo $adv_slidersize;?>px;"><?php echo $adv_slitext; ?></div>
								</div>
							<?php $i++;endwhile; ?>	
							</div>
						<?php endif; ?>	
						</div>
						<script>					
						jQuery(function($) {
							if ($('.flex-<?php echo $count;?> .flex_adv_slider_row .flex_adv_slider_item').length > 1) {
								$(".flex-<?php echo $count;?> .flex_adv_slider_row").slick({
									<?php if ( is_rtl() ) { ?>
									rtl: true,
									<?php } ?>
									slidesToShow: 1,
									slidesToScroll: 1,
									pauseOnHover: true,
									speed: 500,
									autoplay: false,
									autoplaySpeed: 6000,
									arrows: false,
									dots: true,
								});
							}
						}); 
						</script>	
						
					</div>
				</div>
			</div>
		</div>					
		
	</section>	
</div>