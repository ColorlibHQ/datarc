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

?>
<div id="page_<?php the_ID(); ?>" class="content--area">
	<?php 

	/**
	 * page content 
	 * Comments Template
	 * @Hook  datarc_page_content
	 *
	 * @Hooked datarc_page_content_cb
	 * 
	 *
	 */
	do_action( 'datarc_page_content' );

	?>
</div>