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

	// Final Class
	final class Datarc {

		// Theme Version
		private $datarc_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){

			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			//
			$this->init();

			// customizer init Instantiate
			if( class_exists('Epsilon_Framework') ){
				$this->customizer_init();
			}
			
			// Instantiate Dashboard
			$Epsilon_init_Dashboard = Epsilon_init_Dashboard::get_instance();

			//
			add_action( 'after_switch_theme', array( $this, 'set_elementor_flag' ) );
			add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_elementor_theme_default_style' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_elementor_notice_script' ) );
			add_action( 'wp_ajax_elementor_desiable_default_style' , array( $this, 'elementor_desiable_default_style' ) );


		}

		// Theme setup
		private function init(){
			
			// Create enqueue class instance
			$enqueu = new datarc_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->datarc_scripts_enqueue_init();


		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'datarc_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'datarc', DATARC_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
	        add_theme_support( 'custom-logo' );
	        
	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails');
			
			// Custom data center thumbnails size
			add_image_size( 'datarc_widget_post_thumb', 370, 277, true );

	        // support custom background 
	        add_theme_support( 'custom-background', array(
			'default-color' => '#fff',
			) );
	        
	        // support custom header
	        add_theme_support( 'custom-header' );
	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'datarc' ),
	            'onepage-menu'   => esc_html__( 'One Page Menu ( For custom page )', 'datarc' ),
	            'social-menu'    => esc_html__( 'Social Menu', 'datarc' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = DATARC_DIR_CSS_URI;
			$jsPath  = DATARC_DIR_JS_URI;
			
			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '4.0.0',
					),
					array(
						'handler'		=> 'font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '4.7.0',
					),
					array(
						'handler'		=> 'linearicons',
						'file' 			=> $cssPath.'linearicons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '3.5.2',
					),
					array(
						'handler'		=> 'util',
						'file' 			=> $cssPath.'util.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'datar-section',
						'file' 			=> $cssPath.'datar-section.css',
						'dependency' 	=> array(),
						'version' 		=> $this->datarc_version,
					),
					array(
						'handler'		=> 'datarc',
						'file' 			=> $cssPath.'main.css',
						'dependency' 	=> array(),
						'version' 		=> $this->datarc_version,
					),
					array(
						'handler'		=> 'datarc-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				'scripts' => array(

					array(
						'handler'		=> 'popper',
						'file' 			=> $jsPath.'popper.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'mixitup',
						'file' 			=> $jsPath.'mixitup.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '3.2.1',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery-sticky',
						'file' 			=> $jsPath.'jquery.sticky.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'datarc-main',
						'file' 			=> $jsPath.'main.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> $this->datarc_version,
						'in_footer' 	=> true
					),
				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){

			$fontUrl = '';
			
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'datarc' ) ) {
				
				$font_families = array(
					'Poppins:300,500,600'
				);

				$familyArgs = array(
					'family' => htmlentities( implode( '|', $font_families ) ),
					'subset' => urlencode( 'latin, latin-text' ),
				);

				$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
			}
			
			return esc_url_raw( $fontUrl );

		} //End google_font method

		/**
		 * Epsilon flag
		 *
		 *
		 */

		// epsilon customizer init
		private function customizer_init(){

			// epsilon customizer quickie settings
		
			add_filter( 'epsilon_quickie_bar_shortcuts', array( $this, 'epsilon_quickie' ) );
			
			// Instantiate Epsilon Framework object
			$Epsilon_Framework = new Epsilon_Framework();

			
			// Instantiate datarc theme customizer
			$datarc_theme_customizer = new datarc_theme_customizer();
		}
		// epsilon customizer quickie
		public function epsilon_quickie(){

				return	array(

				'links' => array(
					array(
						'link_to'   => 'datarc_options_panel',
						'icon'      => 'dashicons dashicons-admin-tools',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'nav_menus',
						'icon'      => 'dashicons dashicons-menu',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'widgets',
						'icon'      => 'dashicons dashicons-archive',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'custom_css',
						'icon'      => 'dashicons dashicons-editor-code',
						'link_type' => 'section',
					),

				),
				'logo'  => array(
					'url' => EPSILON_URI . '/assets/img/epsilon-logo.png',
					'alt' => 'Epsilon Builder Logo',
				),
			);

		}


		/**
		 * Elementor compatibility
		 *
		 *
		 **/

		// Check elementor preview page
		public static function check_elementor_preview_page(){

			if( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ){
				return true;
			}

			return false;

		}
		// Set flag for elementor ( hooked in after switch theme )
		public function set_elementor_flag(){
			update_option( 'datarc_had_elementor', 'no' );
		}
		// Elementor dsiable default style
		public function elementor_desiable_default_style(){

			$nonce = $_POST['nonce'];
			if ( ! wp_verify_nonce( $nonce, 'datarc-elementor-notice-nonce' ) ) {
				return;
			}
			$reply = $_POST['reply'];
			if ( ! empty( $reply ) ) {
				if ( $reply == 'yes' ) {
					update_option( 'elementor_disable_color_schemes', 'yes' );
					update_option( 'elementor_disable_typography_schemes', 'yes' );
				}
				update_option( 'datarc_had_elementor', 'yes' );
			}
			die();

		}
		// Enqueue theme default style for elementor
		public function enqueue_elementor_theme_default_style(){

			$disabled_color_schemes      = get_option( 'elementor_disable_color_schemes' );
			$disabled_typography_schemes = get_option( 'elementor_disable_typography_schemes' );

			if ( $disabled_color_schemes === 'yes' && $disabled_typography_schemes === 'yes' ) {
				wp_enqueue_style( 'datarc-elementor-default-style',  DATARC_DIR_CSS_URI. 'elementor-default-element-style.css', array(), $this->datarc_version );
			}
		}
		// Enqueue elementor notice scripts
		public function enqueue_elementor_notice_script(){

			$had_elementor = get_option( 'datarc_had_elementor' );

			if( $had_elementor == 'no' && self::check_elementor_preview_page() ){
				wp_enqueue_script( 'datarc-elementor-notice', DATARC_DIR_JS_URI.'datarc-elementor-notice.js', array('jquery'), '1.0', true );
				wp_localize_script(
					'datarc-elementor-notice',
					'datarcElementorNotice',
					array(
						'ajaxurl' => admin_url( 'admin-ajax.php' ),
						'nonce'   => wp_create_nonce( 'datarc-elementor-notice-nonce' ),
					)
				);
			}

		}


	} // End Class

	
?>