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

<div class="pos-relative">
    <form role="search" class="subscription relative d-flex justify-content-center" action="<?php echo esc_url( site_url( '/' ) ); ?>">
        <input type="text" name="s" placeholder="<?php esc_html_e( 'Search', 'datarc' ); ?>">
        <button type="submit" class="newsletter-btn"><span class="lnr lnr-location"></span></button>
    </form>
</div>