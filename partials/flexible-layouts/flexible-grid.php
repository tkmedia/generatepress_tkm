<?php
$grid_bgi = get_sub_field('fg_bgi');
$grid_bgc = get_sub_field('fg_bgc');
$grid_pat = get_sub_field('fg_pat');
$grid_pab = get_sub_field('fg_pab');
$grid_par = get_sub_field('fg_par');
$grid_pal = get_sub_field('fg_pal');
$grid_mpat = get_sub_field('fg_mpat');
$grid_mpab = get_sub_field('fg_mpab');
$grid_bgi_url = wp_get_attachment_image_src($grid_bgi, 'full');
	
$grid_title = get_sub_field('fg_ti');
$grid_subtitle = get_sub_field('fg_st');
$grid_title_size = get_sub_field('fg_tsz');
$grid_title_color = get_sub_field('fg_tcl');
$grid_subtitle_size = get_sub_field('fg_stsz');
$grid_subtitle_color = get_sub_field('fg_stcl');
$grid_title_align = get_sub_field('fg_tal');
$grid_title_position = get_sub_field('fg_tpo');
$grid_type = get_sub_field( 'fg_tp' );
$grid_count = get_sub_field('fg_cu');
$grid_count_mobile = get_sub_field('fg_cum');
$grid_slider = get_sub_field('fg_sl');
$grid_slidermo = get_sub_field('fg_slm');
$grid_tstyle = get_sub_field('fg_tsty');
$grid_ststyle = get_sub_field('fg_ststy');
$grid_linedividers = get_sub_field('fg_lidiv');
$grid_nowrap = get_sub_field('fg_nwp');
$grid_source = get_sub_field('fg_src');
$grid_fixed_bg = get_sub_field('fg_fxbg');
//if( $grid_source == 'manual' ) {
	$grid_style = get_sub_field('fg_cgs');
	$grid_imageposition = get_sub_field('fg_cip');
	$grid_custom_size = get_sub_field('fg_cis');
	$grid_imageheight = get_sub_field('fg_cih');
	$grid_item_titlesize = get_sub_field( 'fg_its' );
	$grid_item_subtitlesize = get_sub_field( 'fg_ists' );
	$grid_item_titlecolor = get_sub_field( 'fg_itc' );
	$grid_item_subtitlecolor = get_sub_field( 'fg_istc' );
	$grid_pad = get_sub_field( 'fg_ipa' );
	$grid_grid = get_sub_field( 'fg_gd' );
//}
//if( $grid_source == 'page' ) {
	$page_grid_style = get_sub_field( 'fg_pgs' );
	$page_grid_pages = get_sub_field( 'fg_pgp' );
	$page_grid_image_size = get_sub_field( 'fg_pis' );
//}
//if( $grid_source == 'poroduct' ) {
//}
//if( $grid_source == 'gallery' ) {
	$gallery_images = get_sub_field('fg_ig');
	$grid_gallery_flayout = get_sub_field('fg_igfl');
//}

	if ( $grid_count == 1 ) : $m_sm_cols = "12"; $m_md_cols = "12"; $m_lg_cols = "12";
	elseif ( $grid_count == 2 ) : $m_sm_cols = "6"; $m_md_cols = "6"; $m_lg_cols = "6";
	elseif ( $grid_count == 3 ) : $m_sm_cols = "6"; $m_md_cols = "4"; $m_lg_cols = "4";
	elseif ( $grid_count == 4 ) : $m_sm_cols = "4"; $m_md_cols = "3"; $m_lg_cols = "3";
	elseif ( $grid_count == 5 ) : $m_sm_cols = "4"; $m_md_cols = "20"; $m_lg_cols = "20";
	elseif ( $grid_count == 6 ) : $m_sm_cols = "3"; $m_md_cols = "2"; $m_lg_cols = "2";
	elseif ( $grid_count == 7 ) : $m_sm_cols = "3"; $m_md_cols = "seven"; $m_lg_cols = "seven";
	elseif ( $grid_count == 8 ) : $m_sm_cols = "3"; $m_md_cols = "20"; $m_lg_cols = "eight";
	endif;
	if ( $grid_count_mobile == 1 ) : $m_xs_cols = "12";
	elseif ( $grid_count_mobile == 2 ) : $m_xs_cols = "6";
	elseif ( $grid_count_mobile == 3 ) : $m_xs_cols = "4";
	endif;
?>


