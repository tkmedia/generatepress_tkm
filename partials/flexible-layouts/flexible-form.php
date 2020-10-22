<?php
$form = get_sub_field('ff_fo');
$form_style = get_sub_field('ff_sty');
$form_title_position = get_sub_field('ff_tpo');
$form_title = get_sub_field('ff_ti');
$form_subtitle = get_sub_field('ff_st');
$form_text = get_sub_field('ff_txt');
$form_side_title = get_sub_field('ff_sti');
$form_side_link = get_sub_field('ff_sl');
$form_side_icon = get_sub_field('ff_si');
$form_title_color = get_sub_field('ff_tic');
$form_title_size = get_sub_field('ff_tis');
$form_subtitle_color = get_sub_field('ff_stic');
$form_subtitle_size = get_sub_field('ff_stis');
$form_btn_color = get_sub_field('ff_btnc');
$form_pat = get_sub_field('ff_pat');
$form_pab = get_sub_field('ff_pab');
$form_par = get_sub_field('ff_par');
$form_pal = get_sub_field('ff_pal');
$form_bgi = get_sub_field('ff_bgi');
$form_bgc = get_sub_field('ff_bgc');
$form_mpat = get_sub_field('ff_mpat');
$form_mpab = get_sub_field('ff_mpab');
$form_sidetext = get_sub_field('ff_stxt');
$form_sidesub = get_sub_field('ff_ssti');

