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

    }
}