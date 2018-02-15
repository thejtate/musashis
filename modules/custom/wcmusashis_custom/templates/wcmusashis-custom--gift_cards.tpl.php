<?php
/**
 * @file Gift cards popup template.
 */

?>

<a href="#" class="close btn-close"><?php print t('close'); ?></a>
<?php if (isset($image)): ?>
  <div class="img">
    <?php print $image; ?>
  </div>
<?php endif; ?>
<?php if (isset($button)): ?>
  <?php print $button; ?>
<?php endif; ?>
<a href="#" class="overlay close"></a>