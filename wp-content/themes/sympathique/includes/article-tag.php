<?php
	global $dt_template_blog;
	global $thumbnail_class;
	global $content_class;
	
	$content_class= '';
	$dt_post_class ='';
	$thumbnail_class = '';
	
	if(($dt_template_blog === 'masonry-3-cols') || ($dt_template_blog === 'masonry-2-cols')) {
		$dt_post_class='masonry-post';
		$thumbnail_class = 'masonry-thumbnail';
		$content_class = 'masonry-page-content';
	}
	else if(($dt_template_blog == 'sidebar-right') || ($dt_template_blog == 'sidebar-left') || (is_single() == true) || (is_home())) {
		$dt_post_class='post-item';
		$thumbnail_class = 'post-thumbnail';
		$content_class = 'post-content';
	}
?>
	<article <?php if(!empty($dt_post_class)) { post_class($dt_post_class); } else post_class('masonry-post'); ?> id="post-<?php the_ID(); ?>">
