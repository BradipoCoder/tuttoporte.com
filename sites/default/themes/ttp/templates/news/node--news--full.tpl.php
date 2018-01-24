<?php

/**
 * Post del blog FULL
 */
?>

<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_date']);
  hide($content['field_ref_cat']);
  hide($content['field_ref_tag']);
  hide($content['pager']);
  hide($content['disqus']);

  if (isset($node->field_imgs['und'][0]['uri'])){
    hide($content['field_img']);
  }
?>

<div class="row">
  <div class="col-md-12">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-full spazio-50 clearfix"<?php print $attributes; ?>>

      <?php print render($title_prefix); ?>
        <h1 class="text-sm-center text-xs-center no-margin-top spazio-5 h2">
          <?php print $title; ?>
        </h1>
      <?php print render($title_suffix); ?>

      <?php print render($content['field_subtitle']); ?>

      <p class="text-sm-center text-xs-center spazio-20 small">
        <?php print format_date(strtotime($node->field_date['und'][0]['value']), 'custom','d . M . Y'); ?> |
        in <span class="h5"><?php print $content['field_ref_cat'][0]['#markup']; ?></span>
      </p>

      <hr>

      <div class="node-content text-max-width spazio-30"<?php print $content_attributes; ?>>

        <?php if (isset($node->field_video['und'][0]['video_url'])): ?>
          <div class="all-video spazio-20">
            <?php print render($content['field_video']); ?>
          </div>
        <?php endif; ?>

        <?php print render($content); ?>

        <?php if (isset($node->field_ref_tag['und'][0]['tid'])) : ?>
          <hr>
          <h5>Tag:</h5>
          <?php print render($content['field_ref_tag']); ?>
        <?php endif; ?>

      </div>

      <?php if (isset($content['pager']['next'])) : ?>
        <hr>
        <?php print render($content['pager']); ?>
      <?php endif; ?>
    </div>
  </div>
</div>