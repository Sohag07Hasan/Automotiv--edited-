<?php
/*
Template Name: Site Map
*/
?>


<?php get_header(); ?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
	<div id="content" class="twosidebars">
<div class="inner">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2 id="title"><?php the_title(); ?></h2>
	
<?php the_content(); ?>

<?php endwhile; endif; ?>


<h3>Categories</h3>
<ul>
<?php wp_list_categories('title_li=') ?>
</ul>

<h3>Pages</h3>
<ul>
<?php wp_list_pages('title_li=') ?>
</ul>

<h3>Miscellaneous</h3>
<ul>
<li><a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Login</a></li>
<li><a href="<?php bloginfo('rss2_url'); ?>">Full RSS feed</a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Full RSS comments</a></li>
<li><a href="http://www.wordpress.org">Wordpress site</a></li>
</ul>

</div><!-- end inner -->
</div><!-- end content -->
<?php include 'sidebar-right.php' ?>
</div><!-- end column wrapper -->
<?php get_footer(); ?>