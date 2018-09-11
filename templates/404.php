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


?>

	<div id="f0f" class="pd--100-0">
		<div class="container">
			<div class="row">
				<div class="f0f--content text-center col-md-12">
					<div class="inner-fof">
						<div class="inner-child-fof">
							<?php 
							$errorText = esc_html__( 'Ooops 404 Error !', 'datarc' );
							if( datarc_opt( 'datarc_fof_text_one' ) ){
								$errorText = datarc_opt( 'datarc_fof_text_one' );
							}
							//
							echo '<h1 class="h1 m-b-30">'.esc_html( $errorText ).'</h1>';
							//

							// Wrong text block

							$wrongText = wp_kses_post( __( 'Either something went wrong or the page dosen&rsquo;t exist anymore.', 'datarc' ) );

							if( datarc_opt('datarc_fof_text_two') ){
								$wrongText = datarc_opt('datarc_fof_text_two');
							}

							$anchor = datarc_anchor_tag(
								array(
									'url' 	 => esc_url( site_url( '/' ) ),
									'text' 	 => esc_html__( 'Back To Home page', 'datarc' ),
								)
							);

							echo datarc_paragraph_tag(
								array(
									'text' 	 => esc_html( $wrongText ).' '.wp_kses_post( $anchor ),
								)
							);

							// Search Form
							get_search_form();
							?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>