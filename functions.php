<?php

// Load Theme Functions
require_once(TEMPLATEPATH . '/functions/theme-functions.php');
require_once(TEMPLATEPATH . '/functions/widgets.php');
require_once(TEMPLATEPATH . '/functions/customposttypes.php');
require_once(TEMPLATEPATH . '/functions/shortcodes.php');


add_theme_support( 'post-thumbnails', array( 'post'));
add_image_size( 'large', 665, 200, true );

add_theme_support( 'menus' );
register_nav_menu('main', 'Main Navigation Menu');
register_nav_menu('footer', 'Footer Navigation Menu');




/*-----------------------------------------------------------------------------------*/
/* Options Framework Functions
/*-----------------------------------------------------------------------------------*/

/* Set the file path based on whether the Options Framework is in a parent theme or child theme */

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}

/* These files build out the options interface.  Likely won't need to edit these. */

require_once (OF_FILEPATH . '/admin/admin-functions.php');		// Custom functions and plugins
require_once (OF_FILEPATH . '/admin/admin-interface.php');		// Admin Interfaces (options,framework, seo)

/* These files build out the theme specific options and associated functions. */

require_once (OF_FILEPATH . '/admin/theme-options.php'); 		// Options panel settings and custom settings
require_once (OF_FILEPATH . '/admin/theme-functions.php'); 	// Theme actions based on options settings





if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.3.2'); 
   wp_enqueue_script('jquery');
}


$manufacturer_level1 = get_option('wp_manufacturer_level1');
$manufacturer_level1 = explode("\n", $manufacturer_level1);
foreach ($manufacturer_level1 as $item) {
	$concatmanufacturer = $concatmanufacturer . trim($item) . ",";
}
$concatmanufacturer = substr ($concatmanufacturer, 0, strlen($concatmanufacturer)-1);
$manufacturer_level1 = explode(",", $concatmanufacturer);
array_unshift($manufacturer_level1, "Choose a manufacturer:");



$engine_size = get_option('wp_enginesizes');
$engine_size = explode("\n", $engine_size);
foreach ($engine_size as $item) {
	$concatenginesize = $concatenginesize . trim($item) . ",";
}
$concatenginesize = substr($concatenginesize, 0, strlen($concatenginesize)-1);
$engine_size = explode(",", $concatenginesize);

array_unshift($engine_size, "Choose an engine size");



$fueltype = get_option('wp_fueltypes');
$fueltype = explode("\n", $fueltype);
foreach ($fueltype as $item) {
	$concatfueltype = $concatfueltype . trim($item) . ",";
}
$concatfueltype = substr($concatfueltype, 0, strlen($concatfueltype)-1);
$fueltype = explode(",", $concatfueltype);
array_unshift($fueltype, "Choose a fuel type");


$body_type = get_option('wp_bodytype');
$body_type = explode("\n", $body_type);
foreach ($body_type as $item) {
	$concatpropertytype = $concatpropertytype . trim($item) . ",";
}
$concatpropertytype = substr($concatpropertytype, 0, strlen($concatpropertytype)-1);
$body_type = explode(",", $concatpropertytype);
array_unshift($body_type, "Choose an automobile type");



$garage = array("0", "1", "2", "3", "4", "5+");
$banner = array("None", "Reduced", "Sold", "Automatic", "Manual", "Diesel", "Low Mileage", "1 Owner", "Reserved", "Diesel Automatic");
$trans = array("Automatic", "Manual", "Semi-Auto", "Other");
$servicehistory = array("", "Full", "Part", "None", "Not Due");



// Put Categories into an array (for use in various dropdown menus)
$categories_list = get_categories('hide_empty=0&orderby=name');
$getcat = array();

	foreach($categories_list as $acategory)
	{
		$getcat[$acategory->cat_ID] = $acategory->cat_name;
	}
	
$category_dropdown = array_unshift($getcat, "Choose a category:");


// Put Pages into an array (for use in dropdown for Theme Options)
$pages_list = get_pages();
$getpag = array();

	foreach($pages_list as $apage)
	{
		$getpag[$apage->ID] = $apage->post_title;
	}
	
array_unshift($getpag, "Select a page:");

 
 




$new_meta_boxes_3 = 
array(

"images" => array(
"name" => "images",
"type" => "info",
"title" => "Images (Required)",
"description" => ""),
"video_url" => array(
"name" => "video_url",
"type" => "textarea",
"title" => "Youtube or Vimeo URL",
"description" => "URL to the web page that hosts the Youtube or Vimeo URL. (For Vimeo, omit the 'www' from the URL).  For multiple videos, add each one on a new line. (no space between lines)."),

"video_thumbanil" => array(
"name" => "video_thumbnail",
"type" => "textarea",
"title" => "Video thumbnail image",
"description" => "URL to the image that will represent your video.  Often this is a screenshot/screen grab of a frame of the video.  Or it can be simply a photo.  For multiple videos, add each one on a new line. (no space between lines).")

);


