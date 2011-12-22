<?php 
switch (get_option('wp_firstfeature')) {
	case "Engine Size":
		echo $enginesize.get_option('wp_enginesizesuffix_text'). " &bull; ";
		break;
	case "Transmission":
		echo $trans. " &bull; ";
		break;
	case "Mileage":
		echo $mileage. " " . get_option('wp_mileage_suffix') . " &bull; ";
		break;
	case "Body Type":
		echo $body_type. " &bull; ";
		break;
	case "Year":
		echo $year. " &bull; ";
		break;
}

switch (get_option('wp_secondfeature')) {
	case "Engine Size":
		echo $enginesize.get_option('wp_enginesizesuffix_text');
		break;
	case "Transmission":
		echo $trans;
		break;
	case "Mileage":
		echo $mileage. " " . get_option('wp_mileage_suffix');
		break;
	case "Body Type":
		echo $body_type;
		break;
	case "Year":
		echo $year;
		break;
}
?>