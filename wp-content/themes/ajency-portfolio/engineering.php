<?php /* Template Name: Engineering */ ?>
<?php get_header(); ?>

<div class="container p5">
  <div class="row">
    <div class="col  offset-xl-2 col-xl-8 col12">
      <div class="headerfix ">
        <div class="bread-crumb d-flex">
          <span class="h1 font-weight-light pt-6 pr-2 pr-md-3">/</span>
          <div class="bread-crumb__menu">
            <a  href="<?php echo get_site_url(); ?>" class="actionable text-link h1">Home</a>
            <a  href="<?php echo get_site_url(); ?>/software-development-engineering/" class="actionable is-active text-link text-black h1">Engineering</a>
            <a href="<?php echo get_site_url(); ?>/product-user-interface-design/" class="actionable text-link h1">User interface design</a>
            <a href="<?php echo get_site_url(); ?>/website-design/" class="actionable is-above text-link h1">Website design</a>
            <!-- <a href="#" class="actionable text-link h1">Blog</a>
            <a href="#" class="actionable text-link h1">Careers</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="seperator"></div>

<section>
  <div class="container p5">
    <div class="row">
      <div class="col  offset-xl-2 col-xl-8 col12">
       <p class="body-text">
       We create quality <strong class="font-weight-bold h1">software solutions</strong> and great <strong class="font-weight-bold h1">development teams</strong>. Self-funded or venture backed (Sequoia,  Google Capital), idea stage or with legacy code of 7+ years - we have helped them all build and release usable solutions.</p>
      </div>
    </div>
  </div>
  <div></div>
</section>
<?php /*
<div class="container p5">
  <div class="row">
    <div class="col-12">
       <hr>
    </div>
  </div>
</div>

<section>
  <div class="container p5">
    <div class="row">
      <div class="col offset-xl-2 col-xl-8 col12 grid2">
        <h1 class="font-weight-bold d-block mobile-header mb-4 pb-4">Our Work</h1>
        <div class="card-main-wrap">
          <div class="row card-front">
            <div class="col-6 card-trigger">
              <div class="card-wrapper" data-target="card1">
                <div class="logocard pf-healthkart">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-hk.png"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up"> -->
                   <img src="https://via.placeholder.com/500x350" alt="">
                </div>
                <div class="expanded">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up">
                </div>
              </div>
            </div>
            <div class="col-6 card-trigger">
              <div class="card-wrapper" data-target="card2">
                <div class="logocard pf-commonfloor">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-bt.png"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up"> -->
                   <img src="https://via.placeholder.com/500x350" alt="">
                </div>
                <div class="expanded">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up">
                </div>
              </div>
            </div>
            <div class="col-6 card-trigger">
              <div class="card-wrapper" data-target="card3">
                <div class="logocard pf-growthinvest">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-gi.png"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up"> -->
                   <img src="https://via.placeholder.com/500x350" alt="">
                </div>
                <div class="expanded">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-768px.jpg"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up">
                </div>
              </div>
            </div>
            <div class="col-6 card-trigger">
              <div class="card-wrapper" data-target="card4">
                <div class="logocard pf-weddingz">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-wed.png"
                     data-sizes="100vw"
                     class="d-block m-auto lazyload blur-up"> -->
                     <img src="https://via.placeholder.com/500x350" alt="">
                </div>
                <div class="expanded">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-768px.jpg"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up">
                </div>
              </div>
            </div>
            <div class="col-6 card-trigger">
              <div class="card-wrapper" data-target="card5">
                <div class="logocard pf-mylan">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-mylan.png"
                       data-sizes="100vw"
                       class="d-block m-auto lazyload blur-up"> -->
                       <img src="https://via.placeholder.com/500x350" alt="">
                </div>
                <div class="expanded">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-768px.jpg"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up">
                </div>
              </div>
            </div>
            <div class="col-6 card-trigger">
              <div class="card-wrapper" data-target="card6">
                <div class="logocard pf-mylan">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-bek.png"
                       data-sizes="100vw"
                       class="d-block m-auto lazyload blur-up"> -->
                       <img src="https://via.placeholder.com/500x350" alt="">
                </div>
                <div class="expanded">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
*/ ?>
<section class="p2">
  <div class="slider variable-width d-flex align-items-center">
    <div >
     <picture>
             <source media="(orientation: landscape)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-1-large.jpg  1676w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-1-medium.jpg 1200w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-1-small.jpg  700w,' sizes="52vw">

             <source media="(orientation: portrait)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-1-resize-2x.jpg  700w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-1-resize-1x.jpg 400w' sizes="70vw">

             <img src="<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-1-10px.jpg"
                 data-sizes="100vw"
                 class="img-fluid lazyload blur-up" alt="David Lovell (Operations Director
) GrowthInvest.com">
           </picture>
    </div>
    <div class="align-items-center">


           <picture>
             <source media="(orientation: landscape)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-2-large.jpg  1676w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-2-medium.jpg 1200w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-2-small.jpg  700w,' sizes="52vw">

             <source media="(orientation: portrait)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-2-resize-2x.jpg  700w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-2-resize-1x.jpg 400w' sizes="70vw">

             <img src="<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-2-10px.jpg"
                 data-sizes="100vw"
                 class="img-fluid lazyload blur-up" alt="Akhil Gupta (Chief Technology Officer)
