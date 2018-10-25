<?php 
/**
 * @Packge     : Datarc
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

// Preloader background color field
Epsilon_Customizer::add_field(
    'datarc_themecolor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Theme Color', 'datarc' ),
        'description'       => esc_html__( 'Pick the theme color.', 'datarc' ),
        'section'           => 'datarc_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#00ff8c',
    )
);

// Instagram api key field
$url = 'https://www.instagram.com/developer/authentication/';

Epsilon_Customizer::add_field(
    'datarc_igaccess_token',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Instagram Access Token', 'datarc' ),
        'description'       => sprintf( __( 'Set instagram access token. To get access token %s click here %s.', 'datarc' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'datarc_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);
/***********************************
 * Social Media Show/Hide Toggle
 ***********************************/

// Header search form toggle field
Epsilon_Customizer::add_field(
    'datarc-headersocial-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle Header Social', 'datarc' ),
        'description' => esc_html__( 'Toggle the header top social active.', 'datarc' ),
        'section'     => 'datarc_headertop_options_section',
        'default'     => false,
    )
);
// Header top search form show / Hide opt
Epsilon_Customizer::add_field(
    'datarc-searchopt-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle Header Search', 'datarc' ),
        'description' => esc_html__( 'Toggle to show header search option.', 'datarc' ),
        'section'     => 'datarc_headertop_options_section',
        'default'     => false,
    )
);
// Header Nav Bar Background Color Picker 
Epsilon_Customizer::add_field(
    'datarc_header_navbar_bgColor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Header Nav Bar Background Color', 'datarc' ),
        'section'           => 'datarc_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'datarc_header_navbarsticky_bgColor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Header Sticky Nav Bar Background Color', 'datarc' ),
        'section'           => 'datarc_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'datarc_header_navbar_menuColor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Header Nav Bar Menu Color', 'datarc' ),
        'section'           => 'datarc_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);

// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'datarc_header_navbar_menuHovColor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Header Nav Bar Menu Hover Color', 'datarc' ),
        'section'           => 'datarc_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'datarc_header_sticky_navbar_menuColor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Sticky Header Nav Bar Menu Color', 'datarc' ),
        'section'           => 'datarc_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'datarc_header_sticky_navbar_menuHovColor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'datarc' ),
        'section'           => 'datarc_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'datarc_headerbgcolor',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Header Background Color', 'datarc' ),
        'section'           => 'colors',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/

// Post excerpt length field
Epsilon_Customizer::add_field(
    'datarc_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'datarc' ),
        'description' => esc_html__( 'Set post excerpt length.', 'datarc' ),
        'section'     => 'datarc_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'datarc-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'datarc' ),
        'section'  => 'datarc_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'datarc' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'datarc_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'datarc' ),
        'section'           => 'datarc_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Ooops 404 Error !', 'datarc' )
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'datarc_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'datarc' ),
        'section'           => 'datarc_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Either something went wrong or the page dosen&rsquo;t exist anymore.', 'datarc' )
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'datarc_fof_textonecolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( '404 Text #1 Color', 'datarc' ),
        'section'           => 'datarc_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#222',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'datarc_fof_texttwocolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( '404 Text #2 Color', 'datarc' ),
        'section'           => 'datarc_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#222',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'datarc_fof_bgcolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( '404 Page Background Color', 'datarc' ),
        'section'           => 'datarc_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'datarc-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle Footer widget', 'datarc' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'datarc' ),
        'section'     => 'datarc_footer_options_section',
        'default'     => false,
    )
);
// Footer widget toggle field
Epsilon_Customizer::add_field(
    'datarc-footersocial-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle Footer Social', 'datarc' ),
        'description' => esc_html__( 'Toggle the footer social icon active.', 'datarc' ),
        'section'     => 'datarc_footer_options_section',
        'default'     => false,
    )
);
// Footer copyright text field
Epsilon_Customizer::add_field(
    'datarc-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'datarc' ),
        'section'     => 'datarc_footer_options_section',
        'default'     => esc_html__( 'Copyright © 2018 All rights reserved.', 'datarc' ),
    )
);
// Footer background color field
Epsilon_Customizer::add_field(
    'datarc_footer_bgColor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Footer Background Color', 'datarc' ),
        'section'           => 'datarc_footer_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#222',
    )
);
// Footer text Color  field
Epsilon_Customizer::add_field(
    'datarc_footer_color_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Footer Text Color', 'datarc' ),
        'section'           => 'datarc_footer_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'datarc_footer_widgettitlecolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Footer Widget Title Color', 'datarc' ),
        'section'           => 'datarc_footer_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#FFFFFF',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'datarc_footer_anchorcolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Footer Anchor Color', 'datarc' ),
        'section'           => 'datarc_footer_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#777',
    )
);
// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'datarc_footer_anchorhovcolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Footer Anchor Hover Color', 'datarc' ),
        'section'           => 'datarc_footer_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#00ff8c',
    )
);
// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'datarc_footer_bordercolor_settings',
    array(
        'type'              => 'epsilon-color-picker',
        'label'             => esc_html__( 'Footer Border Color', 'datarc' ),
        'section'           => 'datarc_footer_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#eee',
    )
);

?>