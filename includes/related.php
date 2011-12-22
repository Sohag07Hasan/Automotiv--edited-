<?php if (get_option('wp_showrelated') == "show") { ?>
<div id="related">

<?php include 'variables.php'; 
$currentlisting_bodytype = $body_type; 
$currentlisting_postid = $post->ID;
?>	


<?php 
$postsperpage = get_option('wp_relatedlistingsnumber');
$listings = new WP_Query('post_type=listing'); 
$counter = 1;
?>

<?php if ($listings->have_posts()) : 
echo "<h3 id='relatedheading'>" . get_option('wp_related_text')  . "</h3>";

while ($listings->have_posts()) : $listings->the_post(); 
include 'variables.php';
$alllistings_bodytype = $body_type;
$alllistings_postid = $post->ID;

?>

<?php if($alllistings_bodytype == $currentlisting_bodytype) { ?>

		<?php if ($currentlisting_postid != $alllistings_postid) { ?>
			
			<?php if($counter <= $postsperpage) { ?>
			<?php $counter = $counter + 1; ?>
      
			<div class="relatedresult">
			
			<?php 
			// get first image from list of images
				$arr_sliderimages = get_gallery_images();
				
				$firstimage = $arr_sliderimages[0];
				//echo $firstimage;
				$arr_sliderimages = parse_url($firstimage);
				$resized = timthumb(120, 190, $arr_sliderimages[path], 1);
				
			?>						
			<a href="<?php the_permalink(); ?>"><img class="loader" width="190" height="120" alt="Image for <?php echo $address; ?>" src="<?php echo $resized; ?>" /></a>
			<div class="shadow-small"></div>
			
			<h4 class="vehiclename"><?php echo $name ?></h4>
			<p>
			<span class="twofeatures">
				<?php include 'twofeatures.php'; ?>
			</span>
			<span> &bull; <?php include 'price.php';  ?></span>
			</p>
			
			
        	</div>
			
	<?php } ?>
	<?php } ?>
	<?php } ?>
	
            
            <?php endwhile ?>
			
			<?php if ($counter == 1) { ?>
			<script type="text/javascript">
				$('#relatedheading').addClass('hide');
			</script>
			
			<?php } ?>
		
			<?php else : ?>
            <div>
                   <p><?php echo get_option('wp_noresults');  ?></p>
            </div>
			<?php endif; ?>
</div>
<?php } ?>
