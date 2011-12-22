<?php

get_header(); 

$catid = get_query_var('cat');
$cat = &get_category($catid);
$parent = $cat->category_parent;
?>
<div id="columnswrapper" class="columns-1">
<?php get_sidebar() ?>

<div id="content" class="norightsidebar">
<div class="inner">


<?php 
$catid = get_query_var('cat');
$cat = &get_category($catid);
$parent = $cat->category_parent;
?>


<h2 id="title"><?php echo get_cat_name($catid) ?></h2>

<div id="newsitems">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

<h3 class="clearleft"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php include 'includes/postmeta.php'; ?>

<?php $width = get_option('wp_postimagethumbnail_width'); ?>
<?php $height = get_option('wp_postimagethumbnail_height'); ?>

<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail(array($width, $height));
}
?>

<?php the_excerpt(); ?>

<a class="readmore inline" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More >></a>
</div><!-- end post -->

<?php endwhile ?>

<div id="posts_navigation">
<span id="nextlink"><?php next_posts_link('&laquo; Older Entries') ?></span>
<span id="previouslink"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
</div>


<?php else : ?>
<p class="center">There are no posts in this category yet.  Please check back soon.</p>
<?php endif ?>

</div><!-- end newsitems -->



</div><!-- end inner -->
</div><!-- end content -->


</div><!-- end columnswrapper -->



<?php get_footer(); ?>
