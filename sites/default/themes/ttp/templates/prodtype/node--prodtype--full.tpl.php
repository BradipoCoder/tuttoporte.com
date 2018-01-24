<?php

/**
 * Node Macrocategorie di prodotto Full
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['children']);
  hide($content['pager']);
  hide($content['pager_with_title']);
  hide($content['field_title2']);
  hide($content['brands']);
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix"<?php print $attributes; ?>>
      <?php print $user_picture; ?>

      <?php print render($title_prefix); ?>
        <h1<?php print $title_attributes; ?> class="text-center text-max-width"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>

      <div class="node-content text-max-width spazio-30"<?php print $content_attributes; ?>>
        <?php print render($content); ?>
      </div>

      <?php print render($content['field_title2']); ?>

      <hr>

      <?php print render($content['children']); ?>

      <?php print render($content['brands']); ?>

      <hr>

      <?php print render($content['pager_with_title']); ?>



    </div>
  </div>
</div>