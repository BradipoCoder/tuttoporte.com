<?php
/**
 * @file
 * ftc_prodtype.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ftc_prodtype_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function ftc_prodtype_node_info() {
  $items = array(
    'prodtype' => array(
      'name' => t('Macro categoria di prodotti'),
      'base' => 'node_content',
      'description' => t('Aggiunge una macro categoria di prodotti al sito.'),
      'has_title' => '1',
      'title_label' => t('Titolo'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