<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?> flex_grid_<?php echo $count;?>">
	
	<style>
	<?php if( $grid_source == 'manual' ) { ?>
	#section-<?php echo $count;?> .masonary_grid_link.grid_features_icon .layout .grid-item .grid-item-inner-img.contain-object-fit {height:<?php echo $grid_imageheight; ?>px;}
	#section-<?php echo $count;?> .masonary_grid_link .grid-item {padding:<?php echo $grid_pad; ?>px;}	
	<?php } ?>
	<?php if( $grid_mpat || $grid_mpab ) { ?>
	@media (max-width: 767px) {
	#section-<?php echo $count;?> {padding-top:<?php echo $grid_mpat; ?>px!important;padding-bottom:<?php echo $grid_mpab; ?>px!important;}	
	}
	<?php } ?>
	<?php if( $grid_style == 'stories' ) { ?>
	@media (min-width: 768px) {
		#section-<?php echo $count;?> .masonary_grid_link.box-layout.grid_stories .flex_masonary_content_wrap {min-height:<?php echo $grid_imageheight ?>px;}
	}
	<?php } ?>
	</style>
	
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_feature page_flexible_content section-<?php echo $count;?><?php if( $grid_fixed_bg ) { ?> fixed_bg<?php } ?>" style="padding-top:<?php echo $grid_pat; ?>px;padding-bottom:<?php echo $grid_pab; ?>px;padding-right:<?php echo $grid_par; ?>px;padding-left:<?php echo $grid_pal; ?>px;<?php if( $grid_bgi ) { ?>background-image:url(<?php echo $grid_bgi_url[0]; ?>);<?php } ?>background-color:<?php echo $grid_bgc; ?>;">

		<div class="masonary_grid_link <?php if( $grid_source == 'manual' ) { ?> <?php echo $grid_type; ?> grid_<?php echo $grid_style; ?><?php } elseif( $grid_source == 'gallery' ) { echo $grid_type; } ?> title_<?php echo $grid_title_position; ?> flexible_page_element title_<?php echo $grid_title_align; ?><?php if( $grid_title_align ) { ?> vertical_align<?php } ?> source_<?php echo $grid_source; ?><?php if( $grid_linedividers ) { ?> linedividers<?php } ?><?php if( !$grid_nowrap ) { ?> wrap<?php } ?>" itemprop="text">
			
			<?php if( $grid_title || $grid_subtitle ) { ?>
			<div class="masonary_grid_link_title_wrap title_wrap_<?php echo $grid_title_align; ?> style_<?php echo $grid_tstyle; ?>">
				<?php if( $grid_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $grid_title_align; ?>" style="text-align:<?php echo $grid_title_align; ?>;color:<?php echo $grid_title_color; ?>;font-size:<?php echo $grid_title_size; ?>px;"><?php echo $grid_title; ?></h2>
				<?php } ?>
				<?php if( $grid_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $grid_title_align; ?>" itemprop="headline" style="text-align:<?php echo $grid_title_align; ?>;color:<?php echo $grid_subtitle_color; ?>;font-size:<?php echo $grid_subtitle_size; ?>px;"><?php echo $grid_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<?php 
			if( $grid_source == 'manual' ) { 
			$page_grid_overlap = get_sub_field( 'fg_oltm' );
			?>
			
			<div class="masonary_grid_link_wrap masonary_grid-<?php echo $count;?><?php if( $grid_type == 'box-layout' ) { ?> <?php echo $grid_imageposition; }?>"<?php if( $page_grid_overlap ) { ?> style="margin-top:-<?php echo $page_grid_overlap;?>px;"<?php } ?>>

				<?php if( $grid_grid ) { ?>
				<div class="masonary_grid<?php if( $grid_slider ) { ?> slider-container<?php } ?><?php if( $grid_slidermo ) { ?> slider-container-mo<?php } ?>">

					<?php if( $grid_type == 'box-layout' ) { ?>
					<div class="layout grid_cols_<?php echo $grid_count; ?> <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">
					<?php $link_item = 1;
					foreach($grid_grid as $gridrow) {
						$masonary_img = $gridrow['m_im'];$masonary_ico = $gridrow['m_icon'];$masonary_title = $gridrow['m_t'];$masonary_subtitle = $gridrow['m_st'];$masonary_text = $gridrow['m_stxt'];$masonary_linktype = $gridrow['m_lkt'];$masonary_link = $gridrow['m_lk'];$masonary_linkpage = $gridrow['m_plk'];$masonary_linkform = $gridrow['m_flk'];$masonary_bottomtext = $gridrow['m_bot'];$masonary_newtab = $gridrow['m_bot'];$masonary_button_text = $gridrow['m_btnt'];$masonary_con_position = $gridrow['m_cop'];$masonary_over = $gridrow['m_over'];$masonary_tic = $gridrow['m_tic'];$masonary_stc = $gridrow['m_stc'];$masonary_bgc = $gridrow['m_ibg'];//$masonary_title_color = $gridrow['m_tcl'];
					?>
					    <div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>">
						    
							<?php if( $masonary_linktype == 'page_link' && $masonary_linkpage ): ?>
							<a href="<?php echo $masonary_linkpage; ?>" class="img_info_link">
							<?php endif; ?>	
							<?php if( $masonary_linktype == 'free_link' && $masonary_link ): ?>
							<a href="<?php echo $masonary_link; ?>" class="img_info_link">
							<?php endif; ?>
							<?php if( $masonary_linktype == 'form_popup' && $masonary_linkform ): ?>					
							<a class="img_info_link" data-fancybox data-src="#popop-form-<?php echo $count;?>-<?php echo $link_item;?>" href="javascript:;">		
							<?php endif; ?>
							
							
							<div class="grid-item-inner<?php if( $masonary_over ) { ?> item-overlay<?php }?>"<?php if( $masonary_bgc ) { ?> style="background-color:<?php echo $masonary_bgc;?>;padding: 15px;"<?php }?>>
								<?php if( $grid_style == 'testimonials' ) { ?>
								
									<div class="testimonial-quote" style="color:<?php if($masonary_stc) { echo $masonary_stc; } else { echo $grid_item_subtitlecolor; } ?>;"><i class="fal fa-quote-left"></i></div>
									<?php if( $masonary_text ) { ?>
									<div class="flex_masonary_text grid-item-<?php echo $count;?>" style="color:<?php if($masonary_tic) { echo $masonary_tic; } else { echo $grid_item_titlecolor; } ?>;"><?php echo $masonary_text; ?></div>
									<?php } ?>
									
									<div class="testimonial-author-wrap row-flex middle-xs center-xs">
										<?php if( $masonary_img && $grid_imageheight ) { ?>
										<div class="grid-item-inner-img testimonial-author-image col-xs-5" style="height:<?php echo $grid_imageheight; ?>px;">
											<?php echo wp_get_attachment_image( $masonary_img, $grid_custom_size ); ?>
										</div>
										<?php } elseif( $masonary_img ) { ?>	
										<div class="grid-item-inner-img-full testimonial-author-image col-xs-5" style="height:auto;">
											<?php echo wp_get_attachment_image( $masonary_img, $grid_custom_size ); ?>
										</div>
										<?php } ?>
										<?php if( $masonary_subtitle || $masonary_title ) { ?>
										<div class="testimonial-author-content col-xs-7">
											<div class="testimonial-title style_<?php echo $grid_ststyle; ?>" style="font-size:<?php echo $grid_item_titlesize; ?>px;color:<?php if($masonary_tic) { echo $masonary_tic; } else { echo $grid_item_titlecolor; } ?>;"><?php echo $masonary_title; ?></div>
											<div class="testimonial-caption" style="font-size:<?php echo $grid_item_subtitlesize; ?>px;color:<?php if($masonary_stc) { echo $masonary_stc; } else { echo $grid_item_subtitlecolor; } ?>;"><?php echo $masonary_subtitle; ?></div>
										</div>
										<?php } ?>
									</div>
								
								<?php } elseif( $masonary_img && $grid_style !== 'stories' || $masonary_ico ) { ?>
								<div class="grid-item-inner-img-bg" style="<?php if( $masonary_img && $grid_imageheight ) { ?>height:<?php echo $grid_imageheight; ?>px;<?php } else { ?>height:auto;<?php } ?>">
									
									<?php if( $grid_style == 'features_icon' && $masonary_ico ) { 
										$masonary_icoc = $gridrow['m_icoc']; ?>
									<div class="grid-item-inner-ico" style="font-size:<?php echo $grid_imageheight; ?>px;color:<?php echo $masonary_icoc; ?>;">
									<?php } elseif( $masonary_img && $grid_imageheight ) { ?>
									<div class="grid-item-inner-img" style="height:<?php echo $grid_imageheight; ?>px;">
									<?php } else { ?>	
									<div class="grid-item-inner-img-full" style="height:auto;">
									<?php } ?>
										<?php if( $grid_style == 'features_icon' && $masonary_ico ) { ?>
										<?php echo $masonary_ico;?>
										<?php } else { ?>
										<?php echo wp_get_attachment_image( $masonary_img, $grid_custom_size ); ?>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
								
								<?php if( $grid_style !== 'testimonials' && $masonary_title ) { ?>
									<div class="flex_masonary_content<?php if( $grid_style == 'simple' && $masonary_con_position ) { ?> con_<?php echo $masonary_con_position; } ?>" style="color:<?php //echo $masonary_title_color; ?>;">
										<div class="flex_masonary_content_container">
											<div class="flex_masonary_content_wrap">
												<div class="flex_masonary_title style_<?php echo $grid_ststyle; ?>" style="font-size:<?php echo $grid_item_titlesize; ?>px;color:<?php if($masonary_tic) { echo $masonary_tic; } else { echo $grid_item_titlecolor; } ?>;"><?php echo $masonary_title; ?></div>
												<?php if( $masonary_subtitle ) { ?>
												<div class="flex_masonary_subtitle" style="font-size:<?php echo $grid_item_subtitlesize; ?>px;color:<?php if($masonary_stc) { echo $masonary_stc; } else { echo $grid_item_subtitlecolor; } ?>;"><?php echo $masonary_subtitle; ?></div>
												<?php } ?>
												<?php if( $grid_style == 'testimonials' && $masonary_text || $grid_style == 'stories' && $masonary_text ) { ?>
												<div class="flex_masonary_text grid-item-<?php echo $count;?>">
													<?php echo $masonary_text; ?>
												</div>
												<?php } ?>
											</div>
											<?php if( $grid_style !== 'features' ) { ?>
												<?php if( $masonary_linktype && $masonary_button_text ) { ?>
												<div class="grid_btn section_readmore_link_wrap">
													<button class="section_readmore_link watch_btn hoverLink"><?php echo $masonary_button_text; ?></button>
												</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<?php if( $grid_style == 'features' ) { ?>
										<?php if( $masonary_linktype && $masonary_button_text ) { ?>
										<div class="grid_btn section_readmore_link_wrap">
											<button class="section_readmore_link watch_btn hoverLink"><?php echo $masonary_button_text; ?></button>
										</div>
										<?php } ?>
									<?php } ?>
								<?php } ?>
								
								<?php if( $masonary_bottomtext && $grid_style == 'contact_boxes' ) { ?>
								<div class="flex_masonary_bottom">
									<?php echo $masonary_bottomtext; ?>
								</div>
								<?php } ?>
							</div>
							<?php if( $masonary_linktype ) { ?></a><?php } ?>
							
							<?php if( $masonary_linktype == 'form_popup' && $masonary_linkform ): ?>
							<?php 
							$popup_contact_title = get_option( 'options_default_flex_form_title' );
							$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
							?>
							<div style="display: none;max-width: 700px;" id="popop-form-<?php echo $count;?>-<?php echo $link_item;?>" class="button-popop-form">
								<div class="button-popop-form-wrap">
									<div class="button-popop-form-row">
										<div class="button-popop-form-col form-image col-xs-12">
											<?php if( $popup_contact_title ) { ?>
											<div class="contact-title">
												<div class="popup_contact_title"><?php echo $popup_contact_title; ?></div>
											</div>
											<?php } ?>
											<?php if( $popup_contact_subtext ) { ?>
											<div class="contact-title">
												<div class="popup_contact_subtext"><?php echo $popup_contact_subtext; ?></div>
											</div>
											<?php } ?>
											<div class="contact-form-page">
												<div class="full_form_id">
													<div class="full_form_id_wrap">
														<?php echo do_shortcode( '[contact-form-7 id="'.$masonary_linkform.'" ]' ); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							
					    </div>
				    <?php } ?>
					</div>

					<?php } elseif( $grid_type == 'vid-layout' ) { ?>
					<div class="layout <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex<?php } ?>">
					<?php while ( have_rows('fg_gd') ) : the_row();
						$masonary_img = get_sub_field('m_im');
						$masonary_vid_link = get_sub_field('m_vlk');
						$masonary_vid_title = get_sub_field('m_vt');
						preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $masonary_vid_link, $match);
						$youtube_id = $match[1];
					?>
					    <div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?><?php } ?>">
							<a data-fancybox href="<?php echo $masonary_vid_link; ?>">
								<?php if( $masonary_vid_title ) { ?>
								<div class="flex_masonary_vid_title"><?php echo $masonary_vid_title; ?></div>
								<?php } ?>
							<div class="grid-item-inner">
					            <?php if( $masonary_img ) { ?>
								<?php echo wp_get_attachment_image( $masonary_img, 'gallery-800' ); ?>
					            <?php } else { ?>						            
					            <img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg">
					            <?php } ?>
								<div class="flex_masonary_content img_cen_cen">
									<div class="flex_masonary_content_wrap">
										<span class="video_item_icon"><i class="fas fa-play"></i></span>
									</div>
								</div>
							</div>
							</a>
					    </div>
				    <?php endwhile; ?>
					</div>

				    <?php } else { ?>

					<div class="layout">
					<?php while ( have_rows('fg_gd') ) : the_row();
						$masonary_img = get_sub_field('m_im');
						$masonary_title = get_sub_field('m_t');
						$masonary_subtitle = get_sub_field('m_st');
						$masonary_link = get_sub_field('m_lk');
						//$masonary_title_color = get_sub_field('m_tcl');
						$masonary_linktype = get_sub_field('m_lkt');
						$masonary_linkpage = get_sub_field('m_plk');
						$masonary_linkform = get_sub_field('m_flk');
						$masonary_newtab = get_sub_field('m_bot');
						$masonary_con_position = get_sub_field('m_cop');
						$masonary_over = get_sub_field('m_over');
						$masonary_tic = get_sub_field('m_tic');
						$masonary_stc = get_sub_field('m_stc');
					?>
						<div class="grid-item">
							<?php if( $masonary_linktype == 'page_link' && $masonary_linkpage ): ?>
							<a href="<?php echo $masonary_linkpage; ?>" class="img_info_link">
							<?php endif; ?>	
							<?php if( $masonary_linktype == 'free_link' && $masonary_link ): ?>
							<a href="<?php echo $masonary_link; ?>" class="img_info_link">
							<?php endif; ?>
							<?php if( $masonary_linktype == 'form_popup' && $masonary_linkform ): ?>					
							<a class="img_info_link" data-fancybox data-src="#popop-form-<?php echo $count;?>-<?php echo $link_item;?>" href="javascript:;">		
							<?php endif; ?>
							<div class="grid-item-inner">
								<?php echo wp_get_attachment_image( $masonary_img, 'full' ); ?>
								<?php if( $grid_style == 'projects' && $masonary_title ) { ?>
								<div class="flex_item_title_over">
									<div class="flex_item_title_over_inner"><?php echo $masonary_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $masonary_subtitle || $masonary_title ) { ?>
								<div class="flex_masonary_content">
									<div class="flex_masonary_content_wrap">
										<div class="flex_masonary_content_wrap_inn">
											<div class="flex_masonary_title" style="font-size:<?php echo $grid_item_titlesize; ?>px;color:<?php if($masonary_tic) { echo $masonary_tic; } else { echo $grid_item_titlecolor; } ?>;">
												<?php echo $masonary_title; ?>
											</div>
											<?php if( $masonary_subtitle ) { ?>
											<div class="flex_masonary_subtitle" style="font-size:<?php echo $grid_item_subtitlesize; ?>px;color:<?php if($masonary_stc) { echo $masonary_stc; } else { echo $grid_item_subtitlecolor; } ?>;">
												<?php echo $masonary_subtitle; ?>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
							</a>
						</div>
				    <?php endwhile; ?>
					</div>

					<?php } ?>
					
				</div>
				<?php } ?>

			</div>
						

			<?php } elseif( $grid_source == 'page' ) { ?>

			<div class="masonary_grid_link_wrap masonary_grid_<?php echo $grid_source;?> masonary_grid-<?php echo $count;?> page_grid_style_<?php echo $page_grid_style;?>">
				<div class="masonary_grid<?php if( $grid_slider ) { ?> slider-container<?php } ?><?php if( $grid_slidermo ) { ?> slider-container-mo<?php } ?>">
					<div class="layout <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">
					<?php 
					if( $page_grid_pages ) {	
					foreach( $page_grid_pages as $post): ?>
			        <?php setup_postdata($post); ?>
						<div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>">
							<a href="<?php the_permalink(); ?>" class="img_info_link">
								<?php if( $page_grid_style == 'article-split' ) { ?>
								<div class="grid-item-inner row-flex">
									<div class="grid-item-inner-img col-xs-12 col-sm-6">
										<?php echo the_post_thumbnail($page_grid_image_size); ?>
									</div>
									<div class="grid-item-inner-con col-xs-12 col-sm-6">
										<div class="grid-item-inner-con-inn">
											<div class="grid-item-title"><?php the_title(); ?></div>
											<?php 
											$excerpt = get_field('p_sum');
											if( $excerpt ) { 
												//$excerpt = substr($excerpt, 0, 100);
												//$result = substr($excerpt, 0, strrpos($excerpt, ' '));
											?>
											<div class="grid-item-excerpt"><?php echo wp_trim_words( $excerpt, 15); ?></div>
											<?php } ?>
											<div class="grid-item-btn">
											<button class="section_readmore_link watch_btn hoverLink"><?php _e('Read More', 'generatepress_child'); ?></button>
											</div>
										</div>
									</div>
								</div>
								<?php } elseif( $page_grid_style == 'article-mix' ) { ?>
								<div class="grid-item-inner">
									<div class="grid-item-inner-img">
										<?php echo the_post_thumbnail($page_grid_image_size); ?>
										<div class="grid-item-inner-con">
											<div class="grid-item-inner-con-inn">
												<div class="grid-item-date"><?php echo get_the_date('d.m.Y', $post); ?></div>
												<div class="grid-item-title"><?php the_title(); ?></div>
												<?php 
												$excerpt = get_field('p_sum');
												if( $excerpt ) { 
													//$excerpt = substr($excerpt, 0, 100);
													//$result = substr($excerpt, 0, strrpos($excerpt, ' '));
												?>
												<div class="grid-item-excerpt"><?php echo wp_trim_words( $excerpt, 20); ?></div>
												<?php } ?>
												<div class="grid-item-btn">
												<button class="section_readmore_link watch_btn hoverLink"><?php _e('More info', 'generatepress_child'); ?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } else { ?>
								<div class="grid-item-inner">
									<div class="grid-item-inner-img">
										<?php if( $page_grid_style == 'article-hover' ) { ?>
										<div class="article_hover_btn">
											<div class="article_hover_btn_inner"><?php _e('Read More', 'generatepress_child'); ?></div>
										</div>
										<?php } ?>
										<?php echo the_post_thumbnail($page_grid_image_size); ?>
									</div>
									<div class="flex_masonary_title">
										<div class="flex_masonary_title_inner"><?php the_title(); ?></div>
										<?php 
										$excerpt = get_the_excerpt();
										if( $excerpt && $page_grid_style == 'article-hover' ) { 
											$excerpt = substr($excerpt, 0, 100);
											$result = substr($excerpt, 0, strrpos($excerpt, ' '));
										?>
										<div class="articles_grid_excerpt">	
											<?php 
											//echo custom_field_excerpt();
											//echo wp_trim_words($excerpt,7);
											echo $result; 
											//echo wp_html_excerpt( $excerpt, 100, '...' ); ?>
										</div>
										<?php } ?>
										<?php if( $page_grid_style == 'article' ) { ?>
										<button class="section_readmore_link watch_btn hoverLink">גלה עוד</button>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							</a>
						</div>
					<?php endforeach; 
					}
					?>
					</div>
					<?php wp_reset_postdata(); ?>
						
				</div>
			</div>				
			
			<?php } elseif( $grid_source == 'product' ) { 
			$product_grid_style = get_sub_field( 'fg_prgs' );
			$product_grid_pages = get_sub_field( 'fg_prgp' );
			$product_grid_image_size = get_sub_field( 'fg_pris' );
			?>
			<div class="masonary_grid_link_wrap masonary_grid_<?php echo $grid_source;?> masonary_grid-<?php echo $count;?> page_grid_style_<?php echo $product_grid_style;?>">
				<div class="masonary_grid<?php if( $grid_slider ) { ?> slider-container<?php } ?>">
					<div class="layout <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">
					<?php foreach( $product_grid_pages as $post ): ?>
					<?php setup_postdata($post); ?>
					<?php
					defined( 'ABSPATH' ) || exit;
					global $product;
					$pro_link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
					// Ensure visibility.
					if ( empty( $product ) || ! $product->is_visible() ) {
						return;
					}
					?>
						<div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>">
							
							<div<?php //wc_product_class($product); ?>>
								
								<?php if( $product_grid_style == 'simple' ) { ?>
									<div class="product_grid_item_container">
										<div class="product_grid_item_img_wrap">
											<?php
											//echo get_the_post_thumbnail($product->ID, 'full');
											echo get_the_post_thumbnail($product->get_id(), $product_grid_image_size);
											?>
											<div class="product_grid_item_excerpt">
												<div class="product_grid_item_excerpt_inner">
													<?php 
													if( class_exists( 'YITH_WCQV_Frontend' ) ) {
														echo do_shortcode( '[yith_quick_view product_id="'.$product->get_id().'" type="icon" label="<i class="fal fa-eye"></i>"]' ); 
													} ?>
													<?php 
													//echo wp_html_excerpt( get_the_content(), 100, '...' );
													//echo wp_trim_words($post->post_excerpt,15);
													echo wp_trim_words( get_the_content(), 15);
													?>
													<?php echo '<a href="' . esc_url( $pro_link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">'; ?>
													<div class="product_grid_item_excerpt_more"><?php _e('Learn More', 'generatepress_child'); ?></div>
													</a>
												</div>
											</div>
										</div>
										<div class="product_grid_item_title_wrap row-flex">
											<div class="product_grid_item_title col-xs-12"><?php the_title(); ?></div>
											<div class="archive_product_item_price col-xs-12"><?php echo woocommerce_template_single_price(); ?></div>
										</div>
									</div>
								<?php } elseif( $product_grid_style == 'box_buy' ) { ?>
									<?php //echo '<a href="' . esc_url( $pro_link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">'; ?>
									
									<div class="product_grid_item_container archive_product_item_container product_item_container">
										<a href="<?php echo esc_url( $pro_link ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">
											<?php //do_action( 'woocommerce_before_shop_loop_item' ); ?>
											<div class="archive_product_item_img_wrap">
												<div class="archive_product_item_sale_flash">
												<?php echo woocommerce_show_product_loop_sale_flash (); ?>
												</div>
												<div class="archive_product_item_img">
												<?php echo get_the_post_thumbnail($product->get_id(), $product_grid_image_size); ?>
												</div>
												<div class="archive_product_item_add_to_cart">
												<?php echo woocommerce_template_loop_add_to_cart( $args = array() );
												//do_action( 'woocommerce_before_shop_loop_item_title' );
												?>
												</div>
												<div class="archive_product_item_quick_view">
												<?php 
												if( class_exists( 'YITH_WCQV_Frontend' ) ) {
													echo do_shortcode( '[yith_quick_view product_id="'.$product->get_id().'" type="icon" title="<i class="fal fa-eye"></i>"]' );
												} ?>
												</div>
											</div>
											<div class="archive_product_item_title_wrap">
												<div class="archive_product_item_title"><?php the_title(); ?><?php //do_action( 'woocommerce_shop_loop_item_title' ); ?></div>
												<div class="archive_product_item_price"><?php echo woocommerce_template_single_price(); ?><?php //do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
												</div>
												<div class="archive_product_item_cart"><?php //do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
											</div>
										</a>
									</div>
									
								<?php } ?>
							</div>
							
						</div>
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); ?> 
						
					</div>
				</div>
			</div>
			
			<?php } elseif( $grid_source == 'gallery' ) { 
			$gallry_img_size = get_sub_field('fg_igs');	
			?>

			<div class="masonary_grid_link_wrap masonary_grid-<?php echo $count;?>">
				<div class="masonary_grid<?php if( $grid_slider ) { ?> slider-container<?php } ?><?php if( $grid_slidermo ) { ?> slider-container-mo<?php } ?>">
					<?php if( $grid_type == 'box-layout' ) { ?>
					<div class="layout grid_cols_<?php echo $grid_count; ?> <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">
						<?php foreach( $gallery_images as $image ): ?>
					    <div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>">
							<a data-fancybox="gallery" data-caption="<?php echo $image['alt']; ?>" href="<?php echo $image['url']; ?>">
								<?php echo wp_get_attachment_image( $image['ID'], $gallry_img_size ); ?>
							</a>
					    </div>
					    <?php endforeach; ?>
					</div>

					<?php } elseif( $grid_type == 'grid-layout' ) { ?>

					<div class="layout">
					<?php foreach( $gallery_images as $image ): ?>
						<div class="grid-item">
							<a data-fancybox="gallery" data-caption="<?php echo $image['alt']; ?>" href="<?php echo $image['url']; ?>">
							<div class="grid-item-inner">
								<?php echo wp_get_attachment_image( $image['ID'], $gallry_img_size ); ?>
							</div>
							</a>
						</div>
				    <?php endforeach; ?>
					</div>

					<?php } else { ?>

					<div class="layout <?php echo $grid_gallery_flayout; ?>">
					<?php foreach( $gallery_images as $image ): ?>
						<div class="grid-item">
							<a data-fancybox="gallery" data-caption="<?php echo $image['alt']; ?>" href="<?php echo $image['url']; ?>">
							<div class="grid-item-inner">
								<?php if( $grid_type == 'flex-layout' && $grid_gallery_flayout == 'layout2'){ ?>
								<?php echo wp_get_attachment_image( $image['ID'], $gallry_img_size ); ?>
								<?php } else { ?>
								<?php echo wp_get_attachment_image( $image['ID'], $gallry_img_size ); ?>
								<?php } ?>
							</div>
							</a>
						</div>
				    <?php endforeach; ?>
					</div>
					
					<?php } ?>
					
				</div>
			</div>
						
			<?php } ?>

			<?php 
			$grid_button = get_sub_field('fg_bbtn');		
			if( $grid_button ) { 
			$grid_buttoncolor = get_sub_field('fg_bbtnc');
			$grid_buttonfont = get_sub_field('fg_bbtnf');
			$grid_buttontype = get_sub_field('fg_bbtnt');				
			?>
			<div class="section_btn grid_btn section_readmore_link_wrap">
				<?php if( $grid_buttontype == 'link' ): 
					$grid_buttonlink = get_sub_field('fg_bbtnl');
				?>
				<a href="<?php echo $grid_buttonlink; ?>" class="full_content_link">
				<?php endif; ?>	
				<?php if( $grid_buttontype == 'page' ): 
					$grid_buttonpage = get_sub_field('fg_bbtnp');
				?>
				<a href="<?php echo $grid_buttonpage; ?>" class="full_content_link">
				<?php endif; ?>
				<?php if( $grid_buttontype == 'form' ): 
					$grid_buttonform = get_sub_field('fg_bbtnf');
				?>					
				<a class="full_content_link" data-fancybox data-src="#popop-form-<?php echo $count;?>" href="javascript:;">
				<?php endif; ?>
				<?php if( $grid_buttontype == 'video' ): 
				$grid_buttonvideo = get_sub_field('fg_bbtnv');
				//Get vid id - option 1
				preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $grid_buttonvideo, $match);
				if (isset($match[1]))
				$youtube_id = $match[1];
				//Get vid id - option 2
				$parsedURL = parse_url($grid_buttonvideo);
				if (isset($parsedURL['query']))
				$vidQuery = $parsedURL['query'];
				$vidID = str_replace('v=','',$vidQuery);
				?>		
				<a data-fancybox href="<?php echo $grid_buttonvideo; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
				<?php endif; ?>	
				<?php if( $grid_buttontype == 'category' ): 
				$grid_buttoncat = get_sub_field('fg_bbtnc');	
				?>					
				<a href="<?php echo get_term_link( $grid_buttoncat ); ?>" class="full_content_link">
				<?php endif; ?>			
					<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $grid_buttonfont;?>;background:<?php echo $grid_buttoncolor;?> !important;"><?php echo $grid_button; ?></button>
				</a>
				<?php if( $grid_buttontype == 'form' ) { 
				$slider_btn_form_title = get_field('def_foti','option');
				$slider_btn_form_subtitle = get_field('def_fosti','option');
				?>
				<div style="display: none;max-width: 500px;" id="popop-form-<?php echo $count;?>" class="popop-feature button-popop-form">
					<div class="button-popop-form-wrap">
						<div class="button-popop-form-row">
							<div class="button-popop-form-col form-image col-xs-12">
								<?php if( $slider_btn_form_title ) { ?>
								<div class="contact-title">
									<div class="popup_contact_title"><?php echo $slider_btn_form_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $slider_btn_form_subtitle ) { ?>
								<div class="contact-title">
									<div class="popup_contact_subtext"><?php echo $slider_btn_form_subtitle; ?></div>
								</div>
								<?php } ?>
								<div class="contact-form-page">
									<div class="full_form_id">
										<div class="full_form_id_wrap">
											<?php echo do_shortcode( '[contact-form-7 id="'.$grid_buttonform.'" ]' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
			</div>
			<?php } ?>			
			
		</div>
		<?php if( $grid_type == 'grid-layout' || $grid_type == 'flex-layout' || $grid_slider || $grid_slidermo ): ?>
		<script>
		jQuery(function($) {
			<?php if( $grid_type == 'grid-layout' ): ?>
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(3)').addClass('span-3');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(5)').addClass('span-2');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(10)').addClass('span-2');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(13)').addClass('span-2');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(17)').addClass('span-3');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(21)').addClass('span-2');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(26)').addClass('span-3');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(40)').addClass('span-3');
			$('#section-<?php echo $count;?> .grid-layout .grid-item:nth-child(45)').addClass('span-3');
			<?php endif; ?>
			<?php if( $grid_type == 'flex-layout' && $grid_gallery_flayout == 'layout1' || $grid_source == 'manual' && $grid_type == 'flex-layout' ): ?>
				$('#section-<?php echo $count;?> .flex-layout .layout').addClass('row-flex');
	
				var elems = $("#section-<?php echo $count;?> .flex-layout .layout > .grid-item");
				var wrapper = $('<div class="col_layout col-xs-12 col-sm-6"><div class="row-flex">');
				var pArrLen = elems.length;
				for (var i = 0;i < pArrLen;i+=2){
				    elems.filter(':eq('+i+'),:eq('+(i+1)+')').wrapAll(wrapper);
				};
				$('#section-<?php echo $count;?> .flex-layout .col_layout:nth-child(4n+1)').addClass('row-a');
				$('#section-<?php echo $count;?> .flex-layout .col_layout:nth-child(4n+2)').addClass('row-a');
				$('#section-<?php echo $count;?> .flex-layout .col_layout:nth-child(4n+3)').addClass('row-b');
				$('#section-<?php echo $count;?> .flex-layout .col_layout:nth-child(4n+4)').addClass('row-b');
	
				$('#section-<?php echo $count;?> .flex-layout .grid-item').addClass('col-xs-12');
				//$('.flex-layout .col_layout:nth-child(odd) .grid-item').addClass('col-sm-6');
			<?php endif; ?>

			<?php if( $grid_type == 'flex-layout' && $grid_gallery_flayout == 'layout2'): ?>
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .layout').addClass('row-flex');
	
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .grid-item:nth-child(5n+1)').addClass('col-xs-12 col-sm-6');
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .grid-item:nth-child(5n+2)').addClass('col-xs-12 col-sm-6');
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .grid-item:nth-child(5n+3)').addClass('col-xs-12 col-sm-2');
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .grid-item:nth-child(5n+4)').addClass('col-xs-12 col-sm-5');
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .grid-item:nth-child(5n+5)').addClass('col-xs-12 col-sm-5');
				$('#section-<?php echo $count;?> .source_gallery.flex-layout .grid-item').addClass('col-xs-12');

			<?php endif; ?>

			<?php if( $grid_slider ) { ?>

			if ($('#section-<?php echo $count;?> .slider-wrapper .grid-item').length > 1) {
				var br_count<?php echo $count;?> = <?php echo $grid_count_mobile; ?> + 1;
				$("#section-<?php echo $count;?> .slider-wrapper").slick({
					<?php if ( is_rtl() ) { ?>
					rtl: true,
					<?php } ?>
					slidesToShow: <?php echo $grid_count; ?>,
					slidesToScroll: 1,
					pauseOnHover: true,
					speed: 500,
					autoplay: false,
					autoplaySpeed: 6000,
					arrows: true,
					dots: false,
					responsive: [
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: 2,
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: <?php echo $grid_count_mobile; ?>,
						//centerMode: true,
						//centerPadding: '40px',
						dots: false,
						arrows: true,
				      }
				    }
					]
				});
				$('#section-<?php echo $count;?> .slider-wrapper').on('setPosition', function (event, slick) {
					$(slick.$slides).height('auto').css('height', $(slick.$slideTrack).height() + 'px');
				});
			}
		    <?php } ?>		

		    <?php if ( wp_is_mobile() && $grid_slidermo ) { ?>	
			if ($('#section-<?php echo $count;?> .layout.row-flex .grid-item').length > 1) {
				var br_count<?php echo $count;?> = <?php echo $grid_count_mobile; ?> + 1;
				$("#section-<?php echo $count;?> .layout").slick({
					<?php if ( is_rtl() ) { ?>
					rtl: true,
					<?php } ?>
					slidesToShow: <?php echo $grid_count; ?>,
					slidesToScroll: 1,
					pauseOnHover: true,
					speed: 500,
					autoplay: false,
					autoplaySpeed: 6000,
					arrows: true,
					dots: false,
					responsive: [
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: 2,
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: <?php echo $grid_count_mobile; ?>,
						//centerMode: true,
						//centerPadding: '20px',
						dots: true,
						arrows: false,
				      }
				    }
					]
				});

			}
			<?php } ?>
			
		});
		</script>
		<?php endif; ?>

	</section>
</div>