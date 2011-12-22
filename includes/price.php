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
} ?>



<?php if($price == '0') { ?>
	<?php echo get_option('wp_callforprice'); ?>
<?php } else { ?>
	<?php echo $before . $price . $after ?>
<?php } ?>