<?php 

/*
	Template Name: Sales Reps
*/ 

?>


<?php get_header() ?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar() ?>
<div id="content" class="norightsidebar">
<div class="inner">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class() ?> class="post" id="post-<?php the_ID(); ?>">
		<h2 id="title"><?php the_title(); ?></h2>
			<div class="salesrepcontent">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; endif; 
		wp_reset_query(); 
		?>
		
<?php 
$salesrep = new WP_Query('post_type=salesrep&posts_per_page=-1&orderby=meta_value_num&meta_key=salesreporder_value&order=ASC');
?>




<?php if ($salesrep->have_posts()) : while ($salesrep->have_posts()) : $salesrep->the_post(); 
include 'includes/variables.php';
?>
		


	
	<div class="salesrepresults">
	<h3 class="salesrep"><?php the_title() ?></h3>
	<div id="salesrepbox">
	
	
		<?php $arr_sliderimages = get_gallery_images();
		if ($arr_sliderimages) { ?>
			<?php $resized = timthumb(130, 100, $arr_sliderimages[0], 1); ?>
			<img class="alignleft" width="100" height="130" alt="" src="<?php echo $resized ?>" />
		<?php } ?>
		
			<p>
				<?php if ($salesreptitle) { ?>
					<strong><?php echo $salesreptitle ?></strong><br />
				<?php } ?>
				
				<?php if ($salesrepemail) { ?>
					<a href="mailto:<?php echo $salesrepemail ?>">Email</a><br />
				<?php } ?>
				
				<?php if($salesrepphoneoffice) { ?>
					<?php echo "Office: " . $salesrepphoneoffice ?><br />
				<?php } ?>
				
				<?php if($salesrepphonemobile) { ?>
					<?php echo "Mobile: " . $salesrepphonemobile ?><br />
				<?php } ?>
				
				<?php if($salesrepfax) { ?>
					<?php echo "Fax: " . $salesrepfax ?><br />
				<?php } ?>
				<strong><a href="<?php the_permalink() ?>">Details >></a></strong>
				
			</p>
	</div>		
	</div>
	
	
<?php endwhile; else: ?>
<p><strong>There are no items to display.  You need to add at least one Property Listing post.</strong></p>

<?php endif; 
wp_reset_query(); ?> 



			


</div><!-- end inner -->
</div><!-- end content -->		
</div><!-- end content wrapper -->		
			
<?php get_footer() ?>