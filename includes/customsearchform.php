<?php include 'variables.php'; ?>


<script type="text/javascript">
$(document).ready(function() {

$('#manufacturer_level1').change(function() {	
	if ($('#manufacturer_level1').val() == '') {
		$.cookie('manufacturer_level2', '', { path: '/', expires: 365 });
	}
});


$('#pricemin select').change(function() {
	if ($('#pricemin select').val() == '0') {
		$.cookie('minprice2', '', { path: '/', expires: 365 });
	}
});

$('#pricemax select').change(function() {
	if ($('#pricemax select').val() == '99999999999999') {
		$.cookie('maxprice2', '', { path: '/', expires: 365 });
	}
});

$('#enginesize select').change(function() {
	if ($('#enginesize select').val() == '') {
		$.cookie('enginesize2', '', { path: '/', expires: 365 });
	}
});

$('#trans select').change(function() {
	if ($('#trans select').val() == '') {
		$.cookie('trans2', '', { path: '/', expires: 365 });
	}
});

$('#year select').change(function() {
	if ($('#year select').val() == '') {
		$.cookie('year2', '', { path: '/', expires: 365 });
	}
});

$('#mileage select').change(function() {
	if ($('#mileage select').val() == '') {
		$.cookie('mileage2', '', { path: '/', expires: 365 });
	}
});

$('#bodytype select').change(function() {
	if ($('#bodytype select').val() == '') {
		$.cookie('body_type2', '', { path: '/', expires: 365 });
	}
});


$('#customsearch input[type=submit]').click(function() {
	if ($.cookie('manufacturer_level2')) {
		$.cookie('manufacturer_level2', '', { path: '/', expires: 365 });
	}
});


});
</script>


<?php
$searchpage = get_post($wp_searchpageid);
$slugname = $searchpage -> post_name;

if (get_option('wp_searchresultspagefix') == "Yes") { 
	$fix = "index.php/";
	} elseif (get_option('wp_searchresultspagefix') == "No") {
	$fix = "";
	} 
?>

<form id="search" action="<?php bloginfo('url'); ?>/<?php echo $fix; ?><?php echo $slugname; ?>" method="post">

			<div id="manufacturer">	
        	<label><?php echo get_option('wp_manufacturer_text')  ?>:</label>
            	<?php
				$manufacturer_level1 = get_option('wp_manufacturer_level1');
				//var_dump($manufacturer_level1);
				
				$arr_manufacturer_level1 = apply_filters('primary_manufactuerer_search',explode("\n", $manufacturer_level1));
							
				echo "<select id='manufacturer_level1' name='manufacturer_level1'>";
				$counter = 0;
				foreach ($arr_manufacturer_level1 as $item => $value) {
					if($counter == 0) {
					echo "<option value='' selected='selected'>". get_option('wp_any_text') ."</option>";
					echo "<option value='".$value."'>".$value."</option>";
					} else {
					
						echo "<option value='".$value."'>".$value."</option>";
				}
				$counter = $counter + 1;
				}
				echo "</select>";
				?>
				
				<?php if(get_option("wp_secondary_manufacturer") == 'Enable') { ?>
				
					<script type="text/javascript">
						var models = new Array();
						
						<?php
							foreach($arr_manufacturer_level1 as $man){
								if($man == '') continue;
								$id = 'wp_' . preg_replace('/[ ]/','',$man);							
								$models = get_option($id);
								if(count($models) < 1) continue;
								$a = '';
								foreach($models as $mod){
									$a .= "<option value='$mod'>$mod</option>";
								}
								echo "models['$id'] = \"$a\"";
							}
													 
						?>						
					</script> 
				
				<?php } ?>
				
				<?php if(get_option("wp_secondary_manufacturer") == 'Enable') { ?>
					 <label><?php echo get_option('wp_Heading_Manufacturer_Level2') ?></label>
					 <div id="manufacturer_level2_drop_down">
					 <select id="manufacturer_level2" name="manufacturer_level2">
					 
					 </select>
					 </div>
					
				<?php } ?>
			</div><!-- end manufacturer -->
				
				
				
			<?php
			
