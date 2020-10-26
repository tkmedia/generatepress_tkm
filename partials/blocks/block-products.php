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

$show_title = get_field('pr_sti');
$show_price = get_field('pr_spr');
$show_image = get_field('pr_simg');
$show_secimage = get_field('pr_ssimg');
$show_addtocart = get_field('pr_scart');
$show_intro = get_field('pr_sint');
$title_color = get_field('pr_tic');
$price_color = get_field('pr_prc');

$grid_products = get_field('pr_pr');
$style = get_field('pr_st');
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

					<?php 
					if ( ! defined( 'ABSPATH' ) ) {
						exit;
					}

					foreach ( $grid_products as $post ) :
					setup_postdata($post);

					defined( 'ABSPATH' ) || exit;
					global $product;
					// Ensure visibility.
					if ( empty( $product ) || ! $product->is_visible() ) {
						return;
					}
					$link = get_permalink( $product->get_id() );
					$attachment_ids = $product->get_gallery_image_ids();
					?>
						<div class="grid-item<?php if( $attachment_ids && generatepress_wc_get_setting( 'product_secondary_image' ) && $show_secimage && $show_secimage) { ?> wc-has-gallery<?php } ?><?php if( $grid_slider ) { ?> slider-slide<?php } else { ?> col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>" style="padding:<?php echo $grid_pad; ?>px !important;">
							<div <?php wc_product_class( '', $product ); ?>>
								
								<?php if( $style == 'simple' ) { ?>
									<a href="<?php echo esc_url( $link ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">
									<div class="product_grid_item_container">
										<div class="product_grid_item_img_wrap wc-product-image image<?php echo $imageheight; ?>">
											<?php
											//echo get_the_post_thumbnail($product->ID, 'full');
											echo get_the_post_thumbnail($product->get_id(), $imagesize);
											?>
											<?php if( $show_intro ) { ?>
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
													<div class="product_grid_item_excerpt_more"><?php _e('Learn More', 'generatepress_tkm'); ?></div>
												</div>
											</div>
											<?php } ?>
										</div>
										<div class="product_grid_item_title_wrap row-flex">
											<?php if( $show_title ) { ?>
											<div class="product_grid_item_title col-xs-12 woocommerce-loop-product__title" style="color:<?php echo $title_color; ?>!important;"><?php echo get_the_title( $product->get_id()); ?></div>
											<?php } ?>
											<?php if( $show_price ) { ?>
											<div class="archive_product_item_price col-xs-12 archive_product_item_price" style="color:<?php echo $price_color; ?>!important;"><?php echo woocommerce_template_single_price(); ?></div>
											<?php } ?>
										</div>
									</div>
									</a>
								<?php } elseif( $style == 'box_buy' ) { ?>
									<div class="product_grid_item_container archive_product_item_container product_item_container">
											<?php //do_action( 'woocommerce_before_shop_loop_item' ); ?>
											<div class="archive_product_item_img_wrap">
												<div class="archive_product_item_sale_flash">
												<?php echo woocommerce_show_product_loop_sale_flash (); ?>
												</div>
												<?php if( $show_image ) { ?>
												
												<div class="archive_product_item_img wc-product-image product_grid_item_img_wrap image<?php echo $imageheight; ?>">
													<a href="<?php echo esc_url( $link ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">
													<?php
													if ( $attachment_ids && generatepress_wc_get_setting( 'product_secondary_image' ) && $show_secimage ) {
														$secondary_image_id = $attachment_ids['0'];
														echo wp_get_attachment_image( $secondary_image_id, $imagesize, '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
													}
													?>
													<?php echo get_the_post_thumbnail($product->get_id(), $imagesize); ?>
													</a>
												</div>
												<?php } ?>
												<?php if( $show_addtocart ) { ?>
												
												<div class="archive_product_item_add_to_cart">
												<?php echo woocommerce_template_loop_add_to_cart( $args = array() );
												//do_action( 'woocommerce_before_shop_loop_item_title' );
												?>
												</div>
												<?php } ?>
												<div class="archive_product_item_quick_view">
												<?php 
												if( class_exists( 'YITH_WCQV_Frontend' ) ) {
													echo do_shortcode( '[yith_quick_view product_id="'.$product->get_id().'" type="icon" title="<i class="fal fa-eye"></i>"]' );
												} ?>
												</div>
											</div>
											<a href="<?php echo esc_url( $link ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link archive_product_item_back_content_link">
											<div class="archive_product_item_title_wrap">
												<?php if( $show_title ) { ?>
												<div class="archive_product_item_title woocommerce-loop-product__title" style="color:<?php echo $title_color; ?>!important;"><?php echo get_the_title( $product->get_id()); ?><?php //do_action( 'woocommerce_shop_loop_item_title' ); ?></div>
												<?php } ?>
												<?php if( $show_price ) { ?>
												<div class="archive_product_item_price" style="color:<?php echo $price_color; ?>!important;"><?php echo woocommerce_template_single_price(); ?><?php //do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
												</div>
												<?php } ?>
												<?php if( $show_intro ) { ?>
												<div class="product_grid_item_excerpt_inner">
													<?php 
													//echo wp_html_excerpt( get_the_content(), 100, '...' );
													//echo wp_trim_words($post->post_excerpt,15);
													echo wp_trim_words( get_the_content(), 15);
													?>
												</div>
												<?php } ?>
											</div>
											</a>
									</div>
								<?php } ?>
								
							</div>
						</div>
					<?php 
					endforeach;
					
					wp_reset_postdata(); ?>	
						
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