<?php
/**
 * @file
 * ftc_brand.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ftc_brand_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function ftc_brand_node_info() {
  $items = array(
    'brand' => array(
      'name' => t('Produttore'),
      'base' => 'node_content',
      'description' => t('Aggiunge un produttore al sito.'),
      'has_title' => '1',
      'title_label' => t('Titolo'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
