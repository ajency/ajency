<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package WordPress
 * @subpackage Sympathique
 *
 */
	global $content_class;	
	
	$time = get_the_time(get_option('date_format'));
	$link_post_data = get_post_meta($post->ID,'dt_link_block',true);
	$link_post_target = get_post_meta($post->ID,'dt_link_radio',true);
	$link_post_relationship = get_post_meta($post->ID,'dt_link_relationship',true);
?>

<?php get_template_part( 'includes/article', 'tag' ); ?>

	<div class="<?php if(!empty($content_class)) { echo $content_class; } else echo "masonry-page-content"; ?>">
		<span class="masonry-post-meta">
		<?php echo $time; ?>
		</span>
		
		<i class="icon-link fa fa-link"></i>					
		<div class="clear"></div>

		<h1><a href="<?php echo esc_url($link_post_data); ?>"  rel="<?php echo esc_attr($link_post_relationship); ?>"  title="<?php the_title_attribute(); ?>" target="_<?php echo $link_post_target; ?>" ><?php the_title(); ?></a></h1>
	
	</div><!--end post-content-->
	
</article><!-- #post -->