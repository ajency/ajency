<?php if( !defined('ABSPATH') ) exit;?>
<div class="col-sm-3 sidebar">
	<div class="noticebox">
		<h2>NOTICE BOARD</h2>
		<?php query_posts('cat=14&showposts=1'); ?>
		<?php while (have_posts()) : the_post(); ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<?php the_excerpt(); ?>
		<?php endwhile; ?>
	</div>

	<?php dynamic_sidebar('main-homepage');?>

</div><!-- /.sidebar -->