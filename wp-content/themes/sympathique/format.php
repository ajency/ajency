<?php
/**
 * The template for displaying posts in the Standard post format.
 *
 * @package WordPress
 * @subpackage Sympathique
 *
 */
 
	$time = get_the_time(get_option('date_format'));
	
	global $thumbnail_class;
	global $content_class;
	
	$standard_post_data = get_post_meta($post->ID,'dt_standard_select',true);
?>

<?php get_template_part( 'includes/article', 'tag' ); ?>

	<?php if ( has_post_thumbnail() ) { 	
			if (($standard_post_data != 'selectkey2') && (!is_single())) { ?>
				<div class="<?php if(!empty($thumbnail_class)) { echo $thumbnail_class; } else echo "masonry-thumbnail"; ?>">
					<a href="<?php the_permalink(); ?>">
						<span class="item-on-hover"><span class="hover-link"></span></span>
						<?php the_post_thumbnail('blog-thumb'); ?>
					</a>
				</div><!--end post-thumbnail-->		
			<?php } else 
			if (is_single()) { ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<span class="item-on-hover"><span class="hover-link"></span></span>
						<?php the_post_thumbnail('blog-thumb'); ?>
					</a>
				</div><!--end post-thumbnail-->	
			<?php }
			} ?>

	<div class="<?php if(!empty($content_class)) { echo $content_class; } else echo "masonry-page-content"; ?>">
		<span class="masonry-post-meta">
		<?php echo $time. ' / ' . dt_categories($post->ID) ; 
		comments_popup_link(esc_html__('No Comments &raquo;', 'delicious'), esc_html__('1 Comment &raquo;', 'delicious'), __('% Comments &raquo;', 'delicious')); ?>
		</span>
		
		<i class="icon-pencil fa fa-pencil"></i>					
		<div class="clear"></div>
		
		<?php if (!is_single()) { ?>
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php } ?>
								
		<?php  
			global $more; 
			if(!is_single()) { $more = 0; }
			the_content(esc_html__('Read More', 'delicious')); ?> 
			
			<?php wp_link_pages('before=<div class="page-links">Pages: &after=</div>'); ?>
	</div><!--end post-content-->
	
</article><!-- #post -->