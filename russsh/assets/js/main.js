$(document).ready(function() {
	$(document).on('click', '.rucard', function(e) {
		$('.flyout').addClass('flyout--show');
		$('.flyout__backdrop').addClass('flyout__backdrop--fadein');
		$('.flyout__content').removeClass('flyout__content--hidden');
		$('body').addClass('flyout-open');
	});
	$(document).on('click', '.flyout__backdrop', function(e) {
		// $('.flyout').removeClass('flyout--show');
		$('.flyout').delay(500).queue(function(next) {
			$(this).removeClass('flyout--show');
			next();
		});
		$('.flyout__backdrop').removeClass('flyout__backdrop--fadein');
		$('.flyout__content').addClass('flyout__content--hidden');
		$('body').removeClass('flyout-open');
		$('.flyout__body__inner').scrollTop(0);
	});

	// for the tabs scroll down
	$(document).on('click', '.linetabs--sticky .linetabs__tab', function(e) {
		e.preventDefault();
		$elem = $.attr(this, 'href').replace('#', '');
		$theval = $('#' + $elem).offset().top - $('#' + $elem).offsetParent().offset().top;
		$('.flyout__body__inner').animate({scrollTop: $theval}, 800);
	});

	$('.flyout__body__inner').on('scroll', function() {
		$mesaur = $('#panel1').height();
		if ($(this).scrollTop() > $mesaur) {
			$('[href="#panel1"]').removeClass('linetabs--active');
			$('[href="#panel2"]').addClass('linetabs--active');
		} else {
			$('[href="#panel2"]').removeClass('linetabs--active');
			$('[href="#panel1"]').addClass('linetabs--active');
		}
	});

	// form stuff
	function expandFooter() {
		$('.flyout__footer').addClass('flyout__footer--expanded');
		$('.flyout__body').addClass('flyout__body--shrunk');
	}
	function collapseFooter() {
		$('.flyout__footer').removeClass('flyout__footer--expanded');
		$('.flyout__body').removeClass('flyout__body--shrunk');
	}
	$('.flyout__footer').click(expandFooter);
	$(document).mouseup(function (e) {
		var container = $('.flyout__footer');

    	if (!container.is(e.target)
        	&& container.has(e.target).length === 0) {
    		collapseFooter()
    	}
	});

	// documentation for this plugin - https://github.com/KevinSheedy/jquery.alphanum
	$('.nospecial-chars').alphanum({
	    disallow: '!@#$%^*{}[]~`/',  // Allow Upper Case characters
	    allow: '-'
	});

	//rutab panels
	$('.rutabs .rutabs__tab').click(function(e) {
		e.preventDefault();
		$toconsider = $(this).parents('.rutabs').data('parent');
		$(this).parents('.rutabs').find('.rutabs__tab').removeClass('rutabs__tab--active');
		$(this).addClass('rutabs__tab--active');
		$elem = $(this).attr('href');

		$(this).parents($toconsider).find('.is__rutabs__panel').hide().removeClass('hidefirst');
		$(this).parents($toconsider).find($elem).show();
	});
});

$(window).on("load",function(){
    $(".card-holder").mCustomScrollbar({
    	theme:"minimal-dark",
    	scrollInertia: 200,
    	callbacks:{
    	    onInit:function(){
    	    	$('.card-holder').css('opacity', 1);
    	    }
    	}
    });
	$( '#cd-dropdown' ).dropdown( {
		gutter : 5,
		stack : false,
		slidingIn : 100
	} );
   	
   	$('.rufilter--select').removeClass('loading');
});
