<?php
get_header();
?>

<div id="columnswrapper" class="columns-1">

<?php get_sidebar(); ?>

<div id="content" class="norightsidebar">
<div class="inner">




<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php include 'includes/variables.php' ?>

<div <?php post_class() ?>    id="post-<?php echo the_ID(); ?>">


<h2><?php echo $name ?></h2>
<h3 class="nocufon"><?php the_title(); ?></h3>

	<?php 
		$arr_sliderimages = get_gallery_images()
	?>	
				
	<!-- loop through images -->	
	<div id="sliderimage">
				<?php if(count($arr_sliderimages) > 1) { ?>
					<div class="imagehover"></div>
				<?php } ?>
	
<?php include 'includes/bannerslarge.php'; ?>
		
		<?php
			$count = 1;
			foreach ($arr_sliderimages as $image) { 
			if($count != 1) {
					$hide = "style='display: none;'";
				}
			
				$resized = timthumb(300, 436, $image, 1);
				
			?>
			<div class="image" <?php echo $hide; ?>>
				<a rel="prettyPhoto[pp_gal]" href="<?php echo $image ?>">
				<img width="436" height="300" alt="Image for <?php echo $name; ?>" src="<?php echo $resized ?>" />
				</a>
				<div class="shadow-large"></div>
			</div>
			
		<?php
		$count = $count + 1;
		} ?>
	</div><!-- end sliderimage -->
	
	
<!-- Videos section.  Will only show up if there are entries in the Video section of a post  -->

<?php

$videoimages = explode("\n", get_post_meta($post->ID, 'video_thumbnail_value', true));
$videourl = explode("\n", get_post_meta($post->ID, 'video_url_value', true));

$count1 = count($videoimages);
$count2 = count($videourl);
?>

<?php 

if ($count1 >= 1 && get_post_meta($post->ID, 'video_thumbnail_value', true) != "" && $count1 == $count2) { ?>
<div id="videos">
<h3><?php echo get_option('wp_heading_videos');  ?></h3>
<?php for ($i=0; $i<count($videoimages); $i++)
	{ 
	$resized = timthumb(62,62,$videoimages[$i], 1);
	?>
		<a href="<?php echo $videourl[$i]; ?>" rel="prettyPhoto" title="Video for <?php echo $name; ?>">
		<img alt="Video for <?php echo $name; ?>" width="62" height="62" src="<?php echo $resized; ?>" />
		</a>
	<?php } ?>

</div><!-- end videos -->
<div class="clear"></div>





<?php
}
?>


<h3><?php the_title(); ?> Vehicle Specification</h3>
<?php if (get_option('wp_demo')== "on") { 
echo "<p>Note: The features below are chosen by clicking checkboxes when you create or edit a Listing. You can choose to categorize the features (shown below) or have a 3 column list of uncategorized features. Choose the mode in Theme Options -> General section.</p>";
}
?>


<?php
$arr_terms = get_the_terms($post->ID, 'features');
if ($arr_terms) {
	if (get_option('wp_features_by_category') == 'Yes') {
		
		echo "<div id='featurecategories'>";
		if ($arr_terms) {
		
		foreach ($arr_terms as $item) {
			if($item->parent == 0) {
			$cat_id = $item->term_id;
			echo "<div class='featuresblock'>";
			echo "<h4>". $item->name . "</h4>";
			
			
			
			echo "<ul>";
			foreach ($arr_terms as $item2) {
			
				if($item2->parent == $cat_id) {
				 echo "<li><a href='". get_term_link($item2, 'features') ."'>". $item2->name . "</a></li>";
				}

			}
			echo "</ul>";
			echo "</div>";
			}
		}
		} 
		echo "</div>";
	} else {
		echo "<div id='threecolumnfeatures'>";
		if (get_the_term_list($post->ID, 'features')) {
			echo get_the_term_list($post->ID, 'features');
			
	}
		echo "</div>";
	}
}
?>

<?php the_content(); ?>

<?php edit_post_link('Edit this page', '<strong>', '</strong>');  ?>

<?php if(get_option('wp_showsociallinks2') == "show") {
	include 'includes/sociallinks.php';
	}
?>


<?php if (get_option('wp_showcontactform') == "show") { ?>
	<div id="listingcontact">
		<h3 id="contact"><?php echo stripslashes(get_option('wp_contactustext')); ?></h3>
		<p><?php echo stripslashes(get_option('wp_contactussubtext')); ?></p>
		<?php //echo do_shortcode(stripslashes(get_option('wp_contactshortcode')));  ?>
		<?php do_action('ove_contact_form',$post);  ?>
	</div><!-- end listing contact -->
<?php } ?>

<script type="text/javascript">
	$(document).ready(function() {
		$("input[name='your-subject']").val('<?php stripslashes(the_title()) ?>');
	});
</script>	

	
<div><a class='top' href='#top'><?php echo get_option('wp_top');  ?></a></div>
	
</div><!-- end post -->

<?php endwhile; else: ?>
<p><strong>This page does not exist. Please try somewhere else.</strong></p>

<?php endif; ?>



</div><!-- end inner -->
</div><!-- end content -->

<?php include 'includes/features.php'; ?>
<?php include 'includes/related.php'; ?>

</div><!-- end columnswrapper -->

<?php get_footer(); ?>
