<?php include 'variables.php' ?>

<div id="features">
<div class="inner">

<span id="price"><?php include 'price.php';  ?></span>

<ul>

<?php if($regno) { ?>
	<li><?php echo get_option('wp_regnumber_text')?>: <?php echo $regno ?></li>
<?php } ?>

<?php if($mileage) { ?>
	<li><?php echo get_option('wp_mileage_text')?>: <?php echo $mileage ?></li>
<?php } ?>

<?php if($body_type) { ?>
	<li><?php echo get_option('wp_bodytype_text')?>: <?php echo $body_type ?></li>
<?php } ?>

<?php if($regdate) { ?>
	<li><?php echo get_option('wp_regdate_text')?>: <?php echo $regdate ?></li>
<?php } ?>

<?php if($year) { ?>
	<li><?php echo get_option('wp_year_text')?>: <?php echo $year ?></li>
<?php } ?>

<?php if($enginesize) { ?>
	<li><?php echo get_option('wp_enginesize_text')?>: <?php echo $enginesize ?><?php echo get_option('wp_enginesizesuffix_text') ?></li>
<?php } ?>

<?php if($trans) { ?>
	<li><?php echo get_option('wp_trans_text')?>: <?php echo $trans ?></li>
<?php } ?>

<?php if($fueltype) { ?>
	<li><?php echo get_option('wp_fueltype_text')?>: <?php echo $fueltype ?></li>
<?php } ?>

<?php if($owners) { ?>
	<li><?php echo get_option('wp_owners_text')?>: <?php echo $owners ?></li>
<?php } ?>

<?php if($servicehistory) { ?>
	<li><?php echo get_option('wp_servicehistory_text')?>: <?php echo $servicehistory ?></li>
<?php } ?>

<?php if($extcolor) { ?>
	<li><?php echo get_option('wp_extcolor_text')?>: <?php echo $extcolor ?></li>
<?php } ?>

<?php if($intcolor) { ?>
	<li><?php echo get_option('wp_intcolor_text')?>: <?php echo $intcolor ?></li>
<?php } ?>



<?php if($toolong == 'Yes') { 
	$width = '500px';
	} else {
	$width = '680px';
	} ?>


<script type="text/javascript">
$(function() {
$('.scrollable').css('width', '<?php echo $width ?>');
});
</script>

</ul>

</div><!-- end inner -->
</div><!-- end features -->