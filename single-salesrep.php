<?php
get_header();
?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
	<div id="content" class="norightsidebar">
<div class="inner">

<?php if (have_posts()) : while (have_posts()) : the_post(); 
include 'includes/variables.php';

?>

		<div <?php post_class() ?>  id="post-<?php echo the_ID(); ?>">
		<?php $salesrepname = get_the_title(); ?>
		
    	<h2 id="title"><?php the_title(); ?></h2>
		  
		<div class="salesrepresults">
		
		<div id="salesrepbox">
		
			<?php $arr_sliderimages = get_gallery_images();
			if ($arr_sliderimages) { ?>
				<?php $resized = timthumb(150, 120, $arr_sliderimages[0], 1); ?>
				<img class="alignleft" width="120" height="150" alt="" src="<?php echo $resized ?>" />
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
				</p>
		</div>
		</div>
		  
		  
			
		<?php the_content(); ?>

		  


		</div><!-- end post -->	
		
		 <?php endwhile; else: ?>
<?php endif; ?>
<?php if(get_option('wp_showsociallinks2') == "show") {
	include 'includes/sociallinks.php';
	}
?>
<?php edit_post_link('Edit this page', '<strong>', '</strong>');  ?>






</div><!-- end inner -->
</div><!-- end content -->
</div><!-- end columnswrapper -->
<?php get_footer(); ?>