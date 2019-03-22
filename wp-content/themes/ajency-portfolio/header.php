<!doctype html>
<html lang="en">
  <head>
     <title><?php wp_title(); ?></title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="google-site-verification" content="qd-1GG94afoWdGykydD88dvERzYFG9UYaLs9cT3t1fk" />

<!--

    <?php  if ( is_page_template('website-design/axisrooms.php') ) { ?>
 			<title>Website design and development of Axisrooms.com | Ajency.in Goa</title>
    	<meta name="description" content="AxisRooms: award-winning hospitality technology solution company that is used in over 6000+ hotels across the world."/>

    <?php } elseif ( is_page_template('website-design/indigowine.php') ) { ?>
 			<title>Website design and development of indigowineco.com | Ajency.in Goa</title>
	    <meta name="description" content="Wine club in Singapore of artisanal wines from boutique producers across Australia. Members can read about wines &subscribe to wine box via site."/>

    <?php } elseif ( is_page_template('website-design/designdesk.php') ) { ?>
 			<title>Website design and development of Designdesk.in | Ajency.in Goa</title>
	    <meta name="description" content="Designdesk: based out of Mumbai, India, designs & builds exhibition stands. The website is a showcase of their work of 1200+ exhibitions in India & abroad."/>

    <?php } elseif ( is_page_template('website-design/marvelrealtors.php') ) { ?>
 			<title>Website design and development of marvelrealtors.com | Ajency.in Goa</title>
	    <meta name="description" content="Marvel Realtors Pune India, known for their premium residences. Website is their brochure for past &ongoing projects, highlighting amenities & unit configuration in each project."/>

    <?php } elseif ( is_page_template('engineering.php') ) { ?>
 			<title>Software Development company with focus on JAVA, PHP, Angular, Mobile Applications and Ecommerce. Goa, India.</title>
	    <meta name="description" content="We research and design digital products that people love to use. Led by HFI certified UX analyst we have worked on diverse projects. From mobile wallets for India's largest business group to an online marketplace for a soloprenuer."/>

    <?php } elseif ( is_page_template('user-interface-design.php') ) { ?>
 			<title>User interface Design, UI & UX research, Product design. Goa, India.</title>
	    <meta name="description" content="We research and design digital products that people love to use. Led by an HFI certified UX analyst, we have worked on diverse projects, from mobile wallets for India's largest business group to an online marketplace for a soloprenuer."/>

    <?php } elseif ( is_page_template('product-user-interface-design/fnbcircle.php') ) { ?>
 			<title>FnB Circle | Ajency.in</title>
	    <meta name="description" content="Large directory sites are making way for newer industry-focused vertical directories and marketplaces. We worked with a family business with strong roots in the traditional F&B industry. Our brief was to help them be part of the online disruption taking place in discovery of vendors in their niche."/>

    <?php } elseif ( is_page_template('product-user-interface-design/goomoextranet.php') ) { ?>
 			<title>Goomo CBT | Ajency.in</title>
	    <meta name="description" content="Armed with $50 million in fund raise Goomo has set out to disrupt the business travel market. We worked with them on numerous projects including their corporate booking tool and the extranet product for use by their hotel partners. "/>

    <?php } elseif ( is_page_template('product-user-interface-design/goomotrain.php') ) { ?>
 			<title>Goomo Train Booking App | Ajency.in</title>
	    <meta name="description" content="Armed with $50 million in fund raise Goomo has set out to disrupt the online travel booking market in India. We worked with them on numerous projects including the interface design for train bookings product. "/>

    <?php } elseif ( is_page_template('product-user-interface-design/mrupee.php') ) { ?>
 			<title>Mobile Wallet App | Ajency.in</title>
	    <meta name="description" content="Mobile wallets and seamless payments at retail and online merchants have revolutionized the Indian market. We made a small contribution to trend while designing the mobile wallet for India’s largest business house (TATA)."/>

    <?php } elseif ( is_page_template('website-design.php') ) { ?>
      <title>Web design for online stores, real estate projects, hotels, company blog. Wordpress, Shopify. Goa, India.</title>
      <meta name="description" content="We design and code websites for online stores, real estate projects, hotels, company or product websites, blog and others. Sites we build are buzzword and SEO compliant, and load under 4 seconds."/>

    <?php } elseif ( is_page_template('template-blogs.php') ) { ?>
          <title>Ajency.in Blog | People & Processes and Technology Blog</title>
          <meta name="description" content="Check out the Ajency.in blog. Read about our thoughts, opinions and updates on our workplace processes and activities as well as know more about our job vacancies."/>

      <?php } elseif ( is_page_template('template-all_blogs.php') ) { ?>
          <title>Blog by Ajency.in | IT Company in Goa, India</title>
          <meta name="description" content="Check out blog posts by Ajency.in. to read about the activities and workplace processes we follow and also know more about our job vacancies."/>      

    <?php } elseif ( is_singular('post') ) { ?>
        <?php
            $the_post_id = get_the_ID();
            $meta_title = get_post_meta($the_post_id, "wpcf-meta-title", true);
            $meta_desc = get_post_meta($the_post_id, "wpcf-meta-description", true);
            $meta_keys = get_post_meta($the_post_id, "wpcf-meta-keywords", true);
        ?>

        <title><?php echo $meta_title; ?></title>
        <meta name="description" content="<?php echo $meta_desc; ?>"/>
        <meta name="keywords" content="<?php echo $meta_keys; ?>"/>

        <meta property="fb:app_id" content="313022923485" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $meta_title; ?>" />
        <meta property="og:description" content="<?php echo $meta_desc; ?>" />
        <meta property="og:url" content="<?php echo esc_url( get_permalink()); ?>" />
        <meta property="og:site_name" content="Ajency.in - Goa based UI/UX &amp; web + mobile application development company" />
        <?php if (has_post_thumbnail()) : ?>
            <meta property="og:image" content="<?php the_post_thumbnail_url('medium_large'); ?>">
            <meta property="twitter:image" content="<?php the_post_thumbnail_url('medium_large'); ?>">
        <?php else : ?>
            <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/ajency-logo.png">
            <meta property="twitter:image" content="<?php echo get_template_directory_uri(); ?>/img/ajency-logo.png">
        <?php endif;?>

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="<?php echo $meta_title; ?>" />
        <meta name="twitter:description" content="<?php echo $meta_desc; ?>" />

    <?php } else { ?>

    	<title>Software Development and User Interface Design company that also offers Web Design services. Goa, India. </title>

			<meta name="description" content="We work with startups in Goa, London, Mumbai, Bangalore &amp; rest of the world. We combine both UI/UX &amp; web + mobile development skills to create winning digital products."/>
			<meta name="keywords" content="Software company in Goa,Software Development Company Goa,Mobile Application Development, Mobile Application Development Goa, Web design Panjim,Ajency.in Goa"/>
			<meta property="og:type" content="website" />
			<meta property="og:title" content="Software Development and User Interface Design company that also offers Web Design services. Goa, India." />
			<meta property="og:description" content="We work with startups in Goa, London, Mumbai, Bangalore &amp; rest of the world. We combine both UI/UX &amp; web + mobile development skills to create winning digital products." />
			<meta property="og:url" content="https://ajency.in/" />
			<meta property="og:site_name" content="Ajency.in - Goa based UI/UX &amp; web + mobile application development company" />
			<meta name="twitter:card" content="summary_large_image" />
			<meta name="twitter:description" content="We work with startups in Goa, London, Mumbai, Bangalore &amp; rest of the world. We combine both UI/UX &amp; web + mobile development skills to create winning digital products." />
			<meta name="twitter:title" content="Software Development and User Interface Design company that also offers Web Design services. Goa, India." />

			<script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/ajency.in\/","name":"Ajency.in - Goa based UI\/UX &amp; web + mobile application development company","potentialAction":{"@type":"SearchAction","target":"https:\/\/ajency.in\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>

		<?php } ?>


    <link  rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" />
    -->

    <style type="text/css">
      @charset "UTF-8";:root{--blue:#007bff;--indigo:#6610f2;--purple:#6f42c1;--pink:#e83e8c;--red:#dc3545;--orange:#fd7e14;--yellow:#ffc107;--green:#28a745;--teal:#20c997;--cyan:#17a2b8;--white:#fff;--gray:#6c757d;--gray-dark:#343a40;--primary:#f9bc23;--secondary:#004283;--success:#28a745;--info:#17a2b8;--warning:#ffc107;--danger:#ad110a;--light:#e4e4e4;--dark:#707279;--cancel:#4b4b4b;--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-family-sans-serif:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";--font-family-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace}*,::after,::before{box-sizing:border-box}html{font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar}@-ms-viewport{width:device-width}nav,section{display:block}body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size:.85rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff;overflow-x:hidden;font-family:'Work Sans',sans-serif}h1,p{margin-top:0}p{margin-bottom:1rem}a{color:#f9bc23;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}img{vertical-align:middle;border-style:none}::-webkit-file-upload-button{font:inherit;-webkit-appearance:button}.h1,.h2,.h4,h1{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit}.h1,h1{font-size:2.125rem}.h2{font-size:1.7rem}.h4{font-size:1.275rem}.img-fluid{max-width:100%;height:auto}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:1200px){.container{max-width:1800px}}.row{display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col,.col-6{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}.col-sm-3,.col-sm-4,.col-xl-2,.col-xl-8{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}.col{flex-basis:0;flex-grow:1;max-width:100%}.col-6{flex:0 0 50%;max-width:50%}@media (min-width:576px){.col-sm-3{flex:0 0 25%;max-width:25%}.col-sm-4{flex:0 0 33.33333%;max-width:33.33333%}.offset-sm-5{margin-left:41.66667%}}@media (min-width:1200px){.col-xl-2{flex:0 0 16.66667%;max-width:16.66667%}.col-xl-8{flex:0 0 66.66667%;max-width:66.66667%}.offset-xl-2{margin-left:16.66667%}.offset-xl-8{margin-left:66.66667%}}.fade:not(.show){opacity:0}.bread-crumb__menu.levelTwo h1{margin-bottom:0}.modal{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;outline:0}.modal-dialog{position:relative;width:auto;margin:.5rem}.modal.fade .modal-dialog{transform:translate(0,-25%)}.modal-content{position:relative;display:flex;flex-direction:column;width:100%;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.2);border-radius:.2rem;outline:0}.modal-body{position:relative;flex:1 1 auto;padding:1rem}@media (min-width:576px){.modal-dialog{max-width:500px;margin:1.75rem auto}}.d-block{display:block!important}.d-flex{display:flex!important}@media (min-width:768px){.d-md-none{display:none!important}}.flex-wrap{flex-wrap:wrap!important}.float-left{float:left!important}.float-right{float:right!important}.position-fixed{position:fixed!important}.m-0{margin:0!important}.mb-4{margin-bottom:1.5rem!important}.pr-2{padding-right:.5rem!important}@media (min-width:768px){.pr-md-2{padding-right:.5rem!important}}.font-weight-light{font-weight:300!important}.font-weight-bold{font-weight:700!important}.text-muted{color:#6c757d!important}@media (min-width:768px) and (max-width:1199.98px){.bread-crumb .h1,.bread-crumb h1{margin-top:53px;font-size:1.4rem}}@media (min-width:320px) and (max-width:767.98px){.bread-crumb .h1,.bread-crumb h1{margin-top:23px;font-size:1.2rem}}@media (min-width:768px) and (max-width:991.98px){.bread-crumb .h1,.bread-crumb h1{font-size:1.7rem}}.bread-crumb .h1 a,.bread-crumb h1 a,.bread-crumb__menu a{font-family:"Libre Baskerville",Baskerville,georgia,serif!important;font-style:italic}.bread-crumb .h1 a,.bread-crumb h1 a{text-transform:lowercase}.bread-crumb__menu{overflow:hidden;position:relative;margin-top:58px;padding-top:0;padding-right:30px;perspective:100px}.bread-crumb__menu a{font-weight:600}.bread-crumb__menu a.normal-font{font-family:'Work Sans',sans-serif!important;font-style:normal;text-transform:none}.bread-crumb__menu .actionable{margin:-43px 0 0;display:block;line-height:1.3;text-transform:lowercase;opacity:0;color:#6c757d}.bread-crumb__menu .actionable.is-active{margin-top:0;transform:translateY(0);position:relative;display:inline-block;opacity:1;color:#6c757d;animation-name:slideltr;animation-duration:1s;animation-iteration-count:1}.bread-crumb__menu .actionable.is-active:before{content:"\f077";top:0}.bread-crumb__menu .actionable.is-active:after,.bread-crumb__menu .actionable.is-active:before{font-family:"Font Awesome 5 Free";font-weight:900;font-style:normal;position:absolute;right:-25px;font-size:15px;color:#6c757d;opacity:0;visibility:hidden}.bread-crumb__menu .actionable.is-active:after,.bread-crumb__menu .actionable.is-active:before{transform:translateY(-15px);animation-name:slideup;animation-duration:2s;animation-iteration-count:1}.bread-crumb__menu .actionable.is-active:after{content:"\f078";top:auto;bottom:0;transform:translateY(20px);animation-name:slidedown}@media (min-width:320px) and (max-width:767.98px){.bread-crumb__menu{margin-top:82px}.bread-crumb__menu .actionable{margin-top:-22px}.bread-crumb__menu .actionable:after,.bread-crumb__menu .actionable:before{font-size:10px!important;right:-20px!important;opacity:1!important;visibility:visible!important}.bread-crumb__menu .actionable:before{transform:translateY(4px)!important}.bread-crumb__menu .actionable:after{transform:translateY(0)!important}.bread-crumb__menu.levelTwo{margin-top:0}.bread-crumb__menu.levelTwo h1{margin-top:12px}}@media (min-width:320px) and (max-width:767.98px){.bread-crumb .h2{font-size:1.2rem}}@keyframes slideup{0%{transform:translateY(8px);opacity:0;visibility:hidden}20%{transform:translateY(8px);opacity:1;visibility:visible}50%{transform:translateY(8px)}to{transform:translateY(-40px);opacity:0;visibility:hidden}}@keyframes slidedown{0%{transform:translateY(-5px);opacity:0;visibility:hidden}20%{transform:translateY(-5px);opacity:1;visibility:visible}50%{transform:translateY(-5px)}to{transform:translateY(40px);opacity:0;visibility:hidden}}@keyframes slideltr{0%{transform:translate3d(-20rem,0,0)}to{transform:translate3d(0,0,0)}}.mobile-header{margin:auto;font-style:italic;text-transform:lowercase;font-family:"Libre Baskerville",Baskerville,georgia,serif!important}@media (min-width:768px) and (max-width:1199.98px){.logo{float:left!important}}@media (min-width:320px) and (max-width:767.98px){.logo{width:125px!important;float:left!important}}@media (min-width:768px) and (max-width:991.98px){.logo{width:110px}}.headerfix{height:188px;z-index:9;position:relative}@media (min-width:320px) and (max-width:767.98px){.headerfix{height:184px}}nav{width:100%;position:absolute}@media (min-width:320px) and (max-width:767.98px){nav{padding-bottom:16px;z-index:9999}.menu{font-size:.9rem!important;display:inline-flex;align-items:center;float:right!important;margin-left:auto!important}}@media (min-width:768px) and (max-width:1199.98px){.menu{word-break:break-all;font-size:1.4rem;float:right!important}}@media (min-width:768px) and (max-width:991.98px){.menu{word-break:break-all;font-size:1.14rem}}.img-fluid{width:100%}@media (min-width:768px) and (max-width:1199.98px){body .fixed-header{position:absolute!important}}@media (min-width:320px) and (max-width:767.98px){body .fixed-header{position:absolute!important}}#imagemodal .modal-content{background-color:transparent;border:0}#imagemodal .modal-content .modal-body{height:100%;padding:0}#imagemodal .modal-dialog{transform:translate(0,0)!important}.body-text{font-size:1.75rem;line-height:1.428}@media (min-width:320px) and (max-width:767.98px){.body-text{font-size:1.375rem}}@media (min-width:992px) and (max-width:1399.98px){.container{max-width:1200px}}.mt5{margin-top:4rem}@media (min-width:320px) and (max-width:767.98px){.mt5{margin-top:2rem}}.p5{padding-left:4rem;padding-right:4rem}@media (min-width:320px) and (max-width:767.98px){.p5{padding-left:1rem;padding-right:1rem}}@media (min-width:768px) and (max-width:991.98px){.p5{padding-left:2rem;padding-right:2rem}}@media (min-width:768px) and (max-width:1199.98px){.p5{padding-left:2rem!important;padding-right:2rem!important}}@media (min-width:992px) and (max-width:1399.98px){.p5{padding-left:0;padding-right:0}}section{padding-top:6rem}section{padding-bottom:6rem}@media (min-width:320px) and (max-width:767.98px){section{padding-top:4rem;padding-bottom:4rem}}.text-link{text-decoration:none!important}.text-black{color:#000!important}.p2{padding-top:2rem;padding-bottom:2rem}.pt-6{padding-top:60px}.blur-up{-webkit-filter:blur(5px);filter:blur(5px)}
    </style>

		<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121565233-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-121565233-1');
		</script> -->
    <!-- This site is running CAOS: Complete Analytics Optimization Suite for Wordpress -->
    <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://ajency.in/wp-content/cache/caos-analytics/analytics.js','ga');
            window[ 'ga-disable-UA-121565233-2' ] = false;
        ga('create', 'UA-121565233-2',
        {
            'cookieName':   'caosLocalGa',
            'cookieDomain': 'ajency.in',
            'cookieExpires':'0',
        });
            ga('send', 'pageview');
    </script>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500|Libre+Baskerville:400,400i" rel="stylesheet">

    <?php if (is_page_template('archive.php') || is_singular('post') || is_page_template('template-blogs.php') || is_page_template('template-fullwidth.php') || is_page_template('template-all_blogs.php')) { ?>
        <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css"/>
    <?php } ?>

    <?php wp_head(); ?>
  </head>

  <body>

  	<nav class="fixed-header position-fixed">
      <div class="container mt5  p5">
        <div class="row ">
            <div class="col-6 col-xl-2 col-sm-3">
              <a href="<?php echo get_site_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/ajency-logo.png" width="157px" class="float-right logo"/>
            </a>
            </div>
            <div class="  offset-sm-5 col-sm-4 offset-xl-8 col-xl-2 col-6">
              <a href="mailto:talktous@ajency.in" class="h4 menu float-left m-0">talktous@ajency.in </a>
            </div>
        </div>
      </div>
    </nav>