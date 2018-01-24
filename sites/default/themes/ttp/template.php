<?php

/**
 * @file
 * template.php
 */

require('include/prodtype.php');
require('include/paragraphs.php');

//carico i caratteri da google e altri css CDN
function ttp_preprocess_html(&$vars) {
  drupal_add_css('//fonts.googleapis.com/css?family=Lato:300,400,700,400italic', array('type' => 'external'));

  // google analytics script
  $google_analytics = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100557132-1', 'auto');
  ga('send', 'pageview');";

  drupal_add_js($google_analytics, array('type' => 'inline', 'scope' => 'header', 'weight' => 5));
  
  // Sovrascrivo il title delle landing page (aggiungendo il sottotitolo)
  $node = menu_get_object();
  if ($node){
    if ($node->type == 'landing'){
      if (isset($node->field_subtitle['und'][0]['safe_value'])){
        $site_name = variable_get('site_name');
        $subtitle = $node->field_subtitle['und'][0]['safe_value'];
        $vars['head_title'] = $node->title . ': ' . $subtitle . ' | ' . $site_name;
      }
    }
  }

  //$host = $_SERVER['HTTP_HOST'];
  //if ($host !== 'www.tuttoporte.com'){
  //  $vars['theme_hook_suggestions'][] = 'html__kill';
  //}
}

/**
 * Implements hook_preprocess_menu_link();
 * Aggiunge una classe Headings alle voci di menu della NAV BAR
 */
//function ttp_preprocess_menu_link(&$vars){
//  if (isset($vars['element']['#original_link']['menu_name'])){
//    if ($vars['element']['#original_link']['menu_name'] == 'main-menu'){
//      $vars['element']['#localized_options']['attributes']['class'][] = 'h5';
//    }
//  }
//}

/**
 * Implements hook_form_FORM_ID_alter(&$form, &$form_state, $form_id)
 * rimuovo alcuni parametri per gli autenticated user
 */
function ttp_form_node_form_alter(&$form, $form_state){
  global $user;

  $form['nodehierarchy']['#title'] = 'Genitore';
  if (isset($form['nodehierarchy']['nodehierarchy_menu_links'][0]['#title'])){
    $form['nodehierarchy']['nodehierarchy_menu_links'][0]['#title'] = 'Genitore';
  }

  if ($user->uid == 1){
    // Administrator
    //dpm($form);
  } else {
    // Authenticated user
    $form['options']['promote']['#access'] = false;
    $form['options']['sticky']['#access'] = false;
    $form['revision_information']['#access'] = false;
  }
}

/**
 * Implements hook_preprocess_page();
 */
function ttp_preprocess_page(&$vars){
  if (isset($vars['page']['sidebar_second'])){
    if (!empty($vars['page']['sidebar_second'])){
      $vars['content_column_class'] = ' class="col-md-8"';
      $vars['right_column_class'] = ' class="col-md-3 col-md-offset-1"';
    }
  }

  // TOP TITLE BLOG
  if (arg(0) == 'node' && arg(1) == 5){
    if (arg(2) !== 'edit' && arg(2) !== 'children'){
      $node = $vars['node'];
      $vars['top_title'] = $node->title;
      $vars['top_description'] = field_view_field('node', $node, 'field_short', 'default');
      $vars['top_subtitle'] = field_view_field('node', $node, 'field_subtitle', 'default');
    }
  }

  
  _ttp_add_houzz_badge($vars);

  //$host = $_SERVER['HTTP_HOST'];
  //if ($host !== 'www.tuttoporte.com'){
  //  unset($vars['page']);
  //} else {
  //  //dpm($vars);
  //}

}

/**
 * Implements hook_preprocess_node();
 */
