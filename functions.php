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

	/**
	 *
	 * Define constant
	 *
	 */
	 
	// Base URI
	if( !defined( 'DATARC_DIR_URI' ) )
		define( 'DATARC_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'DATARC_DIR_ASSETS_URI' ) )
		define( 'DATARC_DIR_ASSETS_URI', DATARC_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'DATARC_DIR_CSS_URI' ) )
		define( 'DATARC_DIR_CSS_URI', DATARC_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'DATARC_DIR_JS_URI' ) )
		define( 'DATARC_DIR_JS_URI', DATARC_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('DATARC_DIR_ICON_IMG_URI') )
		define( 'DATARC_DIR_ICON_IMG_URI', DATARC_DIR_ASSETS_URI.'img/icons/' );
	
	// Base Directory
	if( !defined( 'DATARC_DIR_PATH' ) )
		define( 'DATARC_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'DATARC_DIR_PATH_INC' ) )
		define( 'DATARC_DIR_PATH_INC', DATARC_DIR_PATH.'inc/' );
	
	//Datarc framework Folder Directory
	if( !defined( 'DATARC_DIR_PATH_FRAM' ) )
		define( 'DATARC_DIR_PATH_FRAM', DATARC_DIR_PATH_INC.'datarc-framework/' );
	
	//Classes Folder Directory
	if( !defined( 'DATARC_DIR_PATH_CLASSES' ) )
		define( 'DATARC_DIR_PATH_CLASSES', DATARC_DIR_PATH_INC.'classes/' );
	
	//Hooks Folder Directory
	if( !defined( 'DATARC_DIR_PATH_HOOKS' ) )
		define( 'DATARC_DIR_PATH_HOOKS', DATARC_DIR_PATH_INC.'hooks/' );
	
	//Widgets Folder Directory
	if( !defined( 'DATARC_DIR_PATH_WIDGET' ) )
		define( 'DATARC_DIR_PATH_WIDGET', DATARC_DIR_PATH_INC.'widgets/' );
	

	/**
	 * Include File
	 *
	 */
	
	require_once( DATARC_DIR_PATH_INC . 'datarc-breadcrumbs.php' );
	require_once( DATARC_DIR_PATH_INC . 'datarc-widgets-reg.php' );
	require_once( DATARC_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	require_once( DATARC_DIR_PATH_INC . 'datarc-functions.php' );
	require_once( DATARC_DIR_PATH_INC . 'datarc-commoncss.php' );
	require_once( DATARC_DIR_PATH_INC . 'support-functions.php' );
	require_once( DATARC_DIR_PATH_INC . 'wp-html-helper.php' );
	require_once( DATARC_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	require_once( DATARC_DIR_PATH_FRAM . 'customizer/sanitization-callbacks.php' );
	require_once( DATARC_DIR_PATH_FRAM . 'customizer/customizer.php' );
	require_once( DATARC_DIR_PATH_FRAM . 'epsilon-framework/class-epsilon-framework.php' );
	require DATARC_DIR_PATH_INC . 'welcome-screen/class-datarc.php';
	

	//
	require_once( DATARC_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	require_once( DATARC_DIR_PATH_CLASSES . 'Class-Config.php' );
	require_once( DATARC_DIR_PATH_HOOKS . 'hooks.php' );
	require_once( DATARC_DIR_PATH_HOOKS . 'hooks-functions.php' );
	
	
	// Datarc global variable define
	global $datarc;
	$datarc['datarcobj'] = new Datarc();
	
	
	// Datarc theme support
	add_action( 'after_setup_theme', 'datarc_themesupport' );
	function datarc_themesupport(){
		global $datarc;
		$datarcobj = $datarc['datarcobj'];
		$datarcobj->support();
	}
	
	// Datarc theme init
	add_action( 'init', 'datarc_init' );
	function datarc_init(){
		global $datarc;
		$datarcobj = $datarc['datarcobj'];
		$datarcobj->init();
	}


	
?>