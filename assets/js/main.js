
(function ($) {
    "use strict";
    


    $( function(){


        var window_width     = $(window).width(),
        window_height        = window.innerHeight,
        header_height        = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen            = window_height - header_height;


        $(window).on('load', function() {
            // Animate loader off screen
            $(".preloader").fadeOut("slow");;
        });
        
        $(".fullscreen").css("height", window_height)
        $(".fitscreen").css("height", fitscreen);

        //-------- Active Sticky Js ----------//
         $(".sticky-header").sticky({topSpacing:0});
         
         // -------   Active Mobile Menu-----//

         $(".mobile-btn").on('click', function(e){
            e.preventDefault();
            $(".main-menu").slideToggle();
            $("span", this).toggleClass("lnr-menu lnr-cross");
            $(".main-menu").addClass('mobile-menu');
        });

        var $filterContent = $( '#filter-content' );

        if( $filterContent.length ){

        var mixer = mixitup('#filter-content');
        
          $(".controls .filter").on('click', function(event){
              $(".controls .filter").removeClass('active');
              $(this).addClass('active');
          });
          
        }


        $('[data-progress]').each(function(){

            $( this ).bekeyProgressbar();

        });


    });


        $.fn.bekeyProgressbar = function(options){

            options = $.extend({
                animate     : true,
              animateText : true
            }, options);

            var $this = $(this);
          
            var $progressBar = $this;
            var $progressCount = $progressBar.find('.progressBar-percentage-count');
            var $circle = $progressBar.find('.progressBar-circle');
            var percentageProgress = $progressBar.attr('data-progress');
            var percentageRemaining = (100 - percentageProgress);
            var percentageText = $progressCount.parent().attr('data-progress');
          
            //Calcule la circonférence du cercle
            var radius = $circle.attr('r');
            var diameter = radius * 2;
            var circumference = Math.round(Math.PI * diameter);

            //Calcule le pourcentage d'avancement
            var percentage =  circumference * percentageRemaining / 100;

            $circle.css({
              'stroke-dasharray' : circumference,
              'stroke-dashoffset' : percentage
            })
            
            //Animation de la barre de progression
            if(options.animate === true){
              $circle.css({
                'stroke-dashoffset' : circumference
              }).animate({
                'stroke-dashoffset' : percentage
              }, 3000 )
            }
            
            //Animation du texte (pourcentage)
            if(options.animateText == true){
     
              $({ Counter: 0 }).animate(
                { Counter: percentageText },
                { duration: 3000,
                 step: function () {
                   $progressCount.text( Math.ceil(this.Counter) + '%');
                 }
                });

            }else{

              $progressCount.text( percentageText + '%');
            }
          
        };




        var box = document.querySelector(".search-field");
          
        // Detect all clicks on the document
        document.addEventListener("click", function(event) {
          // If user clicks inside the element, do nothing
          var clList = event.target.classList;

          if (event.target.closest(".header_search")){
            box.classList.add('header_search_active');  
            box.classList.remove('search_remove');  
          }else if( clList != '' ){
            box.classList.add('search_remove');
            box.classList.remove('header_search_active');
          }
          return;


        });
          



})(jQuery);