function ttp_preprocess_node(&$vars){
  // Macro categoria di prodotti
  if ($vars['type'] == 'prodtype'){
    _preprocess_type_prodtype($vars);
  }

  // Servizi
  if ($vars['type'] == 'service'){
    _preprocess_type_service($vars);
  }

  // Product
  if ($vars['type'] == 'product'){
    _preprocess_type_product($vars);
  }

  // Brand
  if ($vars['type'] == 'brand'){
    _preprocess_type_brand($vars);
  }

  // Showroom
  if ($vars['type'] == 'showroom'){
    _preprocess_type_showroom($vars);
  }

  // News
  if ($vars['type'] == 'news'){
    _preprocess_type_news($vars);
  }

  // Partner
  if ($vars['type'] == 'partner'){
    _preprocess_type_partner($vars);
  }


  // Pagina contatti
  if ($vars['nid'] == 4){
    _preprocess_node_contatti($vars);
  }

  // Pagina prodotti
  if ($vars['nid'] == 1){
    _preprocess_node_prodotti($vars);
  }

  // Pagina chi siamo
  if ($vars['nid'] == 3){
    _preprocess_node_chisiamo($vars);
  }
}

/**
 * _preprocess_type_prodtype()
 */
function _preprocess_type_prodtype(&$vars){
  if ($vars['view_mode'] == 'full'){
    _pager_with_title($vars);
    _brand_by_products($vars);
    _ttp_prodtype_land($vars);
  }

  if ($vars['view_mode'] == 'child'){
    $opt = array(
      'attributes' => array(
        'class' => array('wrapper-link'),
      ),
      'html' => true,
    );
    $html = '<span class="over-img-dark"><span class="wrapper-square"><span class="wrapper-title"><span class="title">' . $vars['node']->title . '</span></span></span>';
    $link = l($html, 'node/' . $vars['nid'], $opt);
    $vars['content']['more'] = array(
      '#markup' => $link,
      '#weight' => 0,
    );
  }
}

/**
 * _preprocess_type_service()
 */
function _preprocess_type_service(&$vars){

  if ($vars['view_mode'] == 'child'){
    $opt = array(
      'attributes' => array(
        'class' => array('wrapper-link'),
      ),
      'html' => true,
    );
    $html = '<span class="over-img-dark"><span class="wrapper-square"><span class="wrapper-title"><span class="title">' . $vars['node']->title . '</span></span></span>';
    $link = l($html, 'node/' . $vars['nid'], $opt);
    $vars['content']['more'] = array(
      '#markup' => $link,
      '#weight' => 0,
    );
  }

  if ($vars['view_mode'] == 'full'){
    if ($vars['nid'] == 11) {
      $text = '<strong>* Messaggio pubblicitario con finalità promozionale.</strong> Per le condizioni contrattuali si veda il documento denominato “IEBCC” presso la Sede Fiditalia e i Punti Vendita aderenti all’iniziativa. TuttoPorte opera quale intermediario del credito in regime di non esclusiva con Fiditalia.
            La valutazione del merito creditizio dell’operazione è soggetta all’approvazione di Fiditalia Spa.';
      $vars['content']['note'] = array(
        '#markup' => '<div class="small spazio-20"><p>' . $text . '</p>',
      );
    }
  }
}

/**
 * _preprocess_type_product()
 */
