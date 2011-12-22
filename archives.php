<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div class="wrapper">
<div id="content">

<div class="inner">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2 id="title"><?php the_title(); ?></h2>
			
		<?php the_content(); ?>

		<?php endwhile; endif; ?>

<?php if(get_option('wp_archivesbyyear') == 'show') { ?>
	<h3>Archives by Year:</h3> 
	<ul><?php wp_get_archives('type=yearly'); ?></ul> 
<?php } ?>

<?php if(get_option('wp_archivesbymonth') == 'show') { ?>
	<h3>Archives by Month:</h3> 
	<ul><?php wp_get_archives('type=monthly'); ?></ul> 
<?php } ?>

<?php if(get_option('wp_archivesbyday') == 'show') { ?>
	<h3>Archives by Day:</h3> 
	<ul><?php wp_get_archives('type=daily'); ?></ul> 
<?php } ?>

<?php if(get_option('wp_archivesbycategory') == 'show') { ?>
	<h3>Archives by Category:</h3> 
	<ul><?php wp_list_categories('title_li='); ?></ul> 
<?php } ?>

<?php if(get_option('wp_archivesbyauthor') == "show") { ?>
	<h3>Archives by Author:</h3> 
	<ul><?php wp_list_authors(); ?></ul> 
<?php } ?>

<?php if(get_option('wp_archivesallpages') == 'show') { ?>
	<h3>All Pages:</h3> 
	<ul><?php wp_list_pages('title_li='); ?></ul>
<?php } ?>

<?php if(get_option('wp_archivesbytag') == "show") { ?>
	<h3>Archives by Tag:</h3> 
	<?php wp_tag_cloud(); ?> 
<?php } ?>

</div><!-- end inner -->
</div><!-- end content -->
<?php get_sidebar(); ?>
</div><!-- end wrapper -->
<?php get_footer(); ?>






