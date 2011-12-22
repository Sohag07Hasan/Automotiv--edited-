
<div id="footer">
<div class="inner">

<?php include 'includes/variables.php' ?>

<div class="footerblock">
<div class="inner">
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) { ?>
<?php } ?>
</div>
</div>

<div class="footerblock">
<div class="inner">
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) { ?>
<?php } ?>
</div>
</div>

<div class="footerblock">
<div class="inner">
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) { ?>
<?php } ?>
</div>
</div>




<div class="footerblock last">
<div class="inner">
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4') ) { ?>
<?php } ?>
				<?php if(get_option('wp_showsociallinks1') == "show") {
				include 'includes/sociallinks_footer.php';
				}
				?>
</div>
</div>
</div><!-- end inner -->
</div><!-- end footer -->

<div id="belowfooter">
<p id="copyright"><?php echo stripslashes(get_option('wp_copyright')) ?></p>
<?php wp_nav_menu( array('theme_location' => 'footer', 'container' => 'div', 'sort_column' => 'menu_order', 'menu_id' => 'footermenu' ) ); ?>

</div>





<?php wp_footer(); ?>

<?php echo stripslashes(get_option('wp_ga_code')) ?>

			<?php if (get_option('wp_includebrowseby') == "Yes") { ?>
			
			<li style="display: none;" id="browseby"><a href="#"><?php echo get_option('wp_browseby_text') ?></a>
			<ul>
				<?php if (get_option('wp_includealllistings') == "Yes") { ?>
					<li><a href="<?php bloginfo('url'); ?>/?alllistings=true&page_id=<?php echo $wp_searchpageid; ?>"><?php echo get_option('wp_alllistings_text') ?></a></li>
				<?php } ?>
				
				<?php if (get_option('wp_includefeatures') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_features_text') ?></a><?php wp_tag_cloud('format=list&taxonomy=features')?></li> 
				<?php } ?>
				
				<?php if (get_option('wp_includemanufacturer') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_manufacturer_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=manufacturer')?></li> 
				<?php } ?>
				
				<?php if (get_option('wp_includebodytype') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_bodytype_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=bodytype') ?></li>
				<?php } ?>
				
				<?php if (get_option('wp_includeenginesize') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_enginesize_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=enginesize') ?></li>
				<?php } ?>
				

				
				<?php if (get_option('wp_includemileage') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_mileage_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=mileage') ?></li>
				<?php } ?>
				
				<?php if (get_option('wp_includemodelyear') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_modelyear_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=modelyear') ?></li>
				<?php } ?>
				
				<?php if (get_option('wp_includepricerange') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_pricerange_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=pricerange') ?></li>
				<?php } ?>	
				
				<?php if (get_option('wp_includetransmission') == "Yes") { ?>
					<li><a href="#"><?php echo get_option('wp_transmission_text2') ?></a><?php wp_tag_cloud('format=list&taxonomy=transmission') ?></li>
				<?php } ?>	
				
				
			</ul>
			
			</li>
			
			<?php } ?>

</div><!-- end wrapper (started in header) -->
</div><!-- end page wrapper -->
</body>
</html>