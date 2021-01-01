<?php

function Component($path, $props) {
  $template_path = get_template_directory() . '/components/';

  $componentFunction = function() use ($path, $props, $template_path) {
    include($template_path . $path.'.php');
  };

  ob_start();
    $componentFunction();
  return ob_get_clean();
}
