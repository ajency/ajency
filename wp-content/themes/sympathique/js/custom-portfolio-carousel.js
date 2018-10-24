jQuery(document).ready(function() {	

	// HOMEPAGE PORTFOLIO CAROUSEL //
	if (document.documentElement.clientWidth < 1000) {
	jQuery(function($) {
        $('#portfolio-carousel').jcarousel();

        $('#portfolio-carousel-wrapper .jcarousel-control-prev')
            .on('active.jcarouselcontrol', function() {
                $(this).removeClass('inactive');
            })
            .on('inactive.jcarouselcontrol', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('#portfolio-carousel-wrapper .jcarousel-control-next')
            .on('active.jcarouselcontrol', function() {
                $(this).removeClass('inactive');
            })
            .on('inactive.jcarouselcontrol', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });
    });
	}
		
	else {	    
	jQuery(function($) {
        $('#portfolio-carousel').jcarousel();

        $('#portfolio-carousel-wrapper .jcarousel-control-prev')
            .on('active.jcarouselcontrol', function() {
                $(this).removeClass('inactive');
            })
            .on('inactive.jcarouselcontrol', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('#portfolio-carousel-wrapper .jcarousel-control-next')
            .on('active.jcarouselcontrol', function() {
                $(this).removeClass('inactive');
            })
            .on('inactive.jcarouselcontrol', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });
		});
	}

	
	// TOUCH SUPPORT FOR PORTFOLIO CAROUSEL
	jQuery(function($) {
		var carousel = $('#portfolio-carousel').jcarousel();
		carousel
			.touchwipe({
				wipeLeft: function() {
					carousel.jcarousel('next');
				},
				wipeRight: function() {
					carousel.jcarousel('prev');
				}
		});
	});	
});	