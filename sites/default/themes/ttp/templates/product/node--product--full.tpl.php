<?php

/**
 * Node Product Full
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['children']);
  hide($content['pager']);
  hide($content['pager_with_img']);
  hide($content['webform']);
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix"<?php print $attributes; ?>>
      <?php print $user_picture; ?>

      <div class="row spazio-50">
        <div class="col-md-6">
          <?php print render($content['field_img']); ?>

          <div class="hidden-xs">
            <?php print render($content['field_imgs']); ?>
          </div>
        </div>
        <div class="col-md-6">
          <?php print render($title_prefix); ?>
            <h1 class="h2 spazio-5 no-margin-top"><?php print $title; ?></h1>
          <?php print render($title_suffix); ?>

          <?php print render($content['field_subtitle']); ?>
          <hr class="no-margin-top spazio-15">

          <?php print render($content['producer']); ?>

          <?php print render($content['body']); ?>

          <div class="hidden-sm hidden-md hidden-lg">
            <?php print render($content['field_imgs']); ?>
          </div>

          <?php print render($content); ?>

          <hr>
          <h4>Chiedi informazioni su <?php print $title; ?></h4>
          <?php print render($content['webform']); ?>

        </div>
      </div>

      <hr>

      <?php print render($content['pager_with_img']); ?>

    </div>
  </div>
</div>