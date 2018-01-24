<?php

/**
 * Node Showroom Child
 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> col-md-3 col-sm-6 node-child" <?php print $attributes; ?>>

  <?php print render($title_prefix); ?>

  <div class="node-content spazio-30"<?php print $content_attributes; ?>>
    
    <?php print render($content['field_img']); ?>

    <?php print render($content); ?>

    <?php print render($title_suffix); ?>

  </div>
</div>

