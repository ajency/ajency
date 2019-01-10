$('.mobile-slick').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    adaptiveHeight: true
});
$('.mobile-slick').on('setPosition', function() {
    // jbResizeSlider();
});
//we need to maintain a set height when a resize event occurs.
//Some events will through a resize trigger: $(window).trigger('resize');
// $(window).on('resize', function(e) {
//   jbResizeSlider();
// });
//since multiple events can trigger a slider adjustment, we will control that adjustment here
// function jbResizeSlider(){
//   $slickSlider = $('.mobile-slick');
//   $slickSlider.find('.slick-slide').height('auto');
//   var slickTrack = $slickSlider.find('.slick-track');
//   var slickTrackHeight = $(slickTrack).height();
//   $slickSlider.find('.slick-slide').css('height', slickTrackHeight + 'px');
// }
jQuery('.variable-width').slick({
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    dots: false,
    initialSlide: 1,
    centerMode: true,
    variableWidth: true,
    responsive: [{
        breakpoint: 768,
        settings: {
            arrows: false,
            centerMode: true,
            slidesToShow: 2,
        }
    }, {
        breakpoint: 480,
        settings: {
            arrows: false,
            slidesToShow: 1,
            centerPadding: '35px',
        }
    }]
});
jQuery(".aj-home .items").hover(function() {
    $('.aj-our-work').addClass("invisible");
}, function() {
    $('.aj-our-work').removeClass("invisible");
});
$('.aj-team-member').slick({
    dots: true,
    infinite: true,
    speed: 300,
    arrows: false,
    slidesToShow: 1,
    variableWidth: true
});
// $(window).scroll(function() {
//     if ($(window).scrollTop() >= 20) {
//         $('nav').addClass('fixed-header');
//         $('nav').addClass('position-fixed');
//     } else {
//         $('nav').removeClass('fixed-header');
//         $('nav').removeClass('position-fixed');
//     }
// });
if ($(window).width() < 1198) {
    $('.pf-healthkart').click(function() {
        $('.scroll-left').addClass('active');
        $('.mobile-slick').slick('slickGoTo', 0);
        $('body').css("overflow", "hidden");
        ourWorkUrl();
    });
    $('.pf-commonfloor').click(function() {
        $('.scroll-left').addClass('active');
        $('.mobile-slick').slick('slickGoTo', 1);
        $('body').css("overflow", "hidden");
        ourWorkUrl();
    });
    $('.pf-growthinvest').click(function() {
        $('.scroll-left').addClass('active');
        $('.mobile-slick').slick('slickGoTo', 2);
        $('body').css("overflow", "hidden");
        ourWorkUrl();
    });
    $('.pf-weddingz').click(function() {
        $('.scroll-left').addClass('active');
        $('.mobile-slick').slick('slickGoTo', 3);
        $('body').css("overflow", "hidden");
        ourWorkUrl();
    });
    $('.pf-mylan').click(function() {
        $('.scroll-left').addClass('active');
        $('.mobile-slick').slick('slickGoTo', 4);
        $('body').css("overflow", "hidden");
        ourWorkUrl();
    });
    $('.back').click(function() {
        window.history.go(-1);
    });

    function ourWorkUrl() {
        if (history.pushState) {
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '#our-work';
            window.history.pushState({
                path: newurl
            }, '', newurl);
        }
        $(window).on('popstate', function(event) {
            ourWorkBack();
        });
    }

    function ourWorkBack() {
        $('.scroll-left').removeClass('active');
        $('div[id^=showdiv]').removeClass("highlight");
        $('body').css("overflow", "scroll");
        $(".scroll-left").animate({
            scrollTop: 0
        }, "slow");
        return false;
    }
}
$('#showdiv1').click(function() {
    $('div[id^=div]').hide();
    $('#div1').show();
    $('div[id^=showdiv]').removeClass("highlight");
    $('#showdiv1').addClass("highlight");
});
$('#showdiv2').click(function() {
    $('div[id^=div]').hide();
    $('#div2').show();
    $('div[id^=showdiv]').removeClass("highlight");
    $('#showdiv2').addClass("highlight");
});
$('#showdiv3').click(function() {
    $('div[id^=div]').hide();
    $('#div3').show();
    $('div[id^=showdiv]').removeClass("highlight");
    $('#showdiv3').addClass("highlight");
});
$('#showdiv4').click(function() {
    $('div[id^=div]').hide();
    $('#div4').show();
    $('div[id^=showdiv]').removeClass("highlight");
    $('#showdiv4').addClass("highlight");
});
$('#showdiv5').click(function() {
    $('div[id^=div]').hide();
    $('#div5').show();
    $('div[id^=showdiv]').removeClass("highlight");
    $('#showdiv5').addClass("highlight");
});
$('.close').click(function() {
    $('div[id^=div]').hide();
    $('div[id^=showdiv]').removeClass("highlight");
});
$(window).on("load", function() {
    jQuery.ready.then(function() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i = 0; i < imgDefer.length; i++) {
            if (imgDefer[i].getAttribute('data-delaysrc')) {
                imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-delaysrc'));
                imgDefer[i].setAttribute('srcset', imgDefer[i].getAttribute('data-delaysrcset'));
                imgDefer[i].setAttribute('sizes', imgDefer[i].getAttribute('data-delaysizes'));
                imgDefer[i].removeAttribute('data-delaysrc', 'data-delaysrcset', 'data-delaysizes');
                imgDefer[i].removeAttribute('data-delaysrcset');
                imgDefer[i].removeAttribute('data-delaysizes');
            }
        }
    });
})
$(function() {
    $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('data-original'));
        $('#imagemodal').modal('show');
        jQuery('meta[name=viewport]').attr('content', 'initial-scale=1.0');
    });
});
$('.modal').on('click', function() {
    $('#imagemodal').modal('hide');
    jQuery('meta[name=viewport]').attr('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');
});
$(window).on('hashchange', function(event) {
    $('.scroll-left').removeClass('active');
});
$(document).on('click', '.card-front .card-trigger', function() {
    $(this).toggleClass('active');
    $('.card-front').toggleClass('active');
    $(this).siblings().toggleClass('not-active');
})

$('.bread-crumb__menu').on('click', function(e) {
    // e.preventDefault();
    $(this).toggleClass('is-active');
});