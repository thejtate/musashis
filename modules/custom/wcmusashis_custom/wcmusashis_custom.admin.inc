<?php
/**
 * @file Wc ShushiNeko admin custom functionality
 */



function wcmusashis_custom_site_setings_form($form, &$form_state) {

  $form['wcmusashis_main_info'] = array(
    '#type' => 'fieldset',
    '#title' => t('Main info'),
    '#weight' => 1,
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['wcmusashis_main_info']['wcmusashis_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook'),
    '#default_value' => variable_get('wcmusashis_facebook', ''),
    '#size' => 80,
    '#maxlength' => 128,
  );
  $form['wcmusashis_main_info']['wcmusashis_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter'),
    '#default_value' => variable_get('wcmusashis_twitter', ''),
    '#size' => 80,
    '#maxlength' => 128,
  );
  $form['wcmusashis_main_info']['wcmusashis_yelp'] = array(
    '#type' => 'textfield',
    '#title' => t('Yelp'),
    '#default_value' => variable_get('wcmusashis_yelp', ''),
    '#size' => 80,
    '#maxlength' => 128,
  );

  $form['wcmusashis_links'] = array(
    '#type' => 'fieldset',
    '#title' => t('Links'),
    '#weight' => 1,
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['wcmusashis_links']['wc_portal_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Portal link'),
    '#default_value' => variable_get('wc_portal_link', '#'),
    '#size' => 80,
    '#maxlength' => 128,
  );

  $form['wcmusashis_links']['wcmusashis_calendar'] = array(
    '#type' => 'textfield',
    '#title' => t('Calendar'),
    '#default_value' => variable_get('wcmusashis_calendar', ''),
    '#size' => 80,
    '#maxlength' => 128,
  );

  $form['wcmusashis_links']['wcmusashis_make_reservation_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Make reservation link'),
    '#default_value' => variable_get('wcmusashis_make_reservation_link', ''),
    '#size' => 80,
    '#maxlength' => 128,
  );

  $form['wc_top_image'] = array(
    '#type' => 'fieldset',
    '#title' => t('Top image link'),
    '#weight' => 2,
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['wc_top_image']['image'] = array(
    '#title' => t('Button image for desctop version'),
    '#type' => 'managed_file',
    '#description' => t('Top image link.'),
    '#default_value' => variable_get('wc_top_image_fid', ''),
    '#upload_location' => 'public://top-image/',
  );

  $form['wc_top_image']['wc_top_image_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link for desktop version'),
    '#default_value' => variable_get('wc_top_image_link', 'http://www.westernconceptsdining.com/westfest'),
  );

  $form['wc_top_image']['mobile_image'] = array(
    '#title' => t('Button image for mobile version'),
    '#type' => 'managed_file',
    '#description' => t('Top button image.'),
    '#default_value' => variable_get('wc_top_mobile_image_fid', ''),
    '#upload_location' => 'public://top-image/',
  );

  $form['wc_top_image']['map_mobile_image'] = array(
    '#title' => t('Map image for mobile version'),
    '#type' => 'managed_file',
    '#description' => t('Map image.'),
    '#default_value' => variable_get('wc_top_map_mobile_image_fid', ''),
    '#upload_location' => 'public://top-image/',
  );

  $form['#submit'][] = 'wc_save_image';

  return system_settings_form($form);
}

function wc_save_image($form, $form_state) {
  global $user;

  if(!empty($form_state['values']['image'])) {
    $file = file_load($form_state['values']['image']);
    // Change status to permanent.
    $file->status = FILE_STATUS_PERMANENT;
    // Save.
    file_save($file);
    // Record that the module (in this example, user module) is using the file.
    file_usage_add($file, 'user', 'user', $user->uid);
    variable_set('wc_top_image_fid', $file->fid);
  } else {
    variable_set('wc_top_image_fid', 0);
  }

  if(!empty($form_state['values']['mobile_image'])) {
    $file = file_load($form_state['values']['mobile_image']);
    // Change status to permanent.
    $file->status = FILE_STATUS_PERMANENT;
    // Save.
    file_save($file);
    // Record that the module (in this example, user module) is using the file.
    file_usage_add($file, 'user', 'user', $user->uid);
    variable_set('wc_top_mobile_image_fid', $file->fid);
  } else {
    variable_set('wc_top_mobile_image_fid', 0);
  }

  if(!empty($form_state['values']['map_mobile_image'])) {
    $file = file_load($form_state['values']['map_mobile_image']);
    // Change status to permanent.
    $file->status = FILE_STATUS_PERMANENT;
    // Save.
    file_save($file);
    // Record that the module (in this example, user module) is using the file.
    file_usage_add($file, 'user', 'user', $user->uid);
    variable_set('wc_top_map_mobile_image_fid', $file->fid);
  } else {
    variable_set('wc_top_map_mobile_image_fid', 0);
  }
}