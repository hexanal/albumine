<?php
if( function_exists('acf_add_options_sub_page') ) {
  acf_add_options_sub_page(array(
    'title' => 'Social Links',
    'slug' => 'social-links',
    'parent' => 'website-settings',
    'capability' => 'manage_options'
  ));
}

if( function_exists('acf_add_local_field_group') ) {

  $social_links_settings = array (
    array(
      'key' => 'field_social_link_instagram',
      'name' => 'social-link-instagram',
      'label' => 'Instagram',
      'type' => 'url',
    ),
    array(
      'key' => 'field_social_link_pinterest',
      'name' => 'social-link-pinterest',
      'label' => 'Pinterest',
      'type' => 'url',
    ),
    array(
      'key' => 'field_social_link_facebook',
      'name' => 'social-link-facebook',
      'label' => 'Facebook Page',
      'type' => 'url',
    ),
  );

  /*
   * Fields group
   */
  acf_add_local_field_group(
    array (
      'key' => 'group_options_social_links',
      'title' => 'Social Links',
      'label_placement' => 'left',
      'instruction_placement' => 'label',
      'fields' => $social_links_settings,
      'location' => array (
        array (
          array (
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'social-links',
          ),
        ),
      ),
    )
  );

}
