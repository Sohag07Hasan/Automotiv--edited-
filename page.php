<?php
 
get_header(); 
?>


<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
	<div id="content" class="norightsidebar">
		<div class="inner">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> class="post" id="post-<?php the_ID(); ?>">
		<h2 id="title"><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
		
		
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div><!-- end inner -->
	</div><!-- end content -->
</div><!-- end columnswrapper -->


<?php get_footer(); ?>
