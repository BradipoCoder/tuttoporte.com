<?php
/**
 * @file
 * ftc_showroom.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ftc_showroom_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function ftc_showroom_node_info() {
  $items = array(
    'showroom' => array(
      'name' => t('Showroom'),
      'base' => 'node_content',
      'description' => t('Aggiunge uno showroom al sito.'),
      'has_title' => '1',
      'title_label' => t('Titolo'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
