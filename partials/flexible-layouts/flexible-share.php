<?php 
$share_bgi = get_sub_field('sh_bgi');
$share_bgc = get_sub_field('sh_bgc');
$share_pat = get_sub_field('sh_pat');
$share_pab = get_sub_field('sh_pab');
$share_par = get_sub_field('sh_par');
$share_pal = get_sub_field('sh_pal');
$share_mpat = get_sub_field('sh_mpat');
$share_mpab = get_sub_field('sh_mpab');
$share_bgi_url = wp_get_attachment_image_src($share_bgi, 'full');

$share_title = get_sub_field('sh_ti');
$share_subtitle = get_sub_field('sh_st');
$share_title_size = get_sub_field('sh_tsz');
$share_title_color = get_sub_field('sh_tcl');
$share_subtitle_size = get_sub_field('sh_stsz');
$share_subtitle_color = get_sub_field('sh_stcl');
$share_title_align = get_sub_field('sh_tal');
$share_title_position = get_sub_field('sh_tpo');
$share_tstyle = get_sub_field('sh_tsty');

$share_style = get_sub_field('sh_cgs');
$share_iconposition = get_sub_field('sh_cip');
$share_iconsize = get_sub_field('sh_cis');
$share_textsize = get_sub_field('sh_its');
$share_iconcolor = get_sub_field('sh_icc');
$share_textcolor = get_sub_field('sh_itc');
$share_source = get_sub_field('sh_src');

