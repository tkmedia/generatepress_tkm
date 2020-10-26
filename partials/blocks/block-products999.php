<?php
$uid = $block['id'];
$className = 'acftkm_products_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}

$grid_count = get_field('pr_vd');
$grid_count_mobile = get_field('pr_vdm');
$grid_slider = get_field('pr_sli');
$grid_slidermo = get_field('pr_slim');
$grid_pad = get_field('pr_gs');

$product_grid_pages = get_field('pr_pr');
$product_grid_style = get_field('pr_st');
$imagesize = get_field('pr_he');
$imagesize = get_field('pr_he');
$imageheight = get_field('pr_ihe');
$itemheight = get_field('pr_ith');

if ( $grid_count == 1 ) : $m_sm_cols = "12"; $m_md_cols = "12"; $m_lg_cols = "12";
elseif ( $grid_count == 2 ) : $m_sm_cols = "6"; $m_md_cols = "6"; $m_lg_cols = "6";
elseif ( $grid_count == 3 ) : $m_sm_cols = "6"; $m_md_cols = "4"; $m_lg_cols = "4";
elseif ( $grid_count == 4 ) : $m_sm_cols = "4"; $m_md_cols = "3"; $m_lg_cols = "3";
elseif ( $grid_count == 5 ) : $m_sm_cols = "4"; $m_md_cols = "20"; $m_lg_cols = "20";
elseif ( $grid_count == 6 ) : $m_sm_cols = "3"; $m_md_cols = "2"; $m_lg_cols = "2";
elseif ( $grid_count == 7 ) : $m_sm_cols = "3"; $m_md_cols = "seven"; $m_lg_cols = "seven";
elseif ( $grid_count == 8 ) : $m_sm_cols = "3"; $m_md_cols = "20"; $m_lg_cols = "eight";
endif;
if ( $grid_count_mobile == 1 ) : $m_xs_cols = "12";
elseif ( $grid_count_mobile == 2 ) : $m_xs_cols = "6";
elseif ( $grid_count_mobile == 3 ) : $m_xs_cols = "4";
endif;

