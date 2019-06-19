<?php 
/**
 * @Packge     : Datarc
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

class datarc_theme_customizer {


    function __construct(){
        add_action( 'customize_register', array( $this, 'datarc_theme_customizer_options' ) );
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'datarc_customizer_js' ) );
    }

    // Customize register hook

    public function datarc_theme_customizer_options( $wp_customize ){

        // Include files
        include( DATARC_DIR_PATH_INC. 'customizer/fields/sections.php' );
        include( DATARC_DIR_PATH_INC. 'customizer/fields/fields.php' );

        // Change panel to theme option
        $wp_customize->get_section( 'title_tagline' )->panel      = 'datarc_options_panel';
        // change priorities
        $wp_customize->get_section( 'title_tagline' )->priority     = 0;

        // Copyright text selective refresh
        $wp_customize->selective_refresh->add_partial( 'datarc-copyright-text-settings', 
        array( 'selector' => '.footer-text' ) );


    }

    // Customizer js enqueue
    public function datarc_customizer_js(){

        wp_enqueue_script( 'datarc-customizer', DATARC_DIR_URI.'inc/customizer/js/customizer.js', array('customize-controls'), '1.0', true );

        wp_localize_script( 'datarc-customizer', 'customizerdata', array(

            'site_url'      => site_url('/'),
            'blog_page'     => get_post_type_archive_link( 'post' )

        ) );
        
    }

    // Image sanitization callback.

    public static function datarc_sanitize_image( $image, $setting ) {

        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );

        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );

        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }

}
?>