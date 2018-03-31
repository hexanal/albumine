<?php
/*
 * Custom Stylesheet for Administration panel
 */
function hx_custom_admin_css() {
  echo '<link rel="stylesheet" href="'.get_template_directory_uri() .'/app/admin/css/default.css" type="text/css" media="all" />';
}
add_action('admin_head', 'hx_custom_admin_css');


/*
 * Editor / Basic User Stylesheet
 */
if ( !current_user_can('administrator') ) {
  if ( ! function_exists( 'hx_custom_user_css' ) ) {
      function hx_custom_user_css() {
        echo '<link rel="stylesheet" href="'.get_template_directory_uri() .'/app/admin/css/editor-profile.css" type="text/css" media="all" />';
    }
  }
  add_action('admin_head', 'hx_custom_user_css');
}


/*
 * Custom Login Image / Form
 */
if ( ! function_exists( 'hx_login_logo' ) ):
  function hx_login_logo() {

  $return = '';
  $return .=  '<style type="text/css">';
  $return .=  '#login h1 a {';
    $return .=  'background-image: url('.get_template_directory_uri().'/admin/css/img/logo.svg);';
    $return .=  'background-size: contain;';
    $return .=  'background-position: center;';
    $return .=  'padding-top: 20px;';
    $return .=  'padding-bottom: 20px;';
    $return .=  'margin-top: 20px;';
    $return .=  'margin-bottom: 20px;';
    $return .=  'width: 60%;';
    $return .=  'height: 20px;';
  $return .=  '}';
  $return .=  '#backtoblog{ display:none }';

  $return .=  '.login #nav {';
    $return .=  'margin: 10px 0 0;';
    $return .=  'text-align: right;';
    $return .=  'font-size: 11px;';
    $return .=  'padding: 0;';
  $return .=  '}';

  $return .=  '</style>';

  echo $return;
}
endif;

add_action( 'login_enqueue_scripts', 'hx_login_logo' );

/*
 * Custom Login Screen Logo Link URL
 */
if ( ! function_exists( 'hx_custom_loginlogo_url' ) ) {
  function hx_custom_loginlogo_url($url) {
    return home_url('/');
  }
}
add_filter( 'login_headerurl', 'hx_custom_loginlogo_url' );


/*
 * Plugin Name: Chrome Admin Menu Fix
 * Description: Quick fix for the Chrome 45 admin menu display glitches
 * Author: Steve Jones for The Space Between / Samuel Wood / Otto42
 * Author URI: http://the--space--between.com
 * Version: 2.1.0
*/
function hx_chromefix_inline_css() {
    wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
}
add_action('admin_enqueue_scripts', 'hx_chromefix_inline_css');


/*
 * Remove the "Comments" column in table rows views of Pages and other...
 */
function hx_remove_comments_column($columns){
    unset($columns['comments']);
    return $columns;
}
add_filter('manage_edit-page_columns', 'hx_remove_comments_column');


/*
 * Remove all the unnecessary Dashboard Widgets
 */
function hx_remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);

    unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'hx_remove_dashboard_widgets');


/*
 * Hide the “Help” tab in top right corner
 */
function hx_remove_help_options($old_help, $screen_id, $screen){
    if (!current_user_can('administrator') ) {
        $screen->remove_help_tabs();
        return $old_help;
    }
}
add_filter('contextual_help', 'hx_remove_help_options',  999, 3);


/*
 * Removing useless menu elements (hide from non-administrators)
 */
function hx_remove_menus(){
    remove_menu_page( 'edit-comments.php' );

    if ( !current_user_can('administrator') ) {
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'themes.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'upload.php' );
    }
}
add_action('admin_menu', 'hx_remove_menus');


/*
 * Remove useless menu items
 */
function hx_remove_admin_bar_links() {
    if ( !current_user_can('administrator') ) {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
        $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
        $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
        $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
        $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
        $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
        $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
        $wp_admin_bar->remove_menu('updates');          // Remove the updates link
        $wp_admin_bar->remove_menu('comments');         // Remove the comments link
        $wp_admin_bar->remove_menu('new-content');      // Remove the content link
        $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
        $wp_admin_bar->remove_node('view');

        remove_filter( 'update_footer', 'core_update_footer' );
    }
}
add_action( 'wp_before_admin_bar_render', 'hx_remove_admin_bar_links' );


/*
 * Removes the footer WP version
 */
function hx_dashboard_footer() {
    echo '';
}
add_filter('admin_footer_text', 'hx_dashboard_footer');

