<?php

/**
 * Node Service Full
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['children']);
  hide($content['field_col_servizi']);
  hide($content['note']);
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix"<?php print $attributes; ?>>

      <?php print render($title_prefix); ?>
        <h1<?php print $title_attributes; ?> class="text-center"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>

      <div class="node-content text-max-width spazio-50"<?php print $content_attributes; ?>>
        <?php print render($content); ?>
      </div>

      <?php print render($content['field_col_servizi']); ?>

      <?php print render($content['note']); ?>

    </div>
  </div>
</div>