HealthKart.com">
           </picture>


    </div>
    <div>
         <picture>
             <source media="(orientation: landscape)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-3-large.jpg  1676w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-3-medium.jpg 1200w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-3-small.jpg  700w,' sizes="52vw">

             <source media="(orientation: portrait)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-3-resize-2x.jpg  700w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-3-resize-1x.jpg 400w' sizes="70vw">

             <img src="<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-3-10px.jpg"
                 data-sizes="100vw"
                 class="img-fluid lazyload blur-up" alt="Gurpreet Singh (Co-founder) Browntape.com">
           </picture>
    </div>
     <div>
     <picture>
             <source media="(orientation: landscape)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-4-large.jpg  1676w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-4-medium.jpg 1200w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-4-small.jpg  700w,' sizes="52vw">

             <source media="(orientation: portrait)" data-srcset='<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-4-resize-2x.jpg  700w, <?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-4-resize-1x.jpg 400w' sizes="70vw">

             <img src="<?php echo get_template_directory_uri(); ?>/img/testimonials/testimonial-4-10px.jpg"
                 data-sizes="100vw"
                 class="img-fluid lazyload blur-up" alt="Andrew Nicolson (Head of Product)
Bekumo, London ">
           </picture>
    </div>
  </div>
</section>

<?php /*
<div class="container p5">
  <div class="row">
    <div class="col offset-xl-2 col-xl-8 col12 grid3">
      <div class="card-main-wrap">
        <div class="row card-front">
          <div class="col-4 card-trigger">
            <div class="card-wrapper" data-target="card1">
              <div class="logocard pf-healthkart">
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-hk.png"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up"> -->
                 <img src="https://via.placeholder.com/350x500" alt="">
              </div>
              <div class="expanded">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up">
              </div>
            </div>
          </div>
          <div class="col-4 card-trigger">
            <div class="card-wrapper" data-target="card2">
              <div class="logocard pf-commonfloor">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-bt.png"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up"> -->
                 <img src="https://via.placeholder.com/350x500" alt="">
              </div>
              <div class="expanded">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up">
              </div>
            </div>
          </div>
          <div class="col-4 card-trigger">
            <div class="card-wrapper" data-target="card3">
              <div class="logocard pf-growthinvest">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-gi.png"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up"> -->
                 <img src="https://via.placeholder.com/350x500" alt="">
              </div>
              <div class="expanded">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-768px.jpg"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up">
              </div>
            </div>
          </div>
          <div class="col-4 card-trigger">
            <div class="card-wrapper" data-target="card4">
              <div class="logocard pf-weddingz">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-wed.png"
                   data-sizes="100vw"
                   class="d-block m-auto lazyload blur-up"> -->
                   <img src="https://via.placeholder.com/350x500" alt="">
              </div>
              <div class="expanded">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-768px.jpg"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up">
              </div>
            </div>
          </div>
          <div class="col-4 card-trigger">
            <div class="card-wrapper" data-target="card5">
              <div class="logocard pf-mylan">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-mylan.png"
                     data-sizes="100vw"
                     class="d-block m-auto lazyload blur-up"> -->
                     <img src="https://via.placeholder.com/350x500" alt="">
              </div>
              <div class="expanded">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-768px.jpg"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up">
              </div>
            </div>
          </div>
          <div class="col-4 card-trigger"">
            <div class="card-wrapper" data-target="card6">
              <div class="logocard pf-mylan">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/temp/logo-bek.png"
                     data-sizes="100vw"
                     class="d-block m-auto lazyload blur-up"> -->
                     <img src="https://via.placeholder.com/350x500" alt="">
              </div>
              <div class="expanded">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg"
                 data-sizes="100vw"
                 class="d-block m-auto lazyload blur-up">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
*/ ?>
<section>
<div class="container p5">
   <div class="row " id="num-terms-holder ">
    <div class=" offset-xl-2 col-xl-8">
      <div class="row">
        <div  class="num-terms-item col-lg-6 col-12 aos-init aos-animate pt-4 pb-4" >
            <div class="row">
                <div class="num col-sm-2 ">01</div>
                <div class="term  col-sm-10 ">
                  <h3 class="h1 ft6"> We build &amp; extend development teams</h3>
                    <h4 class="font-weight-light mt-4">Work with our outstanding engineers and integrate them into your processes.</h4>
                </div>
            </div>
        </div>
        <div class="num-terms-item col-lg-6 col-12 aos-init aos-animate  pt-4 pb-4" >
            <div class="row">
                <div class="num col-sm-2 ">02</div>
                <div class="term col-sm-10">
                    <h3 class="h1 ft6">We develop great applications </h3>
                    <h4 class="font-weight-light mt-4">Let us transform your concepts into business-ready software solutions.</h4>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col  offset-xl-2 col-xl-8 col12">
    <div class="alert alert-light alert-mb">

  <p class="mt-2 body-text text-black">One of our leadership team/co-founders is hands on with each project. This personal ownership is a key reason why clients choose to work with a boutique development studio like our’s.
