<?php

/**
 * Node Brand Full
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['children']);
  hide($content['products']);
  hide($content['pager']);
  hide($content['pager_with_title']);
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix spazio-50 "<?php print $attributes; ?>>
  <div class="wrapper-header-brand spazio-30">
    <div class="row">
      <div class="col-sm-3">
        <?php print render($content['field_img']); ?>
      </div>
      <div class="col-sm-9">
        <div class="brand-description">
          <?php print render($title_prefix); ?>
            <h1<?php print $title_attributes; ?> class="no-margin-top"><?php print $title; ?></h1>
          <?php print render($title_suffix); ?>

          <hr>

          <div class="node-content spazio-30"<?php print $content_attributes; ?>>
            <?php print render($content); ?>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php print render($content['products']); ?>

  <hr>

  <?php print render($content['pager_with_title']); ?>
</div>