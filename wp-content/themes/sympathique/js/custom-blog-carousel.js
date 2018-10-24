jQuery(document).ready(function() {	


	// HOMEPAGE BLOG CAROUSEL //
	jQuery(function($) {
        $('#homeblog-carousel').jcarousel({
			wrap: 'circular'
		});

        $('#blog-carousel-wrapper .jcarousel-control-prev')
            .on('active.jcarouselcontrol', function() {
                $(this).removeClass('inactive');
            })
            .on('inactive.jcarouselcontrol', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('#blog-carousel-wrapper .jcarousel-control-next')
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
	

	
	// TOUCH SUPPORT FOR BLOG CAROUSEL
	jQuery(function($) {
		var carousel = $('#homeblog-carousel').jcarousel();
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