if (get_option('wp_currencyposition') == "Before") {
	$before = $currencysymbol;
	} elseif (get_option('wp_currencyposition') == "After") {
	$before = "";
	} 
	
if (get_option('wp_currencyposition') == "After") {
	$after = $currencysymbol;
	} elseif (get_option('wp_currencyposition') == "Before") {
	$after = "";
}
			

$prices = get_option('wp_price');
$arr_prices = explode("\n", $prices);
foreach ($arr_prices as $price) {
	$priceoptions = $priceoptions . "<option value='" . $price . "'>" . $before . number_format($price, 0, '.', get_option('wp_thousandseparator')) . $after . "</option>";
}

$enginesizes = get_option('wp_enginesizes');
$arr_enginesizes = explode("\n", $enginesizes);
foreach ($arr_enginesizes as $enginesize) {
	$enginesizeoptions = $enginesizeoptions . "<option value='" . $enginesize . "'>" . $enginesize . "L+</option>";
}


$mileagelevels = get_option('wp_mileagelevels');
$arr_mileagelevels = explode("\n", $mileagelevels);
foreach ($arr_mileagelevels as $mileage) {
	$mileageoptions = $mileageoptions . "<option value='" . $mileage . "'>" . number_format($mileage) . "+</option>";
}


$yearlevels = get_option('wp_yearlevels');
$arr_yearlevels = explode("\n", $yearlevels);
foreach ($arr_yearlevels as $year) {
	$yearoptions = $yearoptions . "<option value='" . $year . "'>" . $year . "+</option>";
}

?>


<!-- minimum price dropdown menu -->
			
			<div id="pricemin">
            <label for="pricemin"><?php echo get_option('wp_minimumprice_text')  ?>:</label>
				<select name="minprice2">
					<option value="0"><?php echo get_option('wp_nomin_text'); ?></option>
                    <?php echo $priceoptions; ?>
				</select>
			</div><!-- end pricemin -->
			
			
			<!-- Maximum price dropdown menu -->
			
			<div id="pricemax">
			<label for="pricemax"><?php echo get_option('wp_maximumprice_text')  ?>:</label>
				<select name="maxprice2">
                	<option value="99999999999999"><?php echo get_option('wp_nomax_text'); ?></option>
					<?php echo $priceoptions; ?>
				</select>
			</div><!-- end pricemax -->


			
<!-- ENGINE SIZE SEARCH FIELD -->	

<?php if (get_option('wp_search_first')== 'Engine Size' || get_option('wp_search_second')== 'Engine Size' || get_option('wp_search_third')== 'Engine Size' ) {  ?>
<div id="enginesize">
				<label><?php echo get_option('wp_enginesize_text')  ?>:</label>
            	<select name="enginesize2">
                	<option value=""><?php echo get_option('wp_any_text'); ?></option>
                    <?php echo $enginesizeoptions; ?>
                </select>
				</div><!-- end enginesize -->
<?php } ?>
			

<!-- TRANSMISSION SEARCH FIELD -->				
<?php if (get_option('wp_search_first')== 'Transmission' || get_option('wp_search_second')== 'Transmission' || get_option('wp_search_third')== 'Transmission' ) {  ?>
			<div id="trans">
            <label><?php echo get_option('wp_trans_text')  ?>:</label>
			    <select name="trans2">
                	<option value=""><?php echo get_option('wp_any_text'); ?></option>
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                    <option value="Semi-Auto">Semi-Auto</option>
                    <option value="Other">Other</option>
				</select>
				</div><!-- end trans -->
<?php } ?>


<!-- MODEL YEAR SEARCH FIELD -->				
<?php if (get_option('wp_search_first')== 'Year' || get_option('wp_search_second')== 'Year' || get_option('wp_search_third')== 'Year' ) {  ?>
			<div id="year">
            <label><?php echo get_option('wp_year_text')  ?>:</label>
			    <select name="year2">
                	<option value=""><?php echo get_option('wp_any_text'); ?></option>
					<?php echo $yearoptions; ?>
				</select>
				</div><!-- end year -->
<?php } ?>


