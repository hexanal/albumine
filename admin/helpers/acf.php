<?php

/**
 * When given a "kebab-case" string (e.g. `hello-world`), returns a formatted
 * key for ACF like `field_hello_world`
 *
 * @param {string} $slug The field slug to generate a key from
 * @return {string} The key to be used in the ACF API.
 */
function hx_make_key($slug) {
  return 'field_' . str_replace('-', '_', $slug);
}


/**
 * Hides all the other metaboxes in the edit page
 * @return {array} The list of metaboxes to hide
 */
function hx_hide_all_on_screen() {
  return array(
    'permalink',
    'the_content',
    'excerpt',
    'custom_fields',
    'discussion',
    'comments',
    'revisions',
    'slug',
    'author',
    'format',
    'page_attributes',
    'featured_image',
    'categories',
    'tags',
    'send-trackbacks',
  );
}


/*
 * Generate field for Image
 */
function hx_acf_image($slug, $label = 'Image', $instructions = '') {
  $key = hx_make_key($slug);

  return array (
    'key' => $key,
    'label' => $label,
    'name' => $slug,
    'instructions' => $instructions,
    'type' => 'image',
    'return_format' => 'array',
    'preview_size' => 'thumbnail',
    'max_width' => 3000,
    'max_height' => 3000,
    'max_size' => 2,
    'mime_types' => 'jpg,png,jpeg',
    'library' => 'all',
  );
}


/*
 * Add a tab
 */
function hx_acf_tab($slug, $title) {
  $key = hx_make_key($slug);

  return array (
    'key' => $key,
    'label' => $title,
    'name' => $slug,
    'type' => 'tab',
    'required' => 0,
    'placement' => 'top',
  );
}
