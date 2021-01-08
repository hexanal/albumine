<?php
$user = wp_get_current_user();
$has_user = isset( $user->data->user_login );
$login = $has_user
  ? $user->data->user_login
  : false;

// if the user is allowed, show the goddamn album
if ( $login === 'family' || $login === 'fred' ) {
  ?>

  <?php echo $props['content'] ?>

<?php
} else {

// otherwise, show the login prompt:
?>

<div class="container">
  <div class="content">
<?php
  if ( $login ) { ?>
    <h2>Vous n'avez pas accès à cet album!</h2>
  <?php } else {
      wp_login_form();
  }

}
