<?php 
$feature_style = get_sub_field('ffs_sty');
$feature_count = get_sub_field('ffs_cou');
$feature_mobile_count = get_sub_field('ffs_mcou');
$feature_image_h = get_sub_field('ffs_imh');
$feature_wrap = get_sub_field('ffs_wrap');

$feature_title_align = get_sub_field('ffs_tia');
$feature_title = get_sub_field('ffs_ti');
$feature_subtitle = get_sub_field('ffs_st');
$feature_title_color = get_sub_field('ffs_tic');
$feature_subtitle_color = get_sub_field('ffs_stc');
$feature_title_size = get_sub_field('ffs_tis');
$feature_subtitle_size = get_sub_field('ffs_sts');
$feature_title_side = get_sub_field('ffs_tisi');

$feature_item_title_color = get_sub_field('ffs_itic');
$feature_item_subtitle_color = get_sub_field('ffs_istc');
$feature_item_title_size = get_sub_field('ffs_itis');
$feature_item_subtitle_size = get_sub_field('ffs_ists');

$feature_bgi = get_sub_field('ffs_bgi');
$feature_bgc = get_sub_field('ffs_bgc');
$feature_pat = get_sub_field('ffs_pat');
$feature_pab = get_sub_field('ffs_pab');
$feature_par = get_sub_field('ffs_par');
$feature_pal = get_sub_field('ffs_pal');
$feature_mpat = get_sub_field('ffs_mpat');
$feature_mpab = get_sub_field('ffs_mpab');

$feature_bgi_url = wp_get_attachment_image_src($feature_bgi, 'full');

$feature_btn = get_sub_field('ffs_sbtn');
$feature_btn_type = get_sub_field('ffs_sbtnt');
$feature_btn_page = get_sub_field('ffs_spl');
$feature_btn_link = get_sub_field('ffs_sfl');
$feature_btn_form = get_sub_field('ffs_sfp');
$feature_contentcolor = get_sub_field('ffs_coc');

