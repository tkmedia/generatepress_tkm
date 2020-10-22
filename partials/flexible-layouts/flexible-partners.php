<?php 
$partners_bgcolor = get_sub_field('par_bgc');
$partners_bgimage = get_sub_field('par_bgi');
$partners_bgi_url = wp_get_attachment_image_src($partners_bgimage, 'full');
$partners_align = get_sub_field('par_ali');

$partners_pat = get_sub_field('par_pat');
$partners_pab = get_sub_field('par_pab');
$partners_par = get_sub_field('par_par');
$partners_pal = get_sub_field('par_pal');
$partners_mpat = get_sub_field('par_mpat');
$partners_mpab = get_sub_field('par_mpab');

$partners_title_position = get_sub_field('par_tpo');

$partners_title = get_sub_field('par_title');
$partners_titlecolor = get_sub_field('par_tic');
$partners_titlesize = get_sub_field('par_tis');

$partners = get_sub_field('par_col');
$partners_count = get_sub_field('par_dit');
$partners_count_mobile = get_sub_field('par_mit');

	if ( $partners_count == 1 ) : $p_sm_cols = "12"; $p_md_cols = "12"; $p_lg_cols = "12";
	elseif ( $partners_count == 2 ) : $p_sm_cols = "6"; $p_md_cols = "6"; $p_lg_cols = "6";
	elseif ( $partners_count == 3 ) : $p_sm_cols = "6"; $p_md_cols = "4"; $p_lg_cols = "4";
	elseif ( $partners_count == 4 ) : $p_sm_cols = "4"; $p_md_cols = "3"; $p_lg_cols = "3";
	elseif ( $partners_count == 5 ) : $p_sm_cols = "4"; $p_md_cols = "20"; $p_lg_cols = "20";
	elseif ( $partners_count == 6 ) : $p_sm_cols = "3"; $p_md_cols = "2"; $p_lg_cols = "2";
	elseif ( $partners_count == 7 ) : $p_sm_cols = "3"; $p_md_cols = "seven"; $p_lg_cols = "seven";
	elseif ( $partners_count == 8 ) : $p_sm_cols = "3"; $p_md_cols = "20"; $p_lg_cols = "eight";
	endif;
	if ( $partners_count_mobile == 1 ) : $p_xs_cols = "12";
	elseif ( $partners_count_mobile == 2 ) : $p_xs_cols = "6";
	elseif ( $partners_count_mobile == 3 ) : $p_xs_cols = "4";
	endif;
?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?>">
<?php if( $partners_mpat || $partners_mpab ) { ?>
<style>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $partners_mpat; ?>px!important;padding-bottom:<?php echo $partners_mpab; ?>px!important;}	
}
</style>
<?php } ?>
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_partners page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $partners_pat; ?>px;padding-bottom:<?php echo $partners_pab; ?>px;padding-right:<?php echo $partners_par; ?>px;padding-left:<?php echo $partners_pal; ?>px;background-image:url(<?php echo $partners_bgi_url[0]; ?>);background-color:<?php echo $partners_bgcolor; ?>;">

		<div class="flex_partners flexible_page_element wrap" itemprop="text">
			<div class="tabs_content_container">
				
				<div class="partners_content_row row-flex<?php if( $partners_align ) { ?> vertical_align<?php } ?>">
					
					<?php if( $partners_title ) { ?>
						<?php if( $partners_title_position == 'side' ) { ?>
						<div class="partners_content_col partners_text col-xs-12 col-sm-5">
						<?php } else { ?>
						<div class="partners_content_col partners_text col-xs-12">
						<?php } ?>
							<div class="content_text_inner title_<?php echo $partners_title_position; ?>">
								<div class="content_text_title" style="color:<?php echo $partners_titlecolor; ?>;font-size:<?php echo $partners_titlesize; ?>px;"><?php echo $partners_title; ?></div>
							</div>
						</div>
					<?php } ?>
					
					<div class="partners_col partners_grid col-xs-12<?php if( $partners_title && $partners_title_position == 'side' ) { ?> col-sm-7<?php } ?>">
					
						<div class="partners_container">
						<?php if( have_rows('par_col') ): ?>								
							<div class="partners_row row-flex">
							<?php 
							$i = 1; while( have_rows('par_col') ): the_row(); 
							$par_link = get_sub_field('par_lk');
							$par_img = get_sub_field('par_img');
							?>		
								<div class="partners_item col-xs-<?php echo $p_xs_cols; ?><?php if( $partners_count ) { ?>col-sm-<?php echo $p_sm_cols; ?> col-md-<?php echo $p_md_cols; ?><?php } else { ?> col-sm<?php } ?>	">
									<?php if( $par_link ) { ?>
									<a href="<?php echo $par_link; ?>" class="">
									<?php } ?>	
									<?php echo wp_get_attachment_image( $par_img, 'full' );?>
									<?php if( $par_link ) { ?></a><?php } ?>
								</div>
							<?php $i++;endwhile; ?>	
							</div>
						<?php endif; ?>	
						</div>
						
					</div>
				</div>
			</div>
		</div>					
		
	</section>	
</div>