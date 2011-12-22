<?php 

/*
	Template Name: Compare
*/ 

?>

<?php $listofids = $_GET["compare"]; ?>


<?php get_header() ?>

<div id="columnswrapper">
<div id="content" class="fullwidth">
<div class="inner">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class() ?> class="post" id="post-<?php the_ID(); ?>">
		<h2 id="title"><?php the_title(); ?></h2>
			<div>
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; endif; 
		wp_reset_query(); 
		?>
		
<?php 
$arr_listofids = explode(",", $listofids);
$compare = new WP_Query(array('post_type' => 'listing', 'posts_per_page' => 5, 'post__in' => $arr_listofids));
?>



<?php if ($compare->have_posts()) : 
while ($compare->have_posts()) : 

$compare->the_post(); 
include 'includes/variables.php';
?>

<?php 
$theprice = "";
if($price == '0') { ?>
	<?php $theprice = get_option('wp_callforprice'); ?>
<?php } else { ?>
	<?php $theprice = $currencysymbol . $price ?>
<?php } ?>


<?php 



// get image
$arr_sliderimages = get_gallery_images();
$firstimage = $arr_sliderimages[0];
$resized = timthumb(75, 110, $firstimage, 1);

$compare_image .= "<th><img src='".$resized."'/><br /><span class='comparetitle'>". get_the_title() . "</span><br /><a class='button' href='".get_permalink()."'>". get_option('wp_read_more_text') ."</a></th>";
$compare_price .= "<td>".$theprice."</td>"; 
$compare_bodytype .= "<td>".$body_type."</td>"; 
$compare_enginesize .= "<td>".$enginesize."</td>";
$compare_trans .= "<td>".$trans."</td>"; 
$compare_servicehistory .= "<td>".$servicehistory."</td>";
$compare_mileage .= "<td>".$mileage."</td>"; 
$compare_year .= "<td>".$year."</td>"; 
$compare_owners .= "<td>".$owners."</td>"; 
$compare_fueltype .= "<td>".$fueltype."</td>"; 
$compare_color .= "<td>".$color."</td>";
?>

<?php endwhile; else: ?>

<?php 
endif; 
wp_reset_query(); ?> 

<table id="comparisontable">
<tr><td class="col1 labels">&nbsp;</td><?php echo $compare_image; ?></tr>

<tr><td class="labels">Price:</td><?php echo $compare_price; ?></tr>
<tr><td class="labels">Body Type:</td><?php echo $compare_bodytype; ?></tr>

<tr><td class="labels">Engine Size:</td><?php echo $compare_enginesize; ?></tr>
<tr><td class="labels">Transmission:</td><?php echo $compare_trans; ?></tr>
<tr><td class="labels">Service History:</td><?php echo $compare_servicehistory; ?></tr>
<tr><td class="labels">Mileage:</td><?php echo $compare_mileage; ?></tr>
<tr><td class="labels">Year:</td><?php echo $compare_year; ?></tr>
<tr><td class="labels">Owners:</td><?php echo $compare_owners; ?></tr>
<tr><td class="labels">Fuel Type:</td><?php echo $compare_fueltype; ?></tr>
<tr><td class="labels">Color:</td><?php echo $compare_color; ?></tr>
</table>

</div><!-- end inner -->
</div><!-- end content -->		
</div><!-- end content wrapper -->		
			
<?php get_footer() ?>