</p>


    </div>
  </div>
  </div>
</div>
</section>
 <div class="container p5">
  <div class="row">
    <div class="col-12">
       <hr>
    </div>
  </div>
</div>
<section class="overflow-h aj-engineering">
<div class="container p5">
  <div class="row">
    <div class="col-xl-2">

    </div>
    <div class="col-xl-10 our-work aj-engineering-work">

        <h1 class="font-weight-bold d-block d-md-none mobile-header mb-4 text-muted">Our Work</h1>

      <div class="items mb-5 ">
        <div id="showdiv1" class="text-black text-link pf-healthkart highlight">
        <h1 class="ft6">HealthKart.com</h1>
        <h5 class="font-weight-light">
        A Sequoia-backed omnichannel marketplace for health products.
       </h5>
      </div>

       <div id="div1" style="display:block;">
       <span aria-hidden="true" class="close">&times; Close</span>
          <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 200 150'%2F%3E"
              data-delaysrc="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-480px.jpg"
              data-delaysrcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-1536px.jpg 1536w, <?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-768px.jpg 768w, <?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-480px.jpg 480w"
              data-delaysizes="(min-width: 768px) 40vw, 100vw" class="img-fluid "
              alt=" Sequoia backed omnichannel marketplace for health products.">

       </div>
      </div>
      <div class="items mb-5">
        <div id="showdiv2" class="text-black text-link pf-commonfloor">
        <h1 class="ft6">Commonfloor.com</h1>
        <h5 class="font-weight-light">
        Real estate platform with funding from Tiger Global and Google Capital.
       </h5>
       </div>
        <div id="div2">
           <span aria-hidden="true" class="close">&times; Close</span>

          <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 200 150'%2F%3E"
              data-delaysrc="<?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-480px.jpg"
              data-delaysrcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-1536px.jpg 1536w, <?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-768px.jpg 768w, <?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-480px.jpg 480w"
              data-delaysizes="(min-width: 768px) 40vw, 100vw" class="img-fluid">
       </div>
      </div>
      <div class="items mb-5">
        <div id="showdiv3" class="text-black text-link pf-growthinvest">
        <h1 class="ft6">GrowthInvest</h1>
        <h5 class="font-weight-light">
        London-based platform that helps startups raise early stage investment.
       </h5>
      </div>
        <div id="div3">
        <span aria-hidden="true" class="close">&times; Close</span>

          <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 200 150'%2F%3E"
              data-delaysrc="<?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-480px.jpg"
              data-delaysrcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-1536px.jpg 1536w, <?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-768px.jpg 768w, <?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-480px.jpg 480w"
              data-delaysizes="(min-width: 768px) 40vw, 100vw" class="img-fluid">
       </div>
      </div>
      <div class="items mb-5">
        <div id="showdiv4" class="text-black text-link pf-weddingz">
        <h1 class="ft6">Weddingz.in</h1>
        <h5 class="font-weight-light">
        Marketplace for the wedding industry. Acquired by Softbank-backed OyoRooms in 2018.
       </h5>
        </div>
        <div id="div4">
          <span aria-hidden="true" class="close">&times; Close</span>

          <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 200 150'%2F%3E"
              data-delaysrc="<?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-480px.jpg"
              data-delaysrcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-1536px.jpg 1536w, <?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-768px.jpg 768w, <?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-480px.jpg 480w"
              data-delaysizes="(min-width: 768px) 40vw, 100vw" class="img-fluid">
       </div>
      </div>

      <div class="items mb-5">
        <div id="showdiv5" class="text-black text-link pf-mylan">
        <h1 class="ft6">Mylan</h1>
        <h5 class="font-weight-light">
        A tele-medicine solution that helps hospitals reduce costs of patient visits.
       </h5>
        </div>
        <div id="div5">
            <span aria-hidden="true" class="close">&times; Close</span>
          <img src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 200 150'%2F%3E"
              data-delaysrc="<?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-480px.jpg"
              data-delaysrcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-1536px.jpg 1536w, <?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-768px.jpg 768w, <?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-480px.jpg 480w"
              data-delaysizes="(min-width: 768px) 40vw, 100vw" class="img-fluid ">
       </div>
      </div>



        <div class="scroll-left d-block d-xl-none">
          <div class="row no-gutter fixed-header shadow" >
            <div class="col-1 ml-3 p-0">
              <h3  class="m-0 font-weight-bold back" >
                <img class="btn-back mt-1 " src="<?php echo get_template_directory_uri(); ?>/img/left-arrow.png" style="width:20px;"/>
              </h3>
            </div>
            <div class="col-7 pl-0">
              <h3 class="modal-title font-weight-bold back" id="exampleModalLabel">Back</h3>
            </div>
          </div>

          <div class="img-section">
            <div class="mobile-slick ">
              <div>
                <div class="mb-3 p-4">
                  <h1 class="ft6">Healthkart.com</h1>
                  <h5 class="font-weight-light">
                  Sequoia backed omnichannel marketplace for health products.
                  </h5>
                </div>
                <div>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/healthkart-homepage-mo-10px.jpg"
                      data-srcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-1600px.jpg 1600w, <?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-800px.jpg 800w, <?php echo get_template_directory_uri(); ?>/img/portfolio/healthkart/Healthkart-Homepage-400px.jpg 400w"
                      data-sizes="100w" class="img-fluid lazyload blur-up">
                </div>
              </div>

              <div style="background:#FFFAF1">
                <div class="mb-3 p-4">
                  <h1 class="ft6">Commonfloor.com</h1>
                  <h5 class="font-weight-light">
                    Tiger Global and Google Capital backed Real estate platform.
                  </h5>
                </div>
                <div>

                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/commonfloor-homepage-mo-10px.jpg"
                      data-srcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-1600px.jpg 1600w, <?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-800px.jpg 800w, <?php echo get_template_directory_uri(); ?>/img/portfolio/commonfloor/Commonfloor-Homepage-400px.jpg 400w"
                      data-sizes="100w" class="img-fluid lazyload blur-up">
                </div>
              </div>

              <div style="background:#F5FAFF">
                <div class="mb-3 p-4">
                  <h1 class="ft6">Growthinvest.com</h1>
                  <h5 class="font-weight-light">
                    London based platform that helps startups raise early stage investment.
                   </h5>
                </div>
                <div>

                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/growthInvest-homepage-mo-10px.jpg"
                      data-srcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-1600px.jpg 1600w, <?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-800px.jpg 800w, <?php echo get_template_directory_uri(); ?>/img/portfolio/growthinvest/GrowthInvest-Homepage-400px.jpg 400w"
                      data-sizes="100w" class="img-fluid lazyload blur-up">
                </div>
              </div>

              <div>
                <div class="mb-3 p-4">
                  <h1 class="ft6">Weddingz.in</h1>
                  <h5 class="font-weight-light">
                    Online marketplace for Wedding industry. Acquired by Softbank backed Oyo Rooms in 2018.
                  </h5>
                </div>
                <div>

                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/weddingz-homepage-mo-10px.jpg"
                      data-srcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-1600px.jpg 1600w, <?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-800px.jpg 800w, <?php echo get_template_directory_uri(); ?>/img/portfolio/weddingz/Weddingz-Homepage-400px.jpg 400w"
                      data-sizes="100w" class="img-fluid lazyload blur-up">
                </div>
              </div>

              <div>
                <div class="mb-3 p-4">
                  <h1 class="ft6">Mylan</h1>
                  <h5 class="font-weight-light">
                   A tele-medicine solution that helps hospitals reduce costs of patient visits.
                  </h5>
                </div>
                <div>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-mo-10px.jpg"
                       data-srcset="<?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-1600px.jpg 1600w, <?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-800px.jpg 800w, <?php echo get_template_directory_uri(); ?>/img/portfolio/mylan/mylan-homepage-400px.jpg 400w"
                       data-sizes="100w" class="img-fluid lazyload blur-up">
                </div>
              </div>
            </div>
          </div>

        </div>

          <div class="aj-our-work">
        <h1 class="font-weight-bold display-3">Our Work</h1>
         <p class="body-text">
      Seeing is believing. Some of our best work.
     </p>
      </div>
    </div>
  </div>
