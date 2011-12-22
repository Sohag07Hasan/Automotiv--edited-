<?php

// SHORT CODES (Columns)
 
add_shortcode("one_quarter", "one_quarter");
add_shortcode("one_quarter_last", "one_quarter_last"); 
 
function one_quarter($atts, $content = null) {
	return "<div class='one_quarter'>".$content."</div>";
}

function one_quarter_last($atts, $content = null) {
	return "<div class='one_quarter last'>".$content."</div>";
}

add_shortcode("two_thirds", "two_thirds");
add_shortcode("two_thirds_last", "two_thirds_last");

function two_thirds($atts, $content = null) {
	return "<div class='two_thirds'>".$content."</div>";
}

function two_thirds_last($atts, $content = null) {
	return "<div class='two_thirds last'>".$content."</div>";
}

add_shortcode("one_third", "one_third");
add_shortcode("one_third_last", "one_third_last");

function one_third($atts, $content = null) {
	return "<div class='one_third'>".$content."</div>";
}

function one_third_last($atts, $content = null) {
	return "<div class='one_third last'>".$content."</div>";
}

add_shortcode("one_half", "one_half");
add_shortcode("one_half_last", "one_half_last");

function one_half($atts, $content = null) {
	return "<div class='one_half'>".$content."</div>";
}

function one_half_last($atts, $content = null) {
	return "<div class='one_half last'>".$content."</div>";
}

add_shortcode("three_quarters", "three_quarters");
add_shortcode("three_quarters_last", "three_quarters_last");

function three_quarters($atts, $content = null) {
	return "<div class='three_quarters'>".$content."</div>";
}

function three_quarters_last($atts, $content = null) {
	return "<div class='three_quarters last'>".$content."</div>";
}


// SHORT CODES (Back to Top)

add_shortcode("top", "top");

function top($atts, $content = null) {
	return "<div><a class='top' href='#top'>". get_option('wp_top') ."</a></div>";
}


// SHORT CODES (clear)
add_shortcode("clear", "clear");

function clear($atts, $content = null) {
	return "<div class='clearboth'></div>";
}

// SHORT CODES (dropcap)

add_shortcode("dropcap", "dropcap");

function dropcap($atts, $content = null) {
	return "<span class='dropcap'>".$content."</span>";
}

// SHORT CODES (Button)

add_shortcode("button", "button");

function button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return "<a class='button' href='".$url."'>".$content."</a>";
}



// prettyphoto video link

add_shortcode("prettyphoto", "prettyphoto");

function prettyphoto($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return "<a rel='prettyphoto[flash]' href='http://www.informatik.com/themeforest/screencasts/automotiv/".$url."?width=960&amp;height=700'><img style='margin-bottom: 40px;' width='256' height='256' class='alignleft' src='http://www.informatik.com/themeforest/openhouse2/wp-content/uploads/2010/09/video_icon.png' /></a>";
}

// SHORT CODE (Toggle)

add_shortcode("toggle", "toggle");

function toggle($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	return "<h4 class='trigger'><a href='#'>".$title."</a></h4><div class='toggle_container'><div class='block'><p>".$content."</p></div></div>";
}


// SHORT CODE (pullquote)

add_shortcode("pullquote_right", "pullquote_right");

function pullquote_right($atts, $content = null) {
		return "<span class='pullquote right'>".$content."</span>";
}

add_shortcode("pullquote_left", "pullquote_left");

function pullquote_left($atts, $content = null) {
		return "<span class='pullquote left'>".$content."</span>";
}


// SHORT CODE (divider line)

add_shortcode("line", "line");

function line($atts, $content = null) {
		return "<div class='line'></div>";
}


// SHORT CODE (highlight)

add_shortcode("highlight1", "highlight1");

function highlight1($atts, $content = null) {
		return "<span class='highlight1'>".$content."</span>";
}

add_shortcode("highlight2", "highlight2");

function highlight2($atts, $content = null) {
		return "<span class='highlight2'>".$content."</span>";
}
?>