<?php if( !defined('ABSPATH') ) exit;?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(''); ?></title>
	<!--[if lt IE 9]>
	  <script src="<?php print get_template_directory_uri();?>/assets/js/ie8/html5shiv.js"></script>
      <script src="<?php print get_template_directory_uri();?>/assets/js/ie8/respond.min.js"></script>
	<![endif]-->	
	<?php wp_head();?>
</head>
<body <?php body_class();?>>
<?php global $videotube;?>
	<div id="header">
		<div class="container-fluid">
			
			<div class="greyBg">
				<div class="row topBar">
					<div class="col-sm-6">
						 D'Art of Science: See More . Do More . Be More
					</div>
					<div class="col-sm-6">
						<div class="topMenu">
							<?php wp_nav_menu( array('menu' => 'top-menu' )); ?>
						</div>
					</div>
				</div>

				<div class="mainLogo"></div>

				<div class="iconMenu">
					<div class="leftIcons">
						<ul>
							<li>
								<a class="shake fun" href="#"><div></div><span>Fun Science</span></a>
							</li>
							<li>
								<a class="shake school" href="#"><div></div><span>School Science</span></a>
							</li>
							<li>
								<a class="shake magic" href="#"><div></div><span>Magic Trick</span></a>
							</li>
							<li>
								<a class="shake innov" href="#"><div></div><span>Innovation</span></a>
							</li>
							<li>
								<a class="shake health" href="#"><div></div><span>Food/Health</span></a>
							</li>
							<li>
								<a class="shake diy" href="#"><div></div><span>DIY</span></a>
							</li>
						</ul>
					</div>
					<div class="rightIcons">
						<ul>
							<li>
								<a class="shake sports" href="#"><div></div><span>Games/Sports</span></a>
							</li>
							<li>
								<a class="shake toys" href="#"><div></div><span>Toys</span></a>
							</li>
							<li>
								<a class="shake eco" href="#"><div></div><span>Eco Friendly</span></a>
							</li>
							<li>
								<a class="shake tv" href="#"><div></div><span>TV Projects</span></a>
							</li>
							<li>
								<a class="shake tips" href="#"><div></div><span>Tips/Hacks</span></a>
							</li>
							<li>
								<a class="shake products" href="#"><div></div><span>Science Products</span></a>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div><!-- /#header -->
	<div id="navigation-wrapper" class="visible-xs">
		<div class="container">
			<div class="navbar-header">
			  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<!-- menu -->
			  	<?php 
			  		if( has_nav_menu('header_main_navigation') ){
				  		wp_nav_menu(array(
				  			'theme_location'=>'header_main_navigation',
				  			'menu_class'=>'nav navbar-nav list-inline menu',
				  			'walker' => new Mars_Walker_Nav_Menu(),
				  			'container'	=>	null
				  		));
			  		}
			  		else{
						?>
			  				<ul class="nav navbar-nav list-inline menu"><li class="active"><a href="<?php print home_url();?>"><?php _e('Home','mars')?></a></li></ul>						
						<?php 			  			
			  		}
			  	?>
			</nav>
		</div>
	</div><!-- /#navigation-wrapper -->	