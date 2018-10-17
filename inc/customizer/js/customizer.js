(function( $ , api){

    // Customizer about page redirect
    api.section( 'datarc_fof_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( api.settings.url.home+'/maybe404page' );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            
        } )

    } );

    // Customizer blog page redirect
    api.section( 'datarc_blog_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( customizerdata.blog_page );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            


        } )

    } );


    // Footer section
    api.section( 'datarc_footer_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){


            // Footer Widget option show/hide
            var $widget_toggle  = $('#datarc-widget-toggle-settings'),
                $widgettitle    = $('#customize-control-datarc_footer_widgettitlecolor_settings');

            // Default

            if( $widget_toggle.is( ':checked' ) ){

                $widgettitle.show('slow');

            }else{

                $widgettitle.hide('slow');

            }

            // on click
            $widget_toggle.on( 'click',  function(){

                var $this =  $( this );

                if( $this.is(':checked') ){

                    $widgettitle.show('slow');

                }else{

                    $widgettitle.hide('slow');

                }


            } ); 



        } );

    } );



})( jQuery, wp.customize );