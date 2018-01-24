<?php

/**
 * Node Webform Teaser
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['webform']);
  hide($content['showrooms']);
  hide($content['field_subtitle']);
  hide($content['field_logistic']);
?>

<?php print render($title_prefix); ?>
  <h1<?php print $title_attributes; ?> class="text-center spazio-30"><?php print $title; ?></h1>
<?php print render($title_suffix); ?>

<?php print render($content); ?>

<?php print render($content['field_subtitle']); ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="row spazio-30">
    <div class="col-md-9">

      <div class="form">
        <?php print render($form); ?>
      </div>

      <?php print render($content['comments']); ?>
    </div>
    <div class="col-md-3">
      <div class="well">
        <?php print render($content['field_logistic']); ?>
      </div>
    </div> 
  </div>

  <?php print render($content['showrooms']); ?>
  
</div>