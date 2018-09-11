<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : Datarc
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 

// enqueue css
function datarc_common_custom_css(){
    
    wp_enqueue_style( 'datarc-common', get_template_directory_uri().'/assets/css/common.css' );
		
		$headerBg          = get_header_image();
		$headerTextColor   = get_header_textcolor();
		$headerbgcolor     = datarc_opt('datarc_headerbgcolor');

		$navbarbg 			= datarc_opt( 'datarc_header_navbar_bgColor' );
		$stickynavbarbg 	= datarc_opt( 'datarc_header_navbarsticky_bgColor' );

		$navmenuColor 		= datarc_opt( 'datarc_header_navbar_menuColor' );
		$navmenuHovColor 	= datarc_opt( 'datarc_header_navbar_menuHovColor' );
		$stickynavmenuColor 	= datarc_opt( 'datarc_header_sticky_navbar_menuColor' );
		$stickynavmenuHovColor 	= datarc_opt( 'datarc_header_sticky_navbar_menuHovColor' );


		$foftext1     	   = datarc_opt('datarc_fof_textonecolor_settings');
		$foftext2     	   = datarc_opt('datarc_fof_texttwocolor_settings');
		$fofbgcolor        = datarc_opt('datarc_fof_bgcolor_settings');

		$footerbgColor     = datarc_opt('datarc_footer_bgColor_settings');
		$footerTextColor   = datarc_opt('datarc_footer_color_settings');
		$anchorcolor 	   = datarc_opt('datarc_footer_anchorcolor_settings');
		$anchorhovcolor    = datarc_opt('datarc_footer_anchorhovcolor_settings');
		$widgettitlecolor  = datarc_opt('datarc_footer_widgettitlecolor_settings');
		$footerborder  	   = datarc_opt('datarc_footer_bordercolor_settings');

		$themecolor  	   = datarc_opt('datarc_themecolor');

        $customcss ="
			.subscription .newsletter-btn:hover,
			.single-member .thumb .overlay-member .line,
			.single-filter-content .overlay-bg-content .line,
			.single-product:hover,
			.details-btn:hover,
			.primary-btn:hover,
			.default-header nav .main-menu .nav-item.submenu ul .nav-item:hover .nav-link,
			.block2-img span.onsale,
			.woocommerce span.onsale,
			.swal-button:active,
			.swal-button,
			.arrow-slick1:hover,
			.select2-container .select2-results__option--highlighted[aria-selected],
			.select2-container .select2-results__option[aria-selected='true'],
			[data-loader='ball-scale'],
			.hov1:hover,
			.eff2:active,
			.effect1-line,
			.bg0-hov:hover,
			.bg0{
				background-color: {$themecolor};
			}
			.footer-bottom .footer-text a:hover,
			.subscription .info.valid,
			footer .footer-nav li a:hover,
			.active-testimonial-carousel .single-testimonial .author h6 a:hover,
			.single-pricing-table .top .package .price,
			.single-pricing-table .top .head span ,
			.single-member .desc h5 a:hover,
			.single-member .thumb .overlay-member .social a:hover,
			.controls .filter.active ,
			.controls .filter:hover,
			.single-product .icon .fa,
			.footer-social a:hover,
			.header-social a:hover,
			.default-header nav .main-menu a:hover,
			.logo h2 a,
			.list:hover .progressBar-percentage,
			.block2-btn-towishlist .icon_heart,
			.color0,
			.color0-hov:hover,
			.m-text8 {
				color: {$themecolor};
			}
			.subscription .newsletter-btn,
			.single-product,
			.details-btn,
			.primary-btn,
			.tag-item:hover {
				border-color: {$themecolor};
			}
			.list:hover .progressBar-circle {
			    stroke: {$themecolor};
			}
			.bg-title-page {
				background-image: url( {$headerBg} );
			}
			.bg-title-page .l-text2 {
				color: #{$headerTextColor};
			}
			.bg-title-page{
				background-color: {$headerbgcolor}
			}
			#f0f{
				background-color: {$fofbgcolor}
			}
			.inner-child-fof .h1 {
				color: {$foftext1}
			}
			.inner-child-fof a,
			.inner-child-fof p {
				color: {$foftext2}
			}
			footer{
				background-color: {$footerbgColor};
				color: {$footerTextColor};
			}
			caption,
			footer .s-text8 {
				color: {$footerTextColor};
			}
			.single-footer-widget a,
			.footer-bottom a{
				color: {$anchorcolor};
			}
			.single-footer-widget a:hover,
			.footer-bottom a:hover{
				color: {$anchorhovcolor};
			}
			.single-footer-widget h6{
				color: {$widgettitlecolor};
			}
			.footer-bottom {
				border-color: {$footerborder};
			}
			.sticky-header {
				background-color: {$navbarbg};
			}
			.is-sticky .sticky-header {
				background: {$stickynavbarbg};
			}
			.default-header nav .main-menu a {
				color: {$navmenuColor};
			}
			.default-header nav .main-menu a:hover {
				color: {$navmenuHovColor};
			}
			.default-header .is-sticky nav .main-menu a {
				color: {$stickynavmenuColor};
			}
			.default-header .is-sticky nav .main-menu a:hover {
				color: {$stickynavmenuHovColor};
			}

        ";
       
    wp_add_inline_style( 'datarc-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'datarc_common_custom_css', 50 );