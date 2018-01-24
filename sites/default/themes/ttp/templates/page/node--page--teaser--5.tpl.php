<?php

/**
 * Page Blog Teaser
 */
?>

<?php 
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_button']);
  hide($content['children']);
  if ($children){
   hide($content['body']); 
  }
?>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix node-teaser"<?php print $attributes; ?>>
      
      <?php print render($title_prefix); ?>
        <h1<?php print $title_attributes; ?> class="text-center">
          <a href="<?php print $node_url; ?>">
            <?php print $title; ?>
          </a>
        </h1>
      <?php print render($title_suffix); ?>

      <div class="scroll-home-separator"></div>

      <div class="node-content"<?php print $content_attributes; ?>>
         <?php print render($content); ?>
      </div>

      <?php //print render($children_filter); ?>
      <?php //print render($children); ?>

      <p class="text-center"><?php print render($button); ?></p>

    </div>
  </div>
</div>