</div>
</section>
 <div class="container p5">
  <div class="row">
    <div class="col-12">
       <hr>
    </div>
  </div>
</div>
<section >
<div class="container p5">
  <div class="row">
    <div class="col  offset-md-2 col-md-8 col12">
      <h3 class="h1 ft6">Ably led by</h3>
      <p class="body-text">
      Atleast one leadership team member actively works on every project.
     </p>
    </div>
  </div>
</div>
</section>

<section class="p2">
<div class="container slider-contanier ">

      <div class="aj-team-member  d-flex">

        <div >
          <div class="row ">
            <div class="col-md-6">


                  <img src="<?php echo get_template_directory_uri(); ?>/img/team/anuj-10px.jpg"
                  class="lazyload blur-up img-fluid"
                  data-srcset="<?php echo get_template_directory_uri(); ?>/img/team/anuj-desktop.jpg 700w, <?php echo get_template_directory_uri(); ?>/img/team/anuj-tablet.jpg 476w, <?php echo get_template_directory_uri(); ?>/img/team/anuj-mobile.jpg 276w"
                  data-sizes="(min-width: 768px) 42vw, 100vw" alt="Anuj Khurana" class="img-fluid">
            </div>
             <div class="col-md-5 offset-md-1">
               <div class="w-75 team-desc">
                  <h5>CEO/Co-founder</h5>
                  <h1 class="display-3">Anuj Khurana</h1>
                   <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">13+ years of Digital experience.</h5></div>
                </div>
            </div>
          </div>
        </div>

        <div class="align-items-center">
          <div class="row flex ">
            <div class="col-md-6">


                  <img src="<?php echo get_template_directory_uri(); ?>/img/team/nutan-10px.jpg"
                  class="lazyload blur-up img-fluid"
                  data-srcset="<?php echo get_template_directory_uri(); ?>/img/team/nutan-desktop.jpg 700w, <?php echo get_template_directory_uri(); ?>/img/team/nutan-tablet.jpg 476w, <?php echo get_template_directory_uri(); ?>/img/team/nutan-mobile.jpg 276w"
                  data-sizes="(min-width: 768px) 42vw, 100vw" alt="Avanti Hiremath" class="img-fluid">
            </div>
            <div class="col-md-5 offset-md-1">
              <div class="w-75 team-desc">
                <h5>Engineering Manager</h5>
                <h1 class="display-3">Nutan Kamat</h1>
                <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">6+ years.</h5></div>
              </div>
            </div>
          </div>
        </div>

        <div >
          <div class="row">
            <div class="col-md-6">
              <img src="<?php echo get_template_directory_uri(); ?>/img/team/robiul-10px.jpg"
                  class="lazyload blur-up img-fluid"
                  data-srcset="<?php echo get_template_directory_uri(); ?>/img/team/robiul-desktop.jpg 700w, <?php echo get_template_directory_uri(); ?>/img/team/robiul-tablet.jpg 476w, <?php echo get_template_directory_uri(); ?>/img/team/robiul-mobile.jpg 276w"
                  data-sizes="(min-width: 768px) 42vw, 100vw" alt="Avanti Hiremath" class="img-fluid">
            </div>
            <div class="col-md-5 offset-md-1">
              <div class="w-75 team-desc">
                <h5>Engineering Manager