$form_bgi_url = wp_get_attachment_image_src($form_bgi, 'full');
$form_bg_fixed = get_sub_field('ff_fxbg');
?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?> flex_form_<?php echo $count;?>">
<style>
<?php if( $form_style == 'split_form' ) { ?>
#section-<?php echo $count;?> .mh_contact_wrap.row-flex .mh_contact_col_right, 
#section-<?php echo $count;?> .mh_contact_wrap .mh_contact_col_right:before {background:<?php echo $form_bgc; ?>;}	
<?php } ?>
<?php if( $form_btn_color ) { ?>
#section-<?php echo $count;?> .mh_contact input.wpcf7-form-control.wpcf7-submit {background:<?php echo $form_btn_color;?>;}
<?php } ?>
<?php if( $form_mpat || $form_mpab ) { ?>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $form_mpat; ?>px!important;padding-bottom:<?php echo $form_mpab; ?>px!important;}	
}
<?php } ?>
span.wpcf7-list-item-label {color:<?php echo $form_title_color; ?>;}
</style>

	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_form page_flexible_content section-<?php echo $count;?><?php if( $form_bg_fixed ) { ?> fixed_bg<?php } ?>" style="<?php if( $form_style == 'form_only' || $form_style == 'split_form_con' ) { ?>padding-top:<?php echo $form_pat; ?>px;padding-bottom:<?php echo $form_pab; ?>px;padding-right:<?php echo $form_par; ?>px;padding-left:<?php echo $form_pal; ?>px;<?php } ?><?php if( $form_bgi ) { ?>background-image:url(<?php echo $form_bgi_url[0]; ?>);<?php } ?>background-color:<?php echo $form_bgc; ?>;">
		<div class="flex_form flexible_page_element <?php echo $form_style; ?>" itemprop="text">
			<?php if( $form_style == 'split_form_con' ) { ?>
			<div class="mh_contact wrap">
				<div class="mh_contact_wrap row-flex">
					<div class="mh_contact_col mh_contact_col_con col-xs-12 col-md-5 col-lg-4">
						<div class="mh_contact_col_inner">
							<?php if( $form_side_title || $form_side_link ) { ?>
							<div class="mh_contact_col_con_wrap">
								<?php if( $form_side_link ) { ?><a href="<?php echo $form_side_link; ?>"><?php } ?>
								<div class="mh_contact_col_content">
									<div class="mh_contact_phone_text" style="color:<?php echo $form_title_color; ?>;font-size:<?php echo $form_title_size; ?>px;"><?php echo $form_side_title; ?></div>
									<?php if( $form_side_icon ) { ?>
									<div class="mh_contact_phone_icon"><?php echo $form_side_icon; ?></div>
									<?php } ?>
								</div>
								<?php if( $form_side_link ) { ?></a><?php } ?>
								
								<?php if( $form_sidesub ) { ?>
								<div class="mh_contact_subtitle" style="color:<?php echo $form_subtitle_color; ?>;font-size:<?php echo $form_subtitle_size; ?>px;"><?php echo $form_sidesub; ?></div>
								<?php } ?>
								<?php if( $form_sidetext ) { ?>
								<div class="mh_contact_text"><?php echo $form_sidetext; ?></div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="mh_contact_col mh_contact_col_form col-xs-12 col-md-7 col-lg-8">
						<div class="mh_contact_col_inner">
							<div class="mh_contact_col_form">
								<div class="mh_contact_col_form_wrap <?php echo $form_title_position; ?>">	
									<?php if( $form_title || $form_subtitle ) { ?>
									<div class="mh_contact_col_form_title_container">
						                <?php if( $form_title ) { ?>
						                <div class="mh_contact_col_form_title" style="color:<?php echo $form_title_color; ?>;font-size:<?php echo $form_title_size; ?>px;">
							                <?php echo $form_title; ?>
							            </div>
						                <?php } ?>
						                <?php if( $form_subtitle ) { ?>
						                <div class="mh_contact_col_form_subtitle" style="color:<?php echo $form_subtitle_color; ?>;font-size:<?php echo $form_subtitle_size; ?>px;">
							                <?php echo $form_subtitle; ?>
							            </div>
						                <?php } ?>
						                <?php if( $form_text ) { ?>
						                <div class="mh_contact_col_form_txt">
							                <?php echo $form_text; ?>
							            </div>
						                <?php } ?>
									</div>
									<?php } ?>
									<div class="mh_contact_col_form_id">
										<?php echo do_shortcode( '[contact-form-7 id="'.$form.'" ]' ); ?>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } elseif( $form_style == 'split_form' ) { ?>
			<div class="mh_contact wrap">
				<div class="mh_contact_wrap row-flex">
					<div class="mh_contact_col mh_contact_col_right col-xs-12 col-md-5 col-lg-4">
						<div class="mh_contact_col_inner"></div>
					</div>
					<div class="mh_contact_col mh_contact_col_left col-xs-12 col-md-7 col-lg-8">
						<div class="mh_contact_col_inner"></div>
					</div>
				</div>
				<div class="mh_contact_content row-flex">
					<?php if( $form_side_title || $form_side_link ) { ?>
					<div class="mh_contact_col mh_contact_col_right col-xs-12 col-md-5 col-lg-4">
						<?php if( $form_side_link ) { ?><a href="<?php echo $form_side_link; ?>"><?php } ?>
						<div class="mh_contact_col_content">
							<div class="mh_contact_phone_text">
								<div class="form_side_title"><?php echo $form_side_title; ?></div>
								<?php if( $form_sidesub ) { ?>
								<div class="form_sidesub"><?php echo $form_sidesub; ?></div>
								<?php } ?>
								<?php if( $form_sidetext ) { ?>
								<div class="form_sidetext"><?php echo $form_sidetext; ?></div>
								<?php } ?>
							</div>
							<div class="mh_contact_phone_icon"><?php echo $form_side_icon; ?></div>
						</div>
						<?php if( $form_side_link ) { ?></a><?php } ?>
					</div>
					<?php } ?>
					<div class="mh_contact_col mh_contact_col_left col-xs-12 col-md-7 col-lg-8">
						<div class="mh_contact_col_form">
							<div class="mh_contact_col_form_wrap <?php echo $form_title_position; ?>">	
								<?php if( $form_title || $form_subtitle ) { ?>
								<div class="mh_contact_col_form_title_container">
					                <?php if( $form_title ) { ?>
					                <div class="mh_contact_col_form_title">
						                <?php echo $form_title; ?>
						            </div>
					                <?php } ?>
					                <?php if( $form_subtitle ) { ?>
					                <div class="mh_contact_col_form_subtitle">
						                <?php echo $form_subtitle; ?>
						            </div>
					                <?php } ?>
					                <?php if( $form_text ) { ?>
					                <div class="mh_contact_col_form_txt">
						                <?php echo $form_text; ?>
						            </div>
					                <?php } ?>
								</div>
								<?php } ?>
								<div class="mh_contact_col_form_id">
									<?php echo do_shortcode( '[contact-form-7 id="'.$form.'" ]' ); ?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<?php } else { ?>
			<div class="mh_contact">
				<div class="mh_contact_content">
					<div class="mh_contact_col mh_contact_col_left">
						<div class="mh_contact_col_form wrap">
							<div class="mh_contact_col_form_wrap <?php echo $form_title_position; ?>">	
								<?php if( $form_title || $form_subtitle ) { ?>
								<div class="mh_contact_col_form_title_container">
					                <?php if( $form_title ) { ?>
					                <div class="mh_contact_col_form_title" style="color:<?php echo $form_title_color; ?>;font-size:<?php echo $form_title_size; ?>px;">
						                <?php echo $form_title; ?>
						            </div>
					                <?php } ?>
					                <?php if( $form_subtitle ) { ?>
					                <div class="mh_contact_col_form_subtitle" style="color:<?php echo $form_subtitle_color; ?>;font-size:<?php echo $form_subtitle_size; ?>px;">
						                <?php echo $form_subtitle; ?>
						            </div>
					                <?php } ?>
					                <?php if( $form_text ) { ?>
					                <div class="mh_contact_col_form_txt">
						                <?php echo $form_text; ?>
						            </div>
					                <?php } ?>
								</div>
								<?php } ?>
								<div class="mh_contact_col_form_id">
									<?php echo do_shortcode( '[contact-form-7 id="'.$form.'" ]' ); ?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<?php } ?>			
			
		</div>
	</section>
</div>	