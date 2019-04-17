<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$labels = array(
    'name' => _x( 'Everest Timeline', 'post type general name', ETLAK_TD ),
    'singular_name' => _x( 'Everest Timeline', 'post type singular name', ETLAK_TD ),
    'menu_name' => _x( 'Everest Timeline', 'admin menu', ETLAK_TD ),
    'name_admin_bar' => _x( 'Everest Timeline', 'add new on admin bar', ETLAK_TD ),
    'add_new' => _x( 'Add New', 'Everest Timeline', ETLAK_TD ),
    'add_new_item' => __( 'Add New Everest Timeline', ETLAK_TD ),
    'new_item' => __( 'New Everest Timeline', ETLAK_TD ),
    'edit_item' => __( 'Edit Everest Timeline', ETLAK_TD ),
    'view_item' => __( 'View Everest Timeline', ETLAK_TD ),
    'all_items' => __( 'All Everest Timeline', ETLAK_TD ),
    'search_items' => __( 'Search Everest Timeline', ETLAK_TD ),
    'parent_item_colon' => __( 'Parent Everest Timeline:', ETLAK_TD ),
    'not_found' => __( 'No Everest Timeline found.', ETLAK_TD ),
    'not_found_in_trash' => __( 'No Everest Timeline found in Trash.', ETLAK_TD )
);

$args = array(
    'labels' => $labels,
    'description' => __( 'Description.', ETLAK_TD ),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-clock',
    'query_var' => true,
    'rewrite' => array( 'slug' => ETLAK_TD ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title' )
);

