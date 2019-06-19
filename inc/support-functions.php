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


// Post Category
function datarc_post_cats(){
	
	$cats = get_the_category();
	$categories = '';
    if( $cats ){

        $categories .= '<div class="posts--cat m--30-0-0">';
        $categories .= '<ul class="nav"><li><span><i class="fa fm fa-th-list"></i>'.esc_html( 'Catagory :', 'datarc' ).'</span></li>';
        
        foreach( $cats as $cat ){
           $categories .= '<li><a href="'.esc_url( get_category_link( absint( $cat->term_id ) ) ).'" class="category-link">'.esc_html( $cat->name ).'</a></li>';
        }
        
        $categories .= '</ul>';
        $categories .= '</div>';
    }
	
	return $categories;
	
}

// Post Tags
function datarc_post_tags(){
	
	$tags = get_the_tags();
	
	$getTags = '';
	
	if( $tags ){

		foreach( $tags as $tag ){
			$getTags .= '<a href="'.esc_url( get_tag_link( absint( $tag->term_id ) ) ).'" class="tag-item">'.esc_html( $tag->name ).'</a>';
		}
	
	}
	
	return $getTags;
	
	
}

// datarc comment template callback
function datarc_comment_callback( $comment, $args, $depth ) {
    
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $has_children = empty( $args['has_children'] ) ? '' : 'parent';

    ?>
    <<?php echo esc_attr( $tag ); ?> <?php comment_class( esc_attr( $has_children ) ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment--item">
    <?php endif; ?>
        <div class="comment--meta-info">
    		<div class="comment--meta-img comment__avatar">
    			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    		</div>
            <div class="comment__info">
                <cite><?php printf( __( '<span class="comment-author-name">%s</span> ', 'datarc' ), esc_url( get_comment_author_link() ) ); ?></cite>
                <div class="comment__meta">
                    <time class="comment__time"> <?php printf( __('%1$s at %2$s', 'datarc'), esc_html( get_comment_date() ),  esc_html( get_comment_time() ) ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'datarc' ), '  ', '' ); ?></time> 
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                     <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'datarc' ); ?></em>
                      <br />
                    <?php endif; ?>
                    
                    <?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
                </div>
            </div>
        </div>
		<div class="comment__content">

			<div class="comment__text">
				<?php comment_text(); ?>
				
			</div> 
		</div>
			
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php  
}
// add class comment reply link
add_filter('comment_reply_link', 'datarc_replace_reply_link_class');
function datarc_replace_reply_link_class( $class ){
    $class = str_replace("class='comment-reply-link", "class='reply", $class);
    return $class;
}


?>