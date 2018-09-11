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

 // theme option callback
function datarc_opt( $id = null ){
	
	$opt = get_theme_mod( $id );
	
	$data = '';
	
	if( $opt ){
		$data = $opt;
	}
	
	return $data;
}

// custom meta id callback
function datarc_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_datarc_'.$id, true );
    
    return $value;
}
// Blog Date Permalink
function datarc_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}
// Blog Excerpt Length
if ( ! function_exists( 'datarc_excerpt_length' ) ) {
	function datarc_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
		
		
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}
// Comment number and Link
if ( ! function_exists( 'datarc_posted_comments' ) ) :
    function datarc_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','datarc');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','datarc');
            } else {
                $comments = esc_html__( '1 Comment','datarc' );
            }
            $comments = '<a href="' . esc_url( get_comments_link() ) . '">'. $comments .'</a>';
        } else {
            $comments = esc_html__( 'Comments are closed', 'datarc' );
        }
        
        return $comments;
    }
endif;

//audio format iframe match 
function datarc_iframe_match(){   
    $audio_content = datarc_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}

//Post embedded media
function datarc_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
   
}
// WP post link pages
function datarc_link_pages(){
    
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'datarc' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'datarc' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// theme logo
function datarc_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt="'.esc_attr( datarc_image_alt( $imageUrl[0] ) ).'"></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
	}
	
	return '<div class="logo">'.wp_kses_post( $siteLogo ).'</div>';
	
}

// Blog pull right class callback
function datarc_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-1';
    }else{
        return;
    }
    
}

// image alt tag
function datarc_image_alt( $url = '' ){

    if( $url != '' ){
        // attachment id by url 
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag 
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
    
            $alt = str_replace( '-', ' ', $filename['filename'] );
            
            return $alt;
        }
   
    }else{
       return; 
    }

}

//  wysiwyg content output use in datarc companion
function datarc_get_textareahtml_output( $content ) {
    
	global $wp_embed;

	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}

// 

// Slider list ( Shortcode ) select Options
function datarc_get_slider_shortcode_options( $field ) {
    $args = $field->args( 'get_post_type' );
	
	
    $args = is_array( $args ) ? $args : array();

    $args = wp_parse_args( $args, array( 'post_type' => 'post' ) );

    $postType = $args['post_type'];

	//

	$args = array(
		'post_type'        => $postType,
		'post_status'      => 'publish',
	);

	$posts_array = get_posts( $args );	

	// Initate an empty array
	$term_options = array();
		
		foreach( $posts_array as $post ){
			
			$term_options[ $post->post_name ] = $post->post_title;
			
		}
	
    return $term_options;

}

// html Style tag for background image use in datarc companion plugin
function datarc_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


?>