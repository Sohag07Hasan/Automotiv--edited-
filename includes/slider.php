<div id="slider">

<?php if(get_option('wp_slideshoworder') == "Random") {
	$orderparameters = "&orderby=rand";
	} elseif (get_option('wp_slideshoworder') == "Listing ID - Ascending") {
	$orderparameters = "&orderby=ID&order=ASC";
	} else { 
	$orderparameters = "&orderby=ID&order=DESC";	
	} 
	if (get_option('wp_slideshowsource') == "Recent Listings") {
		$posts = new WP_Query('post_type=listing&post_status=publish&meta_key=slideshow_value&meta_value=Yes&posts_per_page='.get_option('wp_slideshownumber').$orderparameters);
		} else {
		$posts = new WP_Query('post_type=photoslideshow&post_status=publish&posts_per_page='.get_option('wp_slideshownumber').$orderparameters);
		}
?>

<div class="images"> 
<?php 
$count = 1;
if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); ?>
<?php include 'variables.php' ?>

<?php if($count != 1) { 
	$hide = "style='display: none;'";
} ?>


 <div class="slide"><!-- slide --> 
 

		<?php if (get_option('wp_slideshowsource') == "Recent Listings") { ?>
 		<div class="slidertext" <?php echo $hide; ?>>
			<div class="slidertext_inner">
			
				<h2><?php echo $name ?></h2>
				
				<ul>
				

				<li class="twofeatures">
					<?php include 'twofeatures.php'; ?>
				</li>

				
				<li class="price"><?php include 'price.php';  ?></li>
				</ul>

                
				<a class="button" href="<?php the_permalink() ?>"><?php echo get_option('wp_read_more_text') ?></a>
			</div><!-- end inner -->
		</div><!-- end slidertext -->
		<?php } ?>
		
		
		<div class="sliderimage">
			<?php 
				
				$arr_sliderimages = get_gallery_images();
				
				if (get_option('wp_slideshowsource') == "Recent Listings") {
				$w = 460;
				} else {
				$w = 720;
				}
				
				$resized = timthumb(270, $w, $arr_sliderimages[0], 1);
			
			 ?>
<?php include 'bannerslarge.php'; ?>
				
				
			<?php if (get_option('wp_slideshowsource') == "Recent Listings") { ?>
				<img alt="" class="sliderborder" src="<?php bloginfo('template_url') ?>/images/sliderborder.png" />
			<?php } else { ?>
				<a href="<?php echo $slideshow_url; ?>"><img alt="" class="sliderborder" src="<?php bloginfo('template_url') ?>/images/sliderborder.png" /></a>
			<?php } ?>
				
			
			
			
			
			
			<?php if (get_option('wp_slideshowsource') == "Recent Listings") { ?>
				<div class="faderight"></div>
			<?php } ?>
			
			<img class="slideshowimage" width="<?php echo $w ?>" height="270" alt="Image for <?php echo $address; ?>" src="<?php echo $resized; ?>" />
		</div><!-- end sliderimage -->	
 
		
</div> <!-- end slide -->
<?php $count = $count + 1; ?>

<?php endwhile; else: ?>
<p><strong>There are no items to display.  You need to add at least one Automobile Listing post.</strong></p>

<?php endif; 
wp_reset_query(); ?> 
</div><!-- end images -->

</div><!-- end slider -->


<div id="customsearch">
<div class="inner">
	<h3><?php echo get_option('wp_heading_customsearch'); ?></h3>
	<?php include 'customsearchform.php' ?>
</div><!-- end inner -->
</div><!-- end sidebarwidget -->




