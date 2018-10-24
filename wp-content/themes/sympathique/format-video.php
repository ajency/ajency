<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage Sympathique
 *
 */
	global $content_class;	
	
	$time = get_the_time(get_option('date_format'));
	
?>

<?php get_template_part( 'includes/article', 'tag' ); ?>

	<?php delicious_video($post->ID); ?>
	
	<div class="<?php if(!empty($content_class)) { echo $content_class; } else echo "masonry-page-content"; ?>">		
	
		<span class="masonry-post-meta">
		<?php echo $time. ' / ' . dt_categories($post->ID) ; 
		comments_popup_link(esc_html__('No Comments &raquo;', 'delicious'), esc_html__('1 Comment &raquo;', 'delicious'), esc_html__('% Comments &raquo;', 'delicious')); ?>
		</span>
		
		<i class="icon-facetime-video fa fa-video-camera"></i>					
		<div class="clear"></div>

		<?php if (!is_single()) { ?>
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php } ?>

		<?php if(is_single()) { ?> <div class="half-space"></div> <?php } ?>
		
			<?php 
			global $more; 
			if(!is_single()) { $more = 0; }
			the_content(esc_html__('Read More', 'delicious')); ?> 

	</div><!--end post-content-->
</article><!-- #post -->