<?php
$tbe_rows = get_field('hc_tbe','option');
$hc_tbbg = get_field('hc_tbbg','option');
$mcart_po = get_field('mcart_po','option');
if ($tbe_rows) {
?>

<div id="header_top_bar" class="header_top_bar_wrap top_bar_split" style="background-color:<?php echo $hc_tbbg; ?>;">
	<!--<div class="top_bar_bg"></div>-->
	<div class="custom_top_bar top_bar_col">
		<div class="custom_top_bar_elements">
	

		<?php
		$tbe_rows = get_field('hc_tbe','option');
		//print_r($sbs_rows);
		//$sbs_rows = get_post_meta( get_the_ID(), 'sbs_flex', true );
		$tbe_col = 0;
		foreach( $tbe_rows as $tbe_count => $tbe_row ) { 
			$tbe_col++;

		switch ( $tbe_row['acf_fc_layout'] ) {
				
			case 'hc_tbnav':
			$hc_tbssnv = $tbe_row['hc_tbssnv'];
			if ($hc_tbssnv) { ?>
			<div class="top_bar_left_col top_bar_text tbe_col_<?php echo $tbe_col; ?>">
				<div id="panel-nav" class="panel-nav" role="navigation">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'top_bar_nav',
							'container'      => false,
							'menu_id'      => 'menu-panel',
							'menu_class'     => 'menu-panel',
							'depth'          => '2',
							'fallback_cb'    => false,
							'link_before'    => '<span class="nav-name-item" itemprop="name">',
							'link_after'     => '</span>',
					) ); ?>
				</div>
			</div>
			<?php } ?>
			<?php break;

			case 'hc_tbse':
			$hc_tbsse = $tbe_row['hc_tbsse'];
			if ($hc_tbsse) { ?>
			<div id="top_bar_search" class="header_search_block">
				<div class="search-form-container searchform">
					<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="search-table">	
							<div class="search-button">
						        <button type="submit" id="search-submit">
						        <span class="screen-reader-text"><?php _e('Search', 'generatepress_tkm'); ?></span>
						        <i class="fal fa-search" style=""></i>
						        </button>
							</div>
							<div class="search-field">
								<label class="screen-reader-text" for="search-input"><?php _e('Search Products', 'generatepress_tkm'); ?></label>
						        <input type="search" placeholder="<?php _e('Search Products', 'generatepress_tkm'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="top_bar_search_mobile" style="display: none;">
				<a class="" data-fancybox data-src="#header-minicart-search" href="javascript:;">
				<i class="fal fa-search" style=""></i>
				</a>
				<div id="header-minicart-search" class="header_search_block" style="display: none;max-width: 700px;">
					<div class="search-form-container searchform">
						<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="search-table">	
								<div class="search-button">
							        <button type="submit" id="search-submit">
							        <span class="screen-reader-text"><?php _e('Search', 'generatepress_tkm'); ?></span>
							        <?php _e('Search', 'generatepress_tkm'); ?>
							        </button>
								</div>
								<div class="search-field">
									<label class="screen-reader-text" for="search-input"><?php _e('Search site', 'generatepress_tkm'); ?></label>
							        <input type="search" placeholder="<?php _e('Search site', 'generatepress_tkm'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php break;

			case 'hc_tbmc':
			$tbmc_my = $tbe_row['tbmc_my']; ?>
			
			<div class="header-minicart">
				<div class="shopping_cart_content">
					<div id="mini-cart" class="mini-cart">
						<div class="cart-head">
							<i class="fas fa-shopping-cart fa-flip-horizontal"></i>
							<span id="mcart-stotal" class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
							<span class="cart-items-text"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
							<!--
							<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
							-->
						</div>
						<div class="cart-popup widget_shopping_cart_wrap">
							<div class="widget_shopping_cart_head">
								<i class="fas fa-shopping-cart fa-flip-horizontal"></i>
								<span class="widget_shopping_cart_title"><?php _e('Shopping Cart', 'generatepress_tkm'); ?></span>
								<i class="fal fa-times widget_shopping_cart_close"></i>
							</div>
							<div class="widget_shopping_cart_content">
								<?php woocommerce_mini_cart(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ($tbmc_my) { ?>
			<div class="header-minicart-my">
				<a class="" href="/my-account/">
				<i class="fal fa-user-alt" style="color:<?php echo $tblmc_sz; ?>;font-size:<?php echo $tblmc_co; ?>px;"></i>
				</a>
			</div>
			<?php }
			break;
			
			case 'hc_tbtx':
			$hc_tbltext = $tbe_row['hc_tbtext'];
			?>
			<div class="top_bar_left_col top_bar_text">
				<div class="top_bar_text_inner"><?php echo $hc_tbtext; ?></div>
			</div>
			<?php break;

			case 'hc_tbic':
			$hc_tbici = $tbe_row['hc_blici'];
			$hc_tbicim = $tbe_row['hc_tbicim'];
			$hc_tbictx = $tbe_row['hc_tbictx'];
			$hc_tbiclty = $tbe_row['hc_tbiclty'];
			$hc_tbicfo = $tbe_row['hc_tbicfo'];
			$hc_tbicpg = $tbe_row['hc_tbicpg'];
			$hc_tbiclk = $tbe_row['hc_tbiclk'];
			$hc_tbicol = $tbe_row['hc_tbicol'];
			?>
			<div class="top_bar_left_col top_bar_icon">
				<div class="icon_link_item" style="color:<?php echo $hc_tbicol; ?>;">
					<?php if ($hc_tbiclty == 'free-link') { ?>
					<a href="<?php echo $hc_tbiclk; ?>" target="_blank" class="">
					<?php } elseif ($hc_tbiclty == 'popup-form') { ?>
					<a data-fancybox data-src="#popop-form-tble<?php echo $tbe_col; ?>" href="javascript:;">
					<?php } elseif ($hc_tbicty == 'page') { ?>
					<a href="<?php echo $hc_tbicpg; ?>" class="">
					<?php } elseif ($hc_tbicty == 'popup-video') { ?>
					<a data-fancybox href="<?php echo $hc_tbiclk;?>">
					<?php } ?>
						<?php if ($hc_tbici) { ?>
						<span class="icon_link_icon" style="color:<?php echo $hc_tbicol; ?>;"><?php echo $hc_tbici; ?></span>
						<?php } elseif ($hc_tbicim) { ?>
						<?php echo wp_get_attachment_image( $hc_tbicim, 'full' );?>
						<?php } ?>
						<?php if ($hc_tbictx) { ?><span class="icon_link_text" style="color:<?php echo $hc_tbicol; ?>;"><?php echo $hc_tbictx; ?></span><?php } ?>

					</a>
				</div>
			</div>
			<?php if( $hc_tbiclty == 'popup-form' ): ?>
			<?php 
			$popup_contact_title = get_option( 'options_default_flex_form_title' );
			$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
			?>
			<div style="display: none;max-width: 700px;" id="popop-form-tble<?php echo $tble_col; ?>" class="button-popop-form">
			
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
										<?php echo do_shortcode( '[contact-form-7 id="'.$hc_tbicfo.'" ]' ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</div>
			<?php endif; ?>
				
			<?php break;
			
			}			
		} ?>	
		</div>
	</div> 
</div>
<?php } ?>