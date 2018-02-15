<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <ul class="menu">
    <?php foreach ($rows as $id => $row): ?>
      <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
      <?php if($id == 2):?>
        <li class="logo_top">
          <a href="<?php print url(variable_get('wc_portal_link', '#'), array('external' => TRUE));?>">
             <span class="logo"><img src="<?php print base_path() . drupal_get_path('theme', 'wcmusashis')?>/images/nav_icon/logo_nav.png" alt="logo_nav"></span>
            <?php /*
            <span class="text-item"><?php print t('Our family of award-winning restaurants'); ?></span>
            */?>
          </a></li>
      <?php endif;?>
    <?php endforeach; ?>
  </ul>
<?php print $wrapper_suffix; ?>