$new_meta_boxes = 
array(

"name" => array(
"name" => "name",
"type" => "input",
"std" => "",
"description" => "Enter a simplified Automobile name. This is used for most main titles.  e.g. 2009 Toyota. You can also include the model name; it's up to you.  This entry will NOT be used in the search. Rather, it is used as the automobile heading text in various pages in the site.",
"title" => "Simplified Automobile Name"),

"manufacturer_level1" => array(
"name" => "manufacturer_level1",
"type" => "select",
"std" => "",
"title" => "Primary Search Manufacturer (Required)",
"options" => $manufacturer_level1,
"description" => "Please select a Primary Search Manufacturer from the list. This is used as the primary Search by Manufacturer in the Search Box.  This list is editable in Theme Options. (General section)"),

"manufacturer_level2" => array(
"name" => "manufacturer_level2",
"type" => "input",
"std" => " ",
"title" => "Secondary Search manufacturer (optional)",
"description" => "(Applies only when 'Enable Secondary Search Manufacturer' is enabled in Theme Options. Enter the secondary manufacturer.  For example, if your Secondary Search Manufactuer info is set to be car 'Models', enter the Model name.  Note: to enable Secondary Search Manufacturer, set it to 'Enable' in Theme Options (General section).  Be sure the spelling is EXACTLY the same as in the corresponding javascript file in the /secondary_search_manufacturer folder.")
);

$new_meta_boxes_2 = 
array(

"slideshow" => array(
"name" => "slideshow",
"type" => "select",
"std" => "Yes",
"options" => array("Yes", "No"),
"title" => "Include in Slideshow?",
"description" => "Do you want this listing to be featured on the homepage Slideshow?"),

"price" => array(
"name" => "price",
"type" => "input",
"std" => "",
"title" => "Price (required)",
"description" => "How much is this automobile? This is used when visitors search by price range (Minimum Price, Maximum Price)."),

"year" => array(
"name" => "year",
"type" => "input",
"std" => "",
"title" => "Model year  (required if this is a Search parameter)",
"description" => "What is the model year for the automobile?"),


"body_type" => array(
"name" => "body_type",
"type" => "select",
"title" => "Body Type (required if this is a Search parameter)",
"description" => "What type of automobile is this?  This is used when visitors search by Body Type.  (The choices can be set in Theme Options) <strong>Note: make sure there are no BLANK lines at the end of your list.</strong>",
"options" => $body_type),



"mileage" => array(
"name" => "mileage",
"type" => "input",
"std" => "",
"title" => "Mileage  (required if this is a Search parameter)",
"description" => "How many Miles/Km does this automobile have?"),

"enginesize" => array(
"name" => "enginesize",
"type" => "select",
"options" => $engine_size,
"std" => "",
"title" => "Engine Size (required if this is a Search parameter)",
"description" => "What is the Engine Size of the automobile."),

"trans" => array(
"name" => "trans",
"type" => "select",
"options" => $trans,
"std" => "",
"title" => "Transmission (required if this is a Search parameter)",
"description" => "What type of transmission does this automobile have?"),

"fueltype" => array(
"name" => "fueltype",
"type" => "select",
"options" => $fueltype,
"std" => "Gas",
"title" => "Fuel Type",
"description" => "What type of fuel does the vehicle use?"),

"extcolor" => array(
"name" => "extcolor",
"type" => "input",
"std" => "",
"title" => "Exterior Color",
"description" => ""),

"intcolor" => array(
"name" => "intcolor",
"type" => "input",
"std" => "",
"title" => "Interior Color",
"description" => ""),

"regno" => array(
"name" => "regno",
"type" => "input",
"std" => "",
"title" => "Registration Number",
"description" => "The automobile's Registration Number"),

"servicehistory" => array(
"name" => "servicehistory",
"type" => "select",
"options" => $servicehistory,
"std" => "",
"title" => "Service History",
"description" => "Does this automobile have service history documentation?"),

"regdate" => array(
"name" => "regdate",
"type" => "input",
"std" => "",
"title" => "Date of Registration",
"description" => "The date the automobile was registered."),

"owners" => array(
"name" => "owners",
"type" => "input",
"std" => "",
"title" => "Owners",
"description" => "How many owners did this automobile have?"),

"banner" => array(
"name" => "banner",
"type" => "select",
"title" => "Banner (optional)",
"description" => "Type of banner",
"options" => $banner),


"toolong" => array(
"name" => "toolong",
"type" => "select",
"std" => "No",
"title" => "Features List Overlapping Thumbnail Images?",
"options" => array("No", "Yes"),
"description" => "Is the list of features so long that it overlap the thumbnail images?  If it is, set this to 'Yes'. That will shorten the widgh of the thumbnail row to give room for the features list.")
);



