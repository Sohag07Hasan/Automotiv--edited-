<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_option('wp_favicon');?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title> 
<?php if (function_exists('is_tag') && is_tag()) { 
single_tag_title('Tag Archive for &quot;'); echo '&quot; - '; 
} elseif (is_archive()) { 
wp_title(''); echo ' Archive - '; 
} elseif (is_search()) { 
echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 
} elseif (!(is_404()) && (is_single()) || (is_page())) { 
wp_title(''); echo ' - '; 
} elseif (is_404()) { 
echo 'Not Found - '; 
} 
if (is_home()) { 
bloginfo('name'); echo ' - '; bloginfo('description'); 
} else { 
bloginfo('name'); 
} 
if ($paged > 1) { 
echo ' - page '. $paged; 
} ?> 
</title> 

<?php
	// Checks for color scheme cookie:
	if(!empty($_COOKIE['color'])) $cookiecolorscheme = $_COOKIE['color'];
?>

<meta name="generator" content="WordPress" /> <!-- leave this for stats -->

<?php wp_head(); ?>    

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/supersubs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cookies.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/font_museo_sans.js"></script>  
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/preload.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/tooltips.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/CSS/print.css" type="text/css" media="print" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/CSS/superfish.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/CSS/prettyPhoto.css" type="text/css" media="screen" />


<script type="text/javascript">
setTimeout('delay();', 2000);
function delay(){
$('.slidertext').show();
}


</script>


<?php if(get_option('wp_demo') == "on") {
include 'includes/democolorpicker.php';
 } ?>

<?php $scheme = get_option('wp_color_scheme'); 
$textscheme = get_option('wp_text_color_scheme');

if ($cookiecolorscheme) {
	$scheme = $cookiecolorscheme;
	} else {
	$scheme = $scheme;
	}
	
	$scheme = substr($scheme, 1);
?>
	
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php include 'CSS/css.php';  ?>
<?php include 'js/js.php';  ?>


<!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/CSS/ie.css" />   
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/CSS/ie7.css" /> 
<![endif]-->

<!-- for threaded comments -->
<?php if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) wp_enqueue_script('comment-reply'); ?> 
</head>

<?php if (is_home()) { 
	$home = "ishome";
	} else { 
	$home = "nothome";
 } ?>

<body id="<?php echo $home ?>">


<?php include 'includes/variables.php' ?>


<div id="pagewrapper">
<div id="wrapper">


	<div id="header">
	


	<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	
	<?php include 'includes/loginform.php'; ?>
	
	<div id="logo2"></div>
		<?php if(get_bloginfo('description') != '') { ?>
			<p id="description"><?php bloginfo('description'); ?></p>
		<?php } ?> 
		
		<?php 
		if (get_option('wp_showsearchbox') == "show") {
			include (TEMPLATEPATH . '/searchform.php'); 
		}
		?>
		
		<?php $newscat = get_option('wp_newscategory');  ?>
		<?php $newscatid = get_cat_id($newscat) ?>
		
		
		<?php if(get_option('wp_phone')) { ?>
			<span id="phone"><?php echo get_option('wp_phone') ?></span>
		<?php } ?>
		

<?php wp_nav_menu( array('theme_location' => 'main', 'container' => 'div', 'sort_column' => 'menu_order', 'menu_class' => 'sf-menu' ) ); ?>

	</div><!-- end header -->
	
	





























