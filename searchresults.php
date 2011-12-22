<?php
/*
 * Template Name: Search Results
 */
?>

<?php get_header() ?>

<script type="text/javascript">
$(document).ready(function() {
  remember( '[name=orderdropdown]' );
});
</script>

<div id="columnswrapper" class="columns-1">


<?php get_sidebar() ?>
<div id="content" class="norightsidebar">

<?php include 'includes/search_query.php'; ?>
<div class="inner">
<form>
			<?php 	
				$margincounter = 1;
			?>

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
			<?php include 'includes/variables.php';
				if ($margincounter % 3 == 0) {
					$marginclass = "norightmargin";
					$clear = true;
					} else {
					$marginclass = "";
					$clear = false;
				}
				
				$margincounter++;
			?>
      
	  
			<div class="searchresult <?php echo $marginclass; ?>">
			
			<?php 
			// get first image from list of images
				$arr_sliderimages = get_gallery_images();
				
				$firstimage = $arr_sliderimages[0];
				//echo $firstimage;
				$arr_sliderimages = parse_url($firstimage);
				$resized = timthumb(150, 200, $arr_sliderimages[path], 1);
				
			?>						
			<a href="<?php the_permalink(); ?>"><img class="loader" width="200" height="150" alt="Image for <?php echo $address; ?>" src="<?php echo $resized; ?>" /></a>
			<div class="shadow-small"></div>
			
			<h3 class="vehiclename"><?php echo $name ?></h3>
			<p>
			<span><?php the_title(); ?></span>
			<span class="twofeatures">
				<?php include 'includes/twofeatures.php'; ?>
			</span>
			<span class="price"><?php include 'includes/price.php';  ?></span>
			</p>
			
			
<?php include 'includes/videoandimageicons.php'; ?>
			<p>
			
<?php include 'includes/bannerssmall.php'; ?>
			
			<a class="button" href="<?php the_permalink(); ?>"><?php echo get_option('wp_read_more_text') ?></a>
			<input type="checkbox" name="<?php echo the_id() ?>" /><a class="comparelink" href="#" onclick="return false"><?php echo get_option('wp_compare_text'); ?></a>
			</p> 
			<?php edit_post_link('Edit this entry.'); ?>

        	</div><!-- end searchresult -->
			<?php if ($clear) { ?>
				<div style="clear: both;"></div>
			<?php } ?>
            
            <?php endwhile ?>
		
			<?php else : ?>
            <div>
                   <p><?php echo get_option('wp_noresults');  ?></p>
            </div>
			<?php endif; ?>
			
			<script type="text/javascript">
			$(function() {
				$('.comparelink').click(function() {
					var ids = "";
					var counter = 0;
					var comma = "";
					$('.searchresult input[type=checkbox]').each(function(index) {
						
						if ($(this).attr('checked')) {
						
							if (counter == 0) {
								comma = "";
								} else {
								comma = ",";
								}
								counter = counter + 1;
							
							
							ids = ids + comma + $(this).attr('name');

							
						}

					});
				<?php 
					$comparepage = get_post($wp_comparepageid);
					$slugname = $comparepage -> post_name;
				?>
				
				<?php if (get_option('wp_searchresultspagefix') == "Yes") { 
					$fix = "index.php/";
					} elseif (get_option('wp_searchresultspagefix') == "No") {
					$fix = "";
					} ?>
				
				if (counter > 1) {
					window.location = "<?php bloginfo('url') ?>/<?php echo $fix; ?><?php echo $slugname ?>?compare=" + ids;
				}
				});
				});
			</script>
			
			
			<?php if (!function_exists('wp_pagenavi')) { 
				echo "<p>For advanced pagination, please install the <a href='http://wordpress.org/extend/plugins/wp-pagenavi/'>PageNavi plugin</a>.</p>";
				} else {
				wp_pagenavi(); 
				} ?>
</form>

<form method="get" id="orderresults" name="orderresults">
	<select id="orderdropdown" name="orderdropdown" onChange="document.forms['orderresults'].submit()">
	  <option>Price Descending</option>
	  <option>Price Ascending</option>
	  <option>Date Descending</option>
	  <option>Date Ascending</option>
	  <option>Model Year Descending</option>
	  <option>Model Year Ascending</option>
	  <option>Mileage Descending</option>
	  <option>Mileage Ascending</option>
	</select>
</form>
</div><!-- end inner -->




</div><!-- end content -->		
</div><!-- end content wrapper -->		
		


<?php get_footer() ?>