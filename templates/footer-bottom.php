
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
<div class="footer-bottom d-flex justify-content-between align-items-center">
    <p class="footer-text m-0"><?php echo wp_kses_post( datarc_opt( 'datarc-copyright-text-settings', __( 'Copyright © 2018 All rights reserved.', 'datarc' ) ) ); ?></p>
    <?php 
    // Social Media
    if( datarc_opt('datarc-footersocial-toggle-settings') ){
        if( has_nav_menu('social-menu') ){  
            $args = array(
                'theme_location' => 'social-menu',
                'container'      => '',
                'menu_class'     => 'footer-social d-flex align-items-center',
                'depth'          => 1,
                'fallback_cb'    => 'datarc_social_navwalker::fallback',
                'walker'         => new datarc_social_navwalker(),
            );  
            wp_nav_menu( $args );
        }
    }
    ?>
</div>