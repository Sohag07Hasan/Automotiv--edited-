<!-- internal javascript, so it can mix javascript with PHP -->
<script type="text/javascript">
/* <![CDATA[ */  
$(document).ready(function() {

<?php if (get_option('wp_showhomeicon') == "show") { ?>
$('<li id="home"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>').prependTo('.sf-menu');
<?php } ?>

$('<li id="footerhome"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>').prependTo('#footermenu');


// slideshow on homepage
$('#slider .images').after('<div class="slidernav">').cycle({
	fx: '<?php echo get_option('wp_transition') ?>',
	timeout: <?php echo get_option('wp_interval') ?>,
	next: '#next',
	prev: '#prev'	
	<?php if (get_option('wp_slideshowsource') == "Recent Listings") { ?>
	, pager: '.slidernav'
	<?php } ?>
 });
 
 
 //cycle plugin for property detail page
$('#sliderimage').after('<div class="scrollable"><div class="items">').cycle({
	fx: '<?php echo get_option('wp_transition') ?>',
	timeout: 0,
	slideExpr: "div.image",
	pager: ".items",
	// callback fn that creates a thumbnail to use as pager anchor 
    pagerAnchorBuilder: function(idx, slide) { 
	
		var src = $('img', slide).attr('src');
		
        return '<img src="' + src + '&amp;w=62&amp;h=62&amp;zc=1"/>';
    } 
	});
 
 <?php if (is_home() && get_option('wp_demo') == "on") { ?>

$('#demo').hide();
$('#picker').farbtastic('#color');

<?php } ?> 

$('input#s').val("<?php echo get_option('wp_searchwatermarktext'); ?>").addClass('lightsearchboxtext');
$('input#s').focus(function() {
	$(this).val("").removeClass('lightsearchboxtext');
});
$('input#s').blur(function() {
	if ($(this).val() == "") {
		$(this).val("<?php echo get_option('wp_searchwatermarktext'); ?>").addClass('lightsearchboxtext');
	}
});

});

/* ]]> */
</script>