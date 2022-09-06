<?php

function interactive_map( $atts ) {
	
	$map = "<div class='row canada-page-map'>";
	$map .= "<div class='col-md-7'>";
	$map .= "<div id='canada-map'></div>	";
	$map .= "</div>";

	$map .= "<div class='col-md-5'>";
	$map .= "<div id='by-location-label'></div>	";
	$map .= "<div class='map-description'>";
	$map .= "<div class='mt-3'>" .get_field('map_snippet'). "</div>";
	$map .= "</div>";
	$map .= "</div>";


	$map .= "</div>";
	
	return $map;
}
add_shortcode( 'interactive_map', 'interactive_map' );
	
add_action( 'wp_ajax_map_selection', 'map_selection' ); 
add_action("wp_ajax_nopriv_map_selection", "map_selection");


function map_selection(){
	global $wpdb;
	$postValue = 'membership_map_'.$_POST['mapid'].'_map_description';
    $query = "SELECT max(meta_value) FROM wp_postmeta WHERE meta_key='". $postValue ."' AND post_id='4620'
	 ";
    $the_max = $wpdb->get_var($query);
    echo $the_max;
	die();
}

// add_action( 'wp_ajax_the_fr_map', 'the_fr_map' ); 
// add_action("wp_ajax_nopriv_the_fr_map", "the_fr_map");
// function the_fr_map(){
// 	global $wpdb;
// 	$postValue = 'membership_map_'.$_POST['mapid'].'_map_description';
//     $query = "SELECT max(meta_value) FROM wp_postmeta WHERE meta_key='". $postValue ."' AND post_id='567'
// 	 ";
//     $the_max = $wpdb->get_var($query);
//     echo $the_max;
// 	die();
// }

?>