?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex_share flex-<?php echo $count;?>">
<style>
#flex-<?php echo $count;?> .share_contact i.jssocials-share-logo, 
#flex-<?php echo $count;?> .share_contact .contact_item_icon i {font-size:<?php echo $share_iconsize; ?>px;color:<?php echo $share_iconcolor; ?>}	
#flex-<?php echo $count;?> .share_contact span.jssocials-share-label, 
#flex-<?php echo $count;?> .share_contact .contact_txt {font-size:<?php echo $share_textsize; ?>px;color:<?php echo $share_textcolor; ?>}
<?php if( $share_mpat || $share_mpab ) { ?>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $share_mpat; ?>px!important;padding-bottom:<?php echo $share_mpab; ?>px!important;}	
}
<?php } ?>
</style>

	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_share page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $share_pat; ?>px;padding-bottom:<?php echo $share_pab; ?>px;padding-right:<?php echo $share_par; ?>px;padding-left:<?php echo $share_pal; ?>px;background-image:url(<?php echo $share_bgi_url[0]; ?>);background-color:<?php echo $share_bgc; ?>;">
		
		<div class="share_contact <?php echo $share_source; ?> flexible_page_element wrap style_<?php echo $share_style; ?> position_<?php echo $share_iconposition; ?>" itemprop="text">
			<?php if( $share_title || $share_subtitle ) { ?>
			<div class="share_title_wrap title_wrap_<?php echo $share_title_align; ?> style_<?php echo $share_tstyle; ?>">
				<?php if( $share_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $share_title_align; ?>" style="text-align:<?php echo $share_title_align; ?>;color:<?php echo $share_title_color; ?>;font-size:<?php echo $share_title_size; ?>px;"><?php echo $share_title; ?></h2>
				<?php } ?>
				<?php if( $share_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $share_title_align; ?>" itemprop="headline" style="text-align:<?php echo $share_title_align; ?>;color:<?php echo $share_subtitle_color; ?>;font-size:<?php echo $share_subtitle_size; ?>px;"><?php echo $share_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>

			<?php 
			if( $share_source == 'contact_icons' ):
			$sh_con = get_sub_field('sh_con');	
			 ?>
			<div class="share_contact_type contact_icons row-flex">
				<?php
				if( $sh_con && in_array('email', $sh_con) ) { 
					$email_icon = get_sub_field('emico');
					$email_img = get_sub_field('emimg');
					$email_txt = get_sub_field('emtxt');
					$email = get_sub_field('em');
				?>	
				<div class="contact_item contact_item_email">
					<a data-fancybox data-src="#popop-share-<?php echo $count;?>" href="javascript:;" class="contact_form_popup_link share_contact_popup Aligner">
					<?php if ( $email_icon ) { ?>
					<div class="contact_item_icon email_icon"><?php echo $email_icon; ?></div>
					<?php } elseif ( $email_img ) { ?>	
					<div class="contact_item_img email_img"><?php echo wp_get_attachment_image( $email_img, 'full' ); ?></div>
					<?php } ?>
					<?php if ( $email_txt ) { ?>
					<div class="contact_txt email_txt"><?php echo $email_txt; ?></div>	
					<?php } ?>	
					</a>
				</div>
				<?php 
				$popup_contact_title = get_option( 'options_default_flex_form_title' );
				$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
				?>
				<div style="display: none;max-width: 700px;" id="popop-share-<?php echo $count;?>" class="button-popop-form">
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
											<div class="full_form_id_wrap">
												<?php echo do_shortcode( '[contact-form-7 id="'.$email.'" ]' ); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<?php } ?>	

				<?php
				if( $sh_con && in_array('phone', $sh_con) ) { 
					$phone_icon = get_sub_field('phico');
					$phone_img = get_sub_field('phimg');
					$phone_txt = get_sub_field('phtxt');
					$phone = get_sub_field('ph');
				?>	
				<div class="contact_item contact_item_phone">
					<a class="Aligner" href="tel:<?php echo $phone; ?>">
					<?php if ( $phone_icon ) { ?>
					<div class="contact_item_icon phone_icon"><?php echo $phone_icon; ?></div>
					<?php } elseif ( $phone_img ) { ?>	
					<div class="contact_item_img phone_img"><?php echo wp_get_attachment_image( $phone_img, 'full' ); ?></div>
					<?php } ?>
					<?php if ( $phone_txt ) { ?>
					<div class="contact_txt phonel_txt"><?php echo $phone_txt; ?></div>	
					<?php } ?>	
					</a>
				</div>
				<?php } ?>
				
				<?php
				if( $sh_con && in_array('facebook', $sh_con) ) { 
					$facebook_icon = get_sub_field('fbico');
					$facebook_img = get_sub_field('fbimg');
					$facebook_txt = get_sub_field('fbtxt');
					$facebook = get_sub_field('fb');
				?>	
				<div class="contact_item contact_item_facebook">
					<a class="Aligner" href="tel:<?php echo $facebook; ?>">
					<?php if ( $facebook_icon ) { ?>
					<div class="contact_item_icon facebook_icon"><?php echo $facebook_icon; ?></div>
					<?php } elseif ( $facebook_img ) { ?>	
					<div class="contact_item_img facebook_img"><?php echo wp_get_attachment_image( $facebook_img, 'full' ); ?></div>
					<?php } ?>
					<?php if ( $facebook_txt ) { ?>
					<div class="contact_txt facebook_txt"><?php echo $facebook_txt; ?></div>	
					<?php } ?>	
					</a>
				</div>
				<?php } ?>

				<?php
				if( $sh_con && in_array('whatsapp', $sh_con) ) { 
					$whatsapp_icon = get_sub_field('waico');
					$whatsapp_img = get_sub_field('waimg');
					$whatsapp_txt = get_sub_field('watxt');
					$whatsapp = get_sub_field('wa');
				?>	
				<div class="contact_item contact_item_whatsapp">
					<a class="Aligner" href="<?php echo $whatsapp; ?>">
					<?php if ( $whatsapp_icon ) { ?>
					<div class="contact_item_icon whatsapp_icon"><?php echo $whatsapp_icon; ?></div>
					<?php } elseif ( $whatsapp_img ) { ?>	
					<div class="contact_item_img whatsapp_img"><?php echo wp_get_attachment_image( $whatsapp_img, 'full' ); ?></div>
					<?php } ?>
					<?php if ( $whatsapp_txt ) { ?>
					<div class="contact_txt whatsapp_txt"><?php echo $whatsapp_txt; ?></div>	
					<?php } ?>	
					</a>
				</div>
				<?php } ?>
			
				<?php
				if( $sh_con && in_array('twitter', $sh_con) ) { 
					$twitter_icon = get_sub_field('twico');
					$twitter_img = get_sub_field('twing');
					$twitter_txt = get_sub_field('twtxt');
					$twitter = get_sub_field('twi');
				?>	
				<div class="contact_item contact_item_whatsapp">
					<a class="Aligner" href="<?php echo $twitter; ?>">
					<?php if ( $twitter_icon ) { ?>
					<div class="contact_item_icon twitter_icon"><?php echo $twitter_icon; ?></div>
					<?php } elseif ( $twitter_img ) { ?>	
					<div class="contact_item_img twitter_img"><?php echo wp_get_attachment_image( $twitter_img, 'full' ); ?></div>
					<?php } ?>
					<?php if ( $twitter_txt ) { ?>
					<div class="contact_txt twitter_txt"><?php echo $twitter_txt; ?></div>	
					<?php } ?>	
					</a>
				</div>
				<?php } ?>

			</div>
			<?php endif; ?>
						
			<?php if( $share_source == 'share_icons' ):
			$sh_ele = get_sub_field('sh_ele'); 
			$email_txt = get_sub_field('emtxt');
			$facebook_txt = get_sub_field('fbtxt');
			$whatsapp_txt = get_sub_field('watxt');
			$twitter_txt = get_sub_field('twtxt');
			$messenger_txt = get_sub_field('mstxt');
			?>
			<div class="share_contact_type share_icons row-flex">
				<div class="share_contact_s_row">
					<div class="share_contact_s_block"></div>
				</div>
				<script>
				jQuery(function($) {								
					// jsSocials
				    $(".section-<?php echo $count; ?> .share_contact_s_block").jsSocials({
				        showLabel: true,
				        showCount: false,
				        shareIn: "popup",
				        shares: [
				        <?php if( $sh_ele && in_array('email', $sh_ele) ) { ?>{ share: "email", label: "<?php echo $email_txt;?>" },<?php } ?>
				        <?php if( $sh_ele && in_array('whatsapp', $sh_ele) ) { ?>{ share: "whatsapp", label: "<?php echo $whatsapp_txt;?>" },<?php } ?>
				        <?php if( $sh_ele && in_array('facebook', $sh_ele) ) { ?>{ share: "facebook", label: "<?php echo $facebook_txt;?>" },<?php } ?>
				        <?php if( $sh_ele && in_array('messenger', $sh_ele) ) { ?>{ share: "messenger", label: "<?php echo $messenger_txt;?>" },<?php } ?>
				        <?php if( $sh_ele && in_array('twitter', $sh_ele) ) { ?>{ share: "twitter", label: "<?php echo $twitter_txt;?>" },<?php } ?> 
				        ]
				    });
				
					$(".jssocials-share-label").each(function() {
					    var html = $(this).html().split(" ");
					    var newhtml = [];
					    for(var i=0; i< html.length; i++) {
					        if(i>0 && (i%2) == 0)
					            newhtml.push("<br />");
					        newhtml.push(html[i]);
					    }
					    $(this).html(newhtml.join(" "));
					});
				});
				</script>									

			</div>
			<?php endif; ?>			
			
		
		</div>
		
	</section>
</div>	