$new_meta_boxes_4 = 
array(

"images" => array(
"name" => "images",
"type" => "info",
"title" => "<strong>Image</strong>",
"description" => ""),

"title" => array(
"name" => "title",
"type" => "input",
"std" => "Sales Rep",
"title" => "<strong>Title</strong>",
"description" => "The Sales Rep's official 'Title'"),

"email" => array(
"name" => "email",
"type" => "input",
"std" => "",
"title" => "<strong>Email</strong>",
"description" => "The Sales Rep's email address"),

"phoneoffice" => array(
"name" => "phoneoffice",
"type" => "input",
"std" => "",
"title" => "<strong>Office Phone Number</strong>",
"description" => ""),

"phonemobile" => array(
"name" => "phonemobile",
"type" => "input",
"std" => "",
"title" => "<strong>Mobile Phone Number</strong>",
"description" => ""),

"fax" => array(
"name" => "fax",
"type" => "input",
"std" => "",
"title" => "<strong>Fax Number</strong>",
"description" => ""),

"salesreporder" => array(
"name" => "salesreporder",
"type" => "input",
"std" => "1",
"title" => "<strong>Order</strong>",
"description" => "The order the Sales Rep is listed in the Sales Rep page. Lower numbers appear before higher numbers.")

);


$new_meta_boxes_5 = 
array(

"images" => array(
"name" => "images",
"type" => "info",
"title" => "Slideshow Image",
"description" => ""),

"slideshow_url" => array(
"name" => "slideshow_url",
"type" => "input",
"std" => "",
"title" => "<strong>Link URL</strong> (Optional)",
"description" => "The URL to go to when the slideshow image is clicked")


);



function new_meta_boxes_3() {
global $post, $new_meta_boxes, $new_meta_boxes_2, $new_meta_boxes_3;
	
	foreach($new_meta_boxes_3 as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<h2>'.$meta_box['title'].'</h2>';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		} elseif( $meta_box['type'] == "textarea" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<textarea name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%" cols="20" rows="7">'.$meta_box_value.'</textarea><br />';
			
		} elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			}
			
			echo'</select>';
			
		} elseif ($meta_box['type'] == "info") {
					
		
			echo '<p><strong>Add your automobile images</strong> using the "Upload/Insert" button above the content textbox.</p>';
		}
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}



function new_meta_boxes() {
global $post, $new_meta_boxes, $new_meta_boxes_2;
	
	foreach($new_meta_boxes as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<h2>'.$meta_box['title'].'</h2>';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		} elseif( $meta_box['type'] == "textarea" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<textarea name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%" cols="20" rows="7">'.$meta_box_value.'</textarea><br />';
			
		} elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			}
			
			echo'</select>';
			
		}
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}

function new_meta_boxes_2() {
global $post, $new_meta_boxes, $new_meta_boxes_2;
	
	foreach($new_meta_boxes_2 as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<h2>'.$meta_box['title'].'</h2>';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		} elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			}
			
			echo'</select>';
			
		}
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}


function new_meta_boxes_4() {
global $post, $new_meta_boxes, $new_meta_boxes_4;
	
	foreach($new_meta_boxes_4 as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<h2>'.$meta_box['title'].'</h2>';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		} elseif( $meta_box['type'] == "textarea" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<textarea name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%" cols="20" rows="7">'.$meta_box_value.'</textarea><br />';
			
		} elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			}
			
			echo'</select>';
			
		} elseif ($meta_box['type'] == "info") {
					
		
			echo '<p><strong>Add your sales rep image</strong> using the "Upload/Insert" button above the content textbox.</p>';
		}
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}

function new_meta_boxes_5() {
global $post, $new_meta_boxes, $new_meta_boxes_2, $new_meta_boxes_3,  $new_meta_boxes_4,  $new_meta_boxes_5;
	
	foreach($new_meta_boxes_5 as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<h2>'.$meta_box['title'].'</h2>';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		} elseif( $meta_box['type'] == "textarea" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<textarea name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%" cols="20" rows="7">'.$meta_box_value.'</textarea><br />';
			
		} elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			}
			
			echo'</select>';
			
		} elseif ($meta_box['type'] == "info") {
					
		
			echo '<p><strong>Add your slideshow image</strong> using the "Upload/Insert" button above the content textbox. Only one image per post.<br />Note: For this to show up in the slideshow, go to Theme Options -> Slideshow, and set the Slideshow Source to "Just Photos".</p>';
		}
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}


