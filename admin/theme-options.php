<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "wp";

$optionalsearchparameters1 = array("Mileage", "Transmission", "Engine Size", "Body Type", "Year");
$optionalsearchparameters2 = array("Year", "Transmission", "Mileage", "Body Type", "Engine Size");

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 


// Put Categories into an array (for use in various dropdown menus)
$categories_list = get_categories('hide_empty=0&orderby=name');
$getcat = array();

	foreach($categories_list as $acategory)
	{
		$getcat[$acategory->cat_ID] = $acategory->cat_name;
	}
	
$category_dropdown = array_unshift($getcat, "Choose a category:");


// Put Pages into an array (for use in dropdown for Theme Options)
$pages_list = get_pages();
$getpag = array();

	foreach($pages_list as $apage)
	{
		$getpag[$apage->ID] = $apage->post_title;
	}
	
array_unshift($getpag, "Select a page:");



//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}



//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Set the Options Array
$options = array();

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Color Scheme",
	"desc" => "Set the colour scheme for the theme.  This color will be used for the site background, headers, and buttons.  It is best to choose relatively dark colors, otherwise some headers will appear too light against light backgrounds.  If you do choose a very light color, you will have to edit some CSS so some text is legible against light backgrounds.",
	"id" => $shortname."_color_scheme",
	"type" => "color",
	"std" => "#3B3B3B");
	
$options[] = array( "name" => "Alternate Text Color Scheme",
	"desc" => "If you set an overall color scheme that is very light, then some text (that is using the Color Scheme color) that is on a light background will be difficult or impossible to read.  If that is happening, set a color here to something relatively dark, so that the text is readable.",
	"id" => $shortname."_text_color_scheme",
	"type" => "color",
	"std" => "");
	
$options[] = array( "name" => "Logo URL (Main)",
	"desc" => "Enter the link to your logo image.  Simply upload image with Wordpress, and copy/paste the final URL here.",
	"id" => $shortname."_logo",
	"type" => "upload",
	"std" => "");
	
$options[] = array( "name" => "Logo width",
	"desc" => "The width (in pixels) of your logo image",
	"id" => $shortname."_logo_width",
	"type" => "text",
	"std" => "400");
	
$options[] = array( "name" => "Logo height",
	"desc" => "The height (in pixels) of your logo image",
	"id" => $shortname."_logo_height",
	"type" => "text",
	"std" => "100");	
	
$options[] = array( "name" => "Logo position X",
	"desc" => "Tweak the X/Y position of the logo (X is horizontal position)",
	"id" => $shortname."_logo_x",
	"type" => "text",
	"std" => "0");	
	
$options[] = array( "name" => "Logo position Y",
	"desc" => "Tweak the X/Y position of the logo (Y is vertical position).  Negative numbers go up, positive numbers, down.",
	"id" => $shortname."_logo_y",
	"type" => "text",
	"std" => "50");	
	
	
$options[] = array( "name" => "Background Image",
	"desc" => "The background image for the site. By default the built-in image is a tall but thin image that gives the gradient effect with the menu bar strip. If you leave this field blank then the default background will be used.",
	"id" => $shortname."_backgroundimage",
	"type" => "upload",
	"std" => "");	
	
$options[] = array( "name" => "Background Image Tileing",
	"desc" => "Repeat the background image on the X axis, Y axis, or don't repeat.",
	"id" => $shortname."_backgroundrepeat",
	"type" => "select",
	"options" => array("repeat-x", "repeat-y", "no-repeat"),
	"std" => "repeat-x");	
	
$options[] = array( "name" => "Compare Page",
	"desc" => "Your 'Compare' listings page.",
	"id" => $shortname."_comparepage",
	"type" => "select",
	"options" => $getpag,
	"std" => "");
	
$options[] = array( "name" => "Search Results Page",
	"desc" => "What 'Page' is your Search Results",
	"id" => $shortname."_searchresultspage",
	"type" => "select",
	"options" => $getpag,
	"std" => "");
	
$options[] = array( "name" => "Results per page",
	"desc" => "How many search results per page?",
	"id" => $shortname."_searchresultsperpage",
	"type" => "text",
	"std" => "9");
	
$options[] = array( "name" => "Search Results Order",
	"desc" => "How do you want your search results ordered?",
	"id" => $shortname."_searchorder",
	"type" => "select",
	"options" => array('Price Descending', 'Price Ascending', 'Date Descending', 'Date Ascending', 'Random'),
	"std" => "Price Descending");
	
	
$options[] = array( "name" => "Search Results Order",
	"desc" => "How do you want your search results ordered by default? (The user will be able to change this on the site front end)",
	"id" => $shortname."_searchorder",
	"type" => "select",
	"options" => array('Price Descending', 'Price Ascending', 'Date Descending', 'Date Ascending', 'Mileage Descending', 'Mileage Ascending', 'Model Year Descending', 'Model Year Ascending'),
	"std" => "Price Descending");
	
