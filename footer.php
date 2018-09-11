<?php 
/**
 * @Packge     : Datarc
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

        /**
         * Footer Area
         *
         * @Footer
         * @Back To Top Button
         *
         * @Hook datarc_footer
         *
         * @Hooked  datarc_footer_area 10
         * @Hooked  datarc_back_to_top 20 
         *
         */

		do_action( 'datarc_footer' );

	wp_footer(); 
 ?>
</body>
</html>