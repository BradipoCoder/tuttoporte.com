<?php

/**
 * Brand Child
 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> col-md-2 same-h col-xs-4 node-child" <?php print $attributes; ?>>

  <?php print render($title_prefix); ?>

  <div class="node-content spazio-30"<?php print $content_attributes; ?>>
    
    <?php print render($content['field_img']); ?>
    
    <h5<?php print $title_attributes; ?> class="text-center spazio-0 hidden-xs">
      <a href="<?php print $node_url; ?>" title="<?php print $title; ?>">
        <?php print $title; ?>
      </a>
    </h5>
    
    <?php print render($content); ?>

    <?php print render($title_suffix); ?>

  </div>
</div>