function _preprocess_type_product(&$vars){
  $node = $vars['node'];
  $context = menu_get_object();

  if ($vars['view_mode'] == 'full'){
    // ** REF BRAND **
    // ---------------
    if(isset($node->field_ref_brand['und'][0]['target_id'])){
      $brand_nid = $node->field_ref_brand['und'][0]['target_id'];
      $brand = node_load($brand_nid);
      
      $vars['content']['producer'] = array(
        'titolo' => array(
          '#markup' => '<p class="spazio-20 small">Produttore: ' . l($brand->title, 'node/' . $brand->nid) . '</p>',
        ),
      );

      // Campi
      $image = field_view_field('node', $brand, 'field_img', 'teaser');
      $body_trimmed = field_view_field('node', $brand, 'body', 'teaser');

      $vars['content']['producer_teaser'] = array(
        '#prefix' => '<div class="node-producer node-reference spazio-40"><div class="row">',
        '#suffix' => '</div></div>',
        'image' => array(
          '#markup' => '<div class="col-xs-4 col-sm-3">' . render($image) . '</div>',
        ),
        'text' => array(
          '#markup' => '<div class="col-xs-8 col-sm-9">' . render($body_trimmed) . '</div>',
        ),
        '#weight' => 18,
      );
    }

    // Webform
    $block = module_invoke('webform', 'block_view', 'client-block-4');
    $vars['content']['webform'] = array(
      '#markup' => $block['content']
    );

    // ** REF SHOWROOM **
    // ------------------
    if (isset($node->field_ref_showroom['und'][0]['target_id'])){
      
      $s_nids = array();
      foreach ($node->field_ref_showroom['und'] as $key => $showroom) {
        $s_nids[] = $showroom['target_id'];
      }

      $showrooms = node_load_multiple($s_nids);
      foreach ($showrooms as $key => $showroom) {
        $reference_showroom[$key] = _render_showroom_reference($showroom);
      }

      $titolo = '<p class="spazio-15">Puoi trovare questo prodotto qui:</p>';
      $vars['content']['showroom'] = array(
        '#prefix' => '<div class="node-showroom node-reference spazio-20">' . $titolo,
        '#suffix' => '</div>',
        'showrooms' => $reference_showroom,
        '#weight' => 19,
      );
    }

    // ** PAGINATION WITH IMG **
    // -------------------------
    if (isset($vars['pagination'])){
      $next = node_load($vars['pagination']['next']);
      $prev = node_load($vars['pagination']['prev']);

      $image_prev = array(
        '#theme' => 'image_style',
        '#style_name' => 'square',
        '#path' => $prev->field_img['und'][0]['uri'],
      );

      $image_next = array(
        '#theme' => 'image_style',
        '#style_name' => 'square',
        '#path' => $next->field_img['und'][0]['uri'],
      );

      $opt['html'] = true;
      $vars['content']['pager_with_img'] = array(
        '#prefix' => '<div class="row pager-with-img spazio-30">',
        '#suffix' => '</div>',
        'prev' => array(
          '#prefix' => '<div class="col-xs-6">',
          '#suffix' => '</div>',
          'titolo' => array(
            '#markup' => '<p>' . l('<i class="fa fa-angle-left fa-fw"></i> ' . $prev->title, 'node/' . $prev->nid, $opt) . '</p>',
          ),
          'wrapper-img' => array(
            '#prefix' => '<div class="row"><div class="col-md-4">',
            '#suffix' => '</div></div>',
            'img' => array(
              '#markup' => l(render($image_prev), 'node/' . $prev->nid, $opt),
            ),
          ),
        ),
        'next' => array(
          '#prefix' => '<div class="col-xs-6">',
          '#suffix' => '</div>',
          'titolo' =>  array(
            '#markup' => '<p class="text-right">' . l($next->title . ' <i class="fa fa-angle-right fa-fw"></i>', 'node/' . $next->nid, $opt) . '</p>',
          ),
          'wrapper-img' => array(
            '#prefix' => '<div class="row"><div class="col-md-4 col-md-offset-8">',
            '#suffix' => '</div></div>',
            'img' => array(
              '#markup' => l(render($image_next), 'node/' . $next->nid, $opt),
            ),
          ),
        ),
      );
    }

    _ttp_seo_title($vars);
  }

  if ($vars['view_mode'] == 'child'){
    $opt = array(
      'attributes' => array(
        'class' => array('wrapper-link'),
      ),
      'html' => true,
    );

    if (isset($context->field_land['und'][0]['value']) && $context->field_land['und'][0]['value']){
      $vars['classes_array'][] = 'col-md-4';
    } else {
      $vars['classes_array'][] = 'col-md-3';
    }
    $vars['classes_array'][] = 'col-xs-12';
    $vars['classes_array'][] = 'same-h';

    if(isset($node->field_ref_brand['und'][0]['target_id'])){
      $brand_nid = $node->field_ref_brand['und'][0]['target_id'];
      $brand = node_load($brand_nid);

      $brand_logo = array(
        '#theme' => 'image_style',
        '#style_name' => 'square',
        '#path' => $brand->field_img['und'][0]['uri'],
        '#prefix' => '<span class="wrapper-brand-logo">',
        '#suffix' => '</span>',
      );

    }

    $html = '<span class="over-img-dark"><span class="wrapper-square">' . render($brand_logo)  . '<span class="wrapper-title"><span class="title with-subtitle">' . $node->title . '</span>';

    if (isset($node->field_subtitle['und'][0]['value'])){
      $html .= '<br /><span class="subtitle text-italic">' . $node->field_subtitle['und'][0]['value'] . '</span></span></span>';
    }
    $link = l($html, 'node/' . $vars['nid'], $opt);
    $vars['content']['more'] = array(
      '#markup' => $link,
      '#weight' => 0,
    );
  }
}

