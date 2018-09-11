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
	
	function themeslug_customize_register( $wp_customize ) {
	
		// Add Theme option panel
		$wp_customize->add_panel( 'datarc_options_panel',
		  array(
			  'priority'       => 24,
			  'capability'     => 'edit_theme_options',
			  'theme_supports' => '',
			  'title'          => esc_html__( 'Theme options', 'datarc' )
		  )
		);
	   
	   
		/**************************
			General Section
		***************************/
		
		$wp_customize->add_section( 'datarc_general_options_section', 
			array(
				'title'       => esc_html__( 'General', 'datarc' ), 
				'priority'    => 35,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'datarc_options_panel',
				'description' => esc_html__('Allows you to customize settings for Datarc theme.', 'datarc'), 
			) 
		);
        
		//  =====================================================
		//  = Theme Color Picker  =
		//  =====================================================
		$wp_customize->add_setting('datarc_themecolor', array(
			'default'           => '#00ff8c',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'datarc_themecolor_ctrl', 
			array(
			'label'    => __('Theme Color', 'datarc'),
			'section'  => 'datarc_general_options_section',
			'settings' => 'datarc_themecolor',
		)));

		//  =====================================================
		//  = Instagram Access Token Field  =
		//  =====================================================

	   	// Instagram Access Token settings
		$wp_customize->add_setting('datarc_igaccess_token', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'datarc_sanitize_nohtml'
	 
		));
		// Instagram Access Token control
		$wp_customize->add_control('datarc_igaccess_token', array(
			'label'      => __('Instagram Access Token', 'datarc'),
			'section'    => 'datarc_general_options_section',
			'settings'   => 'datarc_igaccess_token',
			'description' => esc_html__( 'Set instagram access token.', 'datarc' ),
		));	
		/**************************
			Header Section
		***************************/
		
		$wp_customize->add_section( 'datarc_headertop_options_section', 
			array(
				'title'       => esc_html__( 'Header Nav Bar', 'datarc' ), 
				'priority'    => 35,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'datarc_options_panel',
				'description' => esc_html__('Allows you to customize settings for Datarc theme.', 'datarc'), 
			) 
		);
        
		//  =======================================
		//  = Social Media Show/Hide Toggle =
		//  =======================================
		
		// Social Media option add settings
		$wp_customize->add_setting( 'datarc-headersocial-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'datarc_sanitize_checkbox'
			) 
		); 
		// Social option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'datarc_enable_headersocial',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Header Social Show/Hide', 'datarc' ),
					'settings'   => 'datarc-headersocial-toggle-settings',
					'description' => esc_html__( 'Toggle the header top social active.', 'datarc' ),
					'section'     => 'datarc_headertop_options_section',
				)
			)
		);
        
		
		//  ======+++++=================================
		//  = Header top search form show / Hide opt =
		//  =================+++++======================
		
		$wp_customize->add_setting( 'datarc-searchopt-toggle-settings',
			array(
				'default'    => false, 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'datarc_sanitize_checkbox'
			) 
		); 
		
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'datarc_enable_searchopt',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Header Search Option Show/Hide', 'datarc' ),
					'settings'   => 'datarc-searchopt-toggle-settings',
					'section'     => 'datarc_headertop_options_section',
				)
			)
		);
		
		//  =====================================================
		//  = Header Nav Bar Background Color Picker              =
		//  =====================================================
		$wp_customize->add_setting('datarc_header_navbar_bgColor', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_navbar_bgColor', 
			array(
			'label'    => __('Header Nav Bar Background Color', 'datarc'),
			'section'  => 'datarc_headertop_options_section',
			'settings' => 'datarc_header_navbar_bgColor',
		)));
		
		//  ============================================================
		//  = Header Sticky  Nav Bar Background Color Picker    =
		//  ============================================================
		$wp_customize->add_setting('datarc_header_navbarsticky_bgColor', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_navbarsticky_bgColor', 
			array(
			'label'    => __('Header Sticky Nav Bar Background Color', 'datarc'),
			'section'  => 'datarc_headertop_options_section',
			'settings' => 'datarc_header_navbarsticky_bgColor',
		)));
		
		//  ==============================================
		//  	= Header Nav Bar Menu Color Picker   =
		//  ==============================================
		$wp_customize->add_setting('datarc_header_navbar_menuColor', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_navbar_menuColor', 
			array(
			'label'    => __('Header Nav Bar Menu Color', 'datarc'),
			'section'  => 'datarc_headertop_options_section',
			'settings' => 'datarc_header_navbar_menuColor',
		)));

		//  ===================================================
		//  	= Header Nav Bar Menu Hover Color Picker   =
		//  ===================================================
		$wp_customize->add_setting('datarc_header_navbar_menuHovColor', array(
			'default'           => '#4a7aec',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_navbar_menuHoverColor', 
			array(
			'label'    => __('Header Nav Bar Menu Hover Color', 'datarc'),
			'section'  => 'datarc_headertop_options_section',
			'settings' => 'datarc_header_navbar_menuHovColor',
		)));
		
		//  ==============================================
		//  	= Header Nav Bar Menu Color Picker   =
		//  ==============================================
		$wp_customize->add_setting('datarc_header_sticky_navbar_menuColor', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_sticky_navbar_menuColor', 
			array(
			'label'    => __('Sticky Header Nav Bar Menu Color', 'datarc'),
			'section'  => 'datarc_headertop_options_section',
			'settings' => 'datarc_header_sticky_navbar_menuColor',
		)));

		//  ===================================================
		//  	= Header Nav Bar Menu Hover Color Picker   =
		//  ===================================================
		$wp_customize->add_setting('datarc_header_sticky_navbar_menuHovColor', array(
			'default'           => '#4a7aec',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_sticky_navbar_menuHoverColor', 
			array(
			'label'    => __(' Sticky Header Nav Bar Menu Hover Color', 'datarc'),
			'section'  => 'datarc_headertop_options_section',
			'settings' => 'datarc_header_sticky_navbar_menuHovColor',
		)));

		//  =============================================
		//  = Page Header Background Color Picker   =
		//  =============================================
		
		$wp_customize->add_setting('datarc_headerbgcolor', array(
			'default'           => '#999',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize, 
			'datarc_headerbgcolor_ctrl', 
			array(
			'label'    => __('Header Background Color', 'datarc'),
			'section'  => 'colors',
			'settings' => 'datarc_headerbgcolor',
		)));
		/**************************
			Blog Section
		***************************/

		$wp_customize->add_section( 'datarc_blog_options_section', 
			array(
				'title'       => esc_html__( 'Blog', 'datarc' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'datarc_options_panel',
				'description' => esc_html__('Allows you to settings for blog post excerpt and sidebar position.', 'datarc'), 
			) 
		);
        // Post excerpt	settings
		$wp_customize->add_setting('datarc_post_excerpt', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'datarc_sanitize_number_absint'
	 
		));
		// Post excerpt	control
		$wp_customize->add_control('datarc_post_excerpt_ctrl', array(
			'label'      => __('Set Post Excerpt', 'datarc'),
			'section'    => 'datarc_blog_options_section',
			'settings'   => 'datarc_post_excerpt',
		));	
			
		// blog sidebar settings
		$wp_customize->add_setting( 'datarc-blog-sidebar-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
			) 
		); 
		// Blog sidebar control
		$wp_customize->add_control(
			new Epsilon_Control_Layouts(
				$wp_customize,
				'datarc_blog_sidebar_position',
				array(
					'type'        => 'epsilon-layouts',
					'label'       => esc_html__( 'Blog Sidebar Layout', 'datarc' ),
					'settings'    => 'datarc-blog-sidebar-settings',
					'section'     => 'datarc_blog_options_section',
					'layouts'  => array(
						1 => DATARC_DIR_URI . 'inc/datarc-framework/epsilon-framework/assets/img/one-column.png',
						2 => DATARC_DIR_URI . 'inc/datarc-framework/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
						3 => DATARC_DIR_URI . 'inc/datarc-framework/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
					),
					'default'  => array(
						'columnsCount' => 2,
					),
					'min_span' => 4,
					'fixed'    => true,
				)
			)
		);
		
						
		/**************************
			404 Page
		***************************/

		$wp_customize->add_section( 'datarc_fof_options_section', 
			array(
				'title'       => esc_html__( '404 Page Settings', 'datarc' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'datarc_options_panel',
				'description' => esc_html__('Allows you to customize settings for Datarc theme.', 'datarc'), 
			) 
		);
         		
		// 404 text one option add settings
		$wp_customize->add_setting('datarc_fof_text_one', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'transport'  	 => 'refresh',
			'sanitize_callback' => 'datarc_sanitize_nohtml'
	 
		));
		
		// 404 text one control
		$wp_customize->add_control('datarc_fof_text_one_ctrl', array(
			'label'      => esc_html__( '404 Text #1', 'datarc' ),
			'section'    => 'datarc_fof_options_section',
			'settings'   => 'datarc_fof_text_one',
		));	
         		
		// 404 text one option add settings
		$wp_customize->add_setting('datarc_fof_text_two', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'transport'  	 => 'refresh',
			'sanitize_callback' => 'datarc_sanitize_nohtml'
	 
		));
		
		// 404 text one control
		$wp_customize->add_control('datarc_fof_text_two_ctrl', array(
			'label'      => esc_html__( '404 Text #2', 'datarc' ),
			'section'    => 'datarc_fof_options_section',
			'settings'   => 'datarc_fof_text_two',
		));	
		// 404 page text 1 color setting
		$wp_customize->add_setting('datarc_fof_textonecolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// 404 page text 1 color control
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'datarc_fof_textonecolor_ctrl', 
			array(
			'label'    => __('404 Page Text #1 Color', 'datarc'),
			'section'  => 'datarc_fof_options_section',
			'settings' => 'datarc_fof_textonecolor_settings',
		)));
		// 404 page text 2 color setting
		$wp_customize->add_setting('datarc_fof_texttwocolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// 404 page text 2 color control
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'datarc_fof_texttwocolor_ctrl', 
			array(
			'label'    => __('404 Page Text #2 Color', 'datarc'),
			'section'  => 'datarc_fof_options_section',
			'settings' => 'datarc_fof_texttwocolor_settings',
		)));
		// 404 page background color setting
		$wp_customize->add_setting('datarc_fof_bgcolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// 404 page background color control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize, 
			'datarc_fof_bgcolor_ctrl', 
			array(
			'label'    => __('404 Page Background Color', 'datarc'),
			'section'  => 'datarc_fof_options_section',
			'settings' => 'datarc_fof_bgcolor_settings',
		)));
		/**************************
			Footer Section
		***************************/


		$wp_customize->add_section( 'datarc_footer_options_section', 
			array(
				'title'       => esc_html__( 'Footer', 'datarc' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'datarc_options_panel',
				'description' => esc_html__('Allows you to customize settings for Datarc theme.', 'datarc'), 
			) 
		);
         		
		// Footer Widget Show/Hide option add settings
		$wp_customize->add_setting( 'datarc-widget-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'datarc_sanitize_checkbox'
			) 
		); 
		// Widget show/hide option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'datarc_widget_enable_preloader',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Footer Widget On/Off', 'datarc' ),
					'settings'   => 'datarc-widget-toggle-settings',
					'description' => esc_html__( 'Toggle the Footer Widget Show or Hide.', 'datarc' ),
					'section'     => 'datarc_footer_options_section',
				)
			)
		);

		//  =======================================
		//  = Social Media Show/Hide Toggle =
		//  =======================================
		
		// Social Media option add settings
		$wp_customize->add_setting( 'datarc-footersocial-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'datarc_sanitize_checkbox'
			) 
		); 
		// Social option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'datarc_enable_footersocial',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Footer Social Show/Hide', 'datarc' ),
					'settings'   => 'datarc-footersocial-toggle-settings',
					'description' => esc_html__( 'Toggle the footer social icon active.', 'datarc' ),
					'section'     => 'datarc_footer_options_section',
				)
			)
		);	
		
		// Footer copy right text add settings
		$wp_customize->add_setting( 'datarc-copyright-text-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'datarc_sanitize_html' 
			) 
		); 
		// Footer copy right text add control
		$wp_customize->add_control(
			new Epsilon_Control_Text_Editor(
				$wp_customize,
				'datarc_copyright_text',
				array(
					'type'        => 'epsilon-text-editor',
					'label'       => esc_html__( 'Footer Copy Right Text', 'datarc' ),
					'settings'   => 'datarc-copyright-text-settings',
					'section'     => 'datarc_footer_options_section',
				)
			)
		);
		
		$wp_customize->selective_refresh->add_partial( 'datarc-copyright-text-settings', 
		array( 'selector' => '.footer-copy-right-text' ) );
		
		// Footer Background Color 
		$wp_customize->add_setting('datarc_footer_bgColor_settings', array(
			'default'           => '#222',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// Footer Background Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_bgColor', 
			array(
			'label'    => __('Footer Background Color', 'datarc'),
			'section'  => 'datarc_footer_options_section',
			'settings' => 'datarc_footer_bgColor_settings',
		)));
		
		// Footer text Color 
		$wp_customize->add_setting('datarc_footer_color_settings', array(
			'default'           => '#777',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// Footer text Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_textColor', 
			array(
			'label'    => __('Footer Text Color', 'datarc'),
			'section'  => 'datarc_footer_options_section',
			'settings' => 'datarc_footer_color_settings',
		)));
		
		// Footer widget title color setting
		$wp_customize->add_setting('datarc_footer_widgettitlecolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// Footer widget title color control
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_widgettitlecolor', 
			array(
			'label'    => __('Footer Widget Title Color', 'datarc'),
			'section'  => 'datarc_footer_options_section',
			'settings' => 'datarc_footer_widgettitlecolor_settings',
		)));
		
		// Footer anchor Color 
		$wp_customize->add_setting('datarc_footer_anchorcolor_settings', array(
			'default'           => '#777',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// Footer anchor Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_anchorcolor', 
			array(
			'label'    => __('Footer Anchor Color', 'datarc'),
			'section'  => 'datarc_footer_options_section',
			'settings' => 'datarc_footer_anchorcolor_settings',
		)));
		
		// Footer anchor hover Color 
		$wp_customize->add_setting('datarc_footer_anchorhovcolor_settings', array(
			'default'           => '#00ff8c',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// Footer anchor hover Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_anchorhovcolor', 
			array(
			'label'    => __('Footer Anchor Hover Color', 'datarc'),
			'section'  => 'datarc_footer_options_section',
			'settings' => 'datarc_footer_anchorhovcolor_settings',
		)));
		
		// Footer border Color 
		$wp_customize->add_setting('datarc_footer_bordercolor_settings', array(
			'default'           => '#eee',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'datarc_sanitize_hex_color'
	 
		));
		// Footer border Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_bordercolor', 
			array(
			'label'    => __('Footer Border Color', 'datarc'),
			'section'  => 'datarc_footer_options_section',
			'settings' => 'datarc_footer_bordercolor_settings',
		)));
		
		
		
	}
	add_action( 'customize_register', 'themeslug_customize_register' );
	
	
?>