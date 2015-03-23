<nav class="breadcrumb">
  <a class="nav-icon nav-icon-left" data-dropdown href="#breadcrumb-menu">
    <?php i('sitemap fa-lg') ?>
  </a>
  <ul class="nav nav-bar breadcrumb-list cf">

    <li>
      <a title="<?php _l('dashboard') ?>" class="breadcrumb-link" href="#/"><span class="breadcrumb-label"><?php _l('dashboard') ?></span></a>
    </li>

    <?php 
    foreach ($page->parents()->flip() as $item) {
      foreach (c::get('widgetPages') as $item2) 
        if ($item2 == $item->slug()) $match = true;
      if (!isset($match)) {
    ?>
    <li>
      <a title="<?php __($item->title()) ?>" class="breadcrumb-link" href="<?php echo purl($item, 'show') ?>">
        <span class="breadcrumb-label"><?php __($item->uid()) ?></span>
      </a>
    </li>
    <?php }} ?>

    <?php 
    if (!$page->isSite()) {
      foreach (c::get('widgetPages') as $item) 
        if ($item == $page->slug()) $match = true;
    ?>
    <li>
      <a title="<?php __($page->title()) ?>" class="breadcrumb-link" href="<?php echo purl($page, 'show') ?>">
        <span class="breadcrumb-label"><?php __((isset($match))? $page->title() : $page->uid()) ?></span>
      </a>
    </li>
    <?php } ?>

    <?php if(!empty($items)): ?>
    <?php foreach($items as $item): ?>
    <li>
      <a title="<?php __($item['title']) ?>" class="breadcrumb-link" href="<?php __($item['url']) ?>">
        <span class="breadcrumb-label"><?php __($item['title']) ?></span>
      </a>
    </li>
    <?php endforeach ?>
    <?php endif ?>

  </ul>
</nav>