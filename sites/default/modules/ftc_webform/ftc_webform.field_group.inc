<?php
/**
 * @file
 * ftc_webform.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function ftc_webform_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_1|node|webform|form';
  $field_group->group_name = 'group_1';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'webform';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Titolo e descrizione',
    'weight' => '0',
    'children' => array(
      0 => 'body',
      1 => 'field_short',
      2 => 'title',
    ),
    'format_type' => 'tab',
    'format_settings' => array(
      'label' => 'Titolo e descrizione',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'closed',
    ),
  );
  $export['group_1|node|webform|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_2|node|webform|form';
  $field_group->group_name = 'group_2';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'webform';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Form',
    'weight' => '1',
    'children' => array(
      0 => 'field_subtitle',
    ),
    'format_type' => 'tab',
    'format_settings' => array(
      'formatter' => 'closed',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_2|node|webform|form'] = $field_group;

  return $export;
}
