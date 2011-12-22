<div id="sidebar-right">
<div class="inner">

<?php $recent = new WP_Query('post_type=listing&posts_per_page='.get_option('wp_recentlistingsnumber_home')); ?>

			<h3><?php echo get_option('wp_heading_recentlistings') ?></h3>


			<?php if ($recent->have_posts()) : while ($recent->have_posts()) : $recent->the_post(); ?>
			<?php include 'includes/variables.php' ?>
			<div class="latestlisting">
			<?php 
				$arr_sliderimages = get_gallery_images();
				$resized = timthumb (100, 200, $arr_sliderimages[0], 1);
			?>	


			<a href="<?php the_permalink(); ?>"><img width="200" height="100" alt="Image for <?php echo $address; ?>" src="<?php echo $resized ?>" /></a>
			<div class="shadow-small"></div>
				
<?php include 'includes/bannerssmall.php'; ?>
			
			<?php include 'includes/videoandimageicons.php'; ?>
						
			<ul>
			<li class="vehiclename"><a href="<?php the_permalink(); ?>"><?php echo $name ?></a></li>
			<li class="vehiclename2"><?php the_title(); ?></li>
			<li class="twofeatures">
				<?php include 'includes/twofeatures.php'; ?>
			</li>

			
			<li class="price"><?php include 'includes/price.php';  ?></li>
			</ul>
			&nbsp;
			</div><!-- end latestlisting -->

			<?php endwhile; else: ?>
			<p><strong>There are no items to display.  You need to add at least one Automobile Listing post.</strong></p>
			<?php endif; 
			wp_reset_query(); ?> 
			
			
<?php if(get_option('wp_widgets') == "show") { ?>
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) { ?>
<?php } ?>
<?php } ?>

</div><!-- end inner -->
</div><!-- end sidebar -->



