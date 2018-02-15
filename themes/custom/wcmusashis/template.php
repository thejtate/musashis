<?php

/**
 * @file custom site theme functions
 */


define("ABOUT_US_NID", 4);
define("CAREERS_NID", 11);


/**
 * Implements hook_preprocess_html().
 */
function wcmusashis_preprocess_html(&$vars) {

  //attach conditional js
  $html5 = array(
    '#tag' => 'script',
    '#attributes' => array(
      'src' => drupal_get_path('theme', 'wcmusashis') . '/js/lib/html5.js',
    ),
    '#prefix' => '<!--[if (lt IE 9) & (!IEMobile)]>',
    '#suffix' => '</script><![endif]-->',
  );
  drupal_add_html_head($html5, 'wcsushi_html5');

  $node = menu_get_object('node', 1);
  if ($node) {
    switch ($node->type) {
      case 'homepage':
        $vars['classes_array'][] = 'page-home';
        break;
      case 'life_of_musashi':
        $vars['classes_array'][] = 'page-life-of-musashi';
        break;
    }
  }

  $vars['so6ix_digital_pixel'] = "<!-- So6ix Digital Pixel-->
  <script type=\"text/javascript\">var ssaUrl = ('https:' == document.location.protocol ? 'https://' : 'http://') +
  'centro.pixel.ad/iap/d058d451a76921aa';new Image().src = ssaUrl;</script>
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '355326344839575');
  fbq('track', 'PageView');
  </script>
  <noscript><img height=\"1\" width=\"1\" style=\"display:none\"
  src=\"https://www.facebook.com/tr?id=355326344839575&ev=PageView&noscript=1\"
  /></noscript>";
}


/**
 * Implements hook_preprocess_page().
 */
function wcmusashis_preprocess_page(&$vars) {
  // Second menu
  $links = menu_navigation_links('menu-second-menu');
  foreach($links as $key => $link){
    $links[$key]['html'] = TRUE;
  }

  $vars['second_menu'] = theme('links', array(
    'links' => $links,
    'attributes' => array('id' => 'navigation-bottom-menu', 'class' => array('menu', 'navigation_bottom'))
  ));

  //level 2 menu
  $links2 = menu_navigation_links('main-menu', 1);
  $menu2 = theme('links', array(
    'links' => $links2,
    'attributes' => array('class' => 'menu')
  ));
  $vars['submenu'] = $menu2;

  // share
  $vars['share_yelp'] = variable_get('wcmusashis_yelp', '');
  $vars['share_facebook'] = variable_get('wcmusashis_facebook', '');
  $vars['share_twitter'] = variable_get('wcmusashis_twitter', '');


  // user login page - for manager
  if (in_array("page__user", $vars['theme_hook_suggestions'])) {
    drupal_set_title(t("Administrator"));
    if (user_is_logged_in()){
      drupal_goto("<front>");
    }
  }
}

/**
 * Implements hook_preprocess_node().
 */
function wcmusashis_preprocess_node(&$vars) {
  //redirect some full display nodes
  if (isset($vars['view_mode']) && $vars['view_mode'] == 'full') {
    switch ($vars['type']) {
      case 'webform':
        if ($vars['nid'] == WCMUSASHIS_EMAIL_US_WEBFORM_NID) {
          drupal_goto('node/' . WCMUSASHIS_CONTACT_US_NID);
        } else if($vars['nid'] == WCMUSASHIS_NEWSLETTER_WEBFORM_NID) {
          drupal_goto('<front>');
        }
        break;
      case 'menu_item':
        drupal_goto('dinner');
        break;
      case 'awards':
      case 'careers':
        drupal_goto('node/' . ABOUT_US_NID);
        break;
    }
  }

  switch ($vars['type']) {
    case "about_us":
      $vars['careers'] = node_view(node_load(CAREERS_NID), "teaser");
      $vars['awards'] = views_embed_view("awards");
      break;
    case "contact_us":
      $vars['reservation_link'] = variable_get('wcmusashis_make_reservation_link', '');
      break;
  }
}


/**
 * Implements hook_form_alter().
 */
