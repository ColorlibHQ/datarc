<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge 	   : Datarc
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 

	//  Call Header
	get_header();

	/**
	 * 404 page
	 * @Hook datarc_fof
	 * @Hooked datarc_fof_cb
	 *
	 */

	do_action( 'datarc_fof' );

	 // Call Footer
	 get_footer();
?>