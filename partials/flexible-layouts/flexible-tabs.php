<?php 
$tabscon_side = get_sub_field('tab_side');
$tabscon_bgcolor = get_sub_field('tab_bgc');
$tabscon_bgimage = get_sub_field('tab_bgi');
$tabsco_bgi_url = wp_get_attachment_image_src($tabscon_bgimage, 'full');
$tabscon_align = get_sub_field('tab_ali');

$tabscon_pat = get_sub_field('tab_pat');
$tabscon_pab = get_sub_field('tab_pab');
$tabscon_par = get_sub_field('tab_par');
$tabscon_pal = get_sub_field('tab_pal');
$tabscon_mpat = get_sub_field('tab_mpat');
$tabscon_mpab = get_sub_field('tab_mpab');

$tabscon_con_title = get_sub_field('tabc_title');
$tabscon_con_titlecolor = get_sub_field('tabc_tic');
$tabscon_con_titlesize = get_sub_field('tabc_tis');
$tabscon_con_color = get_sub_field('tabc_cc');
$tabscon_con_pad = get_sub_field('tabc_pad');
$tabscon_con = get_sub_field('tabc_con');

$tabscon = get_sub_field('tab_col');
?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?>">
<?php if( $tabscon_mpat || $tabscon_mpab ) { ?>
<style>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $tabscon_mpat; ?>px!important;padding-bottom:<?php echo $tabscon_mpab; ?>px!important;}	
}
</style>
<?php } ?>
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_feature page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $tabscon_pat; ?>px;padding-bottom:<?php echo $tabscon_pab; ?>px;padding-right:<?php echo $tabscon_par; ?>px;padding-left:<?php echo $tabscon_pal; ?>px;background-image:url(<?php echo $tabsco_bgi_url[0]; ?>);background-color:<?php echo $tabscon_bgcolor; ?>;">

		<div class="flex_tabs_content flexible_page_element wrap" itemprop="text">
			<div class="tabs_content_container tabs_content_<?php echo $tabscon_side;?>">
				
				<div class="tabs_content_row row-flex<?php if( $tabscon_align ) { ?> vertical_align<?php } ?>">
					<div class="tabs_content_col tabs_content_tabs col-xs-12<?php if( $tabscon_side !== 'only_tabs' ) { ?> col-sm-6<?php } ?>">
					
						<!-- Begin .HorizontalTab -->
						<div class="HorizontalTab HorizontalTab_1 tabs_hor_1">
						<?php if( have_rows('tab_col') ): ?>								
							<ul class="resp-tabs-list hor_1 row-flex">
							<?php $i = 1; while( have_rows('tab_col') ): the_row(); 
								// vars
								$tabs_button_title = get_sub_field('tb_ct');
								?>		
								<li class="tabs-<?php echo $i; ?> col-xs">
									<span class="tabs-text">
									<div class="tabs_button_title"><?php echo $tabs_button_title; ?></div>
									</span>
								</li>
							<?php $i++;endwhile; ?>	
							</ul>
							
							<div class="resp-tabs-container hor_1">
							<?php $i = 1; while( have_rows('tab_col') ): the_row(); 
								// vars
								$tabs_button_title = get_sub_field('tb_ct');
								$tabs_content_color = get_sub_field('tb_cc');
								$tabs_content_type = get_sub_field('tb_ty');
								$tabs_content_text = get_sub_field('tb_c');
								$tabs_content_vid = get_sub_field('tb_yt');
								$tabs_content_vidi = get_sub_field('tb_yti');

								$youtube_vid_url = get_sub_field('tb_yt', false, false);
								//Get vid id - option 1
								preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
								if (isset($match[1]))
								$youtube_id = $match[1];
								
								//Get vid id - option 2
								//$parsedURL = parse_url($youtube_vid_url);
								//if (isset($parsedURL['query']))
								//$vidQuery = $parsedURL['query'];
								//$vidID = str_replace('v=','',$vidQuery);
								?>
								<div class="tabcontent fc-tab-<?php echo $i; ?>">
									<div class="tabcontent_contanier">
										<?php if( $tabs_content_type == 'text' ) { ?>
										<div class="tabs_content_text tabcontent_content"><?php echo $tabs_content_text; ?></div>
										<?php } ?>
										<?php if( $tabs_content_type == 'youtube' ) { ?>
										<div class="tabs_content_image tabcontent_content">
											
								            <?php if( $tabs_content_vidi ): ?>
								            <?php echo wp_get_attachment_image( $tabs_content_vidi, 'full' ); ?>
								            <?php else: ?>
								            <img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg">
								            <?php endif; ?>	
								            <a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $youtube_id; ?>" class="">					            
											<div class="video_overlay"><i class="fas fa-play"></i></div>
											</a>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php $i++;endwhile; ?>
							</div>
						<?php endif; ?>	
						</div>
						<!-- End .HorizontalTab -->
						
					</div>
					<?php if( $tabscon_side !== 'only_tabs' ) { ?>
					<div class="tabs_content_col tabs_content_text col-xs-12 col-sm-6" style="padding:<?php echo $tabscon_con_pad; ?>;">
						<div class="content_text_inner">
							<?php if( $tabscon_con_title ) { ?>
							<div class="content_text_title" style="color:<?php echo $tabscon_con_titlecolor; ?>;font-size:<?php echo $tabscon_con_titlesize; ?>px;"><?php echo $tabscon_con_title; ?></div>
							<?php } ?>
							<?php if( $tabscon_con ) { ?>
							<div class="content_text_con" style="color:<?php echo $tabscon_con_color; ?>;"><?php echo $tabscon_con; ?></div>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>					
		
	</section>	
</div>