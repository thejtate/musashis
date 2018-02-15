<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
?>
<div class="cols">
  <div class="col">
    <div class="field field-name">
      <?php print render($form['submitted']['your_name']);?>
    </div>
    <div class="field field-address">
      <?php print render($form['submitted']['email_address']);?>
    </div>
    <div class="field field-confirm-email">
      <?php print render($form['submitted']['confirm_email']);?>
    </div>
    <?php if(!empty($form['captcha'])): ?>
      <?php print render($form['captcha']);?>
    <?php endif; ?>
  </div>
  <div class="col">
    <div class="field field-comments">
      <?php print render($form['submitted']['comments']);?>
    </div>
  </div>
</div>
  <div class="btn-wrapp">
    <div class="submit-wrapper btn">
      <?php print render($form['actions']['submit']);?>
    </div>
  </div>
<?php
  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  print drupal_render_children($form);
