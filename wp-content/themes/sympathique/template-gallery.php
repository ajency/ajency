<?php
/*
 Template Name: Gallery
*/
?>

<?php get_header(); ?>

	<?php get_template_part( 'includes/subheader' ); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="centered-wrapper">
		<section>
			<article id="page-<?php the_ID(); ?>" class="begin-content">
				<section id="template-gallery">
					<?php the_content(); ?>
					
					<ul class="gallery-page">
						<?php    
						//get attachment count
						$get_attachments = get_children( array( 'post_parent' => $post->ID ) );
						$attachments_count = count( $get_attachments );	
						
						//attachment loop
						$args = array(
							'post_type' => 'attachment',
							'orderby' => 'menu_order',								
							'post_parent' => get_the_ID(),
							'post_mime_type' => 'image',
							'post_status' => null,
							'posts_per_page' => -1
						);
						$attachments = get_posts($args);
						
						//start loop
						foreach ($attachments as $attachment) :
							
							//get images						
							$full_img = wp_get_attachment_image_src( $attachment->ID, 'full-size');
							$gallery_thumbnail = wp_get_attachment_image_src( $attachment->ID, 'gallery-thumb');
						?>
							<li>
								<a href="<?php echo $full_img[0]; ?>" rel="prettyPhoto[pp_gal]" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
									<span class="item-on-hover"><span class="hover-image"></span></span>
									<img src="<?php echo $gallery_thumbnail[0]; ?>" width="<?php echo $gallery_thumbnail[1]; ?>" height="<?php echo $gallery_thumbnail[2]; ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" />
								</a>	
							</li>
						<?php endforeach; ?>
					</ul>
					
					
				</section>
			</article>
		</section>

	<?php endwhile; ?>

	<?php endif; ?>

	</div><!--end centered-wrapper-->

<?php get_footer(); ?>