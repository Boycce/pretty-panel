<?php 
  foreach (c::get('hidePages') as $url) 
    if ($url == $subpage->slug()) $ignorepage = true;
  if (!isset($ignorepage)):
?>

<li <?php if ($subpage->uid() == 'error') echo 'class="error"' ?>>
  <a class="draggable" data-helper="<?php echo esc($subpage->title(), 'attr') ?>" data-text="<?php echo esc(dragText($subpage), 'attr') ?>" href="<?php _u($subpage, 'show') ?>">
    <?php i($subpage) ?><span><?php __($subpage->title()) ?></span>
    <small class="marginalia shiv shiv-left shiv-white"><?php __(n($subpage)) ?></small>
  </a>
</li>

<?php endif ?>