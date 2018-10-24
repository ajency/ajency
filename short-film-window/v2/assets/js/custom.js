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


function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 300,
            header = document.querySelector(".header");
        if (distanceY > shrinkOn) {
            classie.add(header,"smaller");
        } else {
            if (classie.has(header,"smaller")) {
                classie.remove(header,"smaller");
            }
        }
    });
}
window.onload = init();