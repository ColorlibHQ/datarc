<?php 
	// Copy right text
	$copyText = sprintf( __( 'Copyright &copy; %s  |  All rights reserved to', 'datarc' ), date('Y') );
	

	$setCopyright = datarc_opt('datarc-copyright-text-settings');
	
	if( $setCopyright ){
		$copyRightText = $setCopyright;
	}else{
	   $copyRightText = sprintf( ' %s <a href="%s" target="_blank">Colorlib</a>', $copyText, 'https://colorlib.com' );
    }
	

?>
<div class="footer-bottom d-flex justify-content-between align-items-center">
    <p class="footer-text m-0"><?php echo wp_kses_post( $copyRightText ); ?></p>
    <?php 
    // Social Media
    if( datarc_opt('datarc-footersocial-toggle-settings') ){
        if( has_nav_menu('social-menu') ){  
            $args = array(
                'theme_location' => 'social-menu',
                'container'      => '',
                'menu_class'     => 'footer-social d-flex align-items-center',
                'depth'          => 1,
                'fallback_cb'    => 'fashe_social_navwalker::fallback',
                'walker'         => new datarc_social_navwalker(),
            );  
            wp_nav_menu( $args );
        }
    }
    ?>
</div>