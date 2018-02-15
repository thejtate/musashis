<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div class="outer-wrapper">
  <header class="header _dropdown-top_nav">
    <nav class="nav b-nav-header-top clearfix">
      <div class="wrapper-nav">
        <?php print render($page['header']); ?>
      </div>
    </nav>

    <div class="header-inner">
      <div class="logo">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
          </a>
        <?php endif; ?>
      </div>
      <?php if(!empty($top_image_file) && !empty($top_image_link)): ?>
        <a href="<?php print $top_image_link;?>" class="construciton-link" target="_blank">
          <img src="<?php print $top_image_file; ?>" alt="construciton"/>
        </a>
      <?php endif; ?>
    </div>
    <nav class="nav b-nav-header-bottom clearfix">
      <div class="wrapper-nav">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array('id' => 'navigation-top-menu', 'class' => array('menu', 'navigation_top'))
        )); ?>
      </div>
    </nav>
  </header>

  <div class="inner-wrapper-top">
    <div class="content-wrapper with-sidebar clearfix">
      <div class="content-outer">
        <div class="content-inner">
        <a id="main-content"></a>
        <?php if(!empty($submenu)): ?>
          <div class="content-menu">
            <?php print render($submenu);?>
          </div>
        <?php endif; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print $messages; ?>

        <?php print render($page['content']); ?>
      </div>
      </div>
        <aside class="sidebar">
        <div class="sb-header">
          <div class="sidebar-menu">
            <?php print (isset($second_menu)) ? $second_menu : "" ?>
          </div>
          <div class="share-wrapp">
            <ul class="list-share">
              <?php if (isset($share_facebook) && !empty($share_facebook)): ?>
                <li
                  class="item-facebook"><?php print l(t('facebook'), $share_facebook, array('attributes' => array('target' => "_blank"))); ?></li>
              <?php endif; ?>
              <?php if (isset($share_twitter) && !empty($share_twitter)): ?>
                <li
                  class="item-twitter"><?php print l(t('twitter'), $share_twitter, array('attributes' => array('target' => "_blank"))); ?></li>
              <?php endif; ?>
              <?php if (isset($share_yelp) && !empty($share_yelp)): ?>
                <li
                  class="item-mail"><?php print l(t('yelp'), $share_yelp, array('attributes' => array('target' => "_blank"))); ?></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="sb-footer"></div>
      </aside>
    </div>
  </div>
  <div class="inner-wrapper-bottom">
    <div class="cols-inner">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</div>
