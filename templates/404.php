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
							//
							echo '<h1 class="h1 m-b-30">'.esc_html( datarc_opt( 'datarc_fof_text_one' ), __( 'Ooops 404 Error !', 'datarc' ) ).'</h1>';

							//
							$anchor = datarc_anchor_tag(
								array(
									'url' 	 => esc_url( site_url( '/' ) ),
									'text' 	 => esc_html__( 'Back To Home page', 'datarc' ),
								)
							);

							$text = __( 'Either something went wrong or the page dosen&rsquo;t exist anymore.', 'datarc' );

							echo datarc_paragraph_tag(
								array(
									'text' 	 => sprintf( '%s %s', esc_html( datarc_opt( 'datarc_fof_text_two', $text ) ), wp_kses_post( $anchor ) ),
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