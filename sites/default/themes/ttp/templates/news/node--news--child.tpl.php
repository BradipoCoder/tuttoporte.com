<?php

/**
 * Post del blog Child
 */

hide($content['field_date']);
hide($content['field_ref_cat']);

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> col-xs-12 node-child" <?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <div class="node-content spazio-20"<?php print $content_attributes; ?>>
    <div class="row">
      <div class="col-xs-3">  
        <?php print render($content['field_img']); ?>
      </div>

      <div class="col-xs-9"> 
        <hr class="top">
        
        <h4 class="spazio-5">
          <a href="<?php print $node_url; ?>" title="<?php print $title; ?>">
            <?php print $title; ?>
          </a>
        </h4>

        <p class="spazio-15 small">
          <?php print format_date(strtotime($node->field_date['und'][0]['value']), 'custom','d . M . Y'); ?>
          <span class="blog-categories hidden-xs"> | in <span class="h5"><?php print $content['field_ref_cat'][0]['#markup']; ?></span></span><br/>
        </p>

        <div class="spazio-10 hidden-sm hidden-xs">
          <?php print render($content); ?>
        </div>

      </div>
    </div>
    <?php print render($title_suffix); ?>
  </div>
</div>