<!-- This page includes CSS styles which pull in data from Theme Options (via PHP) -->

<style type="text/css">

	/* standard color scheme */

	h1, h2, #sidebar-left #customsearch h3, .mc-panes span {
		color: #<?php echo $scheme ?>;
	}
	

	
	h3, h4, h5, h6 {
		color: #<?php echo hexDarker($scheme, 30) ?>
	}
	
	.mc-panes span {
		color: #<?php echo $scheme ?> !important;
	}
	
	body, #pagewrapper, input[type=submit], a.button, button, .mc-button, .mc-nav, .slidernav a.activeSlide, .slidernav a:hover, input[type="button"] {
		background-color: #<?php echo $scheme ?> !important;	
	}
	
	.postmeta, .mc-panes, .mc-pane, #map {
		border-color: #<?php echo $scheme ?> !important;
	}
	
	.sf-menu ul, #loancalculator {
		border-color: #<?php echo hexLighter($scheme, 50) ?> !important;
	}
	
	input[type=submit], a.button, button {
		border-color: #<?php echo hexDarker($scheme, 20) ?> !important;
	}
	
	#agentbox {border-color: #<?php echo hexLighter($scheme, 80) ?> !important;}
	
	/* Menu dropdowns */
	
	.sf-menu li li:hover, .sf-menu li li.sfHover,
	.sf-menu li li a:hover {
		background-color: #<?php echo hexLighter($scheme, 95) ?> !important;
	}
	
	#slide-panel, .btn-slide:link, .btn-slide:visited {
		background-color: #<?php echo hexDarker($scheme, 70) ?> !important;
	}
	
	
	#sliderimage {
		background-color: #<?php echo hexLighter($scheme, 90) ?> !important;
	}
	
	.slidernav a {
		background-color: #<?php echo hexLighter($scheme, 50) ?>;
	}
	
	span#price {
		background-color: #<?php echo hexLighter($scheme, 10) ?>;
	}
	
	#businesshours strong, #businesshours span, span#price {
		background-color: #<?php echo hexLighter($scheme, 10) ?>;
	}
	

	<?php if (get_option('wp_text_color_scheme')) { ?>
	/* alternate color scheme for some text IF the above color scheme is very light  */
	
	h1, h2, h3, h4, h5, h6, #customsearch, #customsearch h3, #copyright, #footer, #footer a, #footer a:visited, span#phone, button, a:link, a:visited, #sidebar-left #customsearch h3  {
		color: <?php echo $textscheme ?> !important;
	}
	
	a.button {color: white !important;}
	
	#slider a:link, #slider a:visited, #footer, #footer a:link, #footer a:visited, #footer h3, a.btn-slide:link, a.btn-slide:visited {color: white !important;}
	
	.sf-menu > li > a:link, .sf-menu > li > a:visited { color: white !important; }
	

	
	input[type="submit"], .mc-button, #ishome #customsearch input[type="submit"], .slidernav a.activeSlide, .slidernav a:hover, #slider a.button, #footer, input[type="submit"], input[type="button"], a.button, button {
		background-color: <?php echo $textscheme ?> !important;
	}
	
	span#price {
		background-color: <?php echo $textscheme ?> !important;
	}
	
	.slidernav a {
		background-color: gray;
	}	
	
	.sf-menu ul, h2, #loancalculator {
		border-color: #e6e6e6 !important;
	}
	
	<?php } ?>
	
	
	<?php if(get_option('wp_rentbuy') == "Show") { ?>
		div#location {width: 105px; float: left;}
		div#location #location_level1 { width: 90px; }
	<?php } ?>
	
			<?php if (get_option ('wp_logo2')) { ?>
		.btn-slide:link, .btn-slide:visited {
			margin-right: 230px;
		}
		<?php } ?>
	
	
	<?php $css = get_post_meta($post->ID, 'css', true); ?>
	<?php if($css) { 
		echo $css;
	} ?>
	<?php echo get_option('wp_customcss');  ?>
	
	.highlight1 {
		color: <?php echo get_option('wp_highlight_text1') ?>;
		background: <?php echo get_option('wp_highlight_background1') ?>;
		padding: 2px 0;
	}
	.highlight2 {
		color: <?php echo get_option('wp_highlight_text2') ?>;
		background: <?php echo get_option('wp_highlight_background2') ?>;
		padding: 2px 0;
	}
	
	#logo {
		width: <?php echo get_option('wp_logo_width') ?>px;
		height: <?php echo get_option('wp_logo_height') ?>px;
		background: transparent url(<?php echo get_option('wp_logo') ?>) no-repeat left top;
		position: absolute;
		top: <?php echo get_option('wp_logo_y') ?>px;
		left: <?php echo get_option('wp_logo_x') ?>px;
	}
	
	#logo2 {
		background: transparent url(<?php echo get_option('wp_logo2') ?>) no-repeat right 0;
	}
	
	#introimage {
		width: <?php echo get_option('wp_introimagewidth') ?>px;
	}
	
	
	<?php if (!get_option('wp_backgroundimage')) { ?>
		#pagewrapper {
			background: url(<?php bloginfo('template_url') ?>/images/background.png) <?php echo get_option('wp_backgroundrepeat') ?> 0 0;
		}
	<?php } else { ?>
		#pagewrapper {
			background: url(<?php echo get_option('wp_backgroundimage') ?>) <?php echo get_option('wp_backgroundrepeat') ?> 0 0;
		}
	<?php } ?>
	
	<?php
	if (get_option('wp_simpleheader') == "On") {
	?>
		#header {
			background-image: url(images/header-plain.png);
		}
	<?php	
	}	
	?>
	
	<?php if (get_option('wp_showsearchbox') == "hide") { ?>
		.sf-menu {
			right: 0;
		}
	<?php } ?>
	
	
</style>