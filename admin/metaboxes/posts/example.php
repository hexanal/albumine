<?php
$fields = array(
  array(
    'key' => 'field_example_field',
    'name' => 'example-field',
    'type' => 'text',
    'instructions' => 'Example'
  ),
);


if(function_exists("acf_add_local_field_group")) {
  acf_add_local_field_group(array (
    'id' => 'acf_',
    'title' => 'Example Field',
    'menu_order' => 0,
    'fields' => $fields,
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'example',
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      // 'hide_on_screen' => array (),
    ),
  ));
}
