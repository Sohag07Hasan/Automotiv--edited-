
/* <![CDATA[ */  
$(document).ready(function() {


$('div#form form').attr('name', 'form');

$('div.textwidget iframe').attr('width', '200');
$('div.textwidget iframe').attr('height', '180');
$('div.textwidget iframe').attr('frameborder', '0');
$('div.textwidget iframe').attr('scrolling', 'no');
$('div.textwidget iframe').attr('marginheight', '0');
$('div.textwidget iframe').attr('marginwidth', '0');


$('ul.sf-menu > li:nth-child(1)').before($('#browseby').show());
$("a[rel^='prettyPhoto']").prettyPhoto();




$('#loancalculator .button').click(function() {
	//form = document.myform
	
	LoanAmount = $('#LoanAmount').val();
		
	DownPayment= $('#DownPayment').val();
	
	AnnualInterestRate = ($('#InterestRate').val())/100;
	Years =  $('#NumberOfYears').val();

	MonthRate = AnnualInterestRate/12;
	NumPayments = Years * 12;
	Prin = LoanAmount - DownPayment;

	MonthPayment=Math.floor((Prin*MonthRate)/(1-Math.pow((1+MonthRate),(-1*NumPayments)))*100)/100;
	
	$('#NumberOfPayments').val(NumPayments);
	$('#MonthlyPayment').val(MonthPayment);
});

$(".latestlisting, #sliderimage, .searchresult, .salesrepresults").preloadify({ imagedelay:300 });

$('#videos a, .scrollable img, .latestlisting img, .searchresult img:not(.icon), .button, button, input[type=submit], .image').hover(function() {
	$('.imagehover').show();
	$(this).stop().animate({"opacity" : .7});									
}, function(){
	$('.imagehover').hide();
	$(this).stop().animate({"opacity" : 1});	
});




$('#prev, #next').animate({"opacity" : 0});
$('#slider').hover(function() {
	$('#prev, #next').stop().animate({"opacity" : .5});									
}, function(){
	$('#prev, #next').stop().animate({"opacity" : 0});	
});


$(".btn-slide").click(function(){
$("#slide-panel").slideToggle("slow");
});

$('#colorschemechanger .button').click(function() {
	var colorscheme = $('#color').val();
	$.cookie("color", colorscheme);
	window.location.href="http://www.buchmanndesign.com/automotiv/index.php";
});

$('#resetcolorscheme').click(function() {
	$.cookie("color", null);
	window.location.href="http://www.buchmanndesign.com/automotiv/index.php";
});

/*
if (strrpos("abcdefg", "abc") == 2) {

}
*/

$('#social a').tipsy({gravity: 's', fade: true});

//dropdown menu
 $("ul.sf-menu").supersubs({ 
	minWidth:    12,   // minimum width of sub-menus in em units 
	maxWidth:    35,   // maximum width of sub-menus in em units 
	extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
					   // due to slight rounding differences and font-family 
}).superfish();  // call supersubs first, then superfish, so that subs are 
				 // not display:none when measuring. Call before initialising 
				 // containing tabs for same reason. 
				 
// cufon font replacement
Cufon.replace("h1, h2, h3:not(#features h3, h3.nocufon), h4, h5, h6, a.readmore, a.button, .pullquote, .blockquote_left, .blockquote_right, span#phone");

// move "read more" link/button so it's inline with it's previous paragraph
$(".readmore").each(function(index) {
	$(this).appendTo($(this).parent("div").children("p:last"));
});

$("#related").insertAfter('#relatedcontainer');



$('.comment-body').append("<div class='comment_pointer' />");

$(".salesrepresults:nth-child(odd)").addClass("norightmargin");

  

//Hide (Collapse) the toggle containers on load
$(".toggle_container").hide(); 

//Switch the "Open" and "Close" state per click
$("h4.trigger").toggle(function(){
	$(this).addClass("active");
	}, function () {
	$(this).removeClass("active");
});

//Slide up and down on click
$("h4.trigger").click(function(){
	$(this).next(".toggle_container").slideToggle("slow");
});


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
remember( '[name=manufacturer_level2]' );
});

/* ]]> */
