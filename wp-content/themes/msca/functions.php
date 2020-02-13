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

	$columns['title'] = __( 'Student Name' );
	$columns['active'] = __( 'Active' );
	$columns['cohort'] = __( 'Cohort' );

	return $columns;
}

add_action( 'manage_student_posts_custom_column', 'my_manage_student_columns', 10, 2 );

function my_manage_student_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'active' :
            echo get_post_meta( $post_id , 'active' , true ); 
            break;

        case 'cohort' :
            echo get_post_meta( $post_id , 'cohort' , true ); 
            break;

    }
}