<?php

/**
 * Get Image by ID
 *
 * @param int $imgId - the media attachment ID you wish to retrieve
 * @return array - a bunch of data for the image that you may use
 */
function mimas_get_image_by_id($imgId) {
  $uploads_folder_prefix = '/wp-content/uploads/';
  $img = get_post($imgId);

  if ( !$img ) return [];

  $meta = wp_get_attachment_metadata($imgId);

  return [
    'attr' => [
      'src' => $uploads_folder_prefix . $meta['file'],
      'alt' => get_post_meta($imgId, '_wp_attachment_image_alt', true),
      'srcset' => wp_get_attachment_image_srcset($imgId),
      'sizes' => wp_get_attachment_image_sizes($imgId),
    ],
    'width' => $meta['width'],
    'height' => $meta['height'],
    'ratio' => ( $meta['height'] / $meta['width'] ),
    'formats' => $meta['sizes'],
    'title' => $img->post_title,
    'description' => $img->post_content,
    'caption' => $img->post_excerpt,
    'post' => $img,
  ];
}

/**
 * Get Image Ratio "label"
 *
 * @param int $w - width of the image
 * @param int $h - height of the image
 * @param float $min_square_ratio (optional) - minimum ratio to consider as a square image, e.g. given a value of '0.95', the will output "square" for the format even though the image is not perfectly square
 * @return string - 'portrait' | 'landscape' | 'square' | 'invalid' (if some dimensions are set to 0, or null)
 */
function mimas_get_image_ratio_label($w, $h, $min_square_ratio = 1) {
  if ( !$w || !$h ) return 'invalid-dimensions';

  $ratio = $h / $w;

  if ($ratio > (1 + (1 - $min_square_ratio)) ) {
    return 'portrait';
  }
  else if ($ratio < $min_square_ratio ) {
    return 'landscape';
  }
  else {
    return 'square';
  }
}
