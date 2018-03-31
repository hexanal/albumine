<?php
if( function_exists('acf_add_local_field_group') ) {

  $tracking_fields = array (
    array(
      'key' => 'field_tracking_google_ui',
      'name' => 'tracking-google-ui',
      'label' => 'Google Analytics UI',
      'type' => 'text',
    ),
  );

  /*
   * Fields group
   */
  acf_add_local_field_group(
    array (
      'key' => 'group_tracking',
      'title' => 'Tracking',
      'label_placement' => 'left',
      'instruction_placement' => 'label',
      'fields' => $tracking_fields,
      'location' => array (
        array (
          array (
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'maintenance',
          ),
        ),
      ),
    )
  );

}