function create_meta_box() {
global $theme_name, $new_meta_boxes, $new_meta_boxes_2, $new_meta_boxes_3, $new_meta_boxes_4, $new_meta_boxes_5;
	if (function_exists('add_meta_box') ) {
	
	add_meta_box( 'new-meta-boxes_3', 'Images and Video', 'new_meta_boxes_3', 'listing', 'normal', 'high' );
	add_meta_box( 'new-meta-boxes', 'Manufacturer', 'new_meta_boxes', 'listing', 'normal', 'high' );
	add_meta_box( 'new-meta-boxes_2', 'Automobile Information', 'new_meta_boxes_2', 'listing', 'normal', 'high' );
	add_meta_box( 'new-meta-boxes_5', 'Slideshow Image', 'new_meta_boxes_5', 'photoslideshow', 'normal', 'high' );
	add_meta_box( 'new-meta-boxes_4', 'Sales Rep Info', 'new_meta_boxes_4', 'salesrep', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
	global $post, $new_meta_boxes, $new_meta_boxes_2, $new_meta_boxes_3, $new_meta_boxes_4, $new_meta_boxes_5;  
	
	
	if (get_post_type() == 'photoslideshow') {
	foreach($new_meta_boxes_5 as $meta_box) {  
	
		// Verify  

		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		
		return $post_id;  
		}  
	
	if ( 'page' == $_POST['post_type'] ) {

	if ( !current_user_can( 'edit_page', $post_id )) 
	
	return $post_id;  
	} else {  
	
	if ( !current_user_can( 'edit_post', $post_id )) 
	return $post_id;  
	}  
	
	$data = $_POST[$meta_box['name'].'_value'];  
	
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
	update_post_meta($post_id, $meta_box['name'].'_value', $data);  
	elseif($data == "")  
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
	}
	}
	
	
	
	if (get_post_type() == 'salesrep') {
		foreach($new_meta_boxes_4 as $meta_box) {  
		
			// Verify  
	
			if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
			
			return $post_id;  
			}  
		
		if ( 'page' == $_POST['post_type'] ) {
	
		if ( !current_user_can( 'edit_page', $post_id )) 
		
		return $post_id;  
		} else {  
		
		if ( !current_user_can( 'edit_post', $post_id )) 
		return $post_id;  
		}  
		
		$data = $_POST[$meta_box['name'].'_value'];  
		
		if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
		add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
		elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
		update_post_meta($post_id, $meta_box['name'].'_value', $data);  
		elseif($data == "")  
		delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
		}
	}
	
	
	if (get_post_type() == 'listing') {
		
		
		foreach($new_meta_boxes as $meta_box) {  
		
		// Verify  
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
	
		if ( 'page' == $_POST['post_type'] ) {  
		if ( !current_user_can( 'edit_page', $post_id ))  
		return $post_id;  
		} else {  
		if ( !current_user_can( 'edit_post', $post_id ))  
		return $post_id;  
		}  
		
		$data = $_POST[$meta_box['name'].'_value'];  
		
		if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
		add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
		elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
		update_post_meta($post_id, $meta_box['name'].'_value', $data);
		  
		elseif($data == "")  
		delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
		
		var_dump($meta_box['name'].'_value');
		var_dump($data);
		
	}
	
	echo '<hr/>';
	

	foreach($new_meta_boxes_2 as $meta_box) {  
		
		// Verify  
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
		
		if ( 'page' == $_POST['post_type'] ) {  
		if ( !current_user_can( 'edit_page', $post_id ))  
		return $post_id;  
		} else {  
		if ( !current_user_can( 'edit_post', $post_id ))  
		return $post_id;  
		}  
		
		$data = $_POST[$meta_box['name'].'_value'];  
		
		if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
		add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
		elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
		update_post_meta($post_id, $meta_box['name'].'_value', $data);  
		elseif($data == "")  
		delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
		
	}
	
		
		
		
		
	
		foreach($new_meta_boxes_3 as $meta_box) {  
			// Verify  
			if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
			return $post_id;  
			}  
		
			if ( 'page' == $_POST['post_type'] ) {  
			if ( !current_user_can( 'edit_page', $post_id ))  
			return $post_id;  
			} else {  
			if ( !current_user_can( 'edit_post', $post_id ))  
			return $post_id;  
			}  
			
			$data = $_POST[$meta_box['name'].'_value'];  
			
			if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
			add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
			elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
			update_post_meta($post_id, $meta_box['name'].'_value', $data);  
			elseif($data == "")  
			delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
		
		
		}
				
	
	}


	
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');





?>