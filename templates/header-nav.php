<header class="default-header">
    <div class="sticky-header">
        <div class="container">
            <div class="header-content d-flex justify-content-between align-items-center">
		        <?php 
				// Header Logo
				echo datarc_theme_logo('smooth');
				?>

                <div class="right-bar d-flex align-items-center">
                    <nav class="d-flex align-items-center">
                    	<?php 
                        if( is_page_template( 'template-builder.php' ) ){

                            if( has_nav_menu( 'onepage-menu' ) ){
                                $args = array(
                                    'theme_location' => 'onepage-menu',
                                    'container' => '',
                                    'depth'          => 2,
                                    'menu_class'     => 'main-menu',
                                    'fallback_cb'    => 'datarc_bootstrap_navwalker::fallback',
                                    'walker'         => new datarc_bootstrap_navwalker(),
                                );  
                                wp_nav_menu( $args );
                            }

                        }else{
                            if( has_nav_menu( 'primary-menu' ) ){
                                $args = array(
                                    'theme_location' => 'primary-menu',
                                    'container' => '',
                                    'depth'          => 2,
                                    'menu_class'     => 'main-menu',
                                    'fallback_cb'    => 'datarc_bootstrap_navwalker::fallback',
                                    'walker'         => new datarc_bootstrap_navwalker(),
                                );  
                                wp_nav_menu( $args );
                            }
                        }


						?>
                        <a href="#" class="mobile-btn"><span class="lnr lnr-menu"></span></a>
                    </nav>
                    <?php 
                    if( datarc_opt('datarc-searchopt-toggle-settings') ):

                        $border = !empty( datarc_opt('datarc-headersocial-toggle-settings') ) ? ' nav-search-border' : '';

                    ?>
                    <div class="nav-search relative<?php echo esc_attr( $border ); ?>">
                        <span class="lnr lnr-magnifier"></span>
                        <form action="<?php echo esc_url( site_url('/') ); ?>" class="search-field">
                            <input type="text" name="s" placeholder="<?php esc_attr_e( 'Search here', 'datarc' ) ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php esc_attr_e( 'Search here', 'datarc' ) ?>'">
                            <button class="search-submit"><span class="lnr lnr-magnifier"></span></button>
                        </form>
                    </div>
                    <?php 
                    endif; // 
                    // Social Media
                    if( datarc_opt('datarc-headersocial-toggle-settings') ){
                        if( has_nav_menu('social-menu') ){  
                            $args = array(
                                'theme_location' => 'social-menu',
                                'container'      => '',
                                'menu_class'     => 'header-social d-flex align-items-center',
                                'depth'          => 1,
                                'fallback_cb'    => 'datarc_social_navwalker::fallback',
                                'walker'         => new datarc_social_navwalker(),
                            );  
                            wp_nav_menu( $args );
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</header>