?>
<div id="<?php echo $uid; ?>" class="flex_content_cols <?php echo esc_attr($className); ?>">
	<style>
	#<?php echo $uid; ?> .product_grid_item_img_wrap.imagecover, 
	#<?php echo $uid; ?> .product_grid_item_img_wrap.imagecontain {height:<?php echo $itemheight; ?>px;}
	#<?php echo $uid; ?> .product_grid_item_img_wrap.imagecover img {width: 100%;height: 100%;object-fit: cover;} 
	#<?php echo $uid; ?> .product_grid_item_img_wrap.imagecontain img {width: 100%;height: 100%;object-fit: contain;}
	</style>
	<section id="section-<?php echo $uid; ?>" class="page_flexible section_flex_feature page_flexible_content section-<?php echo $uid; ?>">
		<div class="masonary_grid_link_wrap masonary_grid_product masonary_grid-<?php echo $count;?> page_grid_style_<?php echo $product_grid_style;?>">
			<div class="masonary_grid<?php if( $grid_slider ) { ?> slider-container<?php } ?>">
				<div class="layout <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">
				<?php foreach( $product_grid_pages as $post ): ?>
				<?php setup_postdata($post); ?>
				<?php
				defined( 'ABSPATH' ) || exit;
				global $product;
				$pro_link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
				//$product_visual_vpr = get_field( 'pro_vpr', $product->ID);
				//$product_visual_vspr = get_field( 'pro_vspr', $product->ID);
				// Ensure visibility.
				if ( empty( $product ) || ! $product->is_visible() ) {
					return;
				}
				?>
					<div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?> <?php $allClasses = wc_get_product_class(); foreach ($allClasses as $class) { echo $class.' '; } ?>">
						
						<div <?php //wc_product_class($product); ?>>
							
							<?php if( $product_grid_style == 'simple' ) { ?>
							
								<div class="product_grid_item_container">
									<div class="product_grid_item_img_wrap">
										<?php
										//echo get_the_post_thumbnail($product->ID, 'full');
										echo get_the_post_thumbnail($product->get_id(), $product_grid_image_size);
										echo woocommerce_show_product_loop_sale_flash();
										if ( !$product->is_in_stock() ) {
									        echo '<span class="soldout">' . __( 'SOLD OUT', 'generatepress_child' ) . '</span>';
									    }
										?>
										<div class="product_grid_item_excerpt">
											<div class="product_grid_item_excerpt_inner">
												<?php 
												if( class_exists( 'YITH_WCQV_Frontend' ) ) {
													echo do_shortcode( '[yith_quick_view product_id="'.$product->get_id().'" type="icon" label="<i class="fal fa-eye"></i>"]' ); 
												} ?>
											</div>
										</div>
									</div>
									<?php echo '<a href="' . esc_url( $pro_link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">'; ?>
									<div class="product_grid_item_title_wrap">
										<div class="product_grid_item_title"><?php the_title(); ?></div>
										<div class="archive_product_item_price">
											<?php if ($product_visual_vpr) { ?>
											<span class="price">
												<?php if ($product_visual_vspr) { ?>
												<del><span class="woocommerce-Price-amount amount"><bdi><?php echo $product_visual_vspr; ?></span></del> 
												<?php } ?>
												<ins><span class="woocommerce-Price-amount amount"><bdi><?php echo $product_visual_vpr; ?></ins>
											</span>
											<?php } else { echo woocommerce_template_single_price(); }?>
											
										</div>
									</div>
									<div class="archive_product_item_palet">
										<div class="item_palet_wrap">
											<div class="item_palet_colors">
												<div class="item_palet_title"><?php _e('Colors:', 'generatepress_child'); ?></div>
												<div class="item_palet_color">
													<div class="item_palet_row">
													<?php 
													$product_visual_color = get_field( 'pro_vcp', $product->ID);
													$product_visual_mixcolor = get_field( 'pro_vmcp', $product->ID);
													if ($product_visual_color) {
														foreach ( $product_visual_color as $color_v ) {
														//$color = preg_replace('/#.*/', '', $color_v['value']);
														$color = explode('#', $color_v['value'])[1];
														?>
														<div class="item_palet_col" style="background:#<?php echo $color; ?>;"><span></span></div>
														<?php 
														}
														
													}

													if ($product_visual_mixcolor) {	
													//$mixcolors = $product_visual_mixcolor['value'];
														foreach( $product_visual_mixcolor as $mcolor ) {
														?>
														<div class="item_palet_col mixcolors <?php echo $mcolor; ?>"><span></span></div>
																
														<?php	
														}
													} ?>
													
													</div>
												</div>
											</div>
											<div class="item_palet_col_btn"><?php _e('More Info', 'generatepress_child'); ?> <i class="fal fa-chevron-left"></i></div>
										</div>
									</div>
									</a>
								</div>
							<?php } elseif( $product_grid_style == 'box_buy' ) { ?>
								<?php echo '<a href="' . esc_url( $pro_link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">'; ?>
								<div class="product_grid_item_container archive_product_item_container product_item_container">
									<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
									<div class="archive_product_item_img_wrap">
										<div class="archive_product_item_sale_flash">
										<?php echo woocommerce_show_product_loop_sale_flash (); ?>
										</div>
										<div class="archive_product_item_img">
										<?php echo get_the_post_thumbnail($product->get_id(), $product_grid_image_size); ?>
										</div>
										<div class="archive_product_item_add_to_cart">
										<?php echo woocommerce_template_loop_add_to_cart( $args = array() );
										//do_action( 'woocommerce_before_shop_loop_item_title' );
										?>
										</div>
										<div class="archive_product_item_quick_view">
										<?php 
										if( class_exists( 'YITH_WCQV_Frontend' ) ) {
											echo do_shortcode( '[yith_quick_view product_id="'.$product->get_id().'" type="icon" title="<i class="fal fa-eye"></i>"]' );
										} ?>
										</div>
									</div>
									<div class="archive_product_item_title_wrap">
										<div class="archive_product_item_title">
										<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
										</div>
										<div class="archive_product_item_price">
										<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
										</div>
										<div class="archive_product_item_cart">
										<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
										</div>
									</div>
								</div>
								</a>
							<?php } ?>
						</div>
						
					</div>
			    <?php endforeach; ?>
			    <?php wp_reset_postdata(); ?> 
					
				</div>
			</div>
		</div>

		<?php if( $grid_slider || $grid_slidermo ): 
		$center_slide = get_field('pr_cs');
		$autoplay = get_field('pr_auto');
		$centerslide = get_field('pr_cs');
		$delay = get_field('pr_dl');
		$arrows = get_field('pr_arr');
		$dots = get_field('pr_dot');
		$autoheight = get_field('pr_dot');
		?>
		<script>
		jQuery(function($) {
			<?php if( $grid_slider ) { ?>

			if ($('#section-<?php echo $uid; ?> .slider-wrapper .grid-item').length > 1) {
				var br_count<?php echo $uid; ?> = <?php echo $grid_count_mobile; ?> + 1;
				$("#section-<?php echo $uid; ?> .slider-wrapper").slick({
					<?php if ( is_rtl() ) { ?>
					rtl: true,
					<?php } ?>
					slidesToShow: <?php echo $grid_count; ?>,
					slidesToScroll: 1,
					pauseOnHover: true,
					speed: 500,
					autoplay: <?php if($autoplay == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
					autoplaySpeed: <?php echo $delay; ?>000,
					arrows: <?php if($arrows == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
					dots: <?php if($dots == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
					responsive: [
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: 2,
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: <?php echo $grid_count_mobile; ?>,
				        centerMode: <?php if($centerslide == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
				        centerPadding: <?php if($centerslide == 'true'){ ?>'40px'<?php }else{ ?>'0px'<?php } ?>,
						dots: false,
						arrows: true,
				      }
				    }
					]
				});
				$('#section-<?php echo $uid; ?> .slider-wrapper').on('setPosition', function (event, slick) {
					$(slick.$slides).height('auto').css('height', $(slick.$slideTrack).height() + 'px');
				});
			}
		    <?php } ?>		

		    <?php if ( wp_is_mobile() && $grid_slidermo ) { ?>	
			if ($('#section-<?php echo $uid; ?> .layout.row-flex .grid-item').length > 1) {
				var br_count<?php echo $uid; ?> = <?php echo $grid_count_mobile; ?> + 1;
				$("#section-<?php echo $uid; ?> .layout").slick({
					<?php if ( is_rtl() ) { ?>
					rtl: true,
					<?php } ?>
					slidesToShow: <?php echo $grid_count; ?>,
					slidesToScroll: 1,
					pauseOnHover: true,
					speed: 500,
					autoplay: <?php if($autoplay == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
					autoplaySpeed: <?php echo $delay; ?>000,
					arrows: <?php if($arrows == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
					dots: <?php if($dots == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
					responsive: [
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: 2,
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: <?php echo $grid_count_mobile; ?>,
				        centerMode: <?php if($centerslide == 'true'){ ?>true<?php }else{ ?>false<?php } ?>,
				        centerPadding: <?php if($centerslide == 'true'){ ?>'20px'<?php }else{ ?>'0px'<?php } ?>,
						dots: true,
						arrows: false,
				      }
				    }
					]
				});

			}
			<?php } ?>
			
		});
		</script>
		<?php endif; ?>
				
	</section>
</div>