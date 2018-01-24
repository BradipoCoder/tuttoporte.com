<?php
/**
 * @file
 * ftc_webform.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function ftc_webform_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance: 'node-webform-body'
  $field_instances['node-webform-body'] = array(
    'bundle' => 'webform',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => '',
        ),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => 'spazio-50 text-max-width',
        ),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'field_formatter_class' => 'text-max-width spazio-50',
        ),
        'type' => 'text_default',
        'weight' => 1,
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

  // Exported field_instance: 'node-webform-field_short'
  $field_instances['node-webform-field_short'] = array(
    'bundle' => 'webform',
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
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'lead text-center text-max-width spazio-40',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'lead text-center text-max-width spazio-40',
          'tag' => 'p',
        ),
        'type' => 'cpt',
        'weight' => 0,
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
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'node-webform-field_subtitle'
  $field_instances['node-webform-field_subtitle'] = array(
    'bundle' => 'webform',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'child' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 1,
      ),
      'default' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'text-max-width',
          'tag' => 'h3',
        ),
        'type' => 'cpt',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'custom_plaintext',
        'settings' => array(
          'field_formatter_class' => 'text-max-width',
          'tag' => 'h3',
        ),
        'type' => 'cpt',
        'weight' => 2,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_subtitle',
    'label' => 'Titolo del form',
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
      'weight' => 4,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Descrizione breve');
  t('Descrizione estesa');
  t('Titolo del form');

  return $field_instances;
}
