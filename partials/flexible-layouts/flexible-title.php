<?php 
$title = get_sub_field('ft_ti');
$title_h = get_sub_field('ft_tih');
$title_s = get_sub_field('ft_tis');
$title_c = get_sub_field('ft_tic');
$title_a = get_sub_field('ft_tia');
$title_i = get_sub_field('ft_tii');

$title_bgi = get_sub_field('ft_bgi');
$title_bgc = get_sub_field('ft_bgc');
$title_pat = get_sub_field('ft_pat');
$title_pab = get_sub_field('ft_pab');
$title_par = get_sub_field('ft_par');
$title_pal = get_sub_field('ft_pal');
$title_mpat = get_sub_field('ft_mpat');
$title_mpab = get_sub_field('ft_mpab');

$title_bgi_url = wp_get_attachment_image_src($title_bgi, 'full');
?>

<div id="flex-<?php echo $count;?>" class="flex_content_cols flex-<?php echo $count;?>">
<?php if( $title_mpat || $title_mpab ) { ?>
<style>
@media (max-width: 767px) {
#section-<?php echo $count;?> {padding-top:<?php echo $title_mpat; ?>px!important;padding-bottom:<?php echo $title_mpab; ?>px!important;}	
}
</style>
<?php } ?>
	<section id="section-<?php echo $count;?>" class="page_flexible section_flex_title page_flexible_content section-<?php echo $count;?>" style="padding-top:<?php echo $title_pat; ?>px;padding-bottom:<?php echo $title_pab; ?>px;padding-right:<?php echo $title_par; ?>px;padding-left:<?php echo $title_pal; ?>px;background-image:url(<?php echo $title_bgi_url[0]; ?>);background-color:<?php echo $title_bgc; ?>;">
		<div class="flex_title flexible_page_element <?php echo $title_i; ?> wrap" itemprop="text" style="text-align:<?php echo $title_a; ?>;">
			<div class="flex_style_title_container title_align_<?php echo $title_a; ?>" style="text-align:<?php echo $title_a; ?>;justify-content:<?php echo $title_a; ?>;">

				<<?php echo $title_h; ?> class="clean-title" style="text-align:<?php echo $title_a; ?>;font-size:<?php echo $title_s; ?>px;color:<?php echo $title_c; ?>;"><?php echo $title; ?>
				</<?php echo $title_h; ?>>
				
			</div>
		</div>
	</section>
</div>	