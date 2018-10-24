<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package WordPress
 * @subpackage Sympathique
 *
 */
	global $content_class;	
	
	$time = get_the_time(get_option('date_format'));
	$quote_post_data = get_post_meta($post->ID,'dt_quote_block',true);
	$quote_post_author = get_post_meta($post->ID,'dt_quote_author',true);
?>

<?php get_template_part( 'includes/article', 'tag' ); ?>

	<div class="<?php if(!empty($content_class)) { echo $content_class; } else echo "masonry-page-content"; ?>">
		<span class="masonry-post-meta">
		<?php echo $time; ?>
		</span>
		
		<i class="icon-quote-left fa fa-quote-left"></i>					
		<div class="clear"></div>
		<blockquote class="masonry-excerpt"><?php echo wp_kses_post($quote_post_data); ?></blockquote>
		<h4 class="quote-author">- <?php echo esc_html($quote_post_author); ?></h4>
	
	</div><!--end post-content-->
	
</article><!-- #post -->