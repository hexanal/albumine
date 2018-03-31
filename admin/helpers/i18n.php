<?php

/*
 * Returns alternative languages
 */
function hx_get_alternative_languages() {
  if( !function_exists('icl_get_languages') ) {
    return false;
  };
  $languages = icl_get_languages('skip_missing=1&orderby=code');
  $alternative = array();

  foreach($languages as $lang) {
    if( $lang['active'] != 1 ) {
      $alternative[] = array(
        'code' => $lang['language_code'],
        'url' => $lang['url'],
        'label' => $lang['native_name'],
      );
    }
  }

  return $alternative;
}
