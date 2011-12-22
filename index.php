<?php

get_header(); ?>


<?php include 'includes/slider.php' ?>

	<div id="columnswrapper">

	<div id="intro">
		<div class="inner">
			<h2><?php echo stripslashes(get_option('wp_introheading')) ?></h2>
			<div id="introcontent">

				
				<?php if (trim(get_option('wp_introimage')) ) { ?>
				<div id="introimage">
					<img class="alignleft" alt="intro image" src="<?php echo get_option('wp_introimage') ?>" />
					<?php if (get_option('wp_introcaption')) { ?>
						<p id="introcaption"><?php echo get_option('wp_introcaption'); ?></p>
					<?php } ?>
				</div><!-- end introimage -->
				<?php } ?>
				
				
				
				
								<?php if (get_option('wp_demo')== "on") { ?>
				<form id="colorschemechanger" action="">
				<h3>Color Scheme</h3>
				  <div class="form-item"><label for="color">Color:</label><input type="text" id="color" name="color" value="#123456" /></div><div id="picker"></div>
				  <p><a class="button" href="#">Change Scheme</a></p>
				  <p><a href="#" id="resetcolorscheme">Reset to default</a></p>
				</form>
				<?php } ?>
				
<?php echo stripslashes(get_option('wp_introtext')) ?>


			</div><!-- end introcontent -->

			
		</div><!-- end inner -->
	</div><!-- end intro -->	
	

	
	<div id="latestlistings">
		<div class="inner">

		
			
			<?php $recent = new WP_Query('post_type=listing&post_status=publish&posts_per_page='.get_option('wp_recentlistingsnumber_home')); ?>

			<h3><?php echo get_option('wp_heading_latestlistings') ?></h3>


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
			<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Under Slideshow 1') ) { ?>
			<?php } ?>
			<?php } ?>
		
		
		</div><!-- end inner -->
	</div><!-- end latest -->
	
	
		<div id="homerightcolumn">
			<div class="inner">
			<?php if (get_option('wp_recentlistings1') == "show") {
				include 'includes/listofnewautos.php';
			} ?>
			
			<?php if(get_option('wp_widgets') == "show") { ?>
			<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Under Slideshow 2') ) { ?>
			<?php } ?>
			<?php } ?>
			
			<?php if (get_option('wp_loancalculator1') == "show") { ?>			
				<?php include 'includes/loancalculator.php'; ?>	
			<?php } ?>
			

			

			
			</div><!-- end inner -->
		</div><!-- end homerightcolumn -->
	
	
	
	
	
	
	</div><!-- end columnswrapper -->


	

	

	
	
<?php //include 'sidebar-right.php' ?>



<?php get_footer(); ?>
