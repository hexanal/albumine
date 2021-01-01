<?php
add_action( 'init', 'posttype_album' );

function posttype_album() {
  $labels = [
    'name' => _x( 'Albums', 'post type general name', 'albumine' ),
    'singular_name' => _x( 'Album', 'post type singular name', 'albumine' ),
    'menu_name' => _x( 'Albums', 'admin menu', 'albumine' ),
    'name_admin_bar' => _x( 'Albums', 'add new on admin bar', 'albumine' ),
    'add_new' => _x( 'Add New', 'add new in menu', 'albumine' ),
    'add_new_item' => __( 'Add new', 'albumine' )
  ];

  $args = array(
    'labels' => $labels,
    'description' => __( 'Photo Albums', 'albumine' ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true, // to get Gutenberg?
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-star-empty',
    'rewrite' => true,
    'supports' => array('title', 'editor')
  );

  register_post_type('album', $args);
}

