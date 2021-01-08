<?php
get_header();

?>

<div style="position: fixed; top: 0; right: 0; font-size: 4rem;">
  <?= $post->post_type ?>
</div>

<?= Component('gate/gate', [
  'content' => Component('albums/albums-list/albums-list', [])
]) ?>

<?php

get_footer();

?>
