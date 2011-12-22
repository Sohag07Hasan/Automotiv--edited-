



<?php

if (isset($_COOKIE['manufacturer_level1']) && $_COOKIE['manufacturer_level1'] != '') {
$search_manufacturer_level1 = $_COOKIE['manufacturer_level1'];
} else {
$search_manufacturer_level1 = trim($_POST['manufacturer_level1']);
}

if (isset($_COOKIE['manufacturer_level2']) && $_COOKIE['manufacturer_level2'] != '') {
$search_manufacturer_level2 = $_COOKIE['manufacturer_level2'];
} else {
$search_manufacturer_level2 = trim($_POST['manufacturer_level2']);
}

if (isset($_COOKIE['minprice2']) && $_COOKIE['minprice2'] != '') {
$search_pricemin = $_COOKIE['minprice2'];
} else {
$search_pricemin = '0';
}




if (isset($_COOKIE['maxprice2']) && $_COOKIE['maxprice2'] != '') {
$search_pricemax = $_COOKIE['maxprice2'];
} else {
$search_pricemax = '99999999999999';
}

?>

<?php 
if (get_option('wp_search_first')== 'Engine Size' || get_option('wp_search_second')== 'Engine Size' || get_option('wp_search_third')== 'Engine Size' ) { 
	if (isset($_COOKIE['enginesize2']) && $_COOKIE['enginesize2'] != '') {
		$search_enginesize = $_COOKIE['enginesize2'];
	} else {
		$search_enginesize = trim($_POST['enginesize2']);
	}
}




if (get_option('wp_search_first')== 'Transmission' || get_option('wp_search_second')== 'Transmission' || get_option('wp_search_third')== 'Transmission' ) { 
if (isset($_COOKIE['trans2']) && $_COOKIE['trans2'] != '') {
	$search_trans = $_COOKIE['trans2'];
} else {
	$search_trans = trim($_POST['trans2']);
}
}


if (get_option('wp_search_first')== 'Body Type' || get_option('wp_search_second')== 'Body Type' || get_option('wp_search_third')== 'Body Type' ) { 
	if (isset($_COOKIE['body_type2']) && $_COOKIE['body_type2'] != '') {
		$search_bodytype = $_COOKIE['body_type2'];
	} else {
		$search_bodytype = trim($_POST['body_type2']);
	}
}



if (get_option('wp_search_first')== 'Mileage' || get_option('wp_search_second')== 'Mileage' || get_option('wp_search_third')== 'Mileage' ) { 
if (isset($_COOKIE['mileage2']) && $_COOKIE['mileage2'] != '') {
	$search_mileage = $_COOKIE['mileage2'];
} else {
	$search_mileage = trim($_POST['mileage2']);
}
}



if (get_option('wp_search_first')== 'Year' || get_option('wp_search_second')== 'Year' || get_option('wp_search_third')== 'Year' ) { 
if (isset($_COOKIE['year2']) && $_COOKIE['year2'] != '') {
	$search_year = $_COOKIE['year2'];
} else {
	$search_year = trim($_POST['year2']);
}
}


$checkalllistings = $_GET['alllistings'];
if ($checkalllistings == true) { 

	$search_manufacturer_level1 = '';
	$search_manufacturer_level2 = '';
	$search_pricemin = '0';
	$search_pricemax = '99999999999999';
	$search_year = '';
	$search_mileage = '';
	$search_bodytype = '';
	$search_trans = '';
	$search_enginesize = '';
	$search_trans = '';
}
?>






<?php
$_ids = array();
function getIds( $query ) {
    global $wpdb;
    
    $searchresults = $wpdb->get_results($query, ARRAY_A);
    if ( !empty ($searchresults) ) {
        foreach( $searchresults as $_post ) {
            $tmp[] = $_post['ID'];
        }
    }

    return $tmp;
}

global $wpdb;

$query ="SELECT p.* FROM $wpdb->posts p WHERE p.post_type = 'listing' AND p.post_status = 'publish'";
		$all = getIds( $query );
		
		$_ids = ( !empty($all) ? ( !empty($_ids) ? array_intersect( $_ids, $all) : $all ) : "" );
		

if($search_manufacturer_level1 != '')
{
$search_manufacturer_level1 = trim($search_manufacturer_level1);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'manufacturer_level1_value' AND p1.meta_value = '$search_manufacturer_level1'";
    $sll1 = getIds( $query );
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
		
} 		

	

