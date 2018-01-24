<?php

/**
 * Node Showroom
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['children']);
  hide($content['showrooms']);
  hide($content['webform']);
  if (isset($node->field_imgs['und'][0])){
    hide($content['field_img']);
  }
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix"<?php print $attributes; ?>>
  <div class="row">
    <div class="col-md-7">

      <?php print render($title_prefix); ?>
        <h1<?php print $title_attributes; ?> class="no-margin-top spazio-30"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>

      <div class="wrapper-map-and-address row spazio-20">
        <div class="col-sm-4 col-xs-7">
          <?php print render($content['field_address']); ?>
          <?php print render($content['field_telephone']); ?>
          <?php print render($content['field_time']); ?>
        </div>
        <div class="col-sm-8 col-xs-5">
          <?php print render($content['field_map_address']); ?>
        </div>
      </div>

      <hr>

      <div class="node-content text-max-width spazio-30"<?php print $content_attributes; ?>>
        <?php print render($content); ?>
      </div>

      <h4>Richiedi informazioni</h4>
      <?php print render($content['webform']); ?>

    </div>
    <div class="col-md-4 col-md-offset-1">
      <?php print render($content['showrooms']); ?>
    </div>
  </div>
  
</div>