
<?php 

	$subheader_style = get_post_meta($post->ID,'dt_subheader_select',true);
	$bg_type = get_post_meta($post->ID,'dt_bg_type',true);
	$subheader_img = get_post_meta($post->ID,'dt_subheader_img',true);
	$subheader_color = get_post_meta($post->ID,'dt_subheader_color',true);
	if(!empty($subheader_img)) {
		$bg_image = aq_resize( $subheader_img['url'], 1920, 180, true );	
	}
?>
	<div class="top-shadow"></div>
	<?php if($subheader_style == 'style-0') { ?>
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
	
	if($subheader_style == 'style-1') { ?>
		<section class="page-title" <?php  if(strlen($subheader_color) == '7') { ?> style="background: <?php echo $subheader_color; ?> !important;" <?php } ?>>
			<div class="page-background">
			<?php
				if($bg_type == 'image') { ?>
					<img class="subheader-bg" src="<?php echo esc_url($bg_image); ?>" alt="" />
				<?php } else
				if($bg_type == 'pattern') { ?>
					<div style="background: url('<?php echo esc_url($subheader_img['url']);  ?>') repeat scroll 0 0; height: 180px"></div>
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
	if($subheader_style == 'style-2') { ?>
	
	<section id="image-subheader" <?php  if(strlen($subheader_color) == '7') { ?> style="background: <?php echo $subheader_color; ?> !important;" <?php } ?>> 
		<div class="bottom-shadow"></div>	
		<?php
			if($bg_type == 'image') { ?>
				<img class="subheader-bg" src="<?php echo esc_url($bg_image); ?>" alt="" />
			<?php } else
			if($bg_type == 'pattern') { ?>
				<div style="background: url('<?php echo esc_url($subheader_img['url']);  ?>') repeat scroll 0 0; height: 100%; width: 100%; position: absolute;"></div>
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
	if($subheader_style == 'style-3') { ?>
		<section id="formal-subheader" <?php  if(strlen($subheader_color) == '7') { ?> style="background: <?php echo $subheader_color; ?> !important;" <?php } ?>>
			<div class="bottom-shadow"></div>	
			
		<?php
			if($bg_type == 'image') { ?>
				<img class="subheader-bg" src="<?php echo esc_url($bg_image); ?>" alt="" />
			<?php } else
			if($bg_type == 'pattern') { ?>
				<div style="background: url('<?php echo esc_url($subheader_img['url']);  ?>') repeat scroll 0 0; height: 100%; width: 100%; position: absolute;"></div>
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
	<?php } ?>