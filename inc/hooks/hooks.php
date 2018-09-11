<?php 
/**
 * @Packge 	   : Datarc
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Before Wrapper
	 *
	 * @Preloader
	 *
	 */
	add_action( 'datarc_preloader', 'datarc_site_preloader', 10 );

	/**
	 * Header
	 *
	 * @Header Menu
	 * @Header Bottom
	 * 
	 */

	add_action( 'datarc_header', 'datarc_header_cb', 10 );

	/**
	 * Hook for footer
	 *
	 */
	add_action( 'datarc_footer', 'datarc_footer_area', 10 );
	add_action( 'datarc_footer', 'datarc_back_to_top', 20 );

	/**
	 * Hook for Blog, single, page, search, archive pages wrapper.
	 */
	add_action( 'datarc_wrp_start', 'datarc_wrp_start_cb', 10 );
	add_action( 'datarc_wrp_end', 'datarc_wrp_end_cb', 10 );
	
	/**
	 * Hook for Blog, single, search, archive pages column.
	 */
	add_action( 'datarc_blog_col_start', 'datarc_blog_col_start_cb', 10 );
	add_action( 'datarc_blog_col_end', 'datarc_blog_col_end_cb', 10 );
	
	/**
	 * Hook for blog posts thumbnail.
	 */
	add_action( 'datarc_blog_posts_thumb', 'datarc_blog_posts_thumb_cb', 10 );

	/**
	 * Hook for blog posts title.
	 */
	add_action( 'datarc_blog_posts_title', 'datarc_blog_posts_title_cb', 10 );

	/**
	 * Hook for blog posts meta.
	 */
	add_action( 'datarc_blog_posts_meta', 'datarc_blog_posts_meta_cb', 10 );

	/**
	 * Hook for blog posts excerpt.
	 */
	add_action( 'datarc_blog_posts_excerpt', 'datarc_blog_posts_excerpt_cb', 10 );

	/**
	 * Hook for blog posts content.
	 */
	add_action( 'datarc_blog_posts_content', 'datarc_blog_posts_content_cb', 10 );

	/**
	 * Hook for blog sidebar.
	 */
	add_action( 'datarc_blog_sidebar', 'datarc_blog_sidebar_cb', 10 );
	
	/**
	 * Hook for blog single post social share option.
	 */
	add_action( 'datarc_blog_posts_share', 'datarc_blog_posts_share_cb', 10 );
	
	/**
	 * Hook for blog single post meta category, tag, next - previous link and comments form.
	 */
	add_action( 'datarc_blog_single_meta', 'datarc_blog_single_meta_cb', 10 );
	
	/**
	 * Hook for page content.
	 */
	add_action( 'datarc_page_content', 'datarc_page_content_cb', 10 );
	
	
	/**
	 * Hook for 404 page.
	 */
	add_action( 'datarc_fof', 'datarc_fof_cb', 10 );

	

?>