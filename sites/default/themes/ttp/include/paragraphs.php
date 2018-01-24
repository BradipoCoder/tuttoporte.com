<?php

/**
 * @file
 * paragraphs.php
 */

// ** PARAGRAPH **
// ---------------

function _ttp_preprocess_paragraphs(&$vars){
    $vars['classes_array'][] = 'entity-paragraphs-item-' . $vars['id'];

    switch ($vars['paragraphs_item']->bundle) {
      case 'accordion':
          _ttp_preprocess_paragraphs_accordion($vars);
        break;

    case 'imgs':
          _ttp_preprocess_p_imgs($vars);
        break;


        # code...
        break;
    }
}

function _ttp_preprocess_paragraphs_accordion(&$vars){
  $p = $vars['paragraphs_item'];

  $vars['content']['accordion'] = array(
    '#prefix' => '<div class="wrapper-accordion">',
    '#suffix' => '</div>',
    'toggle' => array(
      '#markup' => '<div class="wrapper-accordion-toggle">Leggi ancora <i class="fa fa-angle-down"></i></div>',
      '#weight' => 100,
    ), 
    'content' => array(
      '#prefix' => '<div class="wrapper-accordion-content">',
      '#suffix' => '</div>',
    ),
    '#weight' => 4,
  );

  if (isset($p->field_short['und'][0]['value']) && $p->field_short['und'][0]['value']!== ''){
    $vars['content']['accordion']['content']['field_short'] = $vars['content']['field_short'];    
    unset($vars['content']['field_short']);
  }

  if (isset($p->field_img['und'][0]['fid'])){
    $vars['content']['accordion']['content']['field_img'] = $vars['content']['field_img'];
    unset($vars['content']['field_img']);
  }
}

function _ttp_preprocess_p_imgs(&$vars){
  $p = $vars['paragraphs_item'];

  // Options
  $style = 'square';
  if (isset($p->field_vertical['und'][0]['value']) && $p->field_vertical['und'][0]['value']){
    $style = 'vertical';
  }

  $vars['content']['#prefix'] = '<div class="row row-imgs">';
  $vars['content']['#suffix'] = '</div>';

  if ($vars['view_mode'] == 'full'){
    hide($vars['content']['field_img_2']);

    $elements = element_children($p->field_img_2['und']);
    //dpm($elements);
    foreach ($elements as $key => $n) {
      $img = $vars['content']['field_img_2']['#items'][$n];
      $vars['content'][$n] = array(
        '#prefix' => '<div class="col-sm-6"><div class="margin-b-1">',
        '#suffix' => '</div></div>',
        'img' => array(
          'data' => $vars['content']['field_img_2'][$n],
        ),
        '#weight' => $n,
      );
      $vars['content'][$n]['img']['data']['#display_settings']['colorbox_node_style'] = $style;

      if (isset($vars['content']['field_img_2'][$n]['#item']['title']) && $vars['content']['field_img_2'][$n]['#item']['title'] !== ''){
        $title = $vars['content']['field_img_2'][$n]['#item']['title'];
        $vars['content'][$n]['desc'] = array(
          '#prefix' => '<div class="margin-t-05 margin-sm-h-2"><p class="small">',
          '#suffix' => '</p></div>',
          '#markup' => $title,
          '#weight' => 2,
        );
      }
    }
  }

  if ($vars['view_mode'] == 'paragraphs_editor_preview'){
    $vars['content']['#prefix'] = '<div class="wrapper-p-imgs">';
    $vars['content']['#suffix'] = '</div>';
  }
}