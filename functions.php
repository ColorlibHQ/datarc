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
	if( !defined( 'DATARC_DIR_PATH_LIBS' ) )
		define( 'DATARC_DIR_PATH_LIBS', DATARC_DIR_PATH_INC.'libraries/' );
	
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
	require_once( DATARC_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	require_once( DATARC_DIR_PATH_HOOKS . 'hooks.php' );
	require_once( DATARC_DIR_PATH_HOOKS . 'hooks-functions.php' );	
	require_once( DATARC_DIR_PATH_CLASSES . 'Class-Config.php' );
	require_once( DATARC_DIR_PATH_INC . 'customizer/customizer.php' );
	require_once( DATARC_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	require_once( DATARC_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


	/**
	 * Instantiate Datarc object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features.
	 *
	 */
	$Datarc = new Datarc();
	
?>