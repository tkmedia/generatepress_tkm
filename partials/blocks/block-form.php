<?php
$uid = $block['id'];
$className = 'acftkm_form_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}

$form_bg = get_field('ff_bg');
$form_pt = get_field('ff_pt');
$form_pb = get_field('ff_pb');
$form_pr = get_field('ff_pr');
$form_pl = get_field('ff_pl');

$form = get_field('ff_fo');
$form_titleposition = get_field('ff_tpo');
$form_title = get_field('ff_ti');
$form_subtitle = get_field('ff_st');
$form_text = get_field('ff_txt');
$form_titlesize = get_field('ff_sz');
$form_subtitlesize = get_field('ff_ssz');
$form_titlealign = get_field('ff_al');
$form_titlecolor = get_field('ff_cl');
$form_subtitlecolor = get_field('ff_scl');
$form_textcolor = get_field('ff_incl');
?>

<div id="<?php echo $uid; ?>" class="flex_content_cols <?php echo $uid; ?>">
	<section id="section-<?php echo $uid; ?>" class="page_flexible flex_form page_flexible_content section-<?php echo $uid; ?>">
		<div class="flex_form flexible_page_element" itemprop="text">
			<div class="mh_contact">
				<div class="mh_contact_content">
					<div class="mh_contact_col mh_contact_col_left">
						<div class="mh_contact_col_form wrap">
							<div class="mh_contact_col_form_wrap <?php echo $form_titleposition; ?>">	
								<?php if( $form_title || $form_subtitle ) { ?>
								<div class="mh_contact_col_form_title_container titlealign_<?php echo $form_titlealign; ?>">
					                <?php if( $form_title ) { ?>
					                <div class="mh_contact_col_form_title" style="color:<?php echo $form_titlecolor; ?>;font-size:<?php echo $form_titlesize; ?>px;"><?php echo $form_title; ?></div>
					                <?php } ?>
					                <?php if( $form_subtitle ) { ?>
					                <div class="mh_contact_col_form_subtitle" style="color:<?php echo $form_subtitlecolor; ?>;font-size:<?php echo $form_subtitlesize; ?>px;"><?php echo $form_subtitle; ?></div>
					                <?php } ?>
					                <?php if( $form_text ) { ?>
					                <div class="mh_contact_col_form_txt" style="color:<?php echo $form_textcolor; ?>;"><?php echo $form_text; ?></div>
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
	</section>
</div>