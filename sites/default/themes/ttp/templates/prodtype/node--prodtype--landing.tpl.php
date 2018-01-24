<?php

/**
 * Node Macrocategorie di prodotto Full (versione landing page)
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
  hide($content['field_subtitle']);
  hide($content['field_imgs']);
  hide($content['field_short']);
?>


<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full clearfix"<?php print $attributes; ?>>
  
  <div class="node-content">
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <div class="row">
      <div class="col-md-8">
        <div class="margin-md-r-1">
          <?php print render($content['fake_title']); ?>
          <?php print render($content['field_short']); ?>
          <?php print render($content['children']); ?>
        </div>
      </div>
      <div class="col-md-4">
        <h2>Richiedi un preventivo</h2>
        <?php print render($content['webform']); ?>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        <?php print render($content['title']); ?>
        
        <div class="wrapper-accordion">
          <div class="wrapper-accordion-content">
            <?php print render($content['field_content']); ?>
          </div>
          <div class="wrapper-accordion-toggle">Leggi ancora <i class="fa fa-angle-down"></i></div>
        </div>

        <?php print render($content['news']); ?>
      </div>
      <div class="col-lg-offset-1 col-lg-3 col-md-4">
        <?php print render($content['brands']); ?>  
      </div>
    </div>
  </div>
  <?php print render($content['pager_with_title']); ?>
</div>