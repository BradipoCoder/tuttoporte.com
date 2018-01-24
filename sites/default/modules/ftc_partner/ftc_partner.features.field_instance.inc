<?php
/**
 * @file
 * ftc_partner.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function ftc_partner_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance: 'node-partner-body'
  $field_instances['node-partner-body'] = array(
    'bundle' => 'partner',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 3,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => '',
        ),
        'type' => 'text_default',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 3,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'body',
    'label' => 'Descrizione',
    'required' => 0,
    'settings' => array(
      'display_summary' => 0,
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 20,
        'summary_rows' => 5,
      ),
      'type' => 'text_textarea_with_summary',
      'weight' => 10,
    ),
  );

  // Exported field_instance: 'node-partner-field_img'
  $field_instances['node-partner-field_img'] = array(
    'bundle' => 'partner',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'empty_fields_emptyfieldtext_empty_text' => '',
          'empty_fields_handler' => '',
          'field_formatter_class' => 'spazio-10',
          'image_link' => '',
          'image_style' => 'square',
        ),
        'type' => 'image',
        'weight' => 0,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'field_formatter_class' => 'text-max-width spazio-20',
          'image_link' => 'content',
          'image_style' => 'square',
        ),
        'type' => 'image',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'field_formatter_class' => 'spazio-30',
          'image_link' => 'content',
          'image_style' => 43,
        ),
        'type' => 'image',
        'weight' => 1,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_img',
    'label' => 'Ritratto',
    'required' => 1,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'img/partner',
      'file_extensions' => 'png gif jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '',
      'title_field' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'manualcrop_crop_info' => TRUE,
        'manualcrop_default_crop_area' => TRUE,
        'manualcrop_enable' => FALSE,
        'manualcrop_inline_crop' => FALSE,
        'manualcrop_instant_crop' => FALSE,
        'manualcrop_instant_preview' => TRUE,
        'manualcrop_keyboard' => TRUE,
        'manualcrop_maximize_default_crop_area' => FALSE,
        'manualcrop_require_cropping' => array(),
        'manualcrop_styles_list' => array(),
        'manualcrop_styles_mode' => 'include',
        'manualcrop_thumblist' => FALSE,
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'node-partner-field_short'
  $field_instances['node-partner-field_short'] = array(
    'bundle' => 'partner',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'empty_fields_emptyfieldtext_empty_text' => '',
          'empty_fields_handler' => '',
          'field_formatter_class' => '',
        ),
        'type' => 'text_default',
        'weight' => 2,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => 'lead text-max-width text-center spazio-30',
        ),
        'type' => 'text_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => '',
        ),
        'type' => 'text_default',
        'weight' => 2,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_short',
    'label' => 'Descrizione breve',
    'required' => 0,
    'settings' => array(
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 3,
      ),
      'type' => 'text_textarea',
      'weight' => 9,
    ),
  );

  // Exported field_instance: 'node-partner-field_subtitle'
  $field_instances['node-partner-field_subtitle'] = array(
    'bundle' => 'partner',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '<p>Il campo sottotitolo viene utilizzato anche come descrizione nella versione child.</p>',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'empty_fields_emptyfieldtext_empty_text' => '',
          'empty_fields_handler' => '',
          'field_formatter_class' => 'text-max-width text-center text-italic text-bold spazio-20',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 1,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'lead text-max-width text-italic text-center text-bold',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'lead text-max-width text-italic text-center text-bold',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_subtitle',
    'label' => 'Mansione',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 7,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('<p>Il campo sottotitolo viene utilizzato anche come descrizione nella versione child.</p>');
  t('Descrizione');
  t('Descrizione breve');
  t('Mansione');
  t('Ritratto');

  return $field_instances;
}
