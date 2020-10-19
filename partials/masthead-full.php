<!-- MastHead -->
<?php
//$hmh_title = get_post_meta( get_the_ID(), 'hmh_title', true );
//$mh_slider = get_field('mhfs');
$default_masthead_bg = get_field('mmh_bg','option');
?>
<?php if( have_rows('mhfs') ): ?>
<?php 
while( have_rows('mhfs') ): the_row();
	$slider_title = get_sub_field('tit');
	$slider_subtitle = get_sub_field('stit');
	$slider_text = get_sub_field('txt');
	$slider_gallery = get_sub_field('gal');
	$slider_btn = get_sub_field('btn');
	$slider_btn_type = get_sub_field('btnlt');
	$slider_btn_page = get_sub_field('btnp');
	$slider_btn_free = get_sub_field('btnf');
	$slider_btn_form = get_sub_field('btnfo');
	$slider_btn_form_title = get_sub_field('btnfot');
	$slider_btn_form_subtitle = get_sub_field('btnfost');
	$slider_btn_video = get_sub_field('btnv');
	$slider_overlay = get_sub_field('sover');
	$slider_type = get_sub_field('styp');
	$slider_video = get_sub_field('vid');
	$slider_height = get_sub_field('shet');
	$slider_bgfixed = get_sub_field('ifix');
	$slider_icons = get_sub_field('sico');
	$slider_cona = get_sub_field('cona');
	$slider_btnco = get_sub_field('btnco');
	$slider_titleco = get_sub_field('titco');
	$slider_stitleco = get_sub_field('stico');
	$slider_titlesz = get_sub_field('titsz');
	$slider_stitlesz = get_sub_field('stsz');
	$slider_titype = get_sub_field('tity');
	$slider_hidetitle = get_sub_field('h_tity');
	$slider_hidecon = get_sub_field('h_con');
	$con_und = get_sub_field('con_und');