function _ttp_seo_title(&$vars){
  $node = $vars['node'];

  // Solo per le porte blindate
  if (isset($node->nodehierarchy_menu_links[0]['pnid']) && $node->nodehierarchy_menu_links[0]['pnid']== 13){
    $vars['title'] .= ' <br/><span class="fake-h1">Porte blindate Torino</span>';
    // Brutal way to hide the text a keep the spacing
    $vars['content']['field_subtitle'][0]['#markup'] = '';
  }
}

/**
 * _preprocess_type_brand()
 */
function _preprocess_type_brand(&$vars){
  if ($vars['view_mode'] == 'full'){
    _pager_with_title($vars);

    $products = _get_nodes('product', array('ref_nid' => $vars['nid']));
    if ($products){
      $vars['content']['products'] = array(
        '#prefix' => '<div class="row products">',
        '#suffix' => '</div>',
      );
      foreach ($products as $key => $product) {
        $vars['content']['products'][$key] = node_view($product, 'child');
      }
    }
  }

  if ($vars['view_mode'] == 'teaser'){
    $vars['classes_array'][] = 'col-xs-12';
  }
}

function _preprocess_type_news(&$vars){
  if ($vars['view_mode'] == 'teaser'){
    $vars['classes_array'][] = 'col-md-4';
  }

  if ($vars['view_mode'] == 'full'){
    _ttp_seo_title($vars);
  }
}

/**
 * _preprocess_type_showroom()
 */
function _preprocess_type_showroom(&$vars){
  $node = $vars['node'];
  if ($vars['view_mode'] == 'full'){
    // Showrooms
    $showrooms = _get_nodes('showroom');
    $vars['content']['showrooms'] = array(
      '#prefix' => '<div class="showrooms-reference spazio-50">',
      '#suffix' => '</div>',
    );
    foreach ($showrooms as $key => $showroom) {
      $vars['content']['showrooms'][$key] = _render_showroom_reference($showroom);
    }

    if(isset($node->field_time['und'][0]['value'])){
      $vars['content']['field_time'] = array(
        'title' => array(
          '#markup' => '<h4 class="spazio-5"><i class="fa fa-clock-o"></i>&nbsp; Orario</h4>'
        ),
        'data' => field_view_field('node', $node, 'field_time', 'default'),
      );
    }

    // Webform
    $block = module_invoke('webform', 'block_view', 'client-block-4');
    $vars['content']['webform'] = array(
      '#markup' => $block['content'],
    );
  }

  if ($vars['view_mode'] == 'child'){
    $vars['content']['address'] = _render_showroom_reference($vars['node']);
  }
}

function _preprocess_type_partner(&$vars){
  if ($vars['view_mode'] == 'child'){
    $vars['classes_array'][] = 'col-md-2';
    $vars['classes_array'][] = 'col-xs-4';
    $vars['classes_array'][] = 'same-h';
  }
}

function _preprocess_node_contatti(&$vars){
  if ($vars['view_mode'] == 'full' || $vars['view_mode'] == 'teaser'){
    $showrooms = _get_nodes('showroom');
    $vars['content']['showrooms'] = array(
      '#prefix' => '<div class="row showrooms-reference">',
      '#suffix' => '</div>',
    );
    foreach ($showrooms as $key => $showroom) {
      $vars['content']['showrooms'][$key] = node_view($showroom, 'child');
    }
  }

  add_same_h_by_selector('.showrooms-reference');
}

