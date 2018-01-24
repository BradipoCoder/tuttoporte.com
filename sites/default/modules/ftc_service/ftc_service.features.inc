<?php
/**
 * @file
 * ftc_service.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ftc_service_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function ftc_service_node_info() {
  $items = array(
    'service' => array(
      'name' => t('Servizio'),
      'base' => 'node_content',
      'description' => t('Aggiunge un servizio al sito.'),
      'has_title' => '1',
      'title_label' => t('Titolo'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
