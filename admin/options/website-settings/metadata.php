<?php
if( function_exists('acf_add_options_sub_page') ) {
  acf_add_options_sub_page(array(
    'title' => 'Metadata',
    'slug' => 'metadata',
    'parent' => 'website-settings.php',
    'capability' => 'manage_options'
  ));
}

if( function_exists('acf_add_local_field_group') ) {

  $og_settings = array (
    array(
      'key' => 'field_default_description',
      'label' => 'Generic/Default Description',
      'name' => 'default-description',
      'instructions' => 'It will be used for pages that don\'t have a specific description.<br>There is a hard limit of 160 characters for SEO purposes.',
      'type' => 'textarea',
      'rows' => 4,
      'maxlength' => '160',
    ),
    hx_acf_image(
      'social-facebook-image',
      'Facebook'
    ),
    array(
      'key' => 'field_facebook_description',
      'label' => 'Facebook Description',
      'name' => 'facebook-description',
      'instructions' => 'There is a hard limit of 160 characters for SEO purposes.',
      'type' => 'textarea',
      'rows' => 4,
      'maxlength' => '160',
    ),
    hx_acf_image(
      'social-twitter-image',
      'Twitter'
    ),
    array(
      'key' => 'field_twitter_description',
      'label' => 'Twitter Description',
      'name' => 'twitter-description',
      'instructions' => 'There is a hard limit of 160 characters for SEO purposes.',
      'type' => 'textarea',
      'rows' => 4,
      'maxlength' => '160',
    ),
  );

  /*
   * Fields group
   */
  acf_add_local_field_group(
    array (
      'key' => 'group_options_open_graph',
      'title' => 'Metadata',
      'label_placement' => 'left',
      'instruction_placement' => 'label',
      'fields' => $og_settings,
      'location' => array (
        array (
          array (
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'website-settings',
          ),
        ),
      ),
    )
  );

}
