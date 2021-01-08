<?php
get_header();
?>

<?= Component('gate/gate', [
  'content' => Component('albums/album-content/album-content', [])
]) ?>

<?php

get_footer();

?>