if($search_manufacturer_level2 != '')
{
$search_manufacturer_level2 = trim ($search_manufacturer_level2);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'manufacturer_level2_value' AND p1.meta_value = '$search_manufacturer_level2'";
    $sll1 = getIds( $query );
	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
} 	

	

    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key='price_value' AND convert(p1.meta_value, signed) BETWEEN '$search_pricemin' AND '$search_pricemax'";
    $sll1 = getIds( $query );	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );

	


if (get_option('wp_search_first')== 'Engine Size' || get_option('wp_search_second')== 'Engine Size' || get_option('wp_search_third')== 'Engine Size' ) { 
if($search_enginesize != '')
{
$search_enginesize = trim ($search_enginesize);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'enginesize_value' AND p1.meta_value >= '$search_enginesize'";
    $sll1 = getIds( $query );
	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
} 	
}


if (get_option('wp_search_first')== 'Transmission' || get_option('wp_search_second')== 'Transmission' || get_option('wp_search_third') == 'Transmission' ) { 
if($search_trans != '')
{
$search_trans = trim($search_trans);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'trans_value' AND p1.meta_value = '$search_trans'";
    $sll1 = getIds( $query );
	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
} 
}




if (get_option('wp_search_first')== 'Year' || get_option('wp_search_second')== 'Year' || get_option('wp_search_third')== 'Year' ) { 
if($search_year != '')
{
$search_year = trim($search_year);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'year_value' AND p1.meta_value >= '$search_year'";
    $sll1 = getIds( $query );
	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
} 
}





if (get_option('wp_search_first')== 'Body Type' || get_option('wp_search_second')== 'Body Type' || get_option('wp_search_third')== 'Body Type' ) { 
if($search_bodytype != '')
{
$search_bodytype = trim($search_bodytype);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'body_type_value' AND p1.meta_value = '$search_bodytype'";
    $sll1 = getIds( $query );
	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
} 
}


if (get_option('wp_search_first')== 'Mileage' || get_option('wp_search_second')== 'Mileage' || get_option('wp_search_third')== 'Mileage' ) { 
if($search_mileage != '')
{
$search_mileage = trim($search_mileage);
    $query ="SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
            WHERE p.ID = p1.post_id AND p1.meta_key = 'mileage_value' AND p1.meta_value >= $search_mileage";
    $sll1 = getIds( $query );
	
    $_ids = ( !empty($sll1) ? ( !empty($_ids) ? array_intersect( $_ids, $sll1) : "" ) : "" );
} 
}

?>

<?php if ($checkalllistings == true) { 
$alllistings = true;
if (count($_ids) > 3) {
	$results = " (" . count($_ids) . ")"; 
	} else {
	$results = "";
	}

?>
<h2 id="heading_searchresults"><?php echo get_option('wp_allvehicles') . $results; ?></h2>
<?php } else { ?>
<h2 id="heading_searchresults"><?php echo get_option('wp_searchresults') . $results; ?></h2>
<?php } ?>

<?php

$resultsorder = $_GET['orderdropdown'];

if ($resultsorder) {
	$resultsorder = $resultsorder;
} elseif(isset($_COOKIE['orderdropdown'])) {
	$resultsorder = $_COOKIE['orderdropdown'];
} else {
	$resultsorder = get_option('wp_searchorder');
}
$resultsorder = str_replace(" ", "", $resultsorder);

	switch ($resultsorder) {
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
			$metakey = 'year_value';
			$order = 'DESC';
			$orderby = 'meta_value_num';
			break;
		case "ModelYearAscending":
			$metakey = 'year_value';
			$order = 'ASC';
			$orderby = 'meta_value_num';
			break;
	}

if (!empty($_ids) && !$alllistings) {

    $wpq = array ('post_type' => 'listing', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => $_ids,  'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => get_option('wp_searchresultsperpage'));
	
} elseif (empty($_ids) && !$alllistings) {

	// $_ids array is empty because search got no results
	// $_ids array will be empty if page is an "All Listings" page. Don't run this code if is All Listings because All Listings will show all listings. This code will display "no results found"
    $wpq = array ('post_type' =>'listing', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => array('0'),'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => get_option('wp_searchresultsperpage'));
} elseif ($alllistings) {
	// This is an All Listings page, so show all results
	$wpq = array ('post_type' =>'listing', 'paged' => $paged, 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post_status' => 'publish', 'posts_per_page' => get_option('wp_searchresultsperpage'));
}

query_posts($wpq);


?>


<?php 
if ($search_manufacturer_level1 != "") { ?>
<script type="text/javascript">
	$("#manufacturer_level2").load("<?php bloginfo('template_url');?>/secondary_search_manufacturers/<?php echo $search_manufacturer_level1 ?>.txt");
</script>
<?php } ?>









