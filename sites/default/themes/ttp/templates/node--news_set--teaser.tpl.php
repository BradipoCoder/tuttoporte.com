<?php

/**
 * Node News set Teaser
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['children']);
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix"<?php print $attributes; ?>>
      <?php print $user_picture; ?>

      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>

      <div class="node-content margin-v-2"<?php print $content_attributes; ?>>
        <div class="row">
          <?php print render($content['field_ref_news']); ?>
        </div>
      </div>
      <?php print render($content); ?>
      <?php print render($content['children']); ?>

    </div>
  </div>
</div>