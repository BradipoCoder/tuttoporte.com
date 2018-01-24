<?php

/**
 * Post del blog Teaser
 */

hide($content['field_date']);
hide($content['field_ref_cat']);

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-teaser" <?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="node-content spazio-20 same-h"<?php print $content_attributes; ?>>
    <?php print render($content['field_img']); ?>
    <?php print render($content['field_date']); ?>
    <h4>
      <a href="<?php print $node_url; ?>" title="<?php print $title; ?>">
        <?php print $title; ?>
      </a>
    </h4>
  </div>
</div>