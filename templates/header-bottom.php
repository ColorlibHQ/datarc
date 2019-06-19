<section class="bg-title-page p-t-100 p-b-50 flex-col-c-m">
	<?php 
	if ( is_archive() ){
		the_archive_title('<h2 class="l-text2 fz-30 t-center">', '</h2>');
	}elseif ( is_home() ){
		echo '<h2 class="l-text2 fz-30 t-center">'.esc_html__( 'Blog', 'datarc' ).'</h2>';
	}elseif(is_search()){
		echo '<h2 class="l-text2 fz-30 t-center">'.esc_html__( 'Search Result', 'datarc' ).'</h2>';
	} else{
		the_title( '<h2 class="l-text2 fz-30 t-center">', '</h2>' );
	}
	?>
</section>