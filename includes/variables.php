<?php


	$manufacturer_level1 = get_post_meta($post->ID, "manufacturer_level1_value", true);
	$manufacturer_level2 = get_post_meta($post->ID, "manufacturer_level2_value", true);
	$name = get_post_meta($post->ID, "name_value", true);

	$price = number_format((float)get_post_meta($post->ID, "price_value", true), 0, '.', get_option('wp_thousandseparator'));
	
	$body_type = get_post_meta($post->ID, "body_type_value", true);
	$enginesize = get_post_meta($post->ID, "enginesize_value", true);
	
	$trans = get_post_meta($post->ID, "trans_value", true);
	
	$regno = get_post_meta($post->ID, "regno_value", true);
	$servicehistory = get_post_meta($post->ID, "servicehistory_value", true);
	$regdate = get_post_meta($post->ID, "regdate_value", true);
	$mileage = get_post_meta($post->ID, "mileage_value", true);
	$year = get_post_meta($post->ID, "year_value", true);
	
	$owners = get_post_meta($post->ID, "owners_value", true);
	$fueltype = get_post_meta($post->ID, "fueltype_value", true);
	$insgroup = get_post_meta($post->ID, "insgroup_value", true);
	$intcolor = get_post_meta($post->ID, "intcolor_value", true);
	$extcolor = get_post_meta($post->ID, "extcolor_value", true);
	$banner = get_post_meta($post->ID, "banner_value", true);
	$toolong = get_post_meta($post->ID, "toolong_value", true);
	
	$salesreptitle = get_post_meta($post->ID, "title_value", true);
	$salesrepemail = get_post_meta($post->ID, "email_value", true);
	$salesrepphoneoffice = get_post_meta($post->ID, "phoneoffice_value", true);
	$salesrepphonemobile = get_post_meta($post->ID, "phonemobile_value", true);
	$salesrepfax = get_post_meta($post->ID, "fax_value", true);
	$salesreporder = get_post_meta($post->ID, "salesreporder_value", true);
		
	$slideshow_url = get_post_meta($post->ID, "slideshow_url_value", true);

	$currencysymbol = get_option('wp_currency');
	


/* Get Contact page ID from the name */
$ts_contactpage = $wpdb->get_var("
	SELECT `ID`
	FROM $wpdb->posts "."
	WHERE post_title='$ts_contactpage' 
	AND post_type='page' 
	LIMIT 1");
	
/* Get search page ID from the name */
$wp_searchpageid = $wpdb->get_var("
	SELECT `ID`
	FROM $wpdb->posts "."
	WHERE post_title='". get_option('wp_searchresultspage') ."' 
	AND post_type='page' 
	LIMIT 1");
	
/* Get compare page ID from the name */
$wp_comparepageid = $wpdb->get_var("
	SELECT `ID`
	FROM $wpdb->posts "."
	WHERE post_title='". get_option('wp_comparepage') ."' 
	AND post_type='page' 
	LIMIT 1");

$wp_newscategory = get_cat_id(get_option('wp_newscategory'));


	
?>