function _preprocess_node_prodotti(&$vars){
  if ($vars['view_mode'] == 'full' || $vars['view_mode'] == 'teaser'){
    //$brands = _get_nodes('brand');

    $brands_nid = get_children_by_pnid(16);
    $brands = node_load_multiple($brands_nid);

    $vars['content']['brands']['title'] = array(
      '#markup' => '<h2 class="text-center">' . l('I nostri produttori', 'node/16') . '</h2><hr>',
    );
    $vars['content']['brands']['list'] = array(
      '#prefix' => '<div class="row brands-reference">',
      '#suffix' => '</div>',
    );

    $n = 0;
    $max = 6;

    foreach ($brands as $key => $brand) {
      $n++;
      $vars['content']['brands']['list'][$key] = node_view($brand, 'child');
      if ($vars['view_mode'] == 'teaser'){
        if ($n == $max){
          break;
        }
      }
    }

    if ($vars['view_mode'] == 'teaser'){
      $opt['attributes']['class'] = array('btn', 'btn-primary');
      $vars['content']['brands']['more'] = array(
        '#markup' => '<p class="text-center">' . l('Guarda altri produttori', 'node/16', $opt) . '</p>',
      );
    }

  }
}

function _preprocess_node_chisiamo(&$vars){
  if ($vars['view_mode'] == 'full' || $vars['view_mode'] == 'teaser'){
    $partners_nid = get_children_by_pnid(91);
    if ($partners_nid){
      $partners = node_load_multiple($partners_nid);

      if ($vars['view_mode'] == 'teaser'){
        $vars['content']['partners']['#prefix'] = '<div class="wrapper-partners hidden-xs">';
      } else {
        $vars['content']['partners']['#prefix'] = '<div class="wrapper-partners">';
      }
      
      $vars['content']['partners']['#suffix'] = '</div>';
      $vars['content']['partners']['title'] = array(
        '#markup' => '<h3 class="text-center">' . l('I nostri partner', 'node/91') . '</h3><hr>',
      );
      $vars['content']['partners']['list'] = array(
        '#prefix' => '<div class="row partners-reference">',
        '#suffix' => '</div>',
      );

      foreach ($partners as $key => $partner) {
        $vars['content']['partners']['list'][$key] = node_view($partner, 'child');
      }
    }
  }
}

/**
 * Implements hook_preprocess_field()
 */
function ttp_preprocess_field(&$variables) {
  if ($variables['element']['#field_type'] == 'field_collection') {
    $variables['classes_array'][] = 'row spazio-40';
    //Iterate through all field items
    foreach ($variables['items'] as $key => $item) {
      // Wrapper bootstrap
      $variables['items'][$key]['#attributes']['class'][] = 'col-md-3';
      $variables['items'][$key]['#attributes']['class'][] = 'spazio-20';
      $variables['items'][$key]['#attributes']['class'][] = 'wrapper-field-collection-sameh';
      // Nascondo links (modify, delete)
      unset($variables['items'][$key]['links']);
    }
    add_same_h_by_selector('.wrapper-field-collection-sameh');
  }
}

function ttp_preprocess_entity(&$vars){
  if($vars['entity_type'] == 'field_collection_item'){
    $entity = $vars['field_collection_item'];

    // Icon
    if (isset($entity->field_icon['und'][0]['value'])){
      $value = $entity->field_icon['und'][0]['value'];
      $icon = array(
        '#markup' => '<p class="text-center spazio-0"><i class="fa fa-2x fa-' . $value . '"></i></p>',
      );
      $vars['content']['icon'] = array(
        'icon' => $icon,
        '#weight' => -10,
      );
    }

    // Line
    $vars['content']['line'] = array(
      'line' => array(
        '#markup' => '<hr>',
      ),
      '#weight' => 1,
    );

    $vars['content']['field_title'] = array(
      '#prefix' => '<div class="same-h">',
      '#suffix' => '</div>',
      'title' => $vars['content']['field_title'],
    );

    // Short description
    $vars['content']['field_short']['#weight'] = 2;
  }

  if($vars['entity_type'] == 'paragraphs_item'){
    _ttp_preprocess_paragraphs($vars);
  }
}

// ** FORM CONTATTI ALTER **
// -------------------------

/**
 * Implements hook_form_FORM_ID_alter(&$form, &$form_state, $form_id)
 */
