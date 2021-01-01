<?php
require 'admin/helpers/acf.php';
require 'admin/helpers/admin-styling.php';
require 'admin/helpers/i18n.php';
require 'admin/metaboxes/posts/example.php';
require 'admin/options/website-settings/website-settings.php';
require 'admin/options/website-settings/social-links.php';
require 'admin/options/website-settings/metadata.php';
require 'admin/post-types/album.php';
// require 'admin/taxonomies/XXX.php';

function hx_register_main_menu() {
  register_nav_menu('main-nav', __( 'Main Menu' ));
}
add_action( 'init', 'hx_register_main_menu' );

require 'helpers/mimas/mimas.php';
require 'helpers/phoebe/phoebe.php';
require 'helpers/tethys/tethys.php';

