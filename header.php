<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<?php
$masthead_style = get_post_meta( get_the_ID(), 'hmhs_sty', true );
$header_line_color = get_option( 'options_hc_lico' );
$button_color = get_option( 'options_hc_btnco' );
if ( $button_color ) { ?>
<style>
.page_grid_style_article-split button.section_readmore_link, .masthead_img_slider .popup_btn button.section_readmore_link, .masonary_grid_link.box-layout.grid_simple button.section_readmore_link, .page_grid_style_article-split button.section_readmore_link, .section_btn.grid_btn.section_readmore_link_wrap button.section_readmore_link, .page_grid_style_article-mix button.section_readmore_link, .mh_contact input.wpcf7-form-control.wpcf7-submit, button.section_readmore_link:hover, .page_grid_style_article button.section_readmore_link {background-color: <?php echo $button_color; ?> !important;}
.masonary_grid_link.grid_features button.section_readmore_link, .masonary_grid_link.grid_features_icon button.section_readmore_link, .sbs_btn button.section_readmore_link {background: linear-gradient(to right, #292734 50%,<?php echo $button_color; ?> 50%) no-repeat scroll right bottom / 210% 100% #292734 !important;color: #fff !important;}
</style>
<?php } if ( $header_line_color ) { ?>
<style>
.media_content_item.full_content.style_side-line .full_content_inner .full_content_title:before, .masonary_grid_link.box-layout.grid_stories button.section_readmore_link:before, .flex_style_title_container.title_clean-underline:after {background-color: <?php echo $header_line_color; ?> !important;}
.style_line:after, .title_wrap_start.style_line:after, .media_content_title_wrap.style_line .full_content_title.title_strat:after {border-bottom-color:<?php echo $header_line_color; ?> !important;}
.flex_style_title.flexible_page_element.title_clean-sideline:before {border-color:<?php echo $header_line_color; ?> !important;}
.page_grid_style_article-mix .grid-item-date, .masonary_grid_link.grid_branches .flex_masonary_subtitle:before {color:<?php echo $header_line_color; ?>;}
.page_grid_style_article-hover .flex_masonary_title {border-top:4px solid <?php echo $header_line_color; ?>;}
</style>
<?php } ?>
<body <?php body_class('loading '.$masthead_style.''); ?> <?php generate_do_microdata( 'body' ); ?>>
	<?php
	/**
	 * wp_body_open hook.
	 *
	 * @since 2.3
	 */
	do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

	/**
	 * generate_before_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_do_skip_to_content_link - 2
	 * @hooked generate_top_bar - 5
	 * @hooked generate_add_navigation_before_header - 5
	 */
	do_action( 'generate_before_header' );

	/**
	 * generate_header hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_header - 10
	 */
	do_action( 'generate_header' );

	/**
	 * generate_after_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_featured_page_header - 10
	 */
	do_action( 'generate_after_header' );
	?>

	<div id="page" <?php generate_do_element_classes( 'page' ); ?>>
		<?php
		/**
		 * generate_inside_site_container hook.
		 *
		 * @since 2.4
		 */
		do_action( 'generate_inside_site_container' );
		?>
		<div id="content" class="site-content">
			<?php
			/**
			 * generate_inside_container hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_inside_container' );
