$(function () {
			$(window).scroll(function() {
        if ($(document).scrollTop() > 70) {
            $('.menu').addClass('affix');
        } else {
            $('.menu').removeClass('affix');
        }
      });

			$('[data-toggle="tooltip"]').tooltip();

			$('.animate-toggler').click(function(){
			  $(this).toggleClass('active');
			});

			// carousel 
			$('#banner .carousel').carousel({
			  interval: 4500,
			  pause: "false"
			})

			$("#banner .carousel").swipe({

			swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

				if (direction == 'left') $(this).carousel('next');
				if (direction == 'right') $(this).carousel('prev');

			},
			allowPageScroll:"vertical"

			});

			// owlcarousel 
			var owl = $('.owl-carousel');
	      owl.owlCarousel({
	        loop: true,
	        nav: true,
	        margin: 10,
	        items : 1,
	        autoplay:true,
					autoplayTimeout:6000,
					autoplayHoverPause:true,
	        responsive: {
	          1200: { items: 4 },
	          991: { items: 3 },
	          500 : { items: 2 },
	          300	: { items: 1 }
	        }
	      });
	      owl.on('mousewheel', '.owl-stage', function(e) {
	        if (e.deltaY > 0) {
	          owl.trigger('next.owl');
	        } else {
	          owl.trigger('prev.owl');
	        }
	        e.preventDefault();
	      });

	  	// review carousel 
	  	$('#review .carousel').carousel({
	  		interval: 6000,
			  touch: true
			})

	  	// faq arrow down up animation (not still static)

			$(".btn-accordion").click(function () {
				let arrow = '.arrow' + $(this).data('id');
				$(arrow).toggleClass("down");

				if (arrow != '.arrow1') {
					$('.arrow1').removeClass("down");
				}
				if (arrow != '.arrow2') {
					$('.arrow2').removeClass("down");
				}
				if (arrow != '.arrow3') {
					$('.arrow3').removeClass("down");
				}
				if (arrow != '.arrow4') {
					$('.arrow4').removeClass("down");
				}
			});

			// searchbox 
			$('.btn-search').click(function() {
				$('#searchbox').toggle('1000');
			});

			// filter price
			$( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 15000,
      values: [ 1000, 10000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "Ks." + ui.values[ 0 ] + " - Ks." + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "Ks." + $( "#slider-range" ).slider( "values", 0 ) +
      " - Ks." + $( "#slider-range" ).slider( "values", 1 ) );


   	// load more button 
   	$('.btn-load').click(function() {
   		$(this).hide();
   		$('#div-loaded').slideDown('slow');
   	});

   	// aos
   	AOS.init({
   		easing: 'ease-out-back',
   		once: true
   	});
    
})