<div id="sidebar-left">
<div class="inner">

<div id="customsearch">
<div class="inner">
	<h3><?php echo get_option('wp_heading_customsearch'); ?></h3>
	<?php include 'includes/customsearchform.php' ?>
</div><!-- end inner -->
</div><!-- end customsearch -->

<div id="relatedcontainer"></div>

<div class="sidebarwidget">
<?php if (get_option('wp_recentlistings2') == "show") {
	include 'includes/listofnewautos.php';
} ?>
</div>

<?php if (get_option('wp_loancalculator2') == "show") { 
include 'includes/loancalculator.php';
} ?>


<?php if(get_option('wp_widgets') == "show") { ?>
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) { ?>
<?php } ?>
<?php } ?>

</div><!-- end inner -->
</div><!-- end sidebar -->



