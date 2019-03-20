<footer>
    <section class="footer-section">
        <div class="container p5">
            <div class="row">
                <div class="col-xl-2 contact-us">
                </div>
                <div class="col-xl-8">
                    <div class="row no-gutters">
                        <div class="col-md-4 contact-details">
                            <h4 class="font-weight-light">
                                <a class=" d-block h4 font-weight-light" href="tel:09975931402" onclick="ga('send', 'event', 'telephone', 'CallNow', 'tel:09975931402');">
                                    +91 99759 31402
                                </a>
                            </h4>
                            <h4 class="font-weight-light">
                                <a class="d-block h4 font-weight-light" href="mailto:talktous@ajency.in" onclick="ga('send', 'event', 'footerid', 'Contact', 'Footer - talktous@ajency.in');">
                                    talktous@ajency.in
                                </a>
                                <br/>
                                <span class="h5">
                                    Career Opportunities:
                                </span>
                                <a class=" d-block h4 font-weight-light" href="mailto:workwithus@ajency.in">
                                    workwithus@ajency.in
                                </a>
                            </h4>
                        </div>
                        <div class="col-md-5 mt-5 mt-md-0 contact-details">
                            <h4 class="font-weight-light w-75">
                                Panjim Convention Center, Panjim. Goa, India.
                                <a class=" font-weight-light h5 " href="https://goo.gl/maps/qmCNWotzNhC2" target="_blank">
                                    (Map)
                                </a>
                            </h4>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0 contact-details-1">
                            <h4 class="font-weight-light">
                                <a class="d-block h4 font-weight-light" href="https://www.facebook.com/Ajency.in/">
                                    Facebook
                                </a>
                            </h4>
                            <h4 class="font-weight-light">
                                <a class="d-block h4 font-weight-light" href="https://www.linkedin.com/company/ajency-in">
                                    Linkedin
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="mt-5">
                        (C) 2018 Digital Dwarves Pvt Ltd. All Right Reserved
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="..." aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<?php if (!is_page_template('archive.php') && !is_singular('post') && !is_page_template('template-blogs.php') && !is_page_template('template-fullwidth.php') ) { ?>
    <noscript id="deferred-styles">
        <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo get_bloginfo('url');  ?>/wp-content/themes/ajency-portfolio/style.css" rel="stylesheet" type="text/css"/>
         <!--<link href="<?php echo get_template_directory_uri(); ?>/css/zoom.css" rel="stylesheet" type="text/css"/>-->
        <!--  <link rel="stylesheet" type="text/css" href="http://filamentgroup.github.io/enlarge/src/enlarge.css">-->
    </noscript>
    <script>
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
          };
          var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
              window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
          if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
          else window.addEventListener('load', loadDeferredStyles);
    </script>
<?php } ?>
<link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" rel="stylesheet"/>
<?php if (!is_page_template('template-fullwidth.php')) { ?>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php } ?>
<script type="text/javascript">
    window.lazySizesConfig = window.lazySizesConfig || {};
      lazySizesConfig.loadMode = 3;
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/combine.js" type="text/javascript">
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.min.js" type="text/javascript">
</script>
<!--<script type="text/javascript" src="http://filamentgroup.github.io/enlarge/src/enlarge.js"> </script>
<script type="text/javascript" src="http://filamentgroup.github.io/enlarge/src/enlarge.init.js"> </script>

<script type="text/javascript" src="http://filamentgroup.github.io/enlarge/docs/init.js"> </script>
-->
<!--<script src="<?php echo get_template_directory_uri(); ?>/js/zoom.js" type="text/javascript">
</script>-->
<!-- wordpress footer functions -->
    <?php wp_footer(); ?>
<!-- end of wordpress footer -->
    </body>
</html>
