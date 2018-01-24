<?php

/**
 * Pagina Blog full
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_subtitle']);
  hide($content['field_short']);
  hide($content['children']);
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full spazio-50 clearfix"<?php print $attributes; ?>>
      <?php print $user_picture; ?>

      <?php print render($content['filter']); ?>

      <div class="node-content text-max-width spazio-30"<?php print $content_attributes; ?>>
        <?php print render($content); ?>
      </div>

      <?php print render($content['comments']); ?>
      
    </div>
  </div>
</div>
