<?php get_header(); ?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
<div id="content" class="norightsidebar">
<div class="inner">

<?php is_tag(); ?>
 <?php if (have_posts()) : ?>

  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php /* If this is a category archive */ if (is_category()) { ?>
   <h2 id="title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
   <h2 id="title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
   <h2 id="title">Archive for <?php the_time('F jS, Y'); ?></h2>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
   <h2 id="title">Archive for <?php the_time('F, Y'); ?></h2>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
   <h2 id="title">Archive for <?php the_time('Y'); ?></h2>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
   <h2 id="title">Author Archive</h2>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
   <h2 id="title">Blog Archives</h2>
  <?php } ?>

 <?php while (have_posts()) : the_post(); ?>
 <div class="post">
 
<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

  
<?php include 'includes/postmeta.php'; ?>

  <?php the_excerpt() ?>
  <a class="readmore inline" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More >></a>
  
  <div id="postmeta">
   <?php edit_post_link('Edit', '', ''); ?>
  </div><!-- end #postmeta -->

 </div><!-- end #post -->

 <?php endwhile; ?>

<div id="posts_navigation">
	<span id="nextlink"><?php next_posts_link('&laquo; Older Entries') ?></span>
	<span id="previouslink"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
</div>
 
<?php else : ?>

 <h2>Not Found</h2>
 <p>Try using the search form below</p>
 <?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php endif; ?>

</div><!-- end inner -->
</div><!-- end content -->

</div><!-- end columns wrapper -->
<?php get_footer(); ?> 