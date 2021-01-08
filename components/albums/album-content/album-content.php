<?php global $post ?>

<div class="container">
  <div class="content">
    <h1><?= $post->post_type ?></h1>
    <h2><?= $post->post_title ?></h2>
  </div>
</div>

<div class="container">
  <div class="content">
    <?php the_content() ?>
  </div>
</div>