</h5>
                <h1 class="display-3">Robiul Hoque</h1>
                <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">8+ years.</h5></div>
              </div>
            </div>
          </div>
        </div>

      </div>
</div>
</section>

<section>
<div class="container p5">
  <div class="row">
    <div class="col  offset-xl-2 col-xl-8 col12">
      <h3 class="h1 ft6">Common Queries</h3>
      <p class="body-text">To help you decide if we are the right fit for you.</p>
      <div class="seperator">
      </div>
    <div class="accordion aj-faq" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
        <a class=" text-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       <h2 class="pt-2 pb-2 m-0 ">What technologies & frameworks do you work on?</h2>
        </a>
    </div>

    <div id="collapseOne" class="collapse  " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <p class="body-text">We have active projects in JAVA, PHP, Django, Angular, Node.js, ElasticSearch, Wordpress, Firebase, Ionicframework, AWS, Lambda, Celery.
       <br><br>In the past, we have been able to build teams around new technologies fairly quickly. For Weddingz.in, we built a 15-people Django team in 6 months.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">

       <a class=" text-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         <h2 class="pt-2 pb-2 m-0 ">Ideal software developer. Myth vs Reality</h2>
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <p class="body-text">A well rounded software developer should be able to understand business requirements, translate it into system design and then write quality code to deliver usable and bug free features. At the same time, she needs to have good communication skills, especially in a remote + multi team setup.
        <br><br>We have struggled with finding all these skills in a single developer (or training them for this). Hence we prefer to have a team engagement which rounds up all the above rather than provide individual developers on hire.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">

        <a class=" text-link collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h2 class="pt-2 pb-2 m-0 ">How does the application development engagement model work?
            </h2>
        </a>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <p class="body-text">Application development projects are fixed scope and cost projects. They begin with a discovery phase (1-4 weeks) where we prepare a detailed scope document and project plan. Post signoff, this then becomes the basis for a 3 to 6 month application development project. This works great for building a minimum viable product, test a new idea or build a largely independent module in your existing product.</p>
      </div>
    </div>
  </div>
    <div class="card">
    <div class="card-header" id="headingFour">

        <a class=" text-link collapsed"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h2 class="pt-2 pb-2 m-0 ">How does the dedicated team engagement model work?</h2>
        </a>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        <p class="body-text">Product development is an ongoing process and after the initial pilot, it requires a dedicated team. A well rounded team needs skills across development, front-end, project management and QA. Depending on the nature and scale of the project, the team that we put together will have a mix of dedicated and shared members.</p>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
</section>

 <div class="container p5">
  <div class="row">
    <div class="col-12">
       <hr>
    </div>
  </div>
</div>

<?php get_footer(); ?>