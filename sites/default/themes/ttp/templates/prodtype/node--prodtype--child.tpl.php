<?php

/**
 * Node ProdType Child
 */

hide($content['children']);

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> col-md-4 same-h col-xs-12 node-child" <?php print $attributes; ?>>

  <?php print render($title_prefix); ?>

  <div class="node-content spazio-30"<?php print $content_attributes; ?>>
    
    <div class="wrapper-image-with-title">
      <?php print render($content['field_img']); ?>
      <?php print render($content['more']); ?>
    </div>
    
    <?php print render($content); ?>

    <?php print render($title_suffix); ?>

  </div>
</div>