$options[] = array( "name" => "Features by category?",
	"desc" => "In the listing detail page, do you want the 'features' to be shown categorized in blocks? (For example, a section for Performance features, Safety features, Comfort features, etc.) If you choose Yes, then your Featurs taxonomy must be hierarchical. For example, you'll have a Performance feature, and under it will be child features for it. See documentation for more info.",
	"id" => $shortname."_features_by_category",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
	
$options[] = array( "name" => "Recent Listings Quantity (homepage, thumbnail version)",
	"desc" => "How many recent automobile listings do you want to show in the homepage? (this is the thumbnail image version of Recent Listings)",
	"id" => $shortname."_recentlistingsnumber_home",
	"type" => "text",
	"std" => "2");
	
$options[] = array( "name" => "Recent Listings Quantity (sidebar, thumbnail version)",
	"desc" => "How many recent automobile listings do you want to show on the sidebar? (this is the thumbnail image version of Recent Listings)",
	"id" => $shortname."_recentlistingsnumber_sidebar",
	"type" => "text",
	"std" => "4");
	
$options[] = array( "name" => "Recent Listings Quantity (text-only version on homepage)",
	"desc" => "In the right column of the homepage, you can add a list of Latest Listings that are text-only, with no images. Just the name/title of the automobile.  Enter the maximum number to show.",
	"id" => $shortname."_recentlistingsnumber_textversion",
	"type" => "text",
	"std" => "10");	
	
	
$options[] = array( "name" => "Primary Search Manufacturer Items (for search box)",
	"desc" => "Enter items for the Primary Search Manufacturer (first level).  Each item on new line. Optionally you can add Secondary manufacturer items.  You enable it with the 'Enable Secondary manufacturer items' setting below.  Please see documentation for detailed information.",
	"id" => $shortname."_manufacturer_level1",
	"type" => "textarea",
	"std" => "Ford\nToyota\nMazda\nHonda\nPorsche");
	
	
$options[] = array( "name" => "Enable Secondary Search Manufacturer",
	"desc" => "Enable this if you want a secondary level dropdown menu with more specific automobile models.  If this setting is enabled, then when a manufacturer is selected, a secondary dropdown menu will appear with a list of automobile name from that manufacturer.  Please see documentation for details.",
	"id" => $shortname."_secondary_manufacturer",
	"type" => "select",
	"options" => array("Enable", "Disable"),
	"std" => "Enable");
	

$options[] = array( "name" => "Body Types",
	"desc" => "Enter the body types.  This will be used for Search Criteria. You can customize this list in Theme Options. (one on each line with no blank lines)",
	"id" => $shortname."_bodytype",
	"type" => "textarea",
	"std" => "Sports\nSUV\nMinivan/Van\nWagon\nCrossover\nSedan\nConvertible\nLuxury\nHatchback\nTruck\nCoupe");
	
	
$options[] = array( "name" => "Price Levels",
	"desc" => "Price levels (for min/max price dropdowns in the Search) (one on each line with no blank lines)",
	"id" => $shortname."_price",
	"type" => "textarea",
	"std" => "1000\n1500\n2000\n2500\n3000\n3500\n4000\n4500\n5000\n5500\n6000\n6500\n7000\n7500\n8000\n8500\n9000\n9500\n10000\n15000\n20000\n30000\n40000\n50000\n75000\n100000");
	
$options[] = array( "name" => "Engine Sizes",
	"desc" => "Enter a list of engine sizes (one on each line with no blank lines)",
	"id" => $shortname."_enginesizes",
	"type" => "textarea",
	"std" => "0.5\n0.6\n0.7\n0.8\n0.9\n1.0\n1.1\n1.2\n1.3\n1.4\n1.5\n1.6\n1.7\n1.8\n1.9\n2.0\n2.1\n2.2\n2.3\n2.4\n2.5\n2.6\n2.7\n2.8\n2.9\n3.0\n3.1\n3.2\n3.3\n3.4\n3.5\n3.6\n3.7\n3.8\n3.9\n4.0\n4.1\n4.2\n4.3\n4.4\n4.5\n4.6\n4.7\n4.8");
	
$options[] = array( "name" => "Fuel Types",
	"desc" => "Enter a list of fuel types (one on each line with no blank lines)",
	"id" => $shortname."_fueltypes",
	"type" => "textarea",
	"std" => "Gas\nDiesel\nElectric\nHybrid");	
	
$options[] = array( "name" => "Mileage Intervals",
	"desc" => "Enter a list of mileage levels for the mileage dropdown in the Search (one on each line with no blank lines)",
	"id" => $shortname."_mileagelevels",
	"type" => "textarea",
	"std" => "5000\n10000\n20000\n30000\n40000\n50000\n60000\n70000\n80000\n90000\n100000");

$options[] = array( "name" => "Model Year Intervals",
	"desc" => "Enter a list of model year levels for the Model Year dropdown in the Search (one on each line with no blank lines)",
	"id" => $shortname."_yearlevels",
	"type" => "textarea",
	"std" => "2009\n2008\n2007\n2006\n2005\n2000\n1995\n1990\n1985\n1980");	
	
$options[] = array( "name" => "First Feature",
	"desc" => "The slideshow, latest listings, and search results show 2 features separated by a bullet.  This is the first feature.",
	"id" => $shortname."_firstfeature",
	"type" => "select",
	"options" => $optionalsearchparameters1,
	"std" => "Mileage");
	
$options[] = array( "name" => "Second Feature",
	"desc" => "The slideshow, latest listings, and search results show 2 features separated by a bullet.  This is the second feature.",
	"id" => $shortname."_secondfeature",
	"type" => "select",
	"options" => $optionalsearchparameters2,
	"std" => "Year");
	


$options[] = array( "name" => "Search Parameter 1",
	"desc" => "The Search box has 3 FIXED fields: Manufacturer, Min Price, and Max Price. The next 3 are set here.  This is the <strong>first one</strong>.",
	"id" => $shortname."_search_first",
	"type" => "select",
	"options" => array("Body Type", "Transmission", "Mileage", "Engine Size", "Year"),
	"std" => "Body Type");
	
$options[] = array( "name" => "Search Parameter 2",
	"desc" => "The Search box has 3 FIXED fields: Manufacturer, Min Price, and Max Price. The next 3 are set here.  This is the <strong>second one</strong>.",
	"id" => $shortname."_search_second",
	"type" => "select",
	"options" => array("Transmission", "Engine Size", "Mileage", "Body Type", "Year"),
	"std" => "Transmission");

$options[] = array( "name" => "Search Parameter 3",
	"desc" => "The Search box has 3 FIXED fields: Manufacturer, Min Price, and Max Price. The next 3 are set here.  This is the <strong>third one</strong>.",
	"id" => $shortname."_search_third",
	"type" => "select",
	"options" => array("Mileage", "Transmission", "Engine Size", "Body Type", "Year"),
	"std" => "Mileage");
	

$options[] = array( "name" => "Currency Symbol",
	"desc" => "If your symbol is an unusual character, enter the html entity string: 'http://www.w3schools.com/tags/ref_entities.asp'",
	"id" => $shortname."_currency",
	"type" => "text",
	"std" => "$");
	
$options[] = array( "name" => "Currency Symbol Position",
	"desc" => "Do you want the currency symbol to be before or after the price?",
	"id" => $shortname."_currencyposition",
	"type" => "select",
	"options" => array("Before", "After"),
	"std" => "Before");
	
	
$options[] = array( "name" => "Thousand Separator ",
	"desc" => "Usually a comma or a period to separate between thousands, for the price.",
	"id" => $shortname."_thousandseparator",
	"type" => "text",
	"std" => ",");
	
$options[] = array( "name" => "phone",
	"desc" => "Phone number",
	"id" => $shortname."_phone",
	"type" => "text",
	"std" => "");

	
$options[] = array( "name" => "Simplified Header Style",
	"desc" => "The simplified header style removes the background tachometer image",
	"id" => $shortname."_simpleheader",
	"type" => "select",
	"options" => array("Off", "On"),
	"std" => "Off");
	
$options[] = array( "name" => "Custom CSS",
	"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}. The CSS is placed in the head of every page, thus overriding the global style.css",
	"id" => $shortname."_customcss",
	"type" => "textarea",
	"std" => "");	
	
	
	
	
	
	
	
$options[] = array( "name" => "Custom Text",
                    "type" => "heading");	
	
	$options[] = array( "name" => "Intro Heading",
	"desc" => "Heading text for homepage Intro",
	"id" => $shortname."_introheading",
	"type" => "text",
	"std" => "Welcome to Automotiv");

$options[] = array( "name" => "Intro Text",
	"desc" => "Introduction text for the homepage. Enclose all paragraphs with HTML paragraph tags.",
	"id" => $shortname."_introtext",
	"type" => "textarea",
	"std" => "<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.</p>");
	
$options[] = array( "name" => "Watermark text in menubar search box",
	"desc" => "The light gray text in the search box in the menu bar. When you click on it the text disappears.",
	"id" => $shortname."_searchwatermarktext",
	"type" => "text",
	"std" => "Search blog and news");
	
	
$options[] = array( "name" => "Heading for 'All Automobiles'",
	"desc" => "Menu text for 'All Automobiles' (optional). See documentation to see how to create the All Automobiles page and menu item.",
	"id" => $shortname."_allvehicles",
	"type" => "text",
	"std" => "All Automobiles");

$options[] = array( "name" => "Latest Listings header text (thumbnail image version)",
	"desc" => "Heading text for the Latest Listings section on homepage (the main one with the thumbnail images, title, price, etc.",
	"id" => $shortname."_heading_latestlistings",
	"type" => "text",
	"std" => "Recent Automobiles");	

$options[] = array( "name" => "Latest Listings heading (text-only version)",
	"desc" => "Heading text for the Latest Listings list on the homepage (the text-only list, with no thumbnails).",
	"id" => $shortname."_heading_latestlistings_textversion",
	"type" => "text",
	"std" => "Latest Posts");
	
$options[] = array( "name" => "Search heading text",
	"desc" => "Heading text for the Search section",
	"id" => $shortname."_heading_customsearch",
	"type" => "text",
	"std" => "Quick Search");
	
$options[] = array( "name" => "Manufacturer text",
	"desc" => "Text for 'Manufacturer' in the Search section",
	"id" => $shortname."_manufacturer_text",
	"type" => "text",
	"std" => "Manufacturer");
	
$options[] = array( "name" => "Minimum price text",
	"desc" => "Text for 'Minimum price' in the Search section",
	"id" => $shortname."_minimumprice_text",
	"type" => "text",
	"std" => "Min Price");	
	
$options[] = array( "name" => "Maximum price text",
	"desc" => "Text for 'Maximum price' in the Search section",
	"id" => $shortname."_maximumprice_text",
	"type" => "text",
	"std" => "Max Price");	
	
$options[] = array( "name" => "Engine Size text",
	"desc" => "Text for 'Engine Size' in the Search section (if included), and detail page",
	"id" => $shortname."_enginesize_text",
	"type" => "text",
	"std" => "Engine Size");
	
$options[] = array( "name" => "Engine Size Suffix",
	"desc" => "Suffix after the engine size",
	"id" => $shortname."_enginesizesuffix_text",
	"type" => "text",
	"std" => "L");
	
$options[] = array( "name" => "Transmission text",
	"desc" => "Text for 'Transmission' in the Search section, slider, etc. (if included), and detail page",
	"id" => $shortname."_trans_text",
	"type" => "text",
	"std" => "Trans");
	
$options[] = array( "name" => "Body type text",
	"desc" => "Text for 'Body Type' in the Search section (if included), and detail page",
	"id" => $shortname."_bodytype_text",
	"type" => "text",
	"std" => "Body Type");	
	
$options[] = array( "name" => "Year text",
	"desc" => "Text for 'Year' in the Search section (if included), and detail page",
	"id" => $shortname."_year_text",
	"type" => "text",
	"std" => "Model Year");	
	
$options[] = array( "name" => "Mileage text",
	"desc" => "Text for 'Mileage' in the Search section (if included), and detail page",
	"id" => $shortname."_mileage_text",
	"type" => "text",
	"std" => "Mileage");
	
$options[] = array( "name" => "Registration Number text",
	"desc" => "Text for 'Registration Number' in the detail page",
	"id" => $shortname."_regnumber_text",
	"type" => "text",
	"std" => "Reg Number");	
	
$options[] = array( "name" => "Registration Date",
	"desc" => "Text for 'Registration Date' in the detail page",
	"id" => $shortname."_regdate_text",
	"type" => "text",
	"std" => "Reg Date");	

$options[] = array( "name" => "Registration Number text",
	"desc" => "Text for 'Registration Number' in the detail page",
	"id" => $shortname."_regnumber_text",
	"type" => "text",
	"std" => "Reg Number");	

$options[] = array( "name" => "Fuel Type text",
	"desc" => "Text for 'Fuel Type' in the detail page",
	"id" => $shortname."_fueltype_text",
	"type" => "text",
	"std" => "Fuel Type");	
	
$options[] = array( "name" => "Owners text",
	"desc" => "Text for 'Owners' in the detail page",
	"id" => $shortname."_owners_text",
	"type" => "text",
	"std" => "Owners");	

$options[] = array( "name" => "Service History text",
	"desc" => "Text for 'Service History' in the detail page",
	"id" => $shortname."_servicehistory_text",
	"type" => "text",
	"std" => "Service History");
	
$options[] = array( "name" => "Exterior Color text",
	"desc" => "Text for 'Exterior Color' in the detail page",
	"id" => $shortname."_extcolor_text",
	"type" => "text",
	"std" => "Ext color");

$options[] = array( "name" => "Interior Color text",
	"desc" => "Text for 'Interior Color' in the detail page",
	"id" => $shortname."_intcolor_text",
	"type" => "text",
	"std" => "Int color");	
	

$options[] = array( "name" => "Mileage text 2",
	"desc" => "Text after the mileage number. For example: 'miles', 'KM'",
	"id" => $shortname."_mileage_suffix",
	"type" => "text",
	"std" => "Miles");
	
$options[] = array( "name" => "'Call for Price' text",
	"desc" => "When price of vehicle is set to '0', this text will show instead of the price.",
	"id" => $shortname."_callforprice",
	"type" => "text",
	"std" => "Call for Price");

$options[] = array( "name" => "Search button text",
	"desc" => "Text for the Search 'Button' in the Search section",
	"id" => $shortname."_searchbutton_text",
	"type" => "text",
	"std" => "Search");	
	
$options[] = array( "name" => "Text for 'Any'",
	"desc" => "For the search parameters, the text for 'Any'",
	"id" => $shortname."_any_text",
	"type" => "text",
	"std" => "Any");
	
$options[] = array( "name" => "Text for 'No Min'",
	"desc" => "For the search parameters, the text for 'No Min'",
	"id" => $shortname."_nomin_text",
	"type" => "text",
	"std" => "No Min");	
	
$options[] = array( "name" => "Text for 'No Max'",
	"desc" => "For the search parameters, the text for 'No Max'",
	"id" => $shortname."_nomax_text",
	"type" => "text",
	"std" => "No Max");		
	
$options[] = array( "name" => "Header for Search Results",
	"desc" => "Header text for the automobile search results page",
	"id" => $shortname."_searchresults",
	"type" => "text",
	"std" => "Search Results");	
	
$options[] = array( "name" => "Loan calculator text",
	"desc" => "Heading text for the Loan Calculator",
	"id" => $shortname."_loancalculator_text",
	"type" => "text",
	"std" => "Loan Calculator");	
	
$options[] = array( "name" => "Text for 'Compare'",
	"desc" => "Text for the 'Compare' link in the Search Results and Browse By pages.",
	"id" => $shortname."_compare_text",
	"type" => "text",
	"std" => "Compare");
	
$options[] = array( "name" => "Related Listings Text",
	"desc" => "Text for the heading of the optional Related Listings section",
	"id" => $shortname."_related_text",
	"type" => "text",
	"std" => "Related Automobiles");	
	
$options[] = array( "name" => "No Results text",
	"desc" => "Text shown when a listing search produces no results.",
	"id" => $shortname."_noresults",
	"type" => "text",
	"std" => "Sorry, your search has found no matching results. Please try a different search.");
	
$options[] = array( "name" => "No Results text (when browsing)",
	"desc" => "Text shown when there are no 'Browse by' results.",
	"id" => $shortname."_noresults_browse",
	"type" => "text",
	"std" => "Sorry, no automobiles have been found. Please try again.");
	
$options[] = array( "name" => "Contact Us heading text",
	"desc" => "Heading text for the Contact Us text following an automobile listing.",
	"id" => $shortname."_contactustext",
	"type" => "text",
	"std" => "Contact Us regarding this Automobile");
	
$options[] = array( "name" => "Contact Us sub text",
	"desc" => "Text right under the Contact Us heading following an automobile listing.",
	"id" => $shortname."_contactussubtext",
	"type" => "text",
	"std" => "Please call 1.800.123.4567 or you can fill out the form below and we'll get back to you shortly.");
	
$options[] = array( "name" => "Read More text",
	"desc" => "Text for Read More links and buttons",
	"id" => $shortname."_Read_More_Text",
	"type" => "text",
	"std" => "Details >>");	
	
$options[] = array( "name" => "Heading text for Videos section",
	"desc" => "Heading text for the optional Videos section in a house detail page.",
	"id" => $shortname."_heading_videos",
	"type" => "text",
	"std" => "Videos");
	
$options[] = array( "name" => "'Back to top' links",
	"desc" => "Text for 'Back to Top' links.",
	"id" => $shortname."_top",
	"type" => "text",
	"std" => "Back to Top");
	
	
	
	
	
	
	
	
	

$options[] = array( "name" => "Hide or Show stuff",
	"type" => "heading");
	
$options[] = array( "name" => "Show Home Icon?",
	"desc" => "Do you want to show the home icon (little house) in the main menu?)",
	"id" => $shortname."_showhomeicon",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show loan calculator (homepage)?",
	"desc" => "Do you want to show the Loan Calculator in the homepage?",
	"id" => $shortname."_loancalculator1",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
	
$options[] = array( "name" => "Show loan calculator (subpage sidebar)?",
	"desc" => "Do you want to show the Loan Calculator in left sidebar of every subpage?",
	"id" => $shortname."_loancalculator2",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show search box in menu bar?",
	"desc" => "The search box in the menu bar searches blog/news posts. Do you want to show or hide it?",
	"id" => $shortname."_showsearchbox",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");	
	
$options[] = array( "name" => "Show the 'Related' section?",
	"desc" => "You can show related/similar listings in the detail page.",
	"id" => $shortname."_showrelated",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");	
	
$options[] = array( "name" => "Show Latest Listings (homepage)? (Text-only version)",
	"desc" => "The homepage has a section to list the latest listings, in text-only format (no thumbnails). Do you want to show or hide this section?",
	"id" => $shortname."_recentlistings1",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Latest Listings (left sidebar)? (Text-only version)",
	"desc" => "The left sidebar has a section to list the latest listings, in text-only format (no thumbnails). Do you want to show or hide this section?",
	"id" => $shortname."_recentlistings2",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");	
	
$options[] = array( "name" => "Show Widgets (if any are set)",
	"desc" => "If you have any widgets enabled in your Admin, this setting will show or hide them with one setting.",
	"id" => $shortname."_widgets",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Contact Form",
	"desc" => "Show Contact Form on each automobile listing detail page.",
	"id" => $shortname."_showcontactform",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");

$options[] = array( "name" => "Show blog image",
	"desc" => "Do you want to show large image in individual blog post? The default is 'Hide' because generally you only want to see the large image in portfolio posts, not blog posts.",
	"id" => $shortname."_showblogimage",
	"type" => "select",
	"options" => array("hide", "show"),
	"std" => "show");
	
$options[] = array( "name" => "Show Archives by Year",
	"desc" => "On optional Archives page, do you want to show 'Archives by Year'?",
	"id" => $shortname."_archivesbyyear",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Archives by Month",
	"desc" => "On optional Archives page, do you want to show 'Archives by Month'?",
	"id" => $shortname."_archivesbymonth",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Archives by Day",
	"desc" => "On optional Archives page, do you want to show 'Archives by Day'?",
	"id" => $shortname."_archivesbyday",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Archives by Category",
	"desc" => "On optional Archives page, do you want to show 'Archives by Category'?",
	"id" => $shortname."_archivesbycategory",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Archives for All Pages",
	"desc" => "On optional Archives page, do you want to show 'All Pages' archive?",
	"id" => $shortname."_archivesallpages",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Show Archives by Tag",
	"desc" => "On optional Archives page, do you want to show 'Archives by Tag'?",
	"id" => $shortname."_archivesbytag",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");	
	
	
	
	
	
	



	
	
$options[] = array( "name" => "Slideshow",
                    "type" => "heading");	
	
	$options[] = array( "name" => "Slideshow Source",
	"desc" => "Do you want the slideshow to show recent listings, or simply just chosen photos? (the photos are taken from the Slideshow Photos post type.  Click 'Add New Slideshow Photo' to get started. Add only one photo if you want just an image and not an actual slideshow.",
	"id" => $shortname."_slideshowsource",
	"type" => "select",
	"options" => array("Recent Listings", "Just Photos"),
	"std" => "Recent Listings");

$options[] = array( "name" => "Slideshow quantity",
	"desc" => "The Maximum number of items to show in the slideshow on the homepage.  This setting is ignored if you have a 'User Defined Slideshow Order' set below.",
	"id" => $shortname."_slideshownumber",
	"type" => "text",
	"std" => "7");


$options[] = array( "name" => "Slideshow Transition",
	"desc" => "Choose the type of slideshow transition",
	"id" => $shortname."_transition",
	"type" => "select",
	"options" => array("fade", "blindX", "blindY", "blindZ", "cover", "curtainX", "curtainY", "fadeZoom", "growX", "growY", "none", "scrollUp", "scrollDown", "scrollLeft", "scrollHorz", "scrollVert", "shuffle", "slideX", "slideY", "toss", "turnUp", "turnDown", "turnLeft", "turnRight", "uncover", "wipe", "zoom"),
	"std" => "fade");
	

$options[] = array( "name" => "Slideshow order",
	"desc" => "If the previous setting is empty, the Slideshow will automatically order your items.  Select an ordering type.",
	"id" => $shortname."_slideshoworder",
	"type" => "select",
	"options" => array("Listing ID - Descending", "Listing ID - Ascending", "Random"),
	"std" => "Random");

$options[] = array( "name" => "Slide interval length",
	"desc" => "This setting determines how long a pause between slides.  1000 = 1 second.  Not applicable with the 3rd Slideshow style.",
	"id" => $shortname."_interval",
	"type" => "textarea",
	"std" => "5000");



	
	
	
	
	





$options[] = array( "name" => "Browse By...",
	"type" => "heading");
	

$options[] = array( "name" => "Include 'Browse By' menu item",
	"desc" => "Do you want to include the 'Browse By' item in the Browse By menu item?",
	"id" => $shortname."_includebrowseby",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");

$options[] = array( "name" => "'Browse By' Text",
	"desc" => "Text for the heading 'Browse By' in the menu (if included)",
	"id" => $shortname."_browseby_text",
	"type" => "text",
	"std" => "Browse By...");

$options[] = array( "name" => "Include 'All Listings'",
	"desc" => "Do you want to include the 'All Listings' item in the Browse By menu item?",
	"id" => $shortname."_includealllistings",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'All Listings' Text",
	"desc" => "Text for All Listings",
	"id" => $shortname."_alllistings_text",
	"type" => "text",
	"std" => "All Listings");
	
	
$options[] = array( "name" => "Include Browse By 'Features'",
	"desc" => "Do you want to include the 'Features' item in the Browse By menu item?",
	"id" => $shortname."_includefeatures",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Features' Text",
	"desc" => "Text for 'Features' in the Browse By menu",
	"id" => $shortname."_features_text",
	"type" => "text",
	"std" => "Features");		
	
	

$options[] = array( "name" => "Include Browse By 'Body Type'",
	"desc" => "Do you want to include the 'Body Type' item in the Browse By menu item?",
	"id" => $shortname."_includebodytype",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Body Type' Text",
	"desc" => "Text for Body Type in the Browse By menu",
	"id" => $shortname."_bodytype_text2",
	"type" => "text",
	"std" => "Body Type");
	
$options[] = array( "name" => "Include Browse By 'Engine Size'",
	"desc" => "Do you want to include the 'Engine Size' item in the Browse By menu item?",
	"id" => $shortname."_includeenginesize",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Engine Size' Text",
	"desc" => "Text for Engine Size in the Browse By menu",
	"id" => $shortname."_enginesize_text2",
	"type" => "text",
	"std" => "Engine Size");
	
$options[] = array( "name" => "Include Browse By 'Manufacturer'",
	"desc" => "Do you want to include the 'Manufacturer' item in the Browse By menu item?",
	"id" => $shortname."_includemanufacturer",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Manufacturer' Text",
	"desc" => "Text for Manufacturer in the Browse By menu",
	"id" => $shortname."_manufacturer_text2",
	"type" => "text",
	"std" => "Manufacturer");	
	
$options[] = array( "name" => "Include Browse By 'Mileage'",
	"desc" => "Do you want to include the 'Mileage' item in the Browse By menu item?",
	"id" => $shortname."_includemileage",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Mileage' Text",
	"desc" => "Text for 'Mileage' in the Browse By menu",
	"id" => $shortname."_mileage_text2",
	"type" => "text",
	"std" => "Mileage");	
	
$options[] = array( "name" => "Include Browse By 'Model Year'",
	"desc" => "Do you want to include the 'Model Year' item in the Browse By menu item?",
	"id" => $shortname."_includemodelyear",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Model Year' Text",
	"desc" => "Text for 'Model Year' in the Browse By menu",
	"id" => $shortname."_modelyear_text2",
	"type" => "text",
	"std" => "Model Year");	
	
$options[] = array( "name" => "Include Browse By 'Price Range'",
	"desc" => "Do you want to include the 'Price Range' item in the Browse By menu item?",
	"id" => $shortname."_includepricerange",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Price Range' Text",
	"desc" => "Text for 'Price Range' in the Browse By menu",
	"id" => $shortname."_pricerange_text2",
	"type" => "text",
	"std" => "Price Range");		
	
$options[] = array( "name" => "Include Browse By 'Transmission'",
	"desc" => "Do you want to include the 'Transmission' item in the Browse By menu item?",
	"id" => $shortname."_includetransmission",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => "Yes");
	
$options[] = array( "name" => "'Transmission' Text",
	"desc" => "Text for 'Transmission' in the Browse By menu",
	"id" => $shortname."_transmission_text2",
	"type" => "text",
	"std" => "Transmission");		
	
	
	


	


	
	
	
	
	
	
$options[] = array( "name" => "Social Networking",
                    "type" => "heading");

$options[] = array( "name" => "Show Social Links Bar (Homepage)",
	"desc" => "On the homepage, do you want to show social networking links? (Twitter, LinkedIn, Facebook, and RSS)",
	"id" => $shortname."_showsociallinks1",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");

$options[] = array( "name" => "Show Social Links Bar (Listing Page)",
	"desc" => "At the end of each post, do you want social networking links? (Twitter, StumbleUpon, Reddit, Digg, Delicious, and Facebook)",
	"id" => $shortname."_showsociallinks2",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");

$options[] = array( "name" => "Twitter Username",
	"desc" => "Your Twitter Username (to be used on homepage Twitter button)",
	"id" => $shortname."_twitterusername",
	"type" => "text",
	"std" => "");
	
$options[] = array( "name" => "Twitter Tooltip 1",
	"desc" => "Twitter tooltip for homepage",
	"id" => $shortname."_twittertooltip1",
	"type" => "text",
	"std" => "Our Tweets");	
	
$options[] = array( "name" => "Twitter Tooltip 2",
	"desc" => "Twitter tooltip for Listing pages",
	"id" => $shortname."_twittertooltip2",
	"type" => "text",
	"std" => "Tweet this page");	
	
$options[] = array( "name" => "LinkedIn URL",
	"desc" => "URL to your LinkedIn page/profile",
	"id" => $shortname."_linkedin",
	"type" => "text",
	"std" => "");
	
$options[] = array( "name" => "LinkedIn Tooltip",
	"desc" => "LinkedIn Tooltip text for homepage",
	"id" => $shortname."_linkedintooltip",
	"type" => "text",
	"std" => "Our Linkedin Page");	
	
$options[] = array( "name" => "Facebook Page URL",
	"desc" => "URL to your Facebook profile or Fan page",
	"id" => $shortname."_facebookpage",
	"type" => "text",
	"std" => "");	
	
$options[] = array( "name" => "Facebook Tooltip 1",
	"desc" => "Facebook tooltip for homepage",
	"id" => $shortname."_facebooktooltip1",
	"type" => "text",
	"std" => "Our Facebook Page");	
	
$options[] = array( "name" => "Facebook Tooltip 2",
	"desc" => "Facebook tooltip for Listing pages",
	"id" => $shortname."_facebooktooltip2",
	"type" => "text",
	"std" => "Share in Facebook");

$options[] = array( "name" => "Stumbleupon Tooltip",
	"desc" => "Stumbleupon tooltip for Listing pages",
	"id" => $shortname."_stumbleupontooltip",
	"type" => "text",
	"std" => "Share on StumbleUpon");

$options[] = array( "name" => "Reddit Tooltip",
	"desc" => "Reddit tooltip for Listing pages",
	"id" => $shortname."_reddittooltip",
	"type" => "text",
	"std" => "Share on Reddit");
	
$options[] = array( "name" => "Digg Tooltip",
	"desc" => "Digg tooltip for Listing pages",
	"id" => $shortname."_diggtooltip",
	"type" => "text",
	"std" => "Share on Digg");
	
$options[] = array( "name" => "Delicious Tooltip",
	"desc" => "Delicious tooltip for Listing pages",
	"id" => $shortname."_delicioustooltip",
	"type" => "text",
	"std" => "Share on Delicious");	
	
$options[] = array( "name" => "RSS Tooltip",
	"desc" => "RSS tooltip for homepage and footer",
	"id" => $shortname."_rsstooltip",
	"type" => "text",
	"std" => "Get listings with RSS");		
	
	

	
	
	

	
$options[] = array( "name" => "Membership",
                    "type" => "heading");

$options[] = array( "name" => "Show Login Form",
	"desc" => "Do you want to show the Login form so people can login to post Listings?",
	"id" => $shortname."_showlogin",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");
	
$options[] = array( "name" => "Login header text 1",
	"desc" => "Header text for Login form when you're not Logged in. Also the text for the Login 'tab' when you're not logged in.",
	"id" => $shortname."_logintext",
	"type" => "text",
	"std" => "Login");	
	
$options[] = array( "name" => "Login header text 2",
	"desc" => "Header text for Login form when you ARE Logged in.",
	"id" => $shortname."_controlpaneltext",
	"type" => "text",
	"std" => "Control Panel");	

$options[] = array( "name" => "Logout text",
	"desc" => "Text for the Logout link, and also for the form 'tab' when you're logged in.",
	"id" => $shortname."_logouttext",
	"type" => "text",
	"std" => "Logout");		
	
$options[] = array( "name" => "Show 'Dashboard' Link?",
	"desc" => "When you're logged in, do you want to show the link that takes you to the wp-admin dashboard?",
	"id" => $shortname."_logindashboard",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");		
	
$options[] = array( "name" => "Dashboard link text",
	"desc" => "Link text for the Dashboard link",
	"id" => $shortname."_logindashboardtext",
	"type" => "text",
	"std" => "Dashboard");	

$options[] = array( "name" => "Show 'New Automobile Listing' link?",
	"desc" => "When you're logged in, do you want to show the link that takes you to the 'New Automobile Listing' page?",
	"id" => $shortname."_loginlisting",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");		

$options[] = array( "name" => "New Automobile Listing text",
	"desc" => "Link text for the 'New Automobile Listing' link",
	"id" => $shortname."_loginlistingtext",
	"type" => "text",
	"std" => "New Automobile Listing");	

$options[] = array( "name" => "Show 'New News/Blog' link?",
	"desc" => "When you're logged in, do you want to show the link that takes you to the 'New News/Blog' page?",
	"id" => $shortname."_loginpost",
	"type" => "select",
	"options" => array("show", "hide"),
	"std" => "show");		

$options[] = array( "name" => "New News/Blog text",
	"desc" => "Link text for the 'New News/Blog' link",
	"id" => $shortname."_loginposttext",
	"type" => "text",
	"std" => "New News/Blog post");		
	
	
	
	
	
	
	
	
$options[] = array( "name" => "Miscellaneous",
                    "type" => "heading");

$options[] = array( "name" => "Intro Image",
	"desc" => "Optional image to get inserted into the Intro text (Perfect place for photo of building)",
	"id" => $shortname."_introimage",
	"type" => "upload",
	"std" => "");
	
$options[] = array( "name" => "Intro Image Width",
	"desc" => "The width of your Intro Image (in pixels)",
	"id" => $shortname."_introimagewidth",
	"type" => "text",
	"std" => "125");
	

$options[] = array( "name" => "Image Caption",
	"desc" => "Optional caption for the Intro text image",
	"id" => $shortname."_introcaption",
	"type" => "text",
	"std" => "");
	
$options[] = array( "name" => "Favicon Image",
	"desc" => "Full URL to your favicon image. Tip: Easy site to create favicon image: http://www.favicon.cc/ ",
	"id" => $shortname."_favicon",
	"type" => "upload",
	"std" => "");
	
$options[] = array( "name" => "Contact form Shortcode",
	"desc" => "Contact Form 7 Plugin shortcode for your 'generic' Listing contact form. If you have multiple agents, they will have their own Contact Form shortcode. This shortcode is 'generic' and used only when no Agent is specified for a listing. (make sure the code doesn't contain double quotes. Replace double quotes with single quotes.)",
	"id" => $shortname."_contactshortcode",
	"type" => "text",
	"std" => "[contact-form 1 'Contact form 1']");
	
$options[] = array( "name" => "'Browse by' Default Order",
	"desc" => "The default ordering of the 'Browse By' page results. The end user will be able to change to something else.",
	"id" => $shortname."_browse_order",
	"type" => "select",
	"options" => array('Price Descending', 'Price Ascending', 'Mileage Descending', 'Mileage Ascending', 'Model Year Descending', 'Model Year Ascending', 'Date Descending', 'Date Ascending'),
	"std" => "Price Descending");
	
	
$options[] = array( "name" => "Contact Us sidebar text",
	"desc" => "The content for the Sidebar for the Contact Me page (if you use the Contact Us page template).",
	"id" => $shortname."_contacttext",
	"type" => "textarea",
	"std" => "<p>Note: This sidebar can be completely customized in Theme Options page.  You can also opt to use the standard sidebar instead of the Contact Sidebar.</p>

<p>
My Cool Company Name<br />
1234 Some Street<br />
Cool City, Somewhere 12345
</p>

<p>
Phone 1: 123.456.7890<br />
Phone 2: 111.222.3333<br/>
Email 1: email@mycompany.com<br />
Email 2: email@mycompany.com<br />
</p>");	

$options[] = array( "name" => "Number of Related Listings",
	"desc" => "The number of related listings to show on the detail page sidebar (if included)",
	"id" => $shortname."_relatedlistingsnumber",
	"type" => "text",
	"std" => "3");	

$options[] = array( "name" => "Google Map of YOUR location",
	"desc" => "Full address, city state, and zip/postal code, etc for YOUR location.  To be used in the Contact Us page.",
	"id" => $shortname."_contactmap",
	"type" => "text",
	"std" => "");	

$options[] = array( "name" => "Date format for posts",
	"desc" => "The PHP date format for posts and post summaries. Help: http://php.net/manual/en/function.date.php",
	"id" => $shortname."_dateformat",
	"type" => "text",
	"std" => "F jS, Y");	

$options[] = array( "name" => "Blog image thumbnail width",
	"desc" => "If a blog image exists, this is the width (in pixels) of the thumbnail image. <strong>Note: DO NOT EXCEED 640.</strong> A common effect is to have the thumbnail span the whole width of the page, but have the height relatively low.  For this effect, set the number here to 620, anad set the height to something low, like 100.",
	"id" => $shortname."_postimagethumbnail_width",
	"type" => "text",
	"std" => "100");	
	
$options[] = array( "name" => "Blog image thumbnail height",
	"desc" => "If a blog image exists, this is the height (in pixels) of the thumbnail image.",
	"id" => $shortname."_postimagethumbnail_height",
	"type" => "text",
	"std" => "100");	

$options[] = array( "name" => "Copyright",
	"desc" => "Copyright text",
	"id" => $shortname."_copyright",
	"type" => "text",
	"std" => "Copyright &copy; 2011 YourCompanyName (edit this in Theme Options)");
	
	
	$options[] = array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => "");	
	
	$options[] = array( "name" => "Highlight color text (1)",
	"desc" => "Highlight text color for shortcode of [highlight1]. See Shortcodes section of help for details.",
	"id" => $shortname."_highlight_text1",
	"type" => "text",
	"std" => "black");	
	
	$options[] = array( "name" => "Highlight color background (1)",
	"desc" => "Highlight background color for shortcode of [highlight1]. See Shortcodes section of help for details.",
	"id" => $shortname."_highlight_background1",
	"type" => "text",
	"std" => "yellow");	
	
	$options[] = array( "name" => "Highlight color text (2)",
	"desc" => "Highlight text color for shortcode of [highlight2]. See Shortcodes section of help for details.",
	"id" => $shortname."_highlight_text2",
	"type" => "text",
	"std" => "white");	
	
	$options[] = array( "name" => "Highlight color background (2)",
	"desc" => "Highlight background color for shortcode of [highlight2]. See Shortcodes section of help for details.",
	"id" => $shortname."_highlight_background2",
	"type" => "text",
	"std" => "black");	
	
	$options[] = array( "name" => "Search Results Page Fix",
	"desc" => "If when you do a search, the URL of the search result has '/index.php/' in it, then choose 'Yes'. Otherwise, leave it to 'No'. Almost always this will be 'No', but this option is here just in case.",
	"id" => $shortname."_searchresultspagefix",
	"type" => "select",
	"options" => array("No", "Yes"),
	"std" => "No");	
	
$options[] = array( "name" => "Demo Mode",
	"desc" => "Always to be 'off'. This is used for the demo of the site on Themeforest. Some descriptive text will appear in varioius places when this setting is 'on'.",
	"id" => $shortname."_demo",
	"type" => "select",
	"options" => array("off", "on"),
	"std" => "off");	
	


update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
