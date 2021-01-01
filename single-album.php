<?php
get_header();
?>

<?php

$user = wp_get_current_user();
$login = $user->data->user_login;

if ( $login === 'family' || $login === 'fred' ) {
?>

  <div style="position: fixed; top: 0; right: 0; font-size: 4rem; text-align: right;">
    <h1><?= $post->post_type ?></h1>
  </div>

  <h2><?= $post->post_title ?></h2>

  <?php the_content() ?>

<?php } else { ?>

  <h1>Vous n'êtes pas autorisé à visionner cet album, désolé!</h1>
  <p>Cool</p>

  <?= Component('test/test', ['content' => 'Cool beans']); ?>
  <?= Component('test/test', ['content' => Component('test/test', ['content' => 'Could even nest components!'])]); ?>

<?php }

get_footer();

?>
