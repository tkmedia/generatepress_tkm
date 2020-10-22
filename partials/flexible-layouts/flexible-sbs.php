<?php 
$sidebyside_style = get_sub_field('sbs_sy');
$sidebyside_bgi = get_sub_field('sbs_bgi');
$sidebyside_bgc = get_sub_field('sbs_bgc');
$sidebyside_pat = get_sub_field('sbs_pat');
$sidebyside_pab = get_sub_field('sbs_pab');
$sidebyside_par = get_sub_field('sbs_par');
$sidebyside_pal = get_sub_field('sbs_pal');
$sidebyside_mpat = get_sub_field('sbs_mpat');
$sidebyside_mpab = get_sub_field('sbs_mpab');
$sidebyside_bgi_url = wp_get_attachment_image_src($sidebyside_bgi, 'full');

$sidebyside_title = get_sub_field('sbs_ti');
$sidebyside_subtitle = get_sub_field('sbs_st');
$sidebyside_title_size = get_sub_field('sbs_tsz');
$sidebyside_title_color = get_sub_field('sbs_tcl');
$sidebyside_subtitle_size = get_sub_field('sbs_stsz');
$sidebyside_subtitle_color = get_sub_field('sbs_stcl');
$sidebyside_tstyle = get_sub_field('sbs_tsty');
$sidebyside_type = get_sub_field('sbs_tty');
$sidebyside_title_align = get_sub_field('sbs_tal');
$sidebyside_cols = get_sub_field('sbs_cols');
$sidebyside_align = get_sub_field('sbs_ali');
$sidebyside_nopad = get_sub_field('sbs_nopad');
$sidebyside_nowrap = get_sub_field('sbs_nowr');

$sbs_rows = get_sub_field('sbs_flex');
$sbs_fixed_bg = get_sub_field('sbs_fxbg');
 ?>
	
