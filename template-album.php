<?php
/**
 * Template Name: Album Page
 */
?>

<?php
get_header();

$user = wp_get_current_user();
$login = $user->data->user_login;

if ( $login === 'family' ) {
?>

  <h1><?= $post->post_title ?></h1>

<?php } else { ?>

  <h1>Vous n'êtes pas autorisé à visionner cet album, désolé!</h1>
  <p>Cool</p>

  <?= Component('test/test', ['content' => 'Cool beans']); ?>
  <?= Component('test/test', ['content' => Component('test/test', ['content' => 'Could even nest components!'])]); ?>

<?php }

get_footer();

?>
