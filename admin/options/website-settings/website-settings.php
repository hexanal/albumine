<?php
/*
 * General website settings
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => 'Website Settings',
    'menu_title' => 'Website Settings',
    'menu_slug' => 'website-settings',
    'capability' => 'manage_options',
    'icon_url' => 'dashicons-info',
    'redirect' => false,
  ));
}
