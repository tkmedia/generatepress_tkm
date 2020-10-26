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

$products = get_field('pr_pr');
$style = get_field('pr_st');
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
		<div class="masonary_grid_link row_items_<?php echo $grid_count; ?> flexible_page_element source_product" itemprop="text">
			<div class="masonary_grid_link_wrap masonary_grid_product masonary_grid-<?php echo $uid;?> page_grid_style_<?php echo $style;?>">
				<div class="masonary_grid<?php if( $grid_slider ) { ?> slider-container<?php } ?>">
					<div class="layout <?php if( $grid_slider ) { ?>slider-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">

					<?php foreach( $products as $post ): ?>
					<?php setup_postdata($post); ?>
					<?php
					defined( 'ABSPATH' ) || exit;
					global $product;
					$pro_link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
					// Ensure visibility.
					if ( empty( $product ) || ! $product->is_visible() ) {
						return;
					}
					?>
						<div class="grid-item <?php if( $grid_slider ) { ?>slider-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>">
							
							<div<?php wc_product_class($product); ?>>
								
								<?php if( $style == 'simple' ) { ?>
									<div class="product_grid_item_container">
										<div class="product_grid_item_img_wrap image<?php echo $imageheight; ?>">
											<?php
											//echo get_the_post_thumbnail($product->ID, 'full');
											echo get_the_post_thumbnail($product->get_id(), $imagesize);
											?>
											<div class="product_grid_item_excerpt">
												<div class="product_grid_item_excerpt_inner">
													<?php 
													if( class_exists( 'YITH_WCQV_Frontend' ) ) {
														echo do_shortcode( '[yith_quick_view product_id="'.$product->get_id().'" type="icon" label="<i class="fal fa-eye"></i>"]' ); 
													} ?>
													<?php 
													//echo wp_html_excerpt( get_the_content(), 100, '...' );
													//echo wp_trim_words($post->post_excerpt,15);
													echo wp_trim_words( get_the_content(), 15);
													?>
													<?php echo '<a href="' . esc_url( $pro_link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">'; ?>
													<div class="product_grid_item_excerpt_more"><?php _e('Learn More', 'generatepress_tkm'); ?></div>
													</a>
												</div>
											</div>
										</div>
										<div class="product_grid_item_title_wrap row-flex">
											<div class="product_grid_item_title col-xs-12"><?php echo get_the_title( $product->get_id()); ?></div>
											<div class="archive_product_item_price col-xs-12"><?php echo woocommerce_template_single_price(); ?></div>
										</div>
									</div>
								<?php } elseif( $style == 'box_buy' ) { ?>
									<?php //echo '<a href="' . esc_url( $pro_link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">'; ?>
									
									<div class="product_grid_item_container archive_product_item_container product_item_container">
										<a href="<?php echo esc_url( $pro_link ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">
											<?php //do_action( 'woocommerce_before_shop_loop_item' ); ?>
											<div class="archive_product_item_img_wrap">
												<div class="archive_product_item_sale_flash">
												<?php echo woocommerce_show_product_loop_sale_flash (); ?>
												</div>
												<div class="archive_product_item_img product_grid_item_img_wrap image<?php echo $imageheight; ?>">
												<?php echo get_the_post_thumbnail($product->get_id(), $imagesize); ?>
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
												<div class="archive_product_item_title"><?php the_title(); ?><?php //do_action( 'woocommerce_shop_loop_item_title' ); ?></div>
												<div class="archive_product_item_price"><?php echo woocommerce_template_single_price(); ?><?php //do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
												</div>
												<div class="archive_product_item_cart"><?php //do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
											</div>
										</a>
									</div>
									
								<?php } ?>
							</div>
							
						</div>
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); ?> 
						
					</div>
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