<!-- MILEAGE SEARCH FIELD -->				
<?php if (get_option('wp_search_first')== 'Mileage' || get_option('wp_search_second')== 'Mileage' || get_option('wp_search_third')== 'Mileage' ) {  ?>
			<div id="mileage">
            <label><?php echo get_option('wp_mileage_text')  ?>:</label>
			    <select name="mileage2">
                	<option value=""><?php echo get_option('wp_any_text'); ?></option>
                    <?php echo $mileageoptions; ?>
				</select>
				</div><!-- end mileage -->
<?php } ?>



<!-- BODY TYPE SEARCH FIELD (data is from Theme Options) -->	
<?php if (get_option('wp_search_first')== 'Body Type' || get_option('wp_search_second')== 'Body Type' || get_option('wp_search_third')== 'Body Type' ) {  ?>
<div id="bodytype">
<label><?php echo get_option('wp_bodytype_text')  ?>:</label>
   <?php
	$bodytype = get_option('wp_bodytype');
	$arr_bodytype = explode("\n", $bodytype);


	$counter = 0;
	echo "<select id='body_type' name='body_type2'>";
	
	foreach ($arr_bodytype as $item => $value) {
		if($counter == 0) {
		echo "<option value='' selected='selected'>". get_option('wp_any_text') ."</option>";
		echo "<option value='".$value."'>".$value."</option>";
		} else {
		
			echo "<option value='".$value."'>".$value."</option>";
	}
	$counter = $counter + 1;
	}	
	echo "</select>";				
	?>

</div><!-- end bodytype -->
<?php } ?>
			
		

			
			
			 <div><input value="<?php echo get_option('wp_searchbutton_text') ?>" type="submit" /></div>
			 

		
        </form>
		
		        <div class="clear"></div>
				

<?php if(get_option("wp_secondary_manufacturer") == "Enable") { ?>
<script type="text/javascript">
$(document).ready(function() {
		
	if ($('#manufacturer_level1').val() != '') {
	
		$filename = $('#manufacturer_level1').val().replace(" ", "");		
		$filename = $filename.replace(/\s/g,'');
		
		var html_val = models['wp_'+$filename];
		
		if(html_val.length > 5){			
			$("#manufacturer_level2").html(html_val);
			//alert(models['wp_'+$filename_nospaces]);
			$('#manufacturer_level2_drop_down').show();
		}
		else{
			$("#manufacturer_level2").html(null);
			$('#manufacturer_level2_drop_down').hide();
		}		
			
	}


$("#manufacturer_level1").change(function() {
	
	$filename_nospaces = $(this).val().replace(" ", "");
		$filename_nospaces = $filename_nospaces.replace(" ", "");
		$filename_nospaces = $filename_nospaces.replace(/\s/g,'');
		if($filename_nospaces != ''){
			var html_value = models['wp_'+$filename_nospaces];
			if(html_value.length > 5){			
				$("#manufacturer_level2").html(html_value);
				//alert(models['wp_'+$filename_nospaces]);
				$('#manufacturer_level2_drop_down').show();
			}
			else{
				$("#manufacturer_level2").html(null);
				$('#manufacturer_level2_drop_down').hide();
			}
		}
		else{
			$("#manufacturer_level2").html(null);
			$('#manufacturer_level2_drop_down').hide();
		}		

	});
});
</script>
<?php } ?>


				
				
				
<script type="text/javascript">
function remember( selector ){
$(selector).each(
function(){
//if this item has been cookied, restore it
var name = $(this).attr('name');
if( $.cookie( name ) ){
$(this).val( $.cookie(name) );
}
//assign a change function to the item to cookie it
$(this).change(
function(){
$.cookie(name, $(this).val(), { path: '/', expires: 365 });
}
);
}
);
}
remember( '[name=manufacturer_level1], [name=enginesize2],[name=trans2], [name=minprice2], [name=maxprice2], [name=body_type2], [name=year2], [name=mileage2] ' );		
</script>




