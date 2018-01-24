<?php

/**
 * Landing page full
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['webform']);
  hide($content['field_title2']);
  hide($content['field_title3']);
  hide($content['field_ref_products']);
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="row">
    <div class="col-md-7">
      <?php print $user_picture; ?>

      <?php print render($title_prefix); ?>

      <h1><?php print $title; ?></h1>

      <?php print render($title_suffix); ?>

      <?php print render($content); ?>

    </div>
    <div class="col-md-4 col-md-offset-1">
      <?php print render($content['field_title2']); ?>
      <?php print render($content['webform']); ?>
    </div>
  </div>
  <hr>
  <?php print render($content['field_title3']); ?>
  <div class="row">
    <?php print render($content['field_ref_products']); ?>
  </div>
</div>
