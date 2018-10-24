jQuery(document).ready(function(){
<!-- slider -->
    $('.slider1').slick({
        mobileFirst: true,
        infinite: true,
        slidesToShow: 3
    });

    $('.slider2').slick({
        mobileFirst: true,
        infinite: true,
        slidesToShow: 4
    });

    $('.slider3').slick({
        mobileFirst: true,
        infinite: true
    });

    $(".button").click(function(){
        $(".slide").slideToggle();
    });
    
});
