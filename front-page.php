<?php
get_header();

?>

<div style="position: fixed; top: 0; right: 0; font-size: 4rem;">
  <?= $post->post_type ?>
</div>

<?php

// TODO extract this logic to component ;)
// use it for most pages
// allow admin "fred" to view it, though :)

$user = wp_get_current_user();
$login = $user->data->user_login;

if ( $login === 'family' || $login === 'fred' ) {
?>

  <h1><?= $post->post_title ?></h1>

  <h2>On montre la liste des albums pour la famille</h2>

<ul>
<?php
$albums_query = new WP_Query([
  'post_type' => 'album',
  'posts_per_page' => -1,
]);

foreach( $albums_query->posts as $album ) {
  // TODO filter by user permissions, you know? Only display the albums that are either public, or specifically for that user
?>

  <li>
    <a href="<?= get_permalink( $album->ID ); ?>">
      <?= $album->post_title ?>
    </a>
  </li>

<?php
}
?>

<ul>


<?php } else { ?>

  <h1>On montre le login screen</h1>
  <p>Une fois identifié, on redirige et comme ça on peut voir les albums!</p>

  <?php if ( $login ) echo '<h2>Vous n\'avez pas accès à cet album!</h2>'; ?>
  <?php if ( !$login ) wp_login_form(); ?>

<?php }

get_footer();

?>
