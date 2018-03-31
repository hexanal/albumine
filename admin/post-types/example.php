<?php
add_action( 'init', 'posttype_EXAMPLE' );

function posttype_EXAMPLE() {
  $labels = array(
    'name'               => _x( 'Examples', 'post type general name', 'hx' ),
    'singular_name'      => _x( 'Example', 'post type singular name', 'hx' ),
    'menu_name'          => _x( 'Example', 'admin menu', 'hx' ),
    'name_admin_bar'     => _x( 'Example', 'add new on admin bar', 'hx' ),
    'add_new'            => _x( 'Add New', 'add new in menu', 'hx' ),
    'add_new_item'       => __( 'Add new', 'hx' ),
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( '', 'hx' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-star-empty',
    'rewrite'            => true,
    'supports'           => array('title', 'editor')
  );

  register_post_type('example', $args);
}

