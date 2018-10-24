
    $(document).ready(function() {
        //$('.menu-link').bigSlide();
    
        $(".accordion .accord-header").click(function() {
      if($(this).next("div").is(":visible")){
        $(this).next("div").slideUp("slow");
        $(this).removeClass('minus');
      } else {
    $(".accordion .accord-header").removeClass('minus');
        $(".accordion .accord-content").slideUp("slow");
        $(this).next("div").slideToggle("slow");
    $(this).addClass('minus');
      }
    });

var step = 50;
var scrolling = false;

// Wire up events for the 'scrollUp' link:
$(".scroll-left").bind("click", function(event) {
    event.preventDefault();
    // Animates the scrollTop property by the specified
    // step.
    $(".main-content").animate({
        scrollLeft: "-=" + step + "px"
    });
}).bind("mouseover", function(event) {
    scrolling = true;
    scrollContent("left");
}).bind("mouseout", function(event) {
    scrolling = false;
});


$(".scroll-right").bind("click", function(event) {
    event.preventDefault();
    $(".main-content").animate({
        scrollLeft: "+=" + step + "px"
    });
}).bind("mouseover", function(event) {
    scrolling = true;
    scrollContent("right");
}).bind("mouseout", function(event) {
    scrolling = false;
});

function scrollContent(direction) {
    var amount = (direction === "left" ? "-=15px" : "+=15px");
    $(".main-content").animate({
        scrollLeft: amount
    }, 1, function() {
        if (scrolling) {
            scrollContent(direction);
        }
    });
}


var step = 50;
var scrolling = false;

// Wire up events for the 'scrollUp' link:
$("#scrollleft").bind("click", function(event) {
    event.preventDefault();
    // Animates the scrollTop property by the specified
    // step.
    $(".main-content").animate({
        scrollLeft: "-=" + step + "px"
    });
}).bind("mouseover", function(event) {
    scrolling = true;
    scrollContent("left");
}).bind("mouseout", function(event) {
    scrolling = false;
});


$("#scrollright").bind("click", function(event) {
    event.preventDefault();
    $(".main-content").animate({
        scrollLeft: "+=" + step + "px"
    });
}).bind("mouseover", function(event) {
    scrolling = true;
    scrollContent("right");
}).bind("mouseout", function(event) {
    scrolling = false;
});

function scrollContent(direction) {
    var amount = (direction === "left" ? "-=15px" : "+=15px");
    $(".main-content").animate({
        scrollLeft: amount
    }, 1, function() {
        if (scrolling) {
            scrollContent(direction);
        }
    });
}

  
      $("#showMenu").click(function(){
        $('body').removeClass('menu-background2');
          $("body").addClass("menu-background");
          
        });
        $("#perspective .container").click(function(){
         $('body').removeClass('menu-background');
          $("body").addClass("menu-background2");
        });
        $("#showMenu").on("tap",function(){
$('body').removeClass('menu-background2');
          $("body").addClass("menu-background");
});

  //Custom Scroll
  // $.each($('.widget_ajency_textwidget'), function() { 
  //   var containerheight = $(this).height();
  //   var subtractheight = $(this).find('.grid-title').height() + $(this).find('h1').height() + $(this).find('.meta').height();
    
  //    $(this).find('.scroll-content').height(containerheight - subtractheight - 20);
  //   $(this).find(".scroll-content").mCustomScrollbar();
  // });
  

  
             $(window).scroll(function(){
                 if ($(this).scrollTop() > 100) {
                     $('.scrollup').fadeIn();
                 } else {
                     $('.scrollup').fadeOut();
                 }
             }); 
         
             $('.scrollup').click(function(){
                 $("html, body").animate({ scrollTop: 0 }, 600);
                 return false;
             });
   

     jQuery(".live-tile, .flip-list").not(".exclude").liveTile();  
    });
   jQuery(function() {
               jQuery('ul.nav a').bind('click',function(event){
                    var $anchor = $(this);
                    /*
                    if you want to use one of the easing effects:
                    $('html, body').stop().animate({
                        scrollLeft: $($anchor.attr('href')).offset().left
                    }, 1500,'easeInOutExpo');
                     */
                    jQuery('html, body .main-content').stop().animate({
                        scrollLeft: $($anchor.attr('href')).offset().left
                    }, 1000);
                    event.preventDefault();
                });
            });
      
$(window).load(function() {
$(".spinner2").fadeOut(3000);
setTimeout(function() { $('iframe.delayed').attr('src', $('iframe.delayed').attr('data-src')); }, 8000);
});


if ( $(window).width() > 800) {     
  $('html, body, *').mousewheel(function(e, delta) {
          this.scrollLeft -= (delta * 80);
          e.preventDefault();
          });
      
   jQuery(document).ready(function ($) {
        "use strict";
        $('#Default').perfectScrollbar();
        $('#CanScrollWithYAxis').perfectScrollbar({useBothWheelAxes: true});
        $('#CanScrollWithXAxis').perfectScrollbar({useBothWheelAxes: true});
      });

 
      
}
else {
  //Add your javascript for small screens here
     $.each($('.widget_ajency_textwidget'), function() { 
    var containerheight = $(this).height();
    var subtractheight = $(this).find('.grid-title').height() + $(this).find('h1').height() + $(this).find('.meta').height();
    
     $(this).find('.scroll-content').height(containerheight - subtractheight - 20);
    $(this).find(".scroll-content").mCustomScrollbar();
  });
}



        
  $(document).ready(function() {

    
    var wrapper = $('.main-content'),
        content = $('.full-container'),
        width=0.
        wrapper_width=wrapper.outerWidth(),
        w_half=wrapper_width/2;
    var w_left=wrapper.position().left;
    //FIXME wait for images load, to get  width or calculate width other way!
    
    //calculate inner width;
    $('.wrapper .Center-Block').each(function() {
        width+=$(this).width()+60;
    });
    content.css('width',width);
    //
    
    content_width = content.outerWidth();
   
   
 
});
$(function() {
        $('nav#menu').mmenu({
          slidingSubmenus: false
        });
      });

  $(document).ready(function() {
    $(".showmore").click(function(evt){

      var currenttxt = $(evt.target).closest('.widget_ajency_textwidget')
        // $.each($('.widget_ajency_textwidget'), function() { 
          var containerheight = currenttxt.height();
          var subtractheight = currenttxt.find('.grid-title').height() + currenttxt.find('h1').height() + currenttxt.find('.meta').height();
          currenttxt.find('.scroll-content').height(containerheight - subtractheight - 20);
          currenttxt.find(".scroll-content").mCustomScrollbar();
          currenttxt.find('.scroll-content').removeClass('removeless');
          currenttxt.find('.showmore').hide();
          currenttxt.find('.showless').show();
        // });
    });

    $(".showless").click(function(evt){
      var currenttxt1 = $(evt.target).closest('.widget_ajency_textwidget')
        // $.each($('.widget_ajency_textwidget'), function() { 
          var containerheight = $(this).height();
            currenttxt1.find('.scroll-content').height('auto');
            currenttxt1.find(".scroll-content").mCustomScrollbar("update");
            currenttxt1.find(".scroll-content").addClass('removeless');
            currenttxt1.find(".showless").hide();
              currenttxt1.find(".showmore").show();
        // });
    });
});
// $(document).ready(function(){
//   $('a[href^="#"]').on('click',function (e) {
//       e.preventDefault();

//       var target = this.hash;
//       var $target = $(target);

//       $('html, body').stop().animate({
//           'scrollLeft': $target.offset()..offset().left-20
//       }, 900, 'swing', function () {
//           window.location.hash = target;
//       });
//   });
// });