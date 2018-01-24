<?php

/**
 * @file
 * prodtype.php
 */

function _ttp_prodtype_land(&$vars){
  _ttp_prodtype_land_tpl($vars);

  if ($vars['land']){
    _ttp_prodtype_land_cool_title($vars);
    _ttp_prodtype_land_format_short($vars);
    _ttp_prodtype_land_form($vars);
    _ttp_alter_land_children($vars);
    _ttp_alter_land_producer($vars);
  }
}

function _ttp_prodtype_land_tpl(&$vars){
  $node = $vars['node'];
  if (isset($vars['content']['field_content'])){
    $land = $vars['content']['field_content'];
    unset($vars['content']['field_content']);  
  }
  
  $vars['land'] = FALSE;
  if (isset($node->field_land['und'][0]['value']) && $node->field_land['und'][0]['value'] && isset($land)){
    // E' una landing page, cambio il layout
    $vars['theme_hook_suggestions'] = array(
      0 => 'node__prodtype__landing',
    );
    $vars['content']['field_content'] = $land;

    $path = drupal_get_path('theme', 'ttp') . '/js/accordion.js';
    drupal_add_js( $path , array('group' => JS_LIBRARY, 'weight' => 1));
    $vars['land'] = TRUE;
  }
}

function _ttp_prodtype_land_cool_title(&$vars){
  $node = $vars['node'];
  if (isset($node->field_title_land['und'][0]['value'])){
    $vars['content']['title'] = array(
      '#markup' => '<h1>' . $node->field_title_land['und'][0]['value'] . '</h1>',
    );

    $vars['content']['fake_title'] = array(
      '#prefix' => '<div class="wrapper-fake-title spazio-20">',
      '#suffix' => '</div>',
      '#markup' => '<span class="h1">Le nostre porte blindate</span>',
    );
  }
}

function _ttp_prodtype_land_format_short(&$vars){
  if (isset($vars['content']['field_short'][0]['#markup'])){
    $vars['content']['field_short'] = array(
      '#prefix' => '<div class="wrapper-field-short spazio-30">',
      '#suffix' => '</div>',
      '#markup' => $vars['content']['field_short'][0]['#markup'],
    );  
  }
}

function _ttp_prodtype_land_form(&$vars){
  // Webform
  $block = module_invoke('webform', 'block_view', 'client-block-4');
  $vars['content']['webform'] = array(
    '#markup' => $block['content']
  );
}

function _ttp_alter_land_children(&$vars){
  if (isset($vars['content']['children'])){

    $news = array();

    // Rimuovo le news dai figli
    $keys = element_children($vars['content']['children']);
    foreach ($keys as $k) {
      $child = $vars['content']['children'][$k]['#node'];
      if ($child->type == 'news'){
        $news[$k] = $vars['content']['children'][$k];
        unset($vars['content']['children'][$k]);
      } 
    }

    if (!empty($news)){
      $vars['content']['news'] = array(
        '#prefix' => '<div class="wrapper-land-news row margin-v-2">',
        '#suffix' => '</div>',
      );

      foreach ($news as $key => $value) {
        $vars['content']['news'][$key] = node_view($value['#node'], 'teaser');
      }
    }

    add_same_h_by_selector('.wrapper-land-news');

  }
}

function _ttp_alter_land_producer(&$vars){
  if (isset($vars['content']['brands']['grid']['data'])){
    foreach ($vars['content']['brands']['grid']['data'] as $key => $child_view) {
      $teaser = node_load($key);
      $vars['content']['brands']['grid']['data'][$key] = node_view($teaser, 'teaser');
    }
  }

  if (isset($vars['content']['brands']['title'])){
    $vars['content']['brands']['title']['#markup'] = '<h3>Il nostro produttore di porte blindate</h3>';
  }
}