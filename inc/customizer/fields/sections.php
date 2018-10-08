<?php 
/**
 * @Packge     : Datarc
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */


/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'datarc_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'datarc' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'datarc_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'datarc' ),
            'panel'    => 'datarc_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'datarc_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Nav Bar', 'datarc' ),
            'panel'    => 'datarc_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'datarc_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'datarc' ),
            'panel'    => 'datarc_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * 404 Page Section
     */
    array(
        'id'   => 'datarc_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'datarc' ),
            'panel'    => 'datarc_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'datarc_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'datarc' ),
            'panel'    => 'datarc_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>