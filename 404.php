<?php get_header(); ?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
<div id="content" class="norightsidebar">
<div class="inner">
<h2>Error 404 - Not Found</h2>
<p>The page you are trying to reach cannot be found.</p>


<h3>Categories</h3>
<ul>
<?php wp_list_categories('title_li=') ?>
</ul>

<h3>Pages</h3>
<ul>
<?php wp_list_pages('title_li=') ?>
</ul>

<h3>Archives</h3>
<h4>By year</h4>
<ul><?php wp_get_archives('type=yearly'); ?></ul> 

<h4>By month</h4>
<ul><?php wp_get_archives('type=monthly'); ?></ul>

<h4>By day</h4>
<ul><?php wp_get_archives('type=daily'); ?></ul>

<h4>By author</h4>
<ul><?php wp_list_authors(); ?></ul> 

<h4>By tag</h4>
<?php wp_tag_cloud(); ?> 



</div><!-- end inner -->
</div><!-- end content -->

</div><!-- end wrapper -->
<?php get_footer(); ?>