function ttp_form_webform_client_form_4_alter(&$form, &$form_state, $form_id){
  $node = menu_get_object();
  //$form['submitted']['info']['#access'] = false;
  if ($node){
    $form['submitted']['info']['#default_value'] = $node->title;
  } else {
    $form['submitted']['info']['#default_value'] = 'Home page';
  }
}

// ** PICCOLE FUNZIONI DI TEMA **
// ------------------------------

/**
 * funzione che aggiungere la paginazione con title al nodo
 */
function _pager_with_title(&$vars){
  if (isset($vars['pagination'])){
    $next = node_load($vars['pagination']['next']);
    $prev = node_load($vars['pagination']['prev']);

    $opt['html'] = true;
    $vars['content']['pager_with_title'] = array(
      '#prefix' => '<div class="row pager-with-title spazio-30">',
      '#suffix' => '</div>',
      'prev' => array(
        '#markup' => '<div class="col-xs-6"><p>' . l('<i class="fa fa-angle-left fa-fw"></i> ' . $prev->title, 'node/' . $prev->nid, $opt) . '</p></div>',
      ),
      'next' => array(
        '#markup' => '<div class="col-xs-6"><p class="text-right">' . l($next->title . ' <i class="fa fa-angle-right fa-fw"></i>', 'node/' . $next->nid, $opt) . '</p></div>',
      ),
    );
  }
}

function _render_showroom_reference($node){
  $address = field_view_field('node', $node, 'field_address', 'teaser');
  $opt = array(
    'html' => TRUE,
    'attributes' => array(
      'class' => array('btn', 'btn-primary'),
    ),
  );
  $content = array(
    'line' => array(
      '#markup' => '<hr class="no-margin-top">',
    ),
    'wrapper-ul' => array(
      '#prefix' => '<ul class="fa-ul">',
      '#suffix' => '</ul>',
      'title' => array(
        '#markup' => '<li><i class="fa fa-li fa-lg fa-map-marker"></i><h4 class="same-h">' . l($node->title, 'node/' . $node->nid) . '</h4></li>',
      ),
      'description' => array(
        '#markup' => '<li>' . render($address) . '</li>',
      ),
      'more' => array(
        '#markup' => '<li><p class="more small">' . l('Info e orari <i class="fa fa-angle-right fa-fw"></i>', 'node/' . $node->nid, $opt) . '</p></li>',
      ),
    ),
  );
  return array(
    '#prefix' => '<div class="node-showroom node-reference spazio-20">',
    '#suffix' => '</div>',
    'content' => $content,
  );
}

function _brand_by_products(&$vars){
  $node = $vars['node'];
  $products_nid = get_children_by_pnid($node->nid);
  $products = node_load_multiple($products_nid);
  $brand = array();
  foreach ($products as $key => $product){
    if (isset($product->field_ref_brand['und'][0]['target_id'])){
      $k = $product->field_ref_brand['und'][0]['target_id'];
      $brands[$k] = $k;
    }
  }
  if (!empty($brands)){
    $brands = node_load_multiple($brands);
    $vars['content']['brands']['title']['#markup'] = '<h2 class="text-center">I nostri produttori per "' . $node->title . '"</h2>';
    $vars['content']['brands']['grid']['#prefix'] = '<hr><div class="wrapper-brands row spazio-20">';
    $vars['content']['brands']['grid']['#suffix'] = '</div>';
    foreach ($brands as $key => $brand) {
      $vars['content']['brands']['grid']['data'][$key] = node_view($brand,'child');
    }
  }
}
/**
 * Overrides theme_pager().
 */
