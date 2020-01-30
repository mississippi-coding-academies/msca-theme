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