function wcmusashis_form_alter(&$form, &$form_state, $form_id) {
  switch ($form_id) {
    case 'webform_client_form_2'://Newsletter webform
      _wcmusashis_form_add_wrapper($form['submitted']['your_full_name'], array("field", "field-name"));
      _wcmusashis_form_add_wrapper($form['submitted']['email_address'], array("field", "field-address"));
      _wcmusashis_form_add_wrapper($form['submitted']['confirm_email'], array("field", "field-email"));
      _wcmusashis_form_add_wrapper($form['submitted']['address'], array("field", "field-address"));
      _wcmusashis_form_add_wrapper($form['submitted']['city'], array("field", "field-city"));
      _wcmusashis_form_add_wrapper($form['submitted']['state'], array("field", "field-state"));
      _wcmusashis_form_add_wrapper($form['submitted']['birthday_month'], array('width-form-180'));
      _wcmusashis_form_add_wrapper($form['submitted']['birthday_day'], array('width-form-60', 'not-label'));
      _wcmusashis_form_add_wrapper($form['submitted']['birthday_year'], array('width-form-82', 'not-label', 'last-form'));
      $form['submitted']['state']['#attributes']['class'][] = 'form-select';
      _wcmusashis_form_add_wrapper($form['submitted']['zip'], array("field", "field-zip"));

      $form['submitted']['birthday_month']['#attributes']['placeholder'] = t('Month');
      $form['submitted']['birthday_month']['#title'] = t('Birthday');
      $form['submitted']['birthday_day']['#attributes']['placeholder'] = t('Day');
      $form['submitted']['birthday_year']['#attributes']['placeholder'] = t('Year');

      $form['actions']['submit']['#prefix'] = '<div class="btn-wrapp"><div class="submit-wrapper btn">';
      $form['actions']['submit']['#suffix'] = '</div></div>';
      $form['submitted']['state']['#empty_option'] = '--';
      break;
  }
}


/**
 * Loads a theme include file.
 */
function theme_load_include($type, $theme, $name = NULL) {
  if (empty($name)) {
    $name = $theme;
  }

  $file = './' . drupal_get_path('theme', $theme) . "/$name.$type";

  if (is_file($file)) {
    require_once $file;
  }
  else {
    return FALSE;
  }
}


/**
 * Add wrappers with classes to form items
 * @param $form
 * @param $field
 * @param array $classes
 */
function _wcmusashis_form_add_wrapper(&$element, $classes = array(), $removeTitle = FALSE){
  if ($removeTitle) {
    $classes[] = "hide-title";
  }

  $element['#prefix'] = '<div class="' . implode(" ", $classes) . '">';
  $element['#suffix'] = '</div>';
}

/**
 * Implements hook_field().
 */
function wcmusashis_preprocess_field(&$vars, $hook){
  //remove Price trailing zeroes
  $element = $vars['element'];
  if(!empty($element['#field_name'])) {
    switch($element['#field_name']) {
      case 'field_menu_item_price':
        foreach ($vars['items'] as $key => $item) {
          $vars['items'][$key] = str_replace('.00', '', $item);
        }
        break;
      case 'field_popup_link':
        if (!empty($vars['items']) && !empty($vars['items'][0]['#element']['title'])) {
          $vars['items'][0]['#element']['title'] = '<span>' . $vars['items'][0]['#element']['title'] . '</span>';
        }
        break;
    }
  }
}

/**
 * Implements template_preprocess_block().
 *
 * @param $vars
 */
function wcmusashis_preprocess_block(&$vars) {

  if (!empty($vars['block']->delta) && $vars['block']->delta == 'fblikebox') {
    $url = variable_get('fb_like_url', 'http://www.facebook.com/platform');
    $vars['follow_link'] = array(
      '#markup' => '<div class="btn-wrapp">
              ' . l('FOLLOW US!', $url, array('attributes' => array('target'=> '_blank', 'class' => array('btn')))) . '
            </div>',
    );
  }
}

/**
 * Implements hook_process_entity().
 */
function wcmusashis_process_entity(&$vars) {
  if ($vars['entity_type'] == 'bean') {
    switch ($vars['bean']->type) {
      case 'popup':
        if (!empty($vars['content']['field_popup_timer'])) {
          $timer = $vars['content']['field_popup_timer']['#items'][0]['value'];
          $vars['content']['field_popup_timer']['#access'] = FALSE;

          drupal_add_js(
            array(
              'wcmusashis_popup' => array(
                'timer' => $timer,
              )
            ),
            'setting'
          );
        }

        if ($vars['bean']->delta == 'gift-card-popup') {
          $vars['theme_hook_suggestions'][] = 'bean__gift_card_popup';
        }
        break;
    }
  }
}