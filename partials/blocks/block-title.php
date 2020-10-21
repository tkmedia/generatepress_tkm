<?php
$uid = $block['id'];
$className = 'acftkm_title_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
$title_bg = get_field('st_bg');
$title_pt = get_field('st_pt');
$title_pb = get_field('st_pb');
$title_pr = get_field('st_pr');
$title_pl = get_field('st_pl');

$title_break = get_field('st_br');
$title_block_align = get_field('st_ba');
$title_order = get_field('st_or');
$flex_style_title_mobile = get_field('st_mo');
$title_hide_mobile = get_field('st_hmo');
$style_title_animation = get_field('st_an');
$title_border = get_field('st_bo');
$title_border_color = get_field('st_boa');
$title_border_size = get_field('st_bos');

$title_type = get_field('st_tp');
$title_header = get_field('st_h');
$title_size = get_field('st_sz');
$subtitle_size = get_field('st_ssz');
$title_align = get_field('st_al');
$title_color = get_field('st_cl');
$title_bg_color = get_field('st_bcl');
$subtitle_color = get_field('st_scl');
$subtitle_bg_color = get_field('st_sbcl');
$pretitle_color = get_field('st_pcl');
$intro_color = get_field('st_incl');
$pre_title = get_field('st_prt');
$title_first = get_field('st_fr');
$title_last = get_field('st_lt');
$title_intro = get_field('st_in');

if ( $title_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<style>
.section-<?php echo $uid; ?> .flex_style_title_wrap:after, 
.section-<?php echo $uid; ?> .flex_style_title_wrap:before, 
.section-<?php echo $uid; ?> .flex_style_title_wrap span:after, 
.section-<?php echo $uid; ?> .flex_style_title_wrap span:before {border-color:<?php echo $title_border_color;?>!important;}
</style>
<div id="<?php echo $uid; ?>" class="flex_content_cols <?php echo $uid; ?> <?php echo $flex_style_title_mobile;?> <?php if( $title_break ){ ?><?php echo $title_block_align; ?><?php } ?>" <?php if( $title_order ){ ?>style="order:<?php echo $title_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $uid; ?>" class="page_flexible page_flexible_content section-<?php echo $uid; ?> count_sections_<?php echo $uid; ?>">

		<div class="flex_style_title flexible_page_element title_<?php echo $title_type; ?>" itemprop="text" style="text-align:<?php echo $title_align; ?>;padding-top:<?php echo $title_pt; ?>px;padding-bottom:<?php echo $title_pb; ?>px;padding-right:<?php echo $title_pr; ?>px;padding-left:<?php echo $title_pl; ?>px;">
			<div class="flex_style_title_wrap <?php echo $title_border;?> <?php echo $title_border_size;?>"><span>

				<?php if( $pre_title ){ ?>
				<div class="flex_style_pre_title title_<?php echo $title_type; ?>" style="text-align:<?php echo $title_align; ?>;justify-content:<?php echo $title_align; ?>;">
					<div class="pretitle_color" style="color:<?php echo $pretitle_color; ?>;">
						<?php echo $pre_title; ?>
					</div>
				</div>
				<?php } ?>
				
				<div class="flex_style_title_container title_<?php echo $title_type; ?> title_align_<?php echo $title_align; ?>" style="text-align:<?php echo $title_align; ?>;justify-content:<?php echo $title_align; ?>;">

					<?php if( $title_type == 'clean' ): ?>
						<<?php echo $title_header; ?> class="clean-title" style="text-align:<?php echo $title_align; ?>;font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?>
						</<?php echo $title_header; ?>>
						
						<?php if( $title_last ){ ?><div class="title_last" style="color:<?php echo $subtitle_color; ?>;-webkit-text-fill-color:<?php echo $subtitle_color; ?>;font-size:<?php echo $subtitle_size; ?>px;"><?php echo $title_last; ?></div><?php } ?>						
					<?php endif; ?>

					<?php if( $title_type == 'clean-sideline' ): ?>
						<<?php echo $title_header; ?> class="clean-sideline-title" style="text-align:<?php echo $title_align; ?>;font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?>
						</<?php echo $title_header; ?>>
						<?php if( $title_last ){ ?><span style="color:<?php echo $title_color; ?>;font-size: 1.4rem;"><?php echo $title_last; ?></span><?php } ?>
					<?php endif; ?>
					
					<?php if( $title_type == 'clean-underline' ): ?>
						<<?php echo $title_header; ?> class="clean-underline-title title-<?php echo $title_align; ?>" style="text-align:<?php echo $title_align; ?>;font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?></<?php echo $title_header; ?>>
						<?php if( $title_last ){ ?><div class="title_last" style="color:<?php echo $subtitle_color; ?>;-webkit-text-fill-color:<?php echo $subtitle_color; ?>;font-size:<?php echo $subtitle_size; ?>px;"><?php echo $title_last; ?></div><?php } ?>	
					<?php endif; ?>	
																				
					<?php if( $title_type == 'box' ): ?>
						<div class="flex_style_title_box_wrap" style="background:<?php echo $title_bg_color; ?>;text-align:<?php echo $title_align; ?>;justify-content:<?php echo $title_align; ?>;">
							<<?php echo $title_header; ?> class="box-title" style="font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?>
								<?php if( $title_last ){ ?><span class="title_last" style="background:<?php echo $subtitle_bg_color; ?>;color:<?php echo $subtitle_color; ?>;-webkit-text-fill-color:<?php echo $subtitle_color; ?>;font-size:<?php echo $subtitle_size; ?>px;"><?php echo $title_last; ?></span><?php } ?>
							</<?php echo $title_header; ?>>
						</div>
					<?php endif; ?>
					
					<?php if( $title_type == 'split' ): ?>
						<div class="flex_style_title_split_wrap" style="text-align:<?php echo $title_align; ?>">
						<<?php echo $title_header; ?> class="split-title" style="text-align:right;font-size:<?php echo $title_size; ?>px;display: inline-block;"><span class="title_first" style="background:<?php echo $title_bg_color; ?>;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?></span>
							<?php if( $title_last ){ ?><span class="title_last" style="background:<?php echo $subtitle_bg_color; ?>;color:<?php echo $subtitle_color; ?>;-webkit-text-fill-color:<?php echo $subtitle_color; ?>;font-size:<?php echo $subtitle_size; ?>px;"><?php echo $title_last; ?></span><?php } ?>
						</<?php echo $title_header; ?>>
						</div>
					<?php endif; ?>
					
				</div>
				
				<?php if( $title_intro ){ ?>
				<div class="flex_style_title_intro title_<?php echo $title_type; ?>" style="text-align:<?php echo $title_align; ?>;justify-content:<?php echo $title_align; ?>;">
					<div class="title_intro" style="color:<?php echo $intro_color; ?>;">
						<?php echo $title_intro; ?>
					</div>
				</div>
				<?php } ?>
				
			</span></div>
		</div>
	</section>
</div>	
<?php if( $title_break ){ ?><div class="break"></div><?php } ?>		
<?php } ?>	