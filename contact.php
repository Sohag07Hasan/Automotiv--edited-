<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div id="columnswrapper" class="columns-1">
<?php get_sidebar(); ?>
<div id="content" class="twosidebars">
<div class="inner">


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> class="post" id="post-<?php the_ID(); ?>">
		<h2 id="title"><?php the_title(); ?></h2>
		<div class="entry">
			<?php the_content(); ?>
			
			<?php echo do_shortcode($form2);  ?>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>

</div><!-- end inner -->
</div><!-- end content -->



<div id="contactsidebar">
<div class="inner">
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
/* <![CDATA[ */
function setMapAddress(address)
{
	var geocoder = new google.maps.Geocoder();

	geocoder.geocode( { address : address }, function( results, status ) {
		if( status == google.maps.GeocoderStatus.OK ) {
			var latlng = results[0].geometry.location;
			var options = {
				zoom: 15,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var mymap = new google.maps.Map( document.getElementById( 'map' ), options );
			
			var marker = new google.maps.Marker({
            map: mymap, 
            position: results[0].geometry.location
        });
			
		}
	} );
}

setMapAddress( "<?php echo get_option('wp_contactmap') ?>" );

/* ]]> */
</script>
<div id="contactmap">
		<div id="map"></div>
</div>

<?php if (get_option('wp_contacttext')) {
	echo stripslashes(get_option('wp_contacttext'));
} ?>

</div> <!-- end inner -->
</div><!-- end contact sidebar -->

</div><!-- end columnswrapper -->
<?php get_footer(); ?>