function ttp_pager($variables) {
  $output = "";
  $items = array();
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];

  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // Current is the page we are currently paged to.
  $pager_current = $pager_page_array[$element] + 1;
  // First is the first page listed by this pager piece (re quantity).
  $pager_first = $pager_current - $pager_middle + 1;
  // Last is the last page listed by this pager piece (re quantity).
  $pager_last = $pager_current + $quantity - $pager_middle;
  // Max is the maximum page number.
  $pager_max = $pager_total[$element];

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }

  // End of generation loop preparation.
  // @todo add theme setting for this.
  // $li_first = theme('pager_first', array(
  // 'text' => (isset($tags[0]) ? $tags[0] : t('first')),
  // 'element' => $element,
  // 'parameters' => $parameters,
  // ));
  $li_previous = theme('pager_previous', array(
    'text' => (isset($tags[1]) ? $tags[1] : '<'),
    'element' => $element,
    'interval' => 1,
    'parameters' => $parameters,
  ));
  $li_next = theme('pager_next', array(
    'text' => (isset($tags[3]) ? $tags[3] : '>'),
    'element' => $element,
    'interval' => 1,
    'parameters' => $parameters,
  ));
  // @todo add theme setting for this.
  // $li_last = theme('pager_last', array(
  // 'text' => (isset($tags[4]) ? $tags[4] : t('last')),
  // 'element' => $element,
  // 'parameters' => $parameters,
  // ));
  if ($pager_total[$element] > 1) {
    // @todo add theme setting for this.
    // if ($li_first) {
    // $items[] = array(
    // 'class' => array('pager-first'),
    // 'data' => $li_first,
    // );
    // }
    if ($li_previous) {
      $items[] = array(
        'class' => array('prev'),
        'data' => $li_previous,
      );
    }
    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis', 'disabled'),
          'data' => '<span>…</span>',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            // 'class' => array('pager-item'),
            'data' => theme('pager_previous', array(
              'text' => $i,
              'element' => $element,
              'interval' => ($pager_current - $i),
              'parameters' => $parameters,
            )),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            // Add the active class.
            'class' => array('active'),
            'data' => l($i, '#', array('fragment' => '', 'external' => TRUE)),
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'data' => theme('pager_next', array(
              'text' => $i,
              'element' => $element,
              'interval' => ($i - $pager_current),
              'parameters' => $parameters,
            )),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis', 'disabled'),
          'data' => '<span>…</span>',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('next'),
        'data' => $li_next,
      );
    }
    // @todo add theme setting for this.
    // if ($li_last) {
    // $items[] = array(
    // 'class' => array('pager-last'),
    // 'data' => $li_last,
    // );
    // }
    return '<div class="text-center small">' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pagination')),
    )) . '</div>';
  }
  return $output;
}

function _ttp_add_houzz_badge(&$vars){
  $vars['page']['houzz'] = array(
    '#prefix' => '<div class="wrapper-houzz">',
    '#suffix' => '</div>',
  );

  $vars['page']['houzz']['#markup'] = '<table style="width: 80px;" cellpadding="0" cellspacing="0"><tr><td><a href="http://www.houzz.it/pro/tuttoporte-torino/tuttoporte" rel="nofollow"><img src="//st.hzcdn.com/static_it-IT/badge_41_8@2x.png" alt="tuttoporte_torino a Torino, TO, IT su Houzz" width="80" height="80" border="0" /></a></td></tr></table>';

  $path = drupal_get_path('theme', 'ttp') . '/js/animation.js';
  drupal_add_js( $path , array('group' => JS_LIBRARY, 'weight' => 1));
}

function ttp_preprocess_cover(&$vars){
  $news_set = node_load(207);
  if ($news_set){
    if (isset($news_set->field_ref_news['und'][0])){
      $news = $news_set->field_ref_news['und'];
      $vars['news'] = node_view($news_set, 'teaser');
      add_same_h_by_selector('.wrapper-front-news');
    }
  }
}

// ** LOGIC **
// -----------

/**
 * Gets all nodes related by brand
 */
function _get_nodes($bundle, array $options = array()){
  // Get all nodes related by region
  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', $bundle)
    ->propertyCondition('status', NODE_PUBLISHED);
    
    //->fieldOrderBy('field_photo', 'fid', 'DESC')
  if (isset($options['ref_nid'])){
    $query->fieldCondition('field_ref_brand', 'target_id', $options['ref_nid']);
  }
  $query->addMetaData('account', user_load(1)); // Run the query as user 1.
  $query->execute();

  if (isset($query->ordered_results)){
    $nodes = $query->ordered_results;
    $nodes_id = array();
    foreach ( $nodes as $node ) {
      array_push ($nodes_id, $node->entity_id );
    }
    $nodes = node_load_multiple($nodes_id);
  } else {
    $nodes = false;
  }
  return $nodes;
}