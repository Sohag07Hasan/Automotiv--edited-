<?php

get_header(); ?>


<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
	<div id="content" class="norightsidebar">
<div class="inner">

	<?php if (have_posts()) : ?>

		<h2 id="title">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h3>
			<?php the_excerpt() ?>
			<a class="readmore inline" href="<?php the_permalink() ?>">Read more >></a>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 id="title">No posts found</h2>
		<h3>Try a different search?</h3>

	<?php endif; ?>

</div><!-- end inner -->
</div><!-- end content -->
<?php get_sidebar(); ?>
</div><!-- end columns wrapper -->
<?php get_footer(); ?>














