<?php
get_header();
?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
	<div id="content" class="norightsidebar">
<div class="inner">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 <div <?php post_class() ?>    id="post-<?php echo the_ID(); ?>">
		 
		 
		  <h2 id="title"><?php the_title(); ?></h2>
			<?php include 'includes/postmeta.php'; ?>
		  
		<?php if (get_option('wp_showblogimage') == 'show') { ?> 
		
		<?php $width = get_option('wp_postimagethumbnail_width'); ?>
		<?php $height = get_option('wp_postimagethumbnail_height'); ?>
		
		<?php
		if ( has_post_thumbnail() ) {
			
			the_post_thumbnail('large');
		}  ?>
		
		 <?php } ?>
		

		<?php the_content(); ?>

		<?php //include 'aboutauthor.php'; ?>
		  
		<?php //include 'relatedposts.php'; ?>
		

		
		  
		

		  <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		  <?php edit_post_link('Edit this page', '<strong>', '</strong>');  ?>

			<?php if(get_option('wp_showsociallinks2') == "show") {
				include 'includes/sociallinks.php';
				}
			?>
		  
		  
		  <?php if ($post->comment_status == "open") { ?>
		  <p class="follow-responses-rss">You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.</p>
			<?php comments_template('', true); ?>
		  <?php } ?>

		 
		</div><!-- end post -->	
		
		 <?php endwhile; else: ?>
		  <p><strong>There has been a glitch in the Matrix.</strong><br />
		  There is nothing to see here.</p>
		  <p>Please try somewhere else.</p>
<?php endif; ?>
</div><!-- end inner -->
</div><!-- end content -->
</div><!-- end columnswrapper -->
<?php get_footer(); ?>