?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?>">
<?php if( $feature_mpat || $feature_mpab ) { ?>
<style>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $feature_mpat; ?>px!important;padding-bottom:<?php echo $feature_mpab; ?>px!important;}	
}
</style>
<?php } ?>
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_feature page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $feature_pat; ?>px;padding-bottom:<?php echo $feature_pab; ?>px;padding-right:<?php echo $feature_par; ?>px;padding-left:<?php echo $feature_pal; ?>px;background-image:url(<?php echo $feature_bgi_url[0]; ?>);background-color:<?php echo $feature_bgc; ?>;">

		<div class="flex_feature_slider feature_slider_<?php echo $feature_style;?> flexible_page_element<?php if( !$feature_wrap ) { ?> wrap<?php } ?>" itemprop="text">
			
			<?php if( $feature_style == 'style6' ) {
			$feature_sideimage = get_sub_field('ffs_sim');
			$feature_sideimagemobile = get_sub_field('ffs_simm');
			 ?>
			<div class="flex_feature_slider_side <?php if( $feature_sideimagemobile ) { ?> show_mobile<?php } ?>">
				<?php if( $feature_sideimage ) { echo wp_get_attachment_image( $feature_sideimage, 'full' ); } else { ?>
					<img src="/wp-content/uploads/2019/12/sample-11.png">
				<?php } ?>	
			</div>
			<?php } ?>
			<div class="feature_slider_container">
				
				<?php if( $feature_title || $feature_subtitle ) { ?>
				<div class="section_title_wrap title_<?php echo $feature_title_side; ?>">
					<?php if( $feature_title ) { ?>
					<h2 class="section_title section_flex_title title_<?php echo $feature_title_align; ?>" style="text-align:<?php echo $feature_title_align; ?> !important;color:<?php echo $feature_title_color; ?>;font-size:<?php echo $feature_title_size; ?>px;"><?php echo $feature_title; ?></h2>
					<?php } ?>
					<?php if( $feature_subtitle ) { ?>
					<div class="section_subtitle title_<?php echo $feature_title_align; ?>" itemprop="headline" style="text-align:<?php echo $feature_title_align; ?> !important;color:<?php echo $feature_subtitle_color; ?>;font-size:<?php echo $feature_subtitle_size; ?>px;"><?php echo $feature_subtitle; ?></div>
					<?php } ?>
				</div>
				<?php } ?>	
							
				<div class="feature_slider_wrap">
					<div class="feature_slider_row">
					    <div class="feature_slider_<?php echo $count;?>">
							<?php 
							$feature_rows = 0;
							$features = get_sub_field('ffs_s');
							if (is_array($features)) {
							  $feature_rows = count($features);
							}
							?>						    
							<div class="feature_slider_items item_count_<?php echo $feature_rows; ?>">
							<?php if( have_rows('ffs_s') ): ?>
								<div class="feature_slider_items_wrap">
								<?php $feature = 1;while( have_rows('ffs_s') ): the_row(); 
									$feature_item_title = get_sub_field('ffs_sti');
									$feature_item_subtitle = get_sub_field('ffs_sst');
									$feature_item_img = get_sub_field('ffs_simg');
									$feature_item_text = get_sub_field('ffs_stxt');
									$feature_item_btn = get_sub_field('ffs_sbtn');
									$feature_item_link = get_sub_field('ffs_slnk');
									$feature_item_tab = get_sub_field('ffs_tab');
									?>
									<div class="feature_slider_item feature<?php echo $feature; ?>">
									<?php if( $feature_item_link ) { ?><a href="<?php echo $feature_item_link; ?>"<?php if( $feature_item_tab ) { ?> target="_blank"<?php } ?>><?php } ?>
										<div class="feature_slider_item_wrap"<?php if( $feature_style == 'style1' && $feature_item_btn ) { ?> style="padding-bottom: 70px;"<?php } ?>>
										
											<?php if( $feature_item_img ) { ?>
											<div class="feature_slider_item_img"<?php if( $feature_style !== 'style4' ) { ?> style="height:<?php echo $feature_image_h; ?>px;"<?php } ?>>
												<?php if( $feature_style == 'style6' ) { ?><figure><?php } ?>
												<?php if( $feature_style == 'style3' ) { ?>
												<?php echo wp_get_attachment_image( $feature_item_img, 'menu-100' ); ?>
												<?php } elseif( $feature_style == 'style4' ) { ?>
												<?php echo wp_get_attachment_image( $feature_item_img, 'product-500' ); ?>
												<?php } else { ?>
												<?php echo wp_get_attachment_image( $feature_item_img, 'full' ); ?>
												<?php } ?>
												<?php if( $feature_style == 'style6' ) { ?></figure><?php } ?>
											</div>
											<?php } ?>
											<?php if( $feature_item_title || $feature_item_subtitle ) { ?>
											<div class="feature_slider_title_wrap">
												<?php if( $feature_style == 'style4' ) { ?>
												<div class="feature_slider_title_num"><?php echo $feature; ?></div>
												<?php } ?>
												<?php if( $feature_item_title ) { ?>
												<div class="feature_slider_item_title" style="color:<?php echo $feature_item_title_color;?>;font-size:<?php echo $feature_item_title_size;?>px;">
													<?php echo $feature_item_title; ?>
												</div>
												<?php } ?>
												<?php if( $feature_item_subtitle ) { ?>
												<div class="feature_slider_item_subtitle" style="color:<?php echo $feature_item_subtitle_color;?>;font-size:<?php echo $feature_item_subtitle_size;?>px;">
													<?php echo $feature_item_subtitle; ?>
												</div>
												<?php } ?>
											</div>
											<?php } ?>
											<?php if( $feature_item_text ) { ?>
											<div class="feature_slider_item_text" style="color: <?php echo $feature_contentcolor; ?>;">
												<?php echo $feature_item_text; ?>
											</div>
											<?php } ?>
											<?php if( $feature_item_link && $feature_item_btn ) { ?>
											<div class="feature_slider_item_btn section_readmore_link_wrap">
												<button class="section_readmore_link watch_btn hoverLink"><?php echo $feature_item_btn; ?></button>
											</div>											
											<?php } ?>
										
										</div>
									<?php if( $feature_item_link ) { ?></a><?php } ?>
									</div>
									
								<?php $feature++; endwhile; ?>
								</div>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if( $feature_btn ) { ?>
				<div class="section_btn popup_btn section_readmore_link_wrap">
					<?php if( $feature_btn_type == 'page_link' ): ?>
					<a href="<?php echo $feature_btn_page; ?>" class="">
					<?php endif; ?>	
					<?php if( $feature_btn_type == 'free_link' ): ?>
					<a href="<?php echo $feature_btn_link; ?>" class="">
					<?php endif; ?>
					<?php if( $feature_btn_type == 'form_link' ): ?>					
					<a data-fancybox data-src="#popop-feature-<?php echo $count;?>" href="javascript:;">
					<?php endif; ?>
						<button class="section_readmore_link watch_btn hoverLink"><?php echo $feature_btn; ?></button>
					</a>
					
				</div>											
				<?php } ?>

				<?php if( $feature_btn_type == 'form_link' && $feature_btn ):
				$form_title = get_sub_field('ffs_fti');
				$form_subtitle = get_sub_field('ffs_fsut');
				?>
				<div style="display: none;max-width: 500px;" id="popop-feature-<?php echo $count;?>" class="popop-feature button-popop-form">
					<div class="button-popop-form-wrap">
						<div class="button-popop-form-row">
							<div class="button-popop-form-col form-image col-xs-12">
								<?php if( $form_title ) { ?>
								<div class="contact-title">
									<div class="popup_contact_title"><?php echo $form_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $form_subtitle ) { ?>
								<div class="contact-title">
									<div class="popup_contact_subtext"><?php echo $form_subtitle; ?></div>
								</div>
								<?php } ?>
								<div class="contact-form-page">
									<div class="full_form_id">
										<div class="full_form_id_wrap">
											<?php echo do_shortcode( '[contact-form-7 id="'.$feature_btn_form.'" ]' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</div>

		<script>					
		jQuery(function($) {
			if ($('.feature_slider_<?php echo $count;?> .feature_slider_items_wrap .feature_slider_item').length > 1) {
				var br_count = <?php echo $feature_mobile_count; ?> + 1;
				$(".feature_slider_<?php echo $count;?> .feature_slider_items_wrap").slick({
					<?php if( $feature_style == 'style5' ) { ?>
					centerMode: true,
					centerPadding: '0px',
					<?php } ?>
					<?php if ( is_rtl() ) { ?>
					rtl: true,
					<?php } ?>
					slidesToShow: <?php echo $feature_count; ?>,
					slidesToScroll: 1,
					pauseOnHover: true,
					speed: 500,
					autoplay: false,
					autoplaySpeed: 6000,
					<?php if( $feature_style == 'style6' ) { ?>
					arrows: false,
					dots: true,
					<?php } else { ?>
					arrows: true,
					dots: false,
					<?php } ?>
					responsive: [
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: br_count,
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: <?php echo $feature_mobile_count; ?>,
				      }
				    }
					]
				});
				
			}
	
		}); 
		</script>					
	</section>
</div>
