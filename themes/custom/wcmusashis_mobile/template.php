<?php

/**
 * @file custom site theme functions
 */


define("CAREERS_NID", 11);

/**
 * Implements hook_preprocess_html().
 */
function wcmusashis_mobile_preprocess_html(&$vars) {

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
function wcmusashis_mobile_preprocess_page(&$vars) {
  $vars['active_title'] = menu_get_active_title();
  $vars['reservation_link'] = variable_get('wcmusashis_make_reservation_link', '');

  $menu_pages = array("page__dinner", "page__lunch", "page__sushi", "page__wine", "page__sake", "page__desserts");

  foreach($menu_pages as $page){
    if (in_array($page, $vars['theme_hook_suggestions'])){
      $vars['active_title'] = t('Menu');
    }
  }

  // share
  $vars['share_yelp'] = variable_get('wcmusashis_yelp', '');
  $vars['share_facebook'] = variable_get('wcmusashis_facebook', '');
  $vars['share_twitter'] = variable_get('wcmusashis_twitter', '');

  //level 2 menu
  $links2 = menu_navigation_links('main-menu', 1);
  $options = array();
  foreach($links2 as $link){
    $options[url($link['href'])] = $link['title'];
  }

  if (!empty($options)) {
    $el = array(
      '#options' => $options,
      '#attributes' => array('class' => array('menu-select-list')),
      '#value' => base_path() . arg(0),
    );
    $vars['submenu'] = theme('select', array('element' => $el));
  }


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
function wcmusashis_mobile_preprocess_node(&$vars) {
  switch ($vars['type']) {
    case "about_us":
      $vars['careers'] = node_view(node_load(CAREERS_NID), "teaser");
      $vars['awards'] = views_embed_view("awards");
      break;
    case "contact_us":
      $vars['reservation_link'] = variable_get('wcmusashis_make_reservation_link', '');
      break;
    case "life_of_musashi":
      drupal_goto("<front>");
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
 * Implements hook_process_entity().
 */
function wcmusashis_mobile_process_entity(&$vars) {
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

/**
 * Implements hook_preprocess_field
 */
function wcmusashis_mobile_preprocess_field(&$vars, $hook) {

  $element = $vars['element'];
  if(!empty($element['#field_name'])) {
    switch($element['#field_name']) {
      case 'field_popup_link':
        if (!empty($vars['items']) && !empty($vars['items'][0]['#element']['title'])) {
          $vars['items'][0]['#element']['title'] = '<span>' . $vars['items'][0]['#element']['title'] . '</span>';
        }
        break;
    }
  }
}