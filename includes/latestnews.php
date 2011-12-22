<h3><?php echo get_option('wp_latestposts') ?></h3>
<?php 
$show = get_option('wp_quantity_latestposts');
?>
<?php
	$recentposts = new WP_Query('post_type=listing&showposts='.$show);
	?>
	<ul>
	<?php
	while($recentposts->have_posts()) : $recentposts->the_post();
		$wp_query->in_the_loop = true;
	?>	

	<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
	
<?php endwhile; ?>	
</ul>


