<?php

/**
 * Pagina Full Chi siamo
 */
?>

<?php 
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_button']);
  hide($content['children']);
  hide($content['partners']);
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix node-teaser"<?php print $attributes; ?>>
      
      <?php print render($title_prefix); ?>
        <h1<?php print $title_attributes; ?> class="text-center">
          <a href="<?php print $node_url; ?>">
            <?php print $title; ?>
          </a>
        </h1>
      <?php print render($title_suffix); ?>

      <div class="node-content spazio-50"<?php print $content_attributes; ?>>
        <?php print render($content); ?>
      </div>

      <?php print render($content['partners']); ?>

    </div>
  </div>
</div>