?>
<div id="home_masthead" class="home_masthead_main masthead_img_slider" itemprop="text">	
	<div class="home_masthead intro-section">
		<div class="home_main_slider_inner">
							
			<div class="home_main_slider type_<?php echo $slider_type; ?><?php if ($con_und) { ?> content_under<?php } ?>">
				<div class="home_main_slider_item" style="height:<?php echo $slider_height; ?>vh;">
					<div class="main_slider_image">
						<div class="main_slider_content_bg<?php if( $slider_overlay ) { ?> slider_overlay<?php } ?><?php if( $slider_bgfixed ) { ?> slider_fixed<?php } ?>">
						
						<?php if( $slider_type == 'images' || $slider_type == 'images-form' ) { ?>	
						    <?php if( $slider_gallery ) { ?>
					        <div class="slides single-slider">
					            <?php foreach( $slider_gallery as $slider_image ): ?>
						        <div class="single-slider-img-item single-slider-item">
					                <div class="single-slider-img swiper-slide-cover">
						                <?php if ( $con_und ) { ?>
						                <?php echo wp_get_attachment_image( $slider_image['ID'], 'full' ); 
						                } else { ?>
										<div class="slide-inner" style="background-image:url(<?php echo $slider_image['url']; ?>)"></div>
										<?php } ?>
					                </div>
						        </div>
					            <?php endforeach; ?>
					        </div>    
					        <?php } elseif ($default_masthead_bg) { 
						        $default_masthead_bg_url = wp_get_attachment_image_src( $default_masthead_bg, 'full' );
					        ?>
					        <div class="single-slider-img" style="background-image:url(<?php echo $default_masthead_bg_url[0]; ?>)"></div>
							<?php } ?>	
						
						<?php } elseif( $slider_type == 'video' && !wp_is_mobile() ) { ?>
							<?php
							//second false skip ACF pre-processcing
							$youtube_vid_title_url = get_sub_field('vid', false, false);
							//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
							$oembed = _wp_oembed_get_object();
							//get provider
							$provider = $oembed->get_provider($youtube_vid_title_url);
							//fetch oembed data as an object
							$oembed_data = $oembed->fetch( $provider, $youtube_vid_title_url );
							$thumbnail = $oembed_data->thumbnail_url;
							$iframe = $oembed_data->html;
					
							//$v = parse_video_uri( $youtube_vid_title_url ); 
							//$vid = $v['id'];
				
							preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_title_url, $match);
							$youtube_id = $match[1];
							?>

							<div id="top-slider" class="top-video-container-wrap">
								<div id="top-video-container" class="top-video-container youtube">
						
									<div id="player" class="desktop-only">
										<?php
										//$iframe = get_field('oembed');
										preg_match('/src="(.+?)"/', $iframe, $matches);
										$src = $matches[1];
										$params = array(
											'controls' => 1,
											//'id' => 'classs',
											'hd' => 1,
											'modestbranding' => 1,
											'autohide' => 1,
											'autoplay' => 1,
											'loop' => 1,
											'volume' => 0,
											'showinfo' => 0,
											'enablejsapi' => 1,
											'rel' => 0,
											'mute' => 1,
											'playlist' => $youtube_id,
											//'start' => 45
											
										);
										
										$new_src = add_query_arg($params, $src);
										$iframe = str_replace($src, $new_src, $iframe);
										// add extra attributes to iframe html
										$attributes = 'frameborder="0"';
										$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
										
										// echo $iframe
										echo $iframe;
										
										?>
									</div>
									
									<img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg">
											
								</div>
							</div>						
				        <?php } elseif ($default_masthead_bg) { 
						        $default_masthead_bg_url = wp_get_attachment_image_src( $default_masthead_bg, 'full' );
					        ?>
					        <div class="single-slider-img" style="background-image:url(<?php echo $default_masthead_bg_url[0]; ?>)"></div>
						<?php } ?>
						
						</div>
						
						<div class="main_slider_transparent_sub"></div>
						
						<?php if($slider_type == 'images-form') { 
							$slider_form = get_sub_field('slifo');
						?>
						
						<div class="main_slider_content content_right main_slider_content_form">
							<div class="main_slider_inner_wrap wrap row-flex">
								<div class="main_slider_inner<?php if( $slider_subtitle ) { ?> has_subtitle<?php } ?> col-xs-12 col-sm-6">
									<?php if( !$slider_hidetitle ) { ?>
									<<?php echo $slider_titype; ?> class="entry-title masthead_content_title main_slider_title <?php if ( !is_front_page() ) { ?>masthead_content_title_single<?php } ?>" style="color:<?php echo $slider_titleco; ?>;font-size:<?php echo $slider_titlesz; ?>px;" itemprop="headline">
										<?php if( $slider_title ) { ?>
											<?php echo $slider_title; ?>
										<?php } else { ?>
											<?php the_title(); ?>
										<?php } ?>
									</<?php echo $slider_titype; ?>>
									<?php } ?>
									<?php if ( !is_front_page() ) { ?>
									<div class="yoast_breadcrumb breadcrumb_content_in_slider">
										<div class="yoast_breadcrumb_wrap" style="color:<?php echo $slider_titleco; ?>">
										<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
										</div>
									</div>
									<?php } ?>
									<?php if( $slider_subtitle ) { ?>
									<div class="main_slider_subtitle" style="color:<?php echo $slider_stitleco; ?>;font-size:<?php echo $slider_stitlesz; ?>px;"><?php echo $slider_subtitle; ?></div>
									<?php } ?>
									<?php if( $slider_text ) { ?>
									<div class="main_slider_text"><?php echo $slider_text; ?></div>
									<?php } ?>
	
									<?php if( $slider_btn ) { ?>
									<div class="home_masthead_main_btn">
										<div class="section_btn popup_btn section_readmore_link_wrap">
											<?php if( $slider_btn_type == 'page' ): ?>
											<a href="<?php echo $slider_btn_page; ?>" class="">
											<?php endif; ?>	
											<?php if( $slider_btn_type == 'link' || $slider_btn_type == 'link_new' ): ?>
											<a href="<?php echo $slider_btn_free; ?>" class=""<?php if( $slider_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
											<?php endif; ?>
											<?php if( $slider_btn_type == 'form' ): ?>					
											<a data-fancybox data-src="#popop-mmh" href="javascript:;">
											<?php endif; ?>
											<?php if( $slider_btn_video == 'video' ): 
											$youtube_vid_url = get_sub_field('btnv', false, false);
											//Get vid id - option 1
											preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
											if (isset($match[1]))
											$youtube_id = $match[1];
											//Get vid id - option 2
											$parsedURL = parse_url($youtube_vid_url);
											if (isset($parsedURL['query']))
											$vidQuery = $parsedURL['query'];
											$vidID = str_replace('v=','',$vidQuery);
											?>					
											<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
											<?php endif; ?>
												<button class="section_readmore_link watch_btn hoverLink" style="background:<?php echo $slider_btnco; ?>;"><?php echo $slider_btn; ?></button>
											</a>
										</div>
									</div>
									<?php if( $slider_btn_type == 'form' ) { ?>
									<div style="display: none;max-width: 900px;" id="popop-mmh" class="button-popop-form">
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
																<?php echo do_shortcode( '[contact-form-7 id="'.$slider_btn_form.'" ]' ); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
								<?php } ?>
								</div>
								<?php if( $slider_form ) { ?>
								<style>.slider_form_id input.wpcf7-form-control.wpcf7-submit {background:<?php echo $slider_btnco; ?>;background-color:<?php echo $slider_btnco; ?>;}</style>
								<div class="main_slider_inner_form col-xs-12 col-sm-6">
									
									<div class="slider-form-wrap">
										<div class="slider_form_id">
											<div class="slider_form_id_wrap">
												<?php echo do_shortcode( '[contact-form-7 id="'.$slider_form.'" ]' ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>							
						<?php } elseif( !$slider_hidecon ) { ?>
						
						<div class="main_slider_content content_<?php echo $slider_cona; ?>">
							<div class="main_slider_inner_wrap wrap"><div class="main_slider_inner row-flex<?php if( $slider_subtitle ) { ?> has_subtitle<?php } ?>">
							<?php if( !$slider_hidetitle ) { ?>
								<<?php echo $slider_titype; ?> class="entry-title masthead_content_title main_slider_title col-xs-12 <?php if ( !is_front_page() ) { ?>masthead_content_title_single<?php } ?>" style="color:<?php echo $slider_titleco; ?>;font-size:<?php echo $slider_titlesz; ?>px;" itemprop="headline">
									<?php if( $slider_title ) { ?>
										<?php echo $slider_title; ?>
									<?php } else { ?>
										<?php the_title(); ?>
									<?php } ?>
								</<?php echo $slider_titype; ?>>
							<?php } ?>
							
								<?php if ( !is_front_page() ) { ?>
								<div class="yoast_breadcrumb breadcrumb_content_in_slider col-xs-12">
									<div class="yoast_breadcrumb_wrap" style="color:<?php echo $slider_titleco; ?>">
									<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
									</div>
								</div>
								<?php } ?>
								<?php if( $slider_subtitle ) { ?>
								<div class="main_slider_subtitle col-xs-12" style="color:<?php echo $slider_stitleco; ?>;font-size:<?php echo $slider_stitlesz; ?>px;"><?php echo $slider_subtitle; ?></div>
								<?php } ?>
								<?php if( $slider_text ) { ?>
								<div class="main_slider_text col-xs-12"><?php echo $slider_text; ?></div>
								<?php } ?>
	
								<?php if( $slider_btn ) { ?>
									<div class="home_masthead_main_btn col-xs-12">
										<div class="section_btn popup_btn section_readmore_link_wrap">
											<?php if( $slider_btn_type == 'page' ): ?>
											<a href="<?php echo $slider_btn_page; ?>" class="">
											<?php endif; ?>	
											<?php if( $slider_btn_type == 'link' || $slider_btn_type == 'link_new' ): ?>
											<a href="<?php echo $slider_btn_free; ?>" class=""<?php if( $slider_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
											<?php endif; ?>
											<?php if( $slider_btn_type == 'form' ): ?>					
											<a data-fancybox data-src="#popop-mmh" href="javascript:;">
											<?php endif; ?>
											<?php if( $slider_btn_video == 'video' ): 
											$youtube_vid_url = get_sub_field('btnv', false, false);
											//Get vid id - option 1
											preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
											if (isset($match[1]))
											$youtube_id = $match[1];
											//Get vid id - option 2
											$parsedURL = parse_url($youtube_vid_url);
											if (isset($parsedURL['query']))
											$vidQuery = $parsedURL['query'];
											$vidID = str_replace('v=','',$vidQuery);
											?>					
											<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
											<?php endif; ?>
												<button class="section_readmore_link watch_btn hoverLink" style="background:<?php echo $slider_btnco; ?>;"><?php echo $slider_btn; ?></button>
											</a>
										</div>
									</div>
									<?php if( $slider_btn_type == 'form' ) { ?>
									<div style="display: none;max-width: 900px;" id="popop-mmh" class="button-popop-form">
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
																<?php echo do_shortcode( '[contact-form-7 id="'.$slider_btn_form.'" ]' ); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
								<?php } ?>
							</div></div>
						
						    <?php if( $slider_icons ) { ?>
					        <div class="slider_icon">
					            <?php foreach( $slider_icons as $slider_icon ): ?>
						        <div class="slider_icon-img-item">
									<?php echo wp_get_attachment_image( $slider_icon, 'icon50' ); ?>
						        </div>
					            <?php endforeach; ?>
					        </div>    
					        <?php } ?>
						
						</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div id="scroll_down">
			  <div class="scroll_down">
				  <a href="#flex-1"><span></span><span></span><span></span></a>
			  </div>
			</div>


		</div>						
	</div>
</div> 
<?php endwhile; ?>  
<?php else: ?>

<div id="home_masthead" class="home_masthead_main masthead_img_slider" itemprop="text">	
	<div class="home_masthead intro-section">
		<div class="home_main_slider_inner">
			<div class="home_main_slider">
				<div class="home_main_slider_item">
					<div class="main_slider_image">
						<div class="main_slider_content_bg">
					        <?php $default_masthead_bg_url = wp_get_attachment_image_src( $default_masthead_bg, 'full' ); ?>
					        <div class="single-slider-img" style="background-image:url(<?php echo $default_masthead_bg_url[0]; ?>)"></div>
						</div>
						<div class="main_slider_content wrap">
							<div class="main_slider_inner">
								<h1 class="entry-title masthead_content_title main_slider_title <?php if ( !is_front_page() ) { ?>masthead_content_title_single<?php } ?>" style="color:<?php echo $slider_titleco; ?>;font-size:<?php echo $slider_titlesz; ?>;" itemprop="headline"><?php the_title(); ?></h1>
							</div>
							<?php if ( !is_front_page() ) { ?>
							<div class="yoast_breadcrumb breadcrumb_content_in_slider">
								<div class="yoast_breadcrumb_wrap">
								<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			
			<div id="scroll_down">
			  <div class="scroll_down">
				  <a href="#flex-1"><span></span><span></span><span></span></a>
			  </div>
			</div>
		</div>						
	</div>
</div> 

<?php endif; ?>