<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?> flex_media_content_<?php echo $count;?>">

	<?php if( $sidebyside_mpat || $sidebyside_mpab ) { ?>	
	<style>
	@media (max-width: 767px) {
	#section-<?php echo $count;?> {padding-top:<?php echo $sidebyside_mpat; ?>px!important;padding-bottom:<?php echo $sidebyside_mpab; ?>px!important;}	
	}
	</style>
	<?php } ?>

	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_feature page_flexible_content section-<?php echo $count;?><?php if( $sbs_fixed_bg ) { ?> fixed_bg<?php } ?>" style="padding-top:<?php echo $sidebyside_pat; ?>px;padding-bottom:<?php echo $sidebyside_pab; ?>px;padding-right:<?php echo $sidebyside_par; ?>px;padding-left:<?php echo $sidebyside_pal; ?>px;<?php if( $sidebyside_bgi ) { ?>background-image:url(<?php echo $sidebyside_bgi_url[0]; ?>);<?php } ?>background-color:<?php echo $sidebyside_bgc; ?>;">

		<div class="flex_media_content flexible_page_element<?php if( !$sidebyside_nowrap ) { ?> wrap<?php } ?>" itemprop="text">
			
			<?php if( $sidebyside_title || $sidebyside_subtitle ) { ?>
			<div class="media_content_title_wrap title_wrap_<?php echo $sidebyside_title_align; ?> style_<?php echo $sidebyside_tstyle; ?>">
				<?php if( $sidebyside_title ) { ?>
				<<?php echo $sidebyside_type; ?> class="section_title section_flex_title title_<?php echo $sidebyside_title_align; ?>" style="color:<?php echo $sidebyside_title_color; ?>;font-size:<?php echo $sidebyside_title_size; ?>px;"><?php echo $sidebyside_title; ?></<?php echo $sidebyside_type; ?>>
				<?php } ?>
				<?php if( $sidebyside_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $sidebyside_title_align; ?>" itemprop="headline" style="color:<?php echo $sidebyside_subtitle_color; ?>;font-size:<?php echo $sidebyside_subtitle_size; ?>px;"><?php echo $sidebyside_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<?php if( $sbs_rows ) { ?>
				
			<div class="media_content_container media_content_<?php echo $sidebyside_style;?>">
				
				<div class="media_content_row row-flex section_cols<?php echo $sidebyside_cols;?><?php if( $sidebyside_nopad ) { ?> sidebyside_nopad<?php } ?><?php if( $sidebyside_align ) { ?> vertical_align<?php } ?>">

					<?php
					//print_r($sbs_rows);
					//$sbs_rows = get_post_meta( get_the_ID(), 'sbs_flex', true );
					foreach( $sbs_rows as $sbs_count => $sbs_row ) { ?>
						<div class="media_content_col col-xs-12">
						<?php
						switch ( $sbs_row['acf_fc_layout'] ) {
							
							case 'sbsf_ety':
							
							$sbst_empty_dh = $sbs_row['sbsf_edh'];
							$sbst_empty_mh = $sbs_row['sbsf_emh'];

					        if ( $sbst_empty_dh || $sbst_empty_mh ) { ?>
							<style>
							#section-<?php echo $count;?> .empty_inner {height:<?php echo $sbst_empty_dh;?>px;}
							@media only screen and (max-width: 760px) {
								#section-<?php echo $count;?> .empty_inner {height:<?php echo $sbst_empty_mh;?>px;}
							}			
							</style>
							<?php } ?>				        
							<div class="media_content_item img_slider">
								<div class="empty_inner">
								</div>
							</div>
							<?php break;

							case 'sbsf_isl':
							
							$sbst_slider_size = $sbs_row['sbsf_issi'];
							$sbst_slider_images = $sbs_row['sbsf_isim'];
							$sbst_slider_title = $sbs_row['sbsf_isti'];
							$sbst_slider_title_color = $sbs_row['sbsf_istic'];
							$sbst_slider_title_size = $sbs_row['sbsf_istis'];
							$sbsf_slider_pat = $sbs_row['sbsf_ispat'];
							$sbsf_slider_pab = $sbs_row['sbsf_ispab'];
							$sbsf_slider_par = $sbs_row['sbsf_ispar'];
							$sbsf_slider_pal = $sbs_row['sbsf_ispal'];
							?>
							<div class="media_content_slider" style="padding-top:<?php echo $sbsf_slider_pat; ?>px;padding-bottom:<?php echo $sbsf_slider_pab; ?>px;padding-right:<?php echo $sbsf_slider_par; ?>px;padding-left:<?php echo $sbsf_slider_pal; ?>px;">
								<div class="full_image_inner">
									<?php if( $sbst_slider_title ) { ?>
									<div class="content_slider_title" style="color:<?php echo $sbst_slider_title_color;?>;font-size:<?php echo $sbst_slider_title_size;?>px;"><?php echo $sbst_slider_title;?></div>
									<?php } ?>
							        <div class="media_content_slides">
							            <?php foreach( $sbst_slider_images as $sbst_slider_image ): ?>
								        <div class="media_content_slider_item">
							                <div class="content_slider_item_img">
								                <?php //if ($title_location == 'slider_content_bottom' ) { ?>
								                <?php echo wp_get_attachment_image( $sbst_slider_image['ID'], $sbst_slider_size ); 
								                //} else { ?>
												<div class="slide-inner" style="background-image:url(<?php echo $sbst_slider_image['url']; ?>)"></div>
												<?php //} ?>
							                </div>
								        </div>
							            <?php endforeach; ?>
							        </div>    
								</div>
							</div>
							<script>
							jQuery(function($) {
								if ($('#section-<?php echo $count;?> .media_content_slides .media_content_slider_item').length > 1) {
									$("#section-<?php echo $count;?> .media_content_slides").slick({
										rtl: true,
										slidesToShow: 1,
										slidesToScroll: 1,
										pauseOnHover: true,
										speed: 900,
										autoplay: true,
										autoplaySpeed: 4000,
										arrows: false,
										dots: true,
										//cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
										draggable: true,
										//fade: true,
										infinite: true,
										touchThreshold: 100
									});
								}
							});
							</script>
							<?php break;

							case 'sbsf_tbl':
							
							$sbst_title = $sbs_row['sbsf_tblti'];
							$sbst_titlesize = $sbs_row['sbsf_tbltis'];
							$sbst_titlecolor = $sbs_row['sbsf_tbltic'];
							$sbst_cpat = $sbs_row['sbst_cpat'];
							$sbst_cpab = $sbs_row['sbst_cpab'];
							$sbst_cpar = $sbs_row['sbst_cpar'];
							$sbst_cpal = $sbs_row['sbst_cpal'];
							$sbst_tabel = $sbs_row['sbst_tb'];
							?>
							
							<div class="media_content_item table_content" style="padding-top:<?php echo $sbst_cpat; ?>px;padding-bottom:<?php echo $sbst_cpab; ?>px;padding-right:<?php echo $sbst_cpar; ?>px;padding-left:<?php echo $sbst_cpal; ?>px;">
								<div class="full_content_inner">
									<?php if( $sbst_title ) { ?>
									<div class="full_content_title" style="color:<?php echo $sbst_titlecolor;?>;font-size:<?php echo $sbst_titlesize;?>px;"><?php echo $sbst_title;?></div>
									<?php } ?>
									<?php if( $sbst_tabel ) { ?>

									<div class="table_container">
				
										<div class="table-list-row">
										<?php 
										$i = 1;
									
										    echo '<table border="0">';
				
										        if ( ! empty( $sbst_tabel['caption'] ) ) {
										            echo '<caption>' . $sbst_tabel['caption'] . '</caption>';
										        }
				
										        //if ( $flex_table['header'] ) {
										        if ( ! empty( $sbst_tabel['header'] ) ) {
										            echo '<thead>';
										                echo '<tr>';
										                    foreach ( $sbst_tabel['header'] as $th ) {
										                        echo '<th><span class="table_cell_header">';
										                            echo $th['c'];
										                        echo '</span></th>';
										                    }
										                echo '</tr>';
										            echo '</thead>';
										        }
										
										        echo '<tbody>';
										            foreach ( $sbst_tabel['body'] as $tr ) {
										                echo '<tr>';
										                    foreach ( $tr as $td ) {
										                        echo '<td><span class="table_cell">';
										                            echo $td['c'];
										                        echo '</span></td>';
										                    }
										                echo '</tr>';
										            }
										        echo '</tbody>';
										
										    echo '</table>';
									         
									        if ( ! empty( $sbst_tabel['header'] ) ) { ?>
											<style>
											@media 
											only screen and (max-width: 760px),
											(min-device-width: 768px) and (max-device-width: 1024px)  {
												<?php foreach ( $sbst_tabel['header'] as $th ) { ?> #section-<?php echo $count;?> td:nth-of-type(<?php echo $i++; ?>):before { content: "<?php echo $th['c']; ?>"; }  <?php } ?>
											}			
											</style>
											<?php } ?>				        
										</div>
									</div>


									<?php } ?>
								</div>
							</div>
							<?php break;
																
							case 'sbsf_con':
							$sbsf_title = $sbs_row['sbsf_cti'];
							$sbsf_subtitle = $sbs_row['sbsf_csti'];
							$sbsf_text = $sbs_row['sbsf_ctex'];
							$sbsf_titlealign = $sbs_row['sbsf_ctisi'];
							$sbsf_titlesize = $sbs_row['sbsf_ctis'];
							$sbsf_titlecolor = $sbs_row['sbsf_ctic'];
							$sbsf_stitlecolor = $sbs_row['sbsf_cstic'];
							$sbsf_titlestyle = $sbs_row['sbsf_ctsy'];
							
							$sbsf_buttontype = $sbs_row['sbsf_cbtt'];
							$sbsf_link = $sbs_row['sbsf_clk'];
							$sbsf_linkpage = $sbs_row['sbsf_cpa'];
							$sbsf_linkform = $sbs_row['sbsf_cfo'];
							$sbsf_linkvid = $sbs_row['sbsf_cvi'];
							$sbsf_linkcat = $sbs_row['sbsf_ccat'];
							
							$sbsf_button = $sbs_row['sbsf_cbt'];
							$sbsf_btncolor = $sbs_row['sbsf_cbc'];
							$sbsf_btnfont = $sbs_row['sbsf_cbfc'];
							$sbsf_textcolor = $sbs_row['sbsf_ctxc'];
							$sbsf_bgcolor = $sbs_row['sbsf_ctxbc'];
							$sbsf_btnside = $sbs_row['sbsf_cbts'];
							
							$sbsf_cpat = $sbs_row['sbsf_cpat'];
							$sbsf_cpab = $sbs_row['sbsf_cpab'];
							$sbsf_cpar = $sbs_row['sbsf_cpar'];
							$sbsf_cpal = $sbs_row['sbsf_cpal'];
							
							$sbsf_cstyle = $sbs_row['sbsf_csty'];
							?>
							
							<div class="media_content_item full_content style_<?php echo $sbsf_cstyle; ?>" style="padding-top:<?php echo $sbsf_cpat; ?>px;padding-bottom:<?php echo $sbsf_cpab; ?>px;padding-right:<?php echo $sbsf_cpar; ?>px;padding-left:<?php echo $sbsf_cpal; ?>px;background-color:<?php echo $sbsf_bgcolor; ?>;">
								<div class="full_content_inner">
									<?php if( $sbsf_title || $sbsf_subtitle ) { ?>
									<div class="media_content_title_wrap title_wrap_<?php echo $sbsf_titlealign; ?> style_<?php echo $sbsf_titlestyle; ?>">
										<?php if( $sbsf_title ) { ?>
										<div class="full_content_title title_<?php echo $sbsf_titlealign;?>" style="color:<?php echo $sbsf_titlecolor;?>;font-size:<?php echo $sbsf_titlesize;?>px;"><?php echo $sbsf_title;?></div>
										<?php } ?>
										<?php if( $sbsf_subtitle ) { ?>
										<div class="full_content_subtitle title_<?php echo $sbsf_titlealign;?>" style="color:<?php echo $sbsf_stitlecolor;?>;"><?php echo $sbsf_subtitle;?></div>
										<?php } ?>
									</div>
									<?php } ?>
									<?php if( $sbsf_text ) { ?>
									<div class="full_content_text flex_wysiwyg" style="color:<?php echo $sbsf_textcolor;?>;"><?php echo $sbsf_text;?></div>
									<?php } ?>
									<?php if( $sbsf_button ) { ?>
									<div class="section_btn sbs_btn section_readmore_link_wrap btn_<?php echo $sbsf_btnside; ?>">
										<?php if( $sbsf_buttontype == 'link' ): ?>
										<a href="<?php echo $sbsf_link; ?>" class="full_content_link">
										<?php endif; ?>	
										<?php if( $sbsf_buttontype == 'page' ): ?>
										<a href="<?php echo $sbsf_linkpage; ?>" class="full_content_link">
										<?php endif; ?>
										<?php if( $sbsf_buttontype == 'form' ): ?>					
										<a class="full_content_link" data-fancybox data-src="#popop-form-<?php echo $count;?>" href="javascript:;">
										<?php endif; ?>
										<?php if( $sbsf_buttontype == 'video' ): 
										//Get vid id - option 1
										preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $sbsf_linkvid, $match);
										if (isset($match[1]))
										$youtube_id = $match[1];
										//Get vid id - option 2
										$parsedURL = parse_url($sbsf_linkvid);
										if (isset($parsedURL['query']))
										$vidQuery = $parsedURL['query'];
										$vidID = str_replace('v=','',$vidQuery);
										?>		
										<a data-fancybox href="<?php echo $sbsf_linkvid; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
										<?php endif; ?>	
										<?php if( $sbsf_buttontype == 'category' ): ?>					
										<a href="<?php echo get_term_link( $sbsf_linkcat ); ?>" class="full_content_link">
										<?php endif; ?>			
											<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $sbsf_btnfont;?>;background:<?php echo $sbsf_btncolor;?> !important;"><?php echo $sbsf_button; ?></button>
										</a>
										<?php if( $sbsf_buttontype == 'form' ) { 
										$btn_form_title = get_field('def_foti','option');
										$btn_form_subtitle = get_field('def_fosti','option');
										?>
										<div style="display: none;max-width: 500px;" id="popop-form-<?php echo $count;?>" class="popop-feature button-popop-form">
											<div class="button-popop-form-wrap">
												<div class="button-popop-form-row">
													<div class="button-popop-form-col form-image col-xs-12">
														<?php if( $btn_form_title ) { ?>
														<div class="contact-title">
															<div class="popup_contact_title"><?php echo $slider_btn_form_title; ?></div>
														</div>
														<?php } ?>
														<?php if( $btn_form_subtitle ) { ?>
														<div class="contact-title">
															<div class="popup_contact_subtext"><?php echo $slider_btn_form_subtitle; ?></div>
														</div>
														<?php } ?>
														<div class="contact-form-page">
															<div class="full_form_id">
																<div class="full_form_id_wrap">
																	<?php echo do_shortcode( '[contact-form-7 id="'.$sbsf_linkform.'" ]' ); ?>
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
							</div>
							<?php break;
							
							case 'sbsf_vid':
							$sbsf_viddisply = $sbs_row['sbsf_vdty'];
							$sbsf_vidopen = $sbs_row['sbsf_voty'];
							$sbsf_vidtitle = $sbs_row['sbsf_vti'];
							$sbsf_vidtitlesize = $sbs_row['sbsf_vtis'];
							$sbsf_vidtitlecolor = $sbs_row['sbsf_vtic'];
							$sbsf_vidimgty = $sbs_row['sbsf_vist'];
							$youtube_vid_url = $sbs_row['sbsf_vlk'];
							$sbsf_vidimg = $sbs_row['sbsf_vimg'];
							
							$sbsf_vpat = $sbs_row['sbsf_vpat'];
							$sbsf_vpab = $sbs_row['sbsf_vpab'];
							$sbsf_vpar = $sbs_row['sbsf_vpar'];
							$sbsf_vpal = $sbs_row['sbsf_vpal'];
							?>
							<div class="media_content_item video content_youtube_vid flexible_page_element <?php echo $sbsf_viddisply;?> <?php echo $sbsf_vidopen;?> <?php echo $sbsf_vidimgty;?>" style="padding-top:<?php echo $sbsf_vpat; ?>px;padding-bottom:<?php echo $sbsf_vpab; ?>px;padding-right:<?php echo $sbsf_vpar; ?>px;padding-left:<?php echo $sbsf_vpal; ?>px;">
								<div class="video_inner">
									<?php if( $sbsf_vidtitle ) { ?>
									<div class="video_title" style="color:<?php echo $sbsf_vidtitlecolor;?>;font-size:<?php echo $sbsf_vidtitlesize;?>px;"><?php echo $sbsf_vidtitle;?></div>
									<?php } ?>

									<div class="content_youtube_vid_wrap">
										
									<?php if( $sbsf_viddisply == 'video-single' ):
									//second false skip ACF pre-processcing
									//$youtube_vid_url = get_sub_field('fv_lk', false, false);
									//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
									$oembed = _wp_oembed_get_object();
									//get provider
									$provider = $oembed->get_provider($youtube_vid_url);
									//fetch oembed data as an object
									$oembed_data = $oembed->fetch( $provider, $youtube_vid_url );
									$thumbnail = $oembed_data->thumbnail_url;
									$iframe = $oembed_data->html;
									preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
									$youtube_id = $match[1];
									
									 ?>									
										<?php if( $sbsf_vidopen == 'on-page' ): ?>
											<div class="content_youtube_vid_container">
												<?php
												//$iframe = get_field('oembed');
												preg_match('/src="(.+?)"/', $iframe, $matches);
												$src = $matches[1];
												$params = array(
													'controls' => 1,
													'hd' => 1,
													//'id' => 'classs',
													'hd' => 1,
													'modestbranding' => 1,
													'autohide' => 1,
													//'autoplay' => 0,
													'loop' => 1,
													'volume' => 0,
													'showinfo' => 0,
													'enablejsapi' => 1,
													'rel' => 0
												);
												
												$new_src = add_query_arg($params, $src);
												$iframe = str_replace($src, $new_src, $iframe);
												// add extra attributes to iframe html
												$attributes = 'frameborder="0"';
												$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
												
												// echo $iframe
												echo $iframe; ?>
											</div>
										<?php endif; ?>
								
										<?php if( $sbsf_vidopen == 'in-popup' ): ?>
										<div class="media_item_video">
											<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $youtube_id; ?>" class="">	
												<?php if( $sbsf_vidimgty == 'from-vid' ): ?>
												<div class="video_grid_item_bg_1 video_item_bg img_youtube" style="background-image: url(https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg);">
										        <?php endif; ?>
									            <?php if( $sbsf_vidimgty == 'custom-img' ): 
										        $sbsf_vidimg_url = wp_get_attachment_image_src($sbsf_vidimg, 'inside-post');   
									            ?>
									            <div class="video_grid_item_bg_1 video_item_bg img_youtube" style="background-image:url(<?php echo $sbsf_vidimg_url[0]; ?>);">
									            <?php endif; ?>						            
													<div class="video_overlay"><i class="fal fa-play-circle"></i></div>
												</div>
											</a>
										</div>	
										<?php endif; ?>
									
									<?php elseif( $sbsf_viddisply == 'video-slider' ): ?>
									
										<div class="swiper-container video_slider_container video_slider_<?php echo $count;?>">
											<div class="video_slider_item_row swiper-wrapper">
											<?php $vid_item = 1; while ( have_rows('fv_vs') ) : the_row();
											$video_slider_img = get_sub_field('fv_vsI');
											$video_slider_title = get_sub_field('fv_vsT');
											$video_slider_title_color = get_sub_field('fv_vsTc');
											$video_slider_link = get_sub_field('fv_vsL');					
											//second false skip ACF pre-processcing
											$youtube_vid_url = get_sub_field('fv_vsL', false, false);
											//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
											$oembed = _wp_oembed_get_object();
											//get provider
											$provider = $oembed->get_provider($youtube_vid_url);
											//fetch oembed data as an object
											$oembed_data = $oembed->fetch( $provider, $youtube_vid_url );
											$thumbnail = $oembed_data->thumbnail_url;
											$iframe = $oembed_data->html;
											preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
											$youtube_id = $match[1];
											?>
												<div class="video_slider_item swiper-slide item-<?php echo $vid_item;?>">
													<div class="video_slider_item_title">
														<div class="video_item_title" style="color:<?php echo $video_slider_title_color; ?>;"><?php echo $video_slider_title; ?></div>
													</div>
												<?php if( $video_open_style == 'on-page' ): ?>
													<div class="content_youtube_vid_container">
														<?php
														//$iframe = get_field('oembed');
														preg_match('/src="(.+?)"/', $iframe, $matches);
														$src = $matches[1];
														$params = array(
															'controls' => 1,
															'hd' => 1,
															//'id' => 'classs',
															'hd' => 1,
															'modestbranding' => 1,
															'autohide' => 1,
															//'autoplay' => 0,
															'loop' => 1,
															'volume' => 0,
															'showinfo' => 0,
															'enablejsapi' => 1,
															'rel' => 0
														);
														
														$new_src = add_query_arg($params, $src);
														$iframe = str_replace($src, $new_src, $iframe);
														// add extra attributes to iframe html
														$attributes = 'frameborder="0"';
														$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
														
														// echo $iframe
														echo $iframe; ?>
													</div>
												<?php endif; ?>
										
												<?php if( $video_open_style == 'in-popup' ): ?>
													<div class="media_item_video">
														<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $youtube_id; ?>" class="">	
															<div class="video_grid_item_bg_1 video_item_bg img_youtube">
													            <?php if( $video_image_type == 'from-vid' ): ?>
													            <img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/hqdefault.jpg">
													            <?php endif; ?>
													            <?php if( $video_image_type == 'custom-img' ): ?>
													            <div class="video_item_custom_bg"><?php echo wp_get_attachment_image( $video_slider_img, 'inside-post' ); ?></div>
													            <?php endif; ?>						            
																<div class="video_overlay"><i class="fal fa-play-circle"></i></div>
															</div>
														</a>
													</div>	
												<?php endif; ?>
												</div>
						
										    <?php $vid_item++; endwhile; ?>
											</div>
										</div>
									    <!-- Add Arrows -->
									    <div class="swiper-pagination"></div>
									    <div class="swiper-button-next"></div>
									    <div class="swiper-button-prev"></div>
						
										<script>					
										jQuery(function($) {
											//* ## Page Link Slider */
										    let options<?php echo $row;?><?php echo $count;?> = {};
										    
										    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide").length > 1 ) {
										        options<?php echo $row;?><?php echo $count;?> = {
										            //direction: 'horizontal',
										            loop: true,
										            slidesPerView : 1,
										            autoplayDisableOnInteraction: false,
													pagination: {
														el: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination',
														clickable: true,
													},
													navigation: {
														nextEl: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next',
														prevEl: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev',
													},
										            paginationClickable: true,
										            fadeEffect: {
											            crossFade: true
										            },
													speed: 1000,
													grabCursor: true,
													watchSlidesProgress: true,
													mousewheelControl: true,
													keyboardControl: true,
													//effect: 'fade',  
													breakpoints: {
														768: {
												        },
														520: {
												        }
													}
													        
										        }
										        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
										        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();
										    } else {
										        options<?php echo $row;?><?php echo $count;?> = {
										            loop: false,
										            slidesPerView : 1,
										            autoplay: false,
										            watchOverflow: true,
										            navigation: false,
										        }
										    }
										    var topSlider<?php echo $row;?><?php echo $count;?> = new Swiper('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-container ', options<?php echo $row;?><?php echo $count;?>);	
										    			
										}); 
														
										</script>	
									
									<?php endif; ?>				
									</div>


								</div>
							</div>

							<?php break;

							case 'sbsf_img':
							$sbsf_img = $sbs_row['sbsf_i'];
							$sbsf_imga = $sbs_row['sbsf_ia'];
							$sbsf_imgtitle = $sbs_row['sbsf_iti'];
							$sbsf_imgtitlesize = $sbs_row['sbsf_itis'];
							$sbsf_imgatitlecolor = $sbs_row['sbsf_itic'];
							$sbsf_imgsize = $sbs_row['sbsf_isi'];
							$sbsf_imgstyle = $sbs_row['sbsf_isty'];
							
							$sbsf_ipat = $sbs_row['sbsf_ipat'];
							$sbsf_ipab = $sbs_row['sbsf_ipab'];
							$sbsf_ipar = $sbs_row['sbsf_ipar'];
							$sbsf_ipal = $sbs_row['sbsf_ipal'];
							?>
							<div class="media_content_item full_image image_style_<?php echo $sbsf_imgstyle; ?>" style="padding-top:<?php echo $sbsf_ipat; ?>px;padding-bottom:<?php echo $sbsf_ipab; ?>px;padding-right:<?php echo $sbsf_ipar; ?>px;padding-left:<?php echo $sbsf_ipal; ?>px;">
								<div class="full_image_inner">
									<?php if( $sbsf_imgtitle ) { ?>
									<div class="full_image_title" style="color:<?php echo $sbsf_imgatitlecolor;?>;font-size:<?php echo $sbsf_imgtitlesize;?>px;"><?php echo $sbsf_imgtitle;?></div>
									<?php } ?>
									<?php if( $sbsf_imgstyle == 'before_after' ) { ?>
									<div class="reveal">
										<?php echo wp_get_attachment_image( $sbsf_img, $sbsf_imgsize );?>
										<?php echo wp_get_attachment_image( $sbsf_imga, $sbsf_imgsize );?>
									</div>
									<?php } elseif( $sbsf_imgstyle == 'normal' ) { ?>
									<div class="full_image_img"><?php echo wp_get_attachment_image( $sbsf_img, $sbsf_imgsize );?></div>
									<?php } else { ?>
									<div class="full_image_img"><?php echo wp_get_attachment_image( $sbsf_img, $sbsf_imgsize );?></div>
									<?php } ?>									
								</div>
							</div>
							<?php if( $sbsf_imgstyle == 'before_after' ) { ?>
							<script>							    
							jQuery(function($) {
								Reveal.onupdate = function(data) {
								  // data.percent
								};
							});
							</script>
							<?php } ?>							
							<?php break;

							case 'sbsf_pros':
							$sbsf_prostitle = $sbs_row['sbsf_pti'];
							$sbsf_prostitlesize = $sbs_row['sbsf_ptis'];
							$sbsf_prostitlecolor = $sbs_row['sbsf_ptic'];
							
							$sbsf_ppat = $sbs_row['sbsf_ppat'];
							$sbsf_ppab = $sbs_row['sbsf_ppab'];
							$sbsf_ppar = $sbs_row['sbsf_ppar'];
							$sbsf_ppal = $sbs_row['sbsf_ppal'];
							
							$sbsf_prosdir = $sbs_row['sbsf_pdir'];
							$sbsf_prosrows = $sbs_row['sbsf_prows'];
							$sbsf_proscols = $sbs_row['sbsf_pcols'];
							if ( $sbsf_proscols == 1 ) : $sbs_sm_cols = "12"; $sbs_md_cols = "12"; $sbs_lg_cols = "12";
							elseif ( $sbsf_proscols == 2 ) : $sbs_sm_cols = "6"; $sbs_md_cols = "6"; $sbs_lg_cols = "6";
							elseif ( $sbsf_proscols == 3 ) : $sbs_sm_cols = "6"; $sbs_md_cols = "4"; $sbs_lg_cols = "4";
							elseif ( $sbsf_proscols == 4 ) : $sbs_sm_cols = "4"; $sbs_md_cols = "3"; $sbs_lg_cols = "3";
							elseif ( $sbsf_proscols == 5 ) : $sbs_sm_cols = "4"; $sbs_md_cols = "20"; $sbs_lg_cols = "20";
							elseif ( $sbsf_proscols == 6 ) : $sbs_sm_cols = "3"; $sbs_md_cols = "2"; $sbs_lg_cols = "2";
							elseif ( $sbsf_proscols == 7 ) : $sbs_sm_cols = "3"; $sbs_md_cols = "seven"; $sbs_lg_cols = "seven";
							elseif ( $sbsf_proscols == 8 ) : $sbs_sm_cols = "3"; $sbs_md_cols = "20"; $sbs_lg_cols = "eight";
							endif;
							?>
							<div class="media_content_item prosess dir_<?php echo $sbsf_prosdir; ?> cols_<?php echo $sbsf_proscols; ?>" style="">
								<div class="prosess_inner">
									<?php if( $sbsf_prostitle ) { ?>
									<div class="prosess_title" style="color:<?php echo $sbsf_prostitlecolor;?>;font-size:<?php echo $sbsf_prostitlesize;?>px;"><?php echo $sbsf_prostitle;?></div>
									<?php } ?>

									<?php if( $sbsf_prosrows ) { ?>
										<div class="prosess_rows<?php if( $sbsf_prosdir == 'horizontal' || $sbsf_prosdir == 'horizontal_round' ) { ?> row-flex<?php } ?>">
										<?php 
										$pro = 0; 
										foreach($sbsf_prosrows as $prosrow) { 
											$procount = $pro + 1;
											$pro++;
										?>
											<div class="prosess_item <?php if( $sbsf_prosdir == 'horizontal' || $sbsf_prosdir == 'horizontal_round' ) { ?> col-xs-12 col-sm-<?php echo $sbs_sm_cols; ?> col-md-<?php echo $sbs_md_cols; ?> col-lg-<?php echo $sbs_lg_cols; ?><?php } ?>" style="background-color:<?php echo $prosrow['bg']; ?>;padding-top:<?php echo $sbsf_ppat; ?>px;padding-bottom:<?php echo $sbsf_ppab; ?>px;padding-right:<?php echo $sbsf_ppar; ?>px;padding-left:<?php echo $sbsf_ppal; ?>px;">
												<div class="prosess_item_wrap">
													<div class="prosess_item_num">
														<div class="prosess_item_number" style="color:<?php echo $prosrow['numco']; ?>;"><?php echo $prosrow['num']; ?></div>
													</div>
													<div class="prosess_item_con">
														<div class="prosess_item_title" style="color:<?php echo $prosrow['tico']; ?>;"><?php echo $prosrow['tit']; ?></div>
														<div class="prosess_item_text" style="color:<?php echo $prosrow['txco']; ?>;"><?php echo $prosrow['txt']; ?></div>
													</div>
												</div>
											</div>
										<?php } ?>
										</div>
									<style>
									#section-<?php echo $count;?> .media_content_item.prosess.dir_vertical .prosess_item, 
									#section-<?php echo $count;?> .media_content_item.prosess.dir_vertical_round .prosess_item {height: calc(100% / <?php echo $procount; ?>);}	
									</style>
									<?php } ?>
								</div>
							</div>

							<?php break;
						
						} ?>
						</div>
					<?php
					} ?>					
					
				</div>
			</div>
			<?php } ?>
			
		</div>					
		
	</section>	
</div>