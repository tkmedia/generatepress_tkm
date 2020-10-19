<!-- MastHead -->
<?php
//$hmh_title = get_post_meta( get_the_ID(), 'hmh_title', true );
//$mh_slider = get_field('mhfs');
$default_masthead_bg = get_field('mmh_bg','option');
$default_masthead_bg_url = wp_get_attachment_image_src( $default_masthead_bg, 'full' );
?>
<?php if( have_rows('mhsi') ): ?>
<?php 
while( have_rows('mhsi') ): the_row();
	$slider_title = get_sub_field('sitit');
	$slider_subtitle = get_sub_field('sistit');
	$slider_text = get_sub_field('sitxt');
	$slider_gallery = get_sub_field('sigal');
	$slider_btn = get_sub_field('sibtn');
	$slider_btn_type = get_sub_field('sibtnlt');
	$slider_btn_page = get_sub_field('sibtnp');
	$slider_btn_free = get_sub_field('sibtnf');
	$slider_btn_form = get_sub_field('sibtnfo');
	$slider_btn_form_title = get_sub_field('sibtnfot');
	$slider_btn_form_subtitle = get_sub_field('sibtnfost');
	$slider_btn_video = get_sub_field('sibtnv');
	$slider_overlay = get_sub_field('sisover');
	$slider_video = get_sub_field('sivid');
	$slider_bgfixed = get_sub_field('siifix');
	$slider_icons = get_sub_field('sisico');
	$slider_cona = get_sub_field('sicona');
	$slider_btnco = get_sub_field('sibtnco');
	$slider_titleco = get_sub_field('sititco');
	$slider_stitleco = get_sub_field('sistico');
	$slider_titlesz = get_sub_field('sititsz');
	$slider_stitlesz = get_sub_field('sistsz');
	$slider_titype = get_sub_field('sitity');
	
	$slider_gallery_url = wp_get_attachment_image_src( $slider_gallery, 'full' );
?>
<div id="home_masthead" class="home_masthead_main masthead_img_slider masthead_single_img" itemprop="text">	
	<div class="home_masthead intro-section">
		<div class="home_main_slider">
			<div class="main_slider_content_bg<?php if( $slider_overlay ) { ?> slider_overlay<?php } ?><?php if( $slider_bgfixed ) { ?> slider_fixed<?php } ?>" style="min-height:50vh;background-image:url(<?php if( $slider_gallery ) { echo $slider_gallery_url[0]; } elseif ($default_masthead_bg) { echo $default_masthead_bg_url[0]; }?>);">
				
				<div class="main_slider_content content_<?php echo $slider_cona; ?>">
					<div class="main_slider_inner_wrap wrap">
						<div class="main_slider_inner row-flex<?php if( $slider_subtitle ) { ?> has_subtitle<?php } ?>">
							
							<<?php echo $slider_titype; ?> class="entry-title masthead_content_title main_slider_title col-xs-12 <?php if ( !is_front_page() ) { ?>masthead_content_title_single<?php } ?>" style="color:<?php echo $slider_titleco; ?>;font-size:<?php echo $slider_titlesz; ?>px;" itemprop="headline">
								<?php if( $slider_title ) { ?>
									<?php echo $slider_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</<?php echo $slider_titype; ?>>
							<?php if ( !is_front_page() ) { ?>
							<div class="yoast_breadcrumb breadcrumb_content_in_slider col-xs-12">
								<div class="yoast_breadcrumb_wrap">
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
						</div>
					</div>
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