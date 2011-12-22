<?php

// get all of the images attached to the current post
function get_gallery_images() {
	global $post;

	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	$galleryimages = array();

	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
			$galleryimages[] = wp_get_attachment_url($photo->ID);
		}
	}
	return $galleryimages;
}

//create tiny url for sharing post via twitter
function get_tiny_url($url) {
 
 if (function_exists('curl_init')) {
   $url = 'http://tinyurl.com/api-create.php?url=' . $url;
 
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   $tinyurl = curl_exec($ch);
   curl_close($ch);
 
   return $tinyurl;
 }
 
 else {
   # cURL disabled on server; Can't shorten URL
   # Return long URL instead.
   return $url;
 }
 
}
 
// Enable recent comments
function recent_comments($src_count=10, $src_length=40, $pre_HTML='<ul>', $post_HTML='</ul>') {
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,
SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC
LIMIT $src_count";
$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
foreach ($comments as $comment) {
$output .= "<li><a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID . "\" title=\"on " . $comment->post_title . "\">" . strip_tags($comment->com_excerpt) ."...</a></li>";
}
$output .= $post_HTML;
echo $output;
}


function hexDarker($hex,$factor = 30)
        {
        $new_hex = '';
        
        $base['R'] = hexdec($hex{0}.$hex{1});
        $base['G'] = hexdec($hex{2}.$hex{3});
        $base['B'] = hexdec($hex{4}.$hex{5});
        
        foreach ($base as $k => $v)
                {
                $amount = $v / 100;
                $amount = round($amount * $factor);
                $new_decimal = $v - $amount;
        
                $new_hex_component = dechex($new_decimal);
                if(strlen($new_hex_component) < 2)
                        { $new_hex_component = "0".$new_hex_component; }
                $new_hex .= $new_hex_component;
                }
                
        return $new_hex;        
        }

function hexLighter($hex,$factor = 30)
        {
        $new_hex = '';
        
        $base['R'] = hexdec($hex{0}.$hex{1});
        $base['G'] = hexdec($hex{2}.$hex{3});
        $base['B'] = hexdec($hex{4}.$hex{5});
        
        foreach ($base as $k => $v)
                {
                $amount = 255 - $v;
                $amount = $amount / 100;
                $amount = round($amount * $factor);
                $new_decimal = $v + $amount;
        
                $new_hex_component = dechex($new_decimal);
                if(strlen($new_hex_component) < 2)
                        { $new_hex_component = "0".$new_hex_component; }
                $new_hex .= $new_hex_component;
                }
                
        return $new_hex;        
        }	
		
		
function timthumb($height,$width,$img_url,$stretch) {

	$image['url'] = $img_url;
	$image_path = explode($_SERVER['SERVER_NAME'], $image['url']);
	$image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path[1];
	$image_info = @getimagesize($image_path);
	
	if (is_multisite()) {
	    $img_url = get_current_site(1)->path.str_replace(get_blog_option($blog_id,'fileupload_url'),get_blog_option($blog_id,'upload_path'), $img_url);
		}

	// If we cannot get the image locally, try for an external URL
	if (!$image_info)
		$image_info = @getimagesize($image['url']);

	$image['width'] = $image_info[0];
	$image['height'] = $image_info[1];
	if($img_url != "" && ($image['width'] != $width || $image['height'] != $height || !isset($image['width']))){
		$img_url = get_bloginfo('template_url')."/scripts/timthumb.php?src=$img_url&amp;w=$width&amp;h=$height&amp;zc=$stretch&amp;q=90";
	}
	
	return $img_url;
}	


/* 
 * PHP integration for No Spam v1.3
 * by Mike Branski (www.leftrightdesigns.com)
 * mikebranski@gmail.com
 *
 * Copyright (c) 2008 Mike Branski (www.leftrightdesigns.com)
 *
 * NOTE: This script is for integrating your dynamic PHP content with No Script.
 *       Download No Spam at www.leftrightdesigns.com/library/jquery/nospam/
 *
 */
function nospam($email, $filterLevel = 'normal')
{
	$email = strrev($email);
	$email = preg_replace('[@]', '//', $email);
	$email = preg_replace('[\.]', '/', $email);

	if($filterLevel == 'low')
	{
		$email = strrev($email);
	}

	return $email;
}		
	

function browseorder($type, $tax, $term) {
switch ($type) {
	case "PriceDescending":
		$metakey = 'price_value';
		$order = 'DESC';
		$orderby = 'meta_value_num';
		break;
	case "PriceAscending":
		$metakey = 'price_value';
		$order = 'ASC';
		$orderby = 'meta_value_num';
		break;
	case "MileageDescending":
		$metakey = 'mileage_value';
		$order = 'DESC';
		$orderby = 'meta_value_num';
		break;
	case "MileageAscending":
		$metakey = 'mileage_value';
		$order = 'ASC';
		$orderby = 'meta_value_num';
		break;
	case "ModelYearDescending":
		$metakey = '';
		$order = 'DESC';
		$orderby = 'date';
		break;
	case "ModelYearAscending":
		$metakey = '';
		$order = 'ASC';
		$orderby = 'date';
		break;
	case "DateDescending":
		$metakey = '';
		$order = 'DESC';
		$orderby = 'date';
		break;
	case "DateAscending":
		$metakey = '';
		$order = 'ASC';
		$orderby = 'date';
		break;
}


$paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $wpq = array ('post_type' => 'listing', $tax => $term->slug, paged => $paged, 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post_status' => 'publish', 'posts_per_page' => get_option('wp_searchresultsperpage')) ;

return $wpq;




}



//------enable post thumbnail preview for custom columns 
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
 
	// for post and listings
 
	function fb_AddThumbColumn($cols) { 
		$cols['thumbnail'] = __('Thumbnail'); 
		return $cols;
	}
 
	function fb_AddThumbValue($column_name, $post_id) {
 
			$width = (int) 200;
			$height = (int) 100;
 
 
			if ( 'thumbnail' == $column_name ) {
				// thumbnail of WP 2.9
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				// image from gallery
				$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
				if ($thumbnail_id)
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				elseif ($attachments) {
					foreach ( $attachments as $attachment_id => $attachment ) {
						$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
					}
				}
					if ( isset($thumb) && $thumb ) {
						echo $thumb;
					} else {
						echo __('None');
					}
			}
	}
 
	// for posts
	add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
 
	// for listings
	add_filter( 'manage_listing_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_listing_custom_column', 'fb_AddThumbValue', 10, 2 );
}




//----------------edit custom columns display for back-end 
add_action("manage_posts_custom_column", "my_custom_columns");
add_filter("manage_edit-listing_columns", "my_listing_columns");
 
function my_listing_columns($columns) //this function display the columns headings
{
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Vehicle Listing",
		"thumbnail" => "Thumbnail",
		"price" => "Price",	
		"bodytype" => "Body Type",
		"mileage" => "Mileage",
		"date" => "Last Updated"
		
	);
	return $columns;
}
 
function my_custom_columns($column){
	global $post;
	switch($column){
		case "price":
		    $custom = get_post_custom();
      		    echo $custom["price_value"][0];
		    break;
		 case "bodytype":
		    $custom = get_post_custom();
		    echo $custom["body_type_value"][0];
		    break;
		 case "mileage":
		    $custom = get_post_custom();
		    echo $custom["mileage_value"][0];
		    break;
			
	}
}



?>