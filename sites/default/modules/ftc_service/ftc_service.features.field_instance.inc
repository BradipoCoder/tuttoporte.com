<?php
/**
 * @file
 * ftc_service.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function ftc_service_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance: 'node-service-body'
  $field_instances['node-service-body'] = array(
    'bundle' => 'service',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => '',
          'trim_length' => 200,
        ),
        'type' => 'text_trimmed',
        'weight' => 3,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => '',
        ),
        'type' => 'text_default',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => '',
          'trim_length' => 600,
        ),
        'type' => 'text_summary_or_trimmed',
        'weight' => 4,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'body',
    'label' => 'Descrizione estesa',
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
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'node-service-field_date'
  $field_instances['node-service-field_date'] = array(
    'bundle' => 'service',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'date',
        'settings' => array(
          'field_formatter_class' => '',
          'format_type' => 'short',
          'fromto' => 'both',
          'multiple_from' => '',
          'multiple_number' => '',
          'multiple_to' => '',
        ),
        'type' => 'date_default',
        'weight' => 1,
      ),
      'default' => array(
        'label' => 'inline',
        'module' => 'date',
        'settings' => array(
          'field_formatter_class' => '',
          'format_type' => 'short',
          'fromto' => 'both',
          'multiple_from' => '',
          'multiple_number' => '',
          'multiple_to' => '',
        ),
        'type' => 'date_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'date',
        'settings' => array(
          'field_formatter_class' => '',
          'format_type' => 'short',
          'fromto' => 'both',
          'multiple_from' => '',
          'multiple_number' => '',
          'multiple_to' => '',
        ),
        'type' => 'date_default',
        'weight' => 1,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_date',
    'label' => 'Data di pubblicazione',
    'required' => 0,
    'settings' => array(
      'default_value' => 'now',
      'default_value2' => 'same',
      'default_value_code' => '',
      'default_value_code2' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'date',
      'settings' => array(
        'increment' => 15,
        'input_format' => 'm/d/Y - H:i:s',
        'input_format_custom' => '',
        'label_position' => 'above',
        'text_parts' => array(),
        'year_range' => '-10:+10',
      ),
      'type' => 'date_select',
      'weight' => 6,
    ),
  );

  // Exported field_instance: 'node-service-field_img'
  $field_instances['node-service-field_img'] = array(
    'bundle' => 'service',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'field_formatter_class' => 'spazio-20',
          'image_link' => 'content',
          'image_style' => 169,
        ),
        'type' => 'image',
        'weight' => 0,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'field_formatter_class' => 'spazio-20',
          'image_link' => '',
          'image_style' => 169,
        ),
        'type' => 'image',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'field_formatter_class' => 'spazio-30',
          'image_link' => 'content',
          'image_style' => 73,
        ),
        'type' => 'image',
        'weight' => 3,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_img',
    'label' => 'Immagine di anteprima',
    'required' => 1,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'img/service',
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
        'manualcrop_crop_info' => 1,
        'manualcrop_default_crop_area' => 1,
        'manualcrop_enable' => 0,
        'manualcrop_inline_crop' => 0,
        'manualcrop_instant_crop' => 0,
        'manualcrop_instant_preview' => 1,
        'manualcrop_keyboard' => 1,
        'manualcrop_maximize_default_crop_area' => 0,
        'manualcrop_require_cropping' => array(),
        'manualcrop_styles_list' => array(),
        'manualcrop_styles_mode' => 'include',
        'manualcrop_thumblist' => 0,
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 10,
    ),
  );

  // Exported field_instance: 'node-service-field_imgs'
  $field_instances['node-service-field_imgs'] = array(
    'bundle' => 'service',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 4,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'image',
        'settings' => array(
          'field_formatter_class' => '',
          'image_link' => '',
          'image_style' => 169,
        ),
        'type' => 'image',
        'weight' => 6,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 5,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_imgs',
    'label' => 'Slideshow',
    'required' => 0,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => 'img/service/slideshow',
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
        'manualcrop_crop_info' => 1,
        'manualcrop_default_crop_area' => 1,
        'manualcrop_enable' => 0,
        'manualcrop_inline_crop' => 0,
        'manualcrop_instant_crop' => 0,
        'manualcrop_instant_preview' => 1,
        'manualcrop_keyboard' => 1,
        'manualcrop_maximize_default_crop_area' => 0,
        'manualcrop_require_cropping' => array(),
        'manualcrop_styles_list' => array(),
        'manualcrop_styles_mode' => 'include',
        'manualcrop_thumblist' => 0,
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 11,
    ),
  );

  // Exported field_instance: 'node-service-field_ref_cat'
  $field_instances['node-service-field_ref_cat'] = array(
    'bundle' => 'service',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'inline',
        'module' => 'taxonomy_formatter',
        'settings' => array(
          'element_class' => '',
          'element_option' => '- None -',
          'field_formatter_class' => 'spazio-10',
          'links_option' => 1,
          'separator_option' => ', ',
          'wrapper_class' => '',
          'wrapper_option' => '- None -',
        ),
        'type' => 'taxonomy_term_reference_csv',
        'weight' => 2,
      ),
      'default' => array(
        'label' => 'inline',
        'module' => 'taxonomy_formatter',
        'settings' => array(
          'element_class' => '',
          'element_option' => '- None -',
          'field_formatter_class' => 'spazio-20',
          'links_option' => 1,
          'separator_option' => ', ',
          'wrapper_class' => '',
          'wrapper_option' => '- None -',
        ),
        'type' => 'taxonomy_term_reference_csv',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'inline',
        'module' => 'taxonomy_formatter',
        'settings' => array(
          'element_class' => '',
          'element_option' => '- None -',
          'field_formatter_class' => 'spazio-20',
          'links_option' => 1,
          'separator_option' => ', ',
          'wrapper_class' => '',
          'wrapper_option' => '- None -',
        ),
        'type' => 'taxonomy_term_reference_csv',
        'weight' => 2,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_ref_cat',
    'label' => 'Categoria',
    'required' => 1,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_buttons',
      'weight' => 7,
    ),
  );

  // Exported field_instance: 'node-service-field_ref_tag'
  $field_instances['node-service-field_ref_tag'] = array(
    'bundle' => 'service',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 6,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'taxonomy',
        'settings' => array(
          'field_formatter_class' => '',
        ),
        'type' => 'taxonomy_term_reference_link',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'inline',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 7,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_ref_tag',
    'label' => 'Tags',
    'required' => 0,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'taxonomy',
      'settings' => array(
        'autocomplete_path' => 'taxonomy/autocomplete',
        'size' => 60,
      ),
      'type' => 'taxonomy_autocomplete',
      'weight' => 8,
    ),
  );

  // Exported field_instance: 'node-service-field_subtitle'
  $field_instances['node-service-field_subtitle'] = array(
    'bundle' => 'service',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 7,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'lead text-max-width text-italic text-bold text-center spazio-20',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'lead text-max-width text-italic text-bold text-center spazio-20',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_subtitle',
    'label' => 'Sottotitolo',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 2,
      ),
      'type' => 'text_textarea',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'node-service-field_video'
  $field_instances['node-service-field_video'] = array(
    'bundle' => 'service',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Inserire l\'URL del video',
    'display' => array(
      'child' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 5,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'video_embed_field',
        'settings' => array(
          'description' => 1,
          'description_position' => 'bottom',
          'field_formatter_class' => '',
          'video_style' => 'normal',
        ),
        'type' => 'video_embed_field',
        'weight' => 7,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 6,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_video',
    'label' => 'Video',
    'required' => 0,
    'settings' => array(
      'description_field' => 0,
      'description_length' => 128,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'video_embed_field',
      'settings' => array(),
      'type' => 'video_embed_field_video',
      'weight' => 12,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Categoria');
  t('Data di pubblicazione');
  t('Descrizione estesa');
  t('Immagine di anteprima');
  t('Inserire l\'URL del video');
  t('Slideshow');
  t('Sottotitolo');
  t('Tags');
  t('Video');

  return $field_instances;
}
