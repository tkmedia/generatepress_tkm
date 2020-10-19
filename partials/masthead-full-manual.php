<!-- MastHead -->
<?php
//$hmh_title = get_post_meta( get_the_ID(), 'hmh_title', true );
$hmh_height = get_field('hmh_he');
$hmh_mobilecon = get_field('hmh_mocon');
?>
<div id="home_masthead" class="home_masthead_main masthesd_full_manual" itemprop="text">	
	<div class="home_masthead intro-section">
		<div class="home_main_slider_inner">
							
			<?php if( have_rows('hmhs_slider') ): ?>
			<div class="home_main_slider">
				<?php while( have_rows('hmhs_slider') ): the_row();
				$hmh_conside = get_sub_field('hmhs_scon'); 
				$hmh_bg = get_sub_field('hmhs_sico');
				$hmh_bgsrc = wp_get_attachment_image_src($hmh_bg, 'full');
				$hmh_bgoverlay = get_sub_field('hmhs_bgo');
				
				$hmh_stitle = get_sub_field('hmhs_sti');
				$hmh_stitlesize = get_sub_field('hmhs_stis');
				$hmh_stitlecolor = get_sub_field('hmhs_stic');
				$hmh_stitletype = get_sub_field('hmhs_stit');
				
				$hmh_sstitle = get_sub_field('hmhs_ssti');
				$hmh_sstitlesize = get_sub_field('hmhs_sstis');
				$hmh_sstitlecolor = get_sub_field('hmhs_sstic');
				
				$hmh_spre = get_sub_field('hmhs_spre');
				$hmh_spresize = get_sub_field('hmhs_spres');
				$hmh_sprecolor = get_sub_field('hmhs_sprec');

				$hmh_btn = get_sub_field( 'hmh_btn' );
				$hmh_btncolor = get_sub_field( 'hmhs_btnc' );
				$hmh_btnfont = get_sub_field( 'hmhs_btnf' );
				$hmh_btn_type = get_sub_field( 'hmh_btnty' );
				$hmh_btn_vid = get_sub_field( 'hmh_vid' );
				$hmh_btn_form = get_sub_field( 'hmh_form' );
				$hmh_btn_page = get_sub_field( 'hmh_page' );
				$hmh_btn_link = get_sub_field( 'hmh_link' );
				if( $hmh_btn_type == 'video' ) {
					$youtube_vid_url = get_field('hmh_vid', false, false);
					//Get vid id - option 1
					preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
					if (isset($match[1]))
					$youtube_id = $match[1];
					//Get vid id - option 2
					$parsedURL = parse_url($youtube_vid_url);
					if (isset($parsedURL['query']))
					$vidQuery = $parsedURL['query'];
					$vidID = str_replace('v=','',$vidQuery);
				}
				?>

				<?php if( $hmh_mobilecon && wp_is_mobile() ) { ?>
				<div class="home_main_slider_item mobile_main_slider_item">
					<div class="main_slider_image">
						<?php echo wp_get_attachment_image( $hmh_bg, 'full' ); ?>
					</div>
				
					<div class="main_slider_content wrap row-flex"><div class="main_slider_inner col-xs-12 con_center">
						<?php if( $hmh_spre ) { ?>
						<div class="main_slider_pre" style="color:color: #222329;font-size:<?php echo $hmh_spresize; ?>px;"><?php echo $hmh_spre; ?></div>
						<?php } ?>
						<<?php echo $hmh_stitletype; ?> class="main_slider_title" style="color: #222329;font-size:<?php echo $hmh_stitlesize; ?>px;"><?php echo $hmh_stitle; ?></<?php echo $hmh_stitletype; ?>>
						<?php if( $hmh_sstitle ) { ?>
						<div class="main_slider_text" style="color: #222329;font-size:<?php echo $hmh_sstitlesize; ?>px;"><?php echo $hmh_sstitle; ?></div>
						<?php } ?>
						<?php if( $hmh_btn ) { ?>
							<div class="home_masthead_main_btn">
								<div class="section_btn popup_btn section_readmore_link_wrap">
									<?php if( $hmh_btn_type == 'page' ): ?>
									<a href="<?php echo $hmh_btn_page; ?>" class="">
									<?php endif; ?>	
									<?php if( $hmh_btn_type == 'link' || $hmh_btn_type == 'link_new' ): ?>
									<a href="<?php echo $hmh_btn_link; ?>" class=""<?php if( $hmh_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
									<?php endif; ?>
									<?php if( $hmh_btn_type == 'form' ): ?>					
									<a data-fancybox data-src="#popop-mmh" href="javascript:;">
									<?php endif; ?>
									<?php if( $hmh_btn_type == 'video' ): ?>					
									<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
									<?php endif; ?>
										<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $hmh_btnfont; ?>;background-color:<?php echo $hmh_btncolor; ?>;"><?php echo $hmh_btn; ?></button>
									</a>
								</div>
							</div>
							<?php if( $hmh_btn_type == 'form' ) { ?>
							<div style="display: none;max-width: 500px;" id="popop-mmh" class="popop-feature button-popop-form">
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
														<?php echo do_shortcode( '[contact-form-7 id="'.$hmh_btn_form.'" ]' ); ?>
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
				
				
				</div>
				<?php } else { ?>
				<div class="home_main_slider_item">
					<div class="main_slider_image<?php if( $hmh_bgoverlay ){ ?> bg_overlay<?php } ?>" style="height:<?php echo $hmh_height; ?>vh;background-image:url(<?php echo $hmh_bgsrc[0]; ?>);">
						<div class="main_slider_content wrap row-flex"><div class="main_slider_inner col-xs-12 con_<?php echo $hmh_conside; ?>">
							<?php if( $hmh_spre ) { ?>
							<div class="main_slider_pre" style="color:<?php echo $hmh_sprecolor; ?>;font-size:<?php echo $hmh_spresize; ?>px;"><?php echo $hmh_spre; ?></div>
							<?php } ?>
							<<?php echo $hmh_stitletype; ?> class="main_slider_title" style="color:<?php echo $hmh_stitlecolor; ?>;font-size:<?php echo $hmh_stitlesize; ?>px;"><?php echo $hmh_stitle; ?></<?php echo $hmh_stitletype; ?>>
							<?php if( $hmh_sstitle ) { ?>
							<div class="main_slider_text" style="color:<?php echo $hmh_sstitlecolor; ?>;font-size:<?php echo $hmh_sstitlesize; ?>px;"><?php echo $hmh_sstitle; ?></div>
							<?php } ?>
							<?php if( $hmh_btn ) { ?>
								<div class="home_masthead_main_btn">
									<div class="section_btn popup_btn section_readmore_link_wrap">
										<?php if( $hmh_btn_type == 'page' ): ?>
										<a href="<?php echo $hmh_btn_page; ?>" class="">
										<?php endif; ?>	
										<?php if( $hmh_btn_type == 'link' || $hmh_btn_type == 'link_new' ): ?>
										<a href="<?php echo $hmh_btn_link; ?>" class=""<?php if( $hmh_btn_type == 'link_new' ) { ?> target="_blank"<?php } ?>>
										<?php endif; ?>
										<?php if( $hmh_btn_type == 'form' ): ?>					
										<a data-fancybox data-src="#popop-mmh" href="javascript:;">
										<?php endif; ?>
										<?php if( $hmh_btn_type == 'video' ): ?>					
										<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $vidID; ?>" class="">
										<?php endif; ?>
											<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $hmh_btnfont; ?>;background-color:<?php echo $hmh_btncolor; ?>;"><?php echo $hmh_btn; ?></button>
										</a>
									</div>
								</div>
								<?php if( $hmh_btn_type == 'form' ) { ?>
								<div style="display: none;max-width: 500px;" id="popop-mmh" class="popop-feature button-popop-form">
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
															<?php echo do_shortcode( '[contact-form-7 id="'.$hmh_btn_form.'" ]' ); ?>
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
					</div>
				</div>
				<?php } ?>
				
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
							

		</div>						
	</div>
</div>