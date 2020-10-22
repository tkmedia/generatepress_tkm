<?php 
$banner_style = get_sub_field('fib_sty');	

$banner_maxwidth = get_sub_field('fib_mxw');
$banner_innerbg = get_sub_field('fib_ibg');	
	
$banner_icon = get_sub_field('fib_ico');
$banner_iconimg = get_sub_field('fib_icoi');
$banner_iconpo = get_sub_field('fib_icop');
$banner_icontext = get_sub_field('fib_icot');

$banner_contacts = get_sub_field('fib_con');
$banner_contacttext = get_sub_field('fib_cont');
$banner_considetext = get_sub_field('fib_const');
$banner_considelink = get_sub_field('fib_consl');

$banner_bgi = get_sub_field('fib_bgi');
$banner_bgc = get_sub_field('fib_bgc');
$banner_pat = get_sub_field('fib_pat');
$banner_pab = get_sub_field('fib_pab');
$banner_par = get_sub_field('fib_par');
$banner_pal = get_sub_field('fib_pal');
$banner_mpat = get_sub_field('fib_mpat');
$banner_mpab = get_sub_field('fib_mpab');

$banner_bgi_url = wp_get_attachment_image_src($banner_bgi, 'full');
?>

<style>
@media (min-width: 992px) {
.flex-<?php echo $count;?> .flex_info_banner.flexible_page_element.banner_style1.wrap {max-width:<?php echo $banner_maxwidth; ?>% !important;}
}
<?php if( $banner_mpat || $banner_mpab ) { ?>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $banner_mpat; ?>px!important;padding-bottom:<?php echo $banner_mpab; ?>px!important;}	
}
<?php } ?>

</style>
<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?>">
	<section id="section-<?php echo $count;?>" class="page_flexible section_info_banner page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $banner_pat; ?>px;padding-bottom:<?php echo $banner_pab; ?>px;padding-right:<?php echo $banner_par; ?>px;padding-left:<?php echo $banner_pal; ?>px;background-image:url(<?php echo $banner_bgi_url[0]; ?>);background-color:<?php echo $banner_bgc; ?>;">
		<div class="flex_info_banner flexible_page_element banner_<?php echo $banner_style; ?> wrap" itemprop="text" style="margin: auto;background:<?php echo $banner_innerbg; ?>;">
			
			<?php if( $banner_style == 'style1' ) { ?>
			<div class="flex_info_banner_item banner_icon_box <?php echo $banner_iconpo; ?> row-flex" >
				<?php if( $banner_icon ) { ?>
				<div class="banner_icon_box_icon box_icon"><?php echo $banner_icon; ?></div>
				<?php } elseif( $banner_iconimg ) { ?>
				<div class="banner_icon_box_icon box_img">
					<?php echo wp_get_attachment_image( $banner_iconimg, 'full' ); ?>
				</div>
				<?php } ?>
				<div class="banner_icon_box_text col-xs"><?php echo $banner_icontext; ?></div>
			</div>
			<?php } ?>

			<?php if( $banner_style == 'style2' ) { ?>
			<div class="banner_contact" style="max-width:<?php echo $banner_maxwidth; ?>%;margin: auto;background:<?php echo $banner_innerbg; ?>;">
				<div class="banner_contact_row">
					<div class="banner_contact_col contact_buttons">
						<div class="contact_buttons_text"><?php echo $banner_contacttext; ?></div>
						<?php if( have_rows('fib_con') ): ?>
							<div class="contact_buttons_row">
							<?php while( have_rows('fib_con') ): the_row(); 
							$contact_icon = get_sub_field('fib_conb');
							$contact_iconcolor = get_sub_field('fib_conbc');
							$contact_iconlink = get_sub_field('fib_conbl');
							?>
								<div class="contact_buttons_item" style="color:<?php echo $contact_iconcolor; ?>;">
								<?php if( $contact_iconlink ){ ?><a href="<?php echo $contact_iconlink; ?>" class=""><?php } ?>
								<?php echo $contact_icon; ?>
								<?php if( $contact_iconlink ){ ?></a><?php } ?>	
								</div>
								
							<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="banner_contact_col contact_free"><?php if( $banner_considelink ){ ?><a href="<?php echo $banner_considelink; ?>" class=""><?php } ?><?php echo $banner_considetext; ?><?php if( $banner_considelink ){ ?></a><?php } ?></div>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</section>
</div>	