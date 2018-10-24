<?php global $smof_data; //get theme options ?>

<?php 

	$dt_subheader_style = get_post_meta($post->ID,'dt_subheader_select',true);

	if((strlen($dt_subheader_style) != 0) && ($dt_subheader_style != 'no-style')) {
		get_template_part( 'includes/subheader', 'page' );
	}
	
	else {

		if(!empty($smof_data['subheader_img'])) {
			$bg_image = aq_resize( $smof_data['subheader_img'], 1920, 180, true );	
		}
		else {
			$bg_image = get_template_directory_uri() . '/images/bg/bg22.png';
		}
		
		if(isset($smof_data['subheader_color'])) {
			if(strlen($smof_data['subheader_color']) != 7 ) {	
				$smof_data['subheader_color'] = '#fafafa';
			}
		}

		?>
		<div class="top-shadow"></div>
		<?php if($smof_data['subheader_select'] == 'style-0') { ?>
			<div id="regular-subheader">	
				<div class="centered-wrapper">
					<div class="block-title">
						<?php get_template_part( 'includes/page', 'title' ); ?>				
						<div class="theme-breadcrumbs">
							<?php if(function_exists('dt_breadcrumbs')) {
								dt_breadcrumbs();
							}
							?>
						</div>
					</div>					
				</div>	
			</div>
		<?php } else
		
		if($smof_data['subheader_select'] == 'style-1') { ?>
			<section class="page-title" style="background: <?php if(isset($smof_data['subheader_color'])) { echo $smof_data['subheader_color']; } else echo '#fafafa'; ?> !important;">
				<div class="page-background">
				<?php
					if($smof_data['bg_type'] == 'image') { ?>
						<img class="subheader-bg" src="<?php echo esc_url($bg_image); ?>" alt="" />
					<?php } else
					if($smof_data['bg_type'] == 'pattern') { ?>
						<div style="background: url('<?php echo esc_url($bg_image);  ?>') repeat scroll 0 0; height: 180px"></div>
					<?php } ?>
				</div>
				<div class="bottom-shadow"></div>
				<div class="title-wrapper">
					<div class="title-bg">
						<div class="title-content">
							<?php get_template_part( 'includes/page', 'title' ); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</section>
		<?php
		} else 
		if($smof_data['subheader_select'] == 'style-2') { ?>
		
		<section id="image-subheader" style="background: <?php echo $smof_data['subheader_color']; ?> !important;">
			<div class="bottom-shadow"></div>	
			<?php
				if($smof_data['bg_type'] == 'image') { ?>
					<img class="subheader-bg" src="<?php echo esc_url($bg_image); ?>" alt="" />
				<?php } else
				if($smof_data['bg_type'] == 'pattern') { ?>
					<div style="background: url('<?php echo esc_url($bg_image);  ?>') repeat scroll 0 0; height: 100%; width: 100%; position: absolute;"></div>
				<?php } ?>
			<div class="centered-wrapper">
				<div class="block-title">
					<?php get_template_part( 'includes/page', 'title' ); ?>				
					<div class="theme-breadcrumbs">
						<?php if(function_exists('dt_breadcrumbs')) {
							if(!is_front_page()) {
								echo '<div class="you-here">';
								_e('You are here: ', 'delicious'); 
								echo '</div>';
							}
							dt_breadcrumbs();
						}
						?>
					</div>
				</div>					
			</div>	
		</section>
		<?php } else 
		if($smof_data['subheader_select'] == 'style-3') { ?>
			<section id="formal-subheader" style="background: <?php echo $smof_data['subheader_color']; ?> !important;">
				<div class="bottom-shadow"></div>	
				
			<?php
				if($smof_data['bg_type'] == 'image') { ?>
					<img class="subheader-bg" src="<?php echo esc_url($bg_image); ?>" alt="" />
				<?php } else
				if($smof_data['bg_type'] == 'pattern') { ?>
					<div style="background: url('<?php echo esc_url($bg_image);  ?>') repeat scroll 0 0; height: 100%; width: 100%; position: absolute;"></div>
				<?php } ?>
				
				<div class="formal-content centered-wrapper">
					<div class="left-area">
						<?php get_template_part( 'includes/page', 'title' ); ?>
					</div>
					<div class="theme-breadcrumbs">
						<?php if(function_exists('dt_breadcrumbs')) {
							dt_breadcrumbs();
						}
						?>
					</div>
				</div>
			</section>
		<?php }
	}
?>