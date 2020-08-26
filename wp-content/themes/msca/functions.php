<?php

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function register_menus() {
    register_nav_menus([
        'main-nav' => 'Main Menu',
        'corp-nav' => 'Corporate Menu'
    ]);
}
add_action('init', 'register_menus');

add_filter( 'manage_edit-student_columns', 'my_edit_student_columns' ) ;
function my_edit_student_columns( $columns ) {
    $old_columns = $columns;

    $columns = [
        'cb' => $columns['cb'],
        'image' => __( 'Image' ),
        'title' => __( 'Student Name' ),
        'active' => __( 'Active', 'msca' ),
        'alumni' => __( 'Alumni', 'msca' ),
        'cohort' => __( 'Cohort', 'msca' )
    ];

    foreach ($old_columns as $key => $value) {
        if (strpos($key, 'wpseo-') === 0) {
            $columns[$key] = $value;
        }
    }

	return $columns;
}

add_action( 'manage_student_posts_custom_column', 'my_manage_student_columns', 10, 2 );

function my_manage_student_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'active' :
            echo get_post_meta( $post_id , 'active' , true ); 
            break;

        case 'alumni' :
            echo get_post_meta( $post_id , 'alumni' , true ); 
            break;            

        case 'cohort' :
            echo get_post_meta( $post_id , 'cohort' , true ); 
            break;

        case 'image' :
            echo get_the_post_thumbnail( $post_id, 'thumbnail');
            break;

    }
}

// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 250, 250, true );

// Add image sizes as needed
add_image_size( 'standard-vertical', 526, 670, true );
add_image_size( 'standard-horizontal', 670, 526, true );

function get_students() {
    // Query Arguments
    
	if (isset($_GET['location']) && $_GET['location'] == 'Jackson'){
		$args = array(
			'numberposts' => -1,
			'post_type' => 'student',
			'meta_query' => [
				[
					'key' => 'active',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'alumni',
					'value' => '0',
					'compare' => '='
				],
				[
					'key' => 'location',
					'value' => 'Jackson',
					'compare' => '='
				]
			]
		);
	}
	else if (isset($_GET['location']) && $_GET['location'] == 'Starkville'){
		$args = array(
			'numberposts' => -1,
			'post_type' => 'student',
			'meta_query' => [
				[
					'key' => 'active',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'alumni',
					'value' => '0',
					'compare' => '='
				],
				[
					'key' => 'location',
					'value' => 'Starkville',
					'compare' => '='
				]
			]
		);
	}
	else {
		$args = array(
			'numberposts' => -1,
			'post_type' => 'student',
			'meta_query' => [
				[
					'key' => 'active',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'alumni',
					'value' => '0',
					'compare' => '='
				]
			]
		);
	}
	
	$response = get_posts( $args );
	foreach ($response as $value) {
		$thumb = get_the_post_thumbnail($value->ID, standard-vertical );
		$location = get_post_meta( $value->ID, 'location', true );
		
		$value->post_thumb = $thumb;
 		$value->post_location = ucfirst($location);
	}

    echo json_encode($response);

    exit; // leave ajax call
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_students', 'get_students');
add_action('wp_ajax_nopriv_get_students', 'get_students');


function get_alumni() {
    // Query Arguments
    
	if (isset($_GET['location']) && $_GET['location'] == 'Jackson'){
		$args = array(
			'numberposts' => -1,
			'post_type' => 'student',
			'meta_query' => [
				[
					'key' => 'active',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'alumni',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'location',
					'value' => 'Jackson',
					'compare' => '='
				]
			]
		);
	}
	else if (isset($_GET['location']) && $_GET['location'] == 'Starkville'){
		$args = array(
			'numberposts' => -1,
			'post_type' => 'student',
			'meta_query' => [
				[
					'key' => 'active',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'alumni',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'location',
					'value' => 'Starkville',
					'compare' => '='
				]
			]
		);
	}
	else {
		$args = array(
			'numberposts' => -1,
			'post_type' => 'student',
			'meta_query' => [
				[
					'key' => 'active',
					'value' => '1',
					'compare' => '='
				],
				[
					'key' => 'alumni',
					'value' => '1',
					'compare' => '='
				]
			]
		);
	}
	
	$response = get_posts( $args );
	foreach ($response as $value) {
		$thumb = get_the_post_thumbnail($value->ID, standard-vertical );
		$location = get_post_meta( $value->ID, 'location', true );
		
		$meta = get_post_meta( $value->ID );
		$value->post_thumb = $thumb;
		$value->meta = $meta;
 		$value->post_location = ucfirst($location);
	}

    echo json_encode($response);

    exit; // leave ajax call
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_alumni', 'get_alumni');
add_action('wp_ajax_nopriv_get_alumni', 'get_alumni');
