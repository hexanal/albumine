<?php global $post ?>

<div class="container">
  <div class="content">

    <h1><?= $post->post_title ?></h1>
    <h2>On montre la liste des albums:</h2>

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

    </ul>

  </div>
</div>
