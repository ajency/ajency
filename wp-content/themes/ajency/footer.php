			</div>
         </div>
		 
       <!--  <nav class="outer-nav left vertical " >
            <div class="menu-logo">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/ajencylogomenu.png"/>
               <b><em>What's</em>
               not to like?</b>
               <a href="https://www.facebook.com/Ajency.in" class="line-btn"> Follow us On Facebook</a>
               <br>
               <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
            </div>
            <div class="menu-item">
               <b>Browse the site</b>
               <ul class="menu-list">
                  <li class="menu-list-strong"><a href="index.html">Home</a></li>
                  <ul class="menu-list-2">
                     <li> <a href="impruw.html">Impruw - A Website builder.</a></li>
                     <li> <a href="seedeisplatform.html">SeedEISPlatform - a crowd funding platform</a></li>
                     <li> <a href="minyawns.html">Minyawns.com - A labour marketplace for university students</a></li>
                     <li> <a href="bekumo.html">Bekumo - Manage BYOD within an organization</a></li>
                  </ul>
                  <li  class="menu-list-strong"><a href="hiring.html">Working at Ajency.in</a></li>
                  <li  class="menu-list-strong">Currently hiring for</li>
                  <ul class="menu-list-2">
                     <li><a href="hiring.html">Programmers and web developers</a></li>
                     <li><a href="hiring.html">CSS Developers</a></li>
                     <li> UI designers | Interaction designers.</li>
                     <li><a href="secondcareer.html"> Second Careers</a></li>
                     <li> <a href="internship.html">Internship and projects</a></li>
                  </ul>
               </ul>
               </ul>
            </div>
            <div class="clear"></div>
         </nav>
         <nav id="menu" class="panel" role="navigation">
            <ul>
               <li><a href="hiring.html">Working at Ajency.in</a></li>
               <li><a href="hiring.html">Programmers and web developers</a></li>
               <li><a href="hiring.html">CSS Developers</a></li>
               <li><a href="secondcareer.html"> Second Careers</a></li>
               <li><a href="internship.html">Internship and projects</a></li>
               <li>
                  <div class="fb-like-box" data-href="https://www.facebook.com/Ajency.in" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
               </li>
            </ul>
         </nav>-->
      </div>
      
   <div class="cd-popup" role="alert" >
  <div class="cd-popup-container">
    <div class="cd-popup-header">
      <a href="#0" class="cd-popup-close img-replace"></a>
    </div>
    <div class="content-info"> </div>
  </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>
<script type="text/javascript" src="https://www.appelsiini.net/projects/lazyload/jquery.lazyload.js?v=1.9.1"></script>
<script>
    if ($(window).width() < 768) {
jQuery(document).ready(function($){
  //open popup
  $('.open_button').on('click', function(event){
     $('html').addClass('overflow_none');
     $('body .full-container').addClass('overflow_none');
    event.preventDefault();
    $('.cd-popup').addClass('is-visible');
  
    var images = $(this).find(".grey").html();
    $(".content-info").append(images);
      var holder = $(this).find(".modal_info").html();
    $(".content-info").append(holder);


  });
  
  //close popup
  $('.cd-popup .cd-popup-close').on('click', function(event){
    if( $(event.target).is('.cd-popup-close') ) {
      event.preventDefault();
      $('.cd-popup').removeClass('is-visible');
      $('html').removeClass('overflow_none');
       $('body .full-container').removeClass('overflow_none');
    }
   
setTimeout((function() {
     $('.cd-popup').removeClass('is-visible');
      $(".content-info").empty();
   

}), 500);

  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $('.cd-popup').removeClass('is-visible');
      }
    });
});
}

$(function() {
    $('ul.footer-menu a').bind('click',function(event){
        var $anchor = $(this);
        /*
        if you want to use one of the easing effects:
        $('html, body').stop().animate({
            scrollLeft: $($anchor.attr('href')).offset().left
        }, 1500,'easeInOutExpo');
         */
        $('.main-content').stop().animate({
            scrollLeft: $($anchor.attr('href')).offset().left
        }, 1000);
        event.preventDefault();
    });

    // autoTrigger on scroll until after the third request is loaded

});

</script>
  <script type="text/javascript" charset="utf-8">
  $(function() {
     $("img.lazy").lazyload({
       container: $(".container"),
         effect : "fadeIn"
     });

  });